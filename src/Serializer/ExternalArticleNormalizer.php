<?php

namespace eLife\ApiSdk\Serializer;

use eLife\ApiSdk\Model\Article;
use eLife\ApiSdk\Model\ExternalArticle;
use eLife\ApiSdk\Model\Place;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class ExternalArticleNormalizer implements NormalizerInterface, DenormalizerInterface, NormalizerAwareInterface, DenormalizerAwareInterface
{
    use NormalizerAwareTrait;
    use DenormalizerAwareTrait;

    public function denormalize($data, $class, $format = null, array $context = []) : ExternalArticle
    {
        return new ExternalArticle(
            $data['articleTitle'],
            $this->denormalizeJournal($data, $format, $context),
            $data['authorLine'],
            $data['uri']
        );
    }

    public function supportsDenormalization($data, $type, $format = null)
    {
        return
            ExternalArticle::class === $type ||
            (Article::class === $type && 'external' === ($data['type'] ?? 'unknown'))
        ;
    }

    public function supportsNormalization($data, $format = null) : bool
    {
        return $data instanceof ExternalArticle;
    }

    /**
     * @param ExternalArticle $object
     */
    public function normalize($object, $format = null, array $context = []) : array
    {
        $data = [
            'articleTitle' => $object->getArticleTitle(),
            'journal' => $this->normalizer->normalize($object->getJournal(), $format, $context),
            'authorLine' => $object->getAuthorLine(),
            'uri' => $object->getUri(),
        ];

        return $data;
    }

    private function denormalizeJournal($data, $format, $context) : Place
    {
        return $this->denormalizer->denormalize($data['journal'], Place::class, $format, $context);
    }
}
