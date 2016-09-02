<?php

namespace test\eLife\ApiSdk\Model;

use eLife\ApiSdk\Model\Image;
use eLife\ApiSdk\Model\ImageSize;
use eLife\ApiSdk\Model\Subject;
use PHPUnit_Framework_TestCase;

final class SubjectTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_has_an_id()
    {
        $image = new Image('', [new ImageSize('2:1', [900 => 'https://placehold.it/900x450'])]);
        $subject = new Subject('id', 'name', null, $image);

        $this->assertSame('id', $subject->getId());
    }

    /**
     * @test
     */
    public function it_has_a_name()
    {
        $image = new Image('', [new ImageSize('2:1', [900 => 'https://placehold.it/900x450'])]);
        $subject = new Subject('id', 'name', null, $image);

        $this->assertSame('name', $subject->getName());
    }

    /**
     * @test
     */
    public function it_may_have_an_impact_statement()
    {
        $image = new Image('', [new ImageSize('2:1', [900 => 'https://placehold.it/900x450'])]);
        $with = new Subject('id', 'name', 'impact statement', $image);
        $withOut = new Subject('id', 'name', null, $image);

        $this->assertSame('impact statement', $with->getImpactStatement());
        $this->assertNull($withOut->getImpactStatement());
    }

    /**
     * @test
     */
    public function it_has_an_image()
    {
        $subject = new Subject('id', 'name', null, $image = new Image('', [900 => 'https://placehold.it/900x450']));

        $this->assertEquals($image, $subject->getImage());
    }
}
