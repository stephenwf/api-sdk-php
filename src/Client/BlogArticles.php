<?php

namespace eLife\ApiSdk\Client;

use eLife\ApiClient\ApiClient\BlogClient;
use eLife\ApiClient\MediaType;
use eLife\ApiClient\Result;
use eLife\ApiSdk\ArrayFromIterator;
use eLife\ApiSdk\Collection;
use eLife\ApiSdk\Collection\ArrayCollection;
use eLife\ApiSdk\Collection\PromiseCollection;
use eLife\ApiSdk\CreatesObjects;
use eLife\ApiSdk\SlicedIterator;
use GuzzleHttp\Promise\PromiseInterface;
use Iterator;
use function GuzzleHttp\Promise\all;
use function GuzzleHttp\Promise\promise_for;

final class BlogArticles implements Iterator, Collection
{
    use ArrayFromIterator;
    use CreatesObjects;
    use SlicedIterator;

    private $count;
    private $articles = [];
    private $blogClient;
    private $subjects;

    public function __construct(
        BlogClient $blogClient,
        Subjects $subjects
    ) {
        $this->blogClient = $blogClient;
        $this->subjects = $subjects;
    }

    public function get(string $id) : PromiseInterface
    {
        if (isset($this->articles[$id])) {
            return $this->articles[$id];
        }

        return $this->articles[$id] = $this->blogClient
            ->getArticle(
                ['Accept' => new MediaType(BlogClient::TYPE_BLOG_ARTICLE, 1)],
                $id
            )
            ->then(function (Result $result) {
                $full = function () use ($result) {
                    return $result->toArray();
                };

                $subjects = function () use ($result) {
                    return $this->getSubjects($result['subjects'] ?? []);
                };

                return $this->createBlogArticle($result->toArray(), $full, $subjects);
            });
    }

    public function slice(int $offset, int $length = null) : Collection
    {
        if (null === $length) {
            return new PromiseCollection($this->all()
                ->then(function (Collection $collection) use ($offset) {
                    return $collection->slice($offset);
                })
            );
        }

        return new PromiseCollection($this->blogClient
            ->listArticles(
                ['Accept' => new MediaType(BlogClient::TYPE_BLOG_ARTICLE_LIST, 1)],
                ($offset / $length) + 1,
                $length
            )
            ->then(function (Result $result) {
                $this->count = $result['total'];

                return $result;
            })
            ->then(function (Result $result) {
                $articles = [];

                $fullPromises = [];
                $subjectPromises = [];

                foreach ($result['items'] as $article) {
                    if (false === isset($this->articles[$article['id']])) {
                        $this->articles[$article['id']] = promise_for($this->createBlogArticle(
                            $article,
                            function (string $id) use (&$fullPromises, $result) {
                                if (empty($fullPromises)) {
                                    foreach ($result['items'] as $article) {
                                        $fullPromises[$article['id']] = $this->blogClient->getArticle(
                                            ['Accept' => new MediaType(BlogClient::TYPE_BLOG_ARTICLE, 1)],
                                            $article['id']
                                        );
                                    }
                                }

                                return $fullPromises[$id];
                            },
                            !empty($article['subjects']) ? function (string $id) use (&$subjectPromises, $result) {
                                if (empty($subjectPromises)) {
                                    foreach ($result['items'] as $article) {
                                        $subjectPromises[$article['id']] = $this->getSubjects($article['subjects'] ?? []);
                                    }
                                }

                                return $subjectPromises[$id];
                            } : null
                        ));
                    }

                    $articles[] = $this->articles[$article['id']]->wait();
                }

                return new ArrayCollection($articles);
            })
        );
    }

    public function count() : int
    {
        if (null === $this->count) {
            $this->slice(0, 1)->count();
        }

        return $this->count;
    }

    private function getSubjects(array $ids) : PromiseInterface
    {
        $subjects = [];

        foreach ($ids as $id) {
            $subjects[] = $this->subjects->get($id);
        }

        return all($subjects);
    }
}
