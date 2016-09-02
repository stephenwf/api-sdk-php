<?php

namespace test\eLife\ApiSdk\Model;

use eLife\ApiSdk\Model\ImageSize;
use OutOfBoundsException;
use PHPUnit_Framework_TestCase;

final class ImageSizeTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_has_a_ratio()
    {
        $size = new ImageSize('2:1', [900 => 'https://placehold.it/900x450']);

        $this->assertSame('2:1', $size->getRatio());
    }

    /**
     * @test
     */
    public function it_has_images()
    {
        $size = new ImageSize('2:1', $images = [900 => 'https://placehold.it/900x450']);

        $this->assertSame($images, $size->getImages());
    }

    /**
     * @test
     */
    public function it_may_have_an_image_of_a_width()
    {
        $size = new ImageSize('2:1', [900 => 'https://placehold.it/900x450']);

        $this->assertSame('https://placehold.it/900x450', $size->getImage(900));
    }

    /**
     * @test
     */
    public function it_may_not_have_an_image_of_a_width()
    {
        $size = new ImageSize('2:1', [900 => 'https://placehold.it/900x450']);

        $this->expectException(OutOfBoundsException::class);

        $size->getImage(901);
    }
}
