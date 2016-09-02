<?php

namespace test\eLife\ApiSdk\Model\Block;

use eLife\ApiSdk\Model\Block\Image;
use PHPUnit_Framework_TestCase;

final class ImageTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_has_a_uri()
    {
        $image = new Image('http://www.example.com/image.jpg', '');

        $this->assertSame('http://www.example.com/image.jpg', $image->getUri());
    }

    /**
     * @test
     */
    public function it_has_alt_text()
    {
        $image = new Image('http://www.example.com/image.jpg', 'foo');

        $this->assertSame('foo', $image->getAltText());
    }

    /**
     * @test
     */
    public function it_may_have_a_caption()
    {
        $with = new Image('http://www.example.com/image.jpg', 'foo', 'bar');
        $withOut = new Image('http://www.example.com/image.jpg', 'foo');

        $this->assertSame('bar', $with->getCaption());
        $this->assertNull($withOut->getCaption());
    }
}
