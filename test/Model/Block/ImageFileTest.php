<?php

namespace test\eLife\ApiSdk\Model\Block;

use eLife\ApiSdk\Model\Block\File;
use eLife\ApiSdk\Model\Block\ImageFile;
use eLife\ApiSdk\Model\Block\Paragraph;
use PHPUnit_Framework_TestCase;

final class ImageFileTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_may_have_a_doi()
    {
        $with = new ImageFile('10.1000/182', null, null, null, [], '', 'http://www.example.com/image.jpg', [], []);
        $withOut = new ImageFile(null, null, null, null, [], '', 'http://www.example.com/image.jpg', [], []);

        $this->assertSame('10.1000/182', $with->getDoi());
        $this->assertNull($withOut->getDoi());
    }

    /**
     * @test
     */
    public function it_may_have_an_id()
    {
        $with = new ImageFile(null, 'id', null, null, [], '', 'http://www.example.com/image.jpg', [], []);
        $withOut = new ImageFile(null, null, null, null, [], '', 'http://www.example.com/image.jpg', [], []);

        $this->assertSame('id', $with->getId());
        $this->assertNull($withOut->getId());
    }

    /**
     * @test
     */
    public function it_may_have_a_label()
    {
        $with = new ImageFile(null, null, 'label', null, [], '', 'http://www.example.com/image.jpg', [], []);
        $withOut = new ImageFile(null, null, null, null, [], '', 'http://www.example.com/image.jpg', [], []);

        $this->assertSame('label', $with->getLabel());
        $this->assertNull($withOut->getLabel());
    }

    /**
     * @test
     */
    public function it_may_have_a_title()
    {
        $with = new ImageFile(null, null, null, 'title', [], '', 'http://www.example.com/image.jpg', [], []);
        $withOut = new ImageFile(null, null, null, null, [], '', 'http://www.example.com/image.jpg', [], []);

        $this->assertSame('title', $with->getTitle());
        $this->assertNull($withOut->getTitle());
    }

    /**
     * @test
     */
    public function it_may_have_a_caption()
    {
        $caption = [new Paragraph('caption')];
        $with = new ImageFile(null, null, null, null, $caption, '', 'http://www.example.com/image.jpg', [], []);
        $withOut = new ImageFile(null, null, null, null, [], '', 'http://www.example.com/image.jpg', [], []);

        $this->assertEquals($caption, $with->getCaption());
        $this->assertEmpty($withOut->getCaption());
    }

    /**
     * @test
     */
    public function it_has_alt_text()
    {
        $image = new ImageFile(null, null, null, null, [], 'alt text', 'http://www.example.com/image.jpg', [], []);

        $this->assertSame('alt text', $image->getAltText());
    }

    /**
     * @test
     */
    public function it_has_a_uri()
    {
        $image = new ImageFile(null, null, null, null, [], '', 'http://www.example.com/image.jpg', [], []);

        $this->assertSame('http://www.example.com/image.jpg', $image->getUri());
    }

    /**
     * @test
     */
    public function it_may_have_attribution()
    {
        $attribution = ['attribution'];
        $with = new ImageFile(null, null, null, null, [], '', 'http://www.example.com/image.jpg', $attribution, []);
        $withOut = new ImageFile(null, null, null, null, [], '', 'http://www.example.com/image.jpg', [], []);

        $this->assertSame($attribution, $with->getAttribution());
        $this->assertEmpty($withOut->getAttribution());
    }

    /**
     * @test
     */
    public function it_may_have_source_data()
    {
        $sourceData = [new File(null, null, null, null, [], 'text/csv', 'http://www.example.com/data.csv')];
        $with = new ImageFile(null, null, null, null, [], '', 'http://www.example.com/image.jpg', [], $sourceData);
        $withOut = new ImageFile(null, null, null, null, [], '', 'http://www.example.com/image.jpg', [], []);

        $this->assertSame($sourceData, $with->getSourceData());
        $this->assertEmpty($withOut->getSourceData());
    }
}
