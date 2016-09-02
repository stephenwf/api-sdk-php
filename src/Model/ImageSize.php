<?php

namespace eLife\ApiSdk\Model;

use OutOfBoundsException;

final class ImageSize
{
    private $ratio;
    private $images;

    /**
     * @internal
     */
    public function __construct(string $ratio, array $images)
    {
        $this->ratio = $ratio;
        $this->images = $images;
    }

    public function getRatio() : string
    {
        return $this->ratio;
    }

    public function getImages() : array
    {
        return $this->images;
    }

    public function getImage(int $width) : string
    {
        if (empty($this->images[$width])) {
            throw new OutOfBoundsException('No image with the width '.$width.' available');
        }

        return $this->images[$width];
    }
}
