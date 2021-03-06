<?php

namespace eLife\ApiSdk\Model;

use eLife\ApiSdk\Collection\Sequence;

final class ArticleSection implements HasContent, HasDoi
{
    private $content;
    private $doi;

    /**
     * @internal
     */
    public function __construct(Sequence $content, string $doi = null)
    {
        $this->content = $content;
        $this->doi = $doi;
    }

    /**
     * @return Sequence|Block[]
     */
    public function getContent() : Sequence
    {
        return $this->content;
    }

    /**
     * @return string|null
     */
    public function getDoi()
    {
        return $this->doi;
    }
}
