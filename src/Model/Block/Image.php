<?php

namespace eLife\ApiSdk\Model\Block;

use eLife\ApiSdk\Model\Block;

final class Image implements Block
{
    private $uri;
    private $altText;
    private $caption;

    /**
     * @internal
     */
    public function __construct(string $uri, string $altText, string $caption = null)
    {
        $this->uri = $uri;
        $this->altText = $altText;
        $this->caption = $caption;
    }

    public function getUri() : string
    {
        return $this->uri;
    }

    public function getAltText() : string
    {
        return $this->altText;
    }

    /**
     * @return string|null
     */
    public function getCaption()
    {
        return $this->caption;
    }
}
