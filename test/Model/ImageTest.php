<?php

namespace test\eLife\ApiSdk\Model;

use eLife\ApiSdk\Model\Image;
use eLife\ApiSdk\Model\ImageSize;
use PHPUnit_Framework_TestCase;

final class ImageTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_has_alt_text()
    {
        $image = new Image('foo', [new ImageSize('2:1', [900 => 'https://placehold.it/900x450'])]);

        $this->assertSame('foo', $image->getAltText());
    }

    /**
     * @test
     */
    public function it_has_sizes()
    {
        $image = new Image('foo', $sizes = [new ImageSize('2:1', [900 => 'https://placehold.it/900x450'])]);

        $this->assertEquals($sizes, $image->getSizes());
    }
}
