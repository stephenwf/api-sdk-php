<?php

namespace eLife\ApiSdk\Client;

use eLife\ApiClient\ApiClient\CollectionsClient;
use eLife\ApiClient\MediaType;
use eLife\ApiClient\Result;
use eLife\ApiSdk\Collection\PromiseSequence;
use eLife\ApiSdk\Collection\Sequence;
use eLife\ApiSdk\Model\Collection;
use GuzzleHttp\Promise\PromiseInterface;
use Iterator;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

final class Collections implements Iterator, Sequence
{
    use Client;

    private $count;
    private $descendingOrder = true;
    private $subjectsQuery = [];
    private $collectionsClient;
    private $denormalizer;

    public function __construct(CollectionsClient $collectionsClient, DenormalizerInterface $denormalizer)
    {
        $this->collectionsClient = $collectionsClient;
        $this->denormalizer = $denormalizer;
    }

    public function get(string $id) : PromiseInterface
    {
        return $this->collectionsClient
            ->getCollection(
                ['Accept' => new MediaType(CollectionsClient::TYPE_COLLECTION, 1)],
                $id
            )
            ->then(function (Result $result) {
                return $this->denormalizer->denormalize($result->toArray(), Collection::class);
            });
    }

    public function forSubject(string ...$subjectId) : self
    {
        $clone = clone $this;

        $clone->subjectsQuery = array_unique(array_merge($this->subjectsQuery, $subjectId));

        if ($clone->subjectsQuery !== $this->subjectsQuery) {
            $clone->count = null;
        }

        return $clone;
    }

    public function slice(int $offset, int $length = null) : Sequence
    {
        if (null === $length) {
            return new PromiseSequence($this->all()
                ->then(function (Sequence $sequence) use ($offset) {
                    return $sequence->slice($offset);
                })
            );
        }

        return new PromiseSequence($this->collectionsClient
            ->listCollections(
                ['Accept' => new MediaType(CollectionsClient::TYPE_COLLECTION_LIST, 1)],
                ($offset / $length) + 1,
                $length,
                $this->descendingOrder,
                $this->subjectsQuery
            )
            ->then(function (Result $result) {
                $this->count = $result['total'];

                return $result;
            })
            ->then(function (Result $result) {
                return array_map(function (array $collection) {
                    return $this->denormalizer->denormalize($collection, Collection::class, null, ['snippet' => true]);
                }, $result['items']);
            })
        );
    }

    public function reverse() : Sequence
    {
        $clone = clone $this;

        $clone->descendingOrder = !$this->descendingOrder;

        return $clone;
    }
}
