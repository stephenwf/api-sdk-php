<?php

namespace eLife\ApiSdk;

use DateTimeImmutable;
use eLife\ApiSdk\Model\BlogArticle;
use eLife\ApiSdk\Model\Image;
use eLife\ApiSdk\Model\ImageSize;
use eLife\ApiSdk\Model\Subject;

trait CreatesObjects
{
    final private function createImage(array $image) : Image
    {
        $sizes = [];
        foreach ($image['sizes'] as $ratio => $images) {
            $sizes[] = new ImageSize($ratio, $images);
        }

        return new Image($image['alt'], $sizes);
    }

    private function createBlogArticle(array $data, callable $full, callable $subjects = null) : BlogArticle
    {
        return new BlogArticle(
            $data['id'],
            $data['title'],
            DateTimeImmutable::createFromFormat(DATE_ATOM, $data['published']),
            $data['impactStatement'] ?? null,
            $full,
            $subjects
        );
    }

    private function createSubject(array $data) : Subject
    {
        return new Subject(
            $data['id'],
            $data['name'],
            $data['impactStatement'] ?? null,
            $this->createImage($data['image'])
        );
    }
}
