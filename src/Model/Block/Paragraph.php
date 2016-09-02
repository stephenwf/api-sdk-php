<?php

namespace eLife\ApiSdk\Model\Block;

use eLife\ApiSdk\Model\Block;

final class Paragraph implements Block
{
    private $text;

    /**
     * @internal
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function getText() : string
    {
        return $this->text;
    }
}
