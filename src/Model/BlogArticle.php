<?php

namespace eLife\ApiSdk\Model;

use DateTimeImmutable;
use GuzzleHttp\Promise\PromiseInterface;

final class BlogArticle
{
    use HasBlocks;

    private $id;
    private $title;
    private $published;
    private $impactStatement;
    private $content;
    private $full;
    private $subjects;

    /**
     * @internal
     */
    public function __construct(
        string $id,
        string $title,
        DateTimeImmutable $published,
        string $impactStatement = null,
        callable $full,
        callable $subjects = null
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->published = $published;
        $this->impactStatement = $impactStatement;
        $this->full = $full;
        if (null === $subjects) {
            $this->subjects = [];
        } else {
            $this->subjects = $subjects;
        }
    }

    public function getId() : string
    {
        return $this->id;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * @return string|null
     */
    public function getImpactStatement()
    {
        return $this->impactStatement;
    }

    public function getPublishedDate() : DateTimeImmutable
    {
        return $this->published;
    }

    public function hasSubjects() : bool
    {
        return [] !== $this->subjects || is_callable($this->subjects);
    }

    /**
     * @return Subject[]
     */
    public function getSubjects() : array
    {
        if (is_callable($this->subjects)) {
            $this->subjects = call_user_func($this->subjects, $this->id);

            if ($this->subjects instanceof PromiseInterface) {
                $this->subjects = $this->subjects->wait();
            }
        }

        return $this->subjects;
    }

    /**
     * @return Block[]
     */
    public function getContent() : array
    {
        $this->resolve();

        return $this->content;
    }

    private function resolve()
    {
        if (null === $this->full) {
            return;
        }

        $full = call_user_func($this->full, $this->id);

        if ($full instanceof PromiseInterface) {
            $full = $full->wait();
        }

        $this->content = $this->denormalizeBlocks($full['content']);

        $this->full = null;
    }
}
