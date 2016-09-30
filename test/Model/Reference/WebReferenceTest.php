<?php

namespace test\eLife\ApiSdk\Model\Reference;

use eLife\ApiSdk\Model\Person;
use eLife\ApiSdk\Model\PersonAuthor;
use eLife\ApiSdk\Model\Reference\ReferenceDate;
use eLife\ApiSdk\Model\Reference\WebReference;
use PHPUnit_Framework_TestCase;

final class WebReferenceTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_has_a_date()
    {
        $reference = new WebReference($date = new ReferenceDate(2000),
            [new PersonAuthor(new Person('preferred name', 'index name'))], false, 'title', 'http://www.example.com');

        $this->assertEquals($date, $reference->getDate());
    }

    /**
     * @test
     */
    public function it_has_authors()
    {
        $reference = new WebReference(new ReferenceDate(2000),
            $authors = [new PersonAuthor(new Person('preferred name', 'index name'))], false, 'title',
            'http://www.example.com');

        $this->assertEquals($authors, $reference->getAuthors());
    }

    /**
     * @test
     */
    public function it_may_have_further_authors()
    {
        $with = new WebReference(new ReferenceDate(2000),
            [new PersonAuthor(new Person('preferred name', 'index name'))], true, 'title', 'http://www.example.com');
        $withOut = new WebReference(new ReferenceDate(2000),
            [new PersonAuthor(new Person('preferred name', 'index name'))], false, 'title', 'http://www.example.com');

        $this->assertTrue($with->authorsEtAl());
        $this->assertFalse($withOut->authorsEtAl());
    }

    /**
     * @test
     */
    public function it_has_a_title()
    {
        $reference = new WebReference(new ReferenceDate(2000),
            [new PersonAuthor(new Person('preferred name', 'index name'))], false, 'title', 'http://www.example.com');

        $this->assertSame('title', $reference->getTitle());
    }

    /**
     * @test
     */
    public function it_has_a_uri()
    {
        $reference = new WebReference(new ReferenceDate(2000),
            [new PersonAuthor(new Person('preferred name', 'index name'))], false, 'title', 'http://www.example.com/');

        $this->assertSame('http://www.example.com/', $reference->getUri());
    }

    /**
     * @test
     */
    public function it_may_have_a_website()
    {
        $with = new WebReference(new ReferenceDate(2000),
            [new PersonAuthor(new Person('preferred name', 'index name'))], false, 'title', 'http://www.example.com',
            'website');
        $withOut = new WebReference(new ReferenceDate(2000),
            [new PersonAuthor(new Person('preferred name', 'index name'))], false, 'title', 'http://www.example.com');

        $this->assertSame('website', $with->getWebsite());
        $this->assertNull($withOut->getWebsite());
    }

    /**
     * @test
     */
    public function it_may_have_an_accessed_date()
    {
        $with = new WebReference(new ReferenceDate(2000),
            [new PersonAuthor(new Person('preferred name', 'index name'))], false, 'title', 'http://www.example.com',
            null, $accessedDate = new ReferenceDate('2001'));
        $withOut = new WebReference(new ReferenceDate(2000),
            [new PersonAuthor(new Person('preferred name', 'index name'))], false, 'title', 'http://www.example.com');

        $this->assertEquals($accessedDate, $with->getAccessed());
        $this->assertNull($withOut->getWebsite());
    }
}