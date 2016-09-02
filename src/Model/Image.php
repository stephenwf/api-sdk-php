<?php

namespace eLife\ApiSdk\Model;

final class Image
{
    private $altText;
    private $sizes;

    /**
     * @internal
     *
     * @param ImageSize[] $sizes
     */
    public function __construct(string $altText, array $sizes)
    {
        $this->altText = $altText;
        $this->sizes = $sizes;
    }

    public function getAltText() : string
    {
        return $this->altText;
    }

    /**
     * @return ImageSize[]
     */
    public function getSizes() : array
    {
        return $this->sizes;
    }
}
