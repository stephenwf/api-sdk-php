<?php

namespace test\eLife\ApiSdk\Model;

use DateTimeImmutable;
use eLife\ApiSdk\Collection\ArrayCollection;
use eLife\ApiSdk\Collection\PromiseCollection;
use eLife\ApiSdk\Model\Block;
use eLife\ApiSdk\Model\Interview;
use eLife\ApiSdk\Model\Interviewee;
use eLife\ApiSdk\Model\Person;
use PHPUnit_Framework_TestCase;
use function GuzzleHttp\Promise\rejection_for;

final class InterviewTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_has_an_id()
    {
        $person = new Person('preferred name', 'index name');
        $interviewee = new Interviewee($person,
            new PromiseCollection(rejection_for('Full interviewee should not be unwrapped')));
        $interview = new Interview('id', $interviewee, 'title', new DateTimeImmutable(), null,
            new PromiseCollection(rejection_for('Full interview should not be unwrapped'))
        );

        $this->assertSame('id', $interview->getId());
    }

    /**
     * @test
     */
    public function it_has_an_interviewee()
    {
        $person = new Person('preferred name', 'index name');
        $interviewee = new Interviewee($person,
            new PromiseCollection(rejection_for('Full interviewee should not be unwrapped')));
        $interview = new Interview('id', $interviewee, 'title', new DateTimeImmutable(), null,
            new PromiseCollection(rejection_for('Full interview should not be unwrapped'))
        );

        $this->assertEquals($interviewee, $interview->getInterviewee());
    }

    /**
     * @test
     */
    public function it_has_a_title()
    {
        $person = new Person('preferred name', 'index name');
        $interviewee = new Interviewee($person,
            new PromiseCollection(rejection_for('Full interviewee should not be unwrapped')));
        $interview = new Interview('id', $interviewee, 'title', new DateTimeImmutable(), null,
            new PromiseCollection(rejection_for('Full interview should not be unwrapped'))
        );

        $this->assertSame('title', $interview->getTitle());
    }

    /**
     * @test
     */
    public function it_may_have_an_impact_statement()
    {
        $person = new Person('preferred name', 'index name');
        $intervieweeWith = new Interviewee($person,
            new PromiseCollection(rejection_for('Full interviewee should not be unwrapped')));
        $intervieweeWithOut = new Interviewee($person,
            new PromiseCollection(rejection_for('Full interviewee should not be unwrapped')));

        $with = new Interview('id', $intervieweeWith, 'title', new DateTimeImmutable(), 'impact statement',
            new PromiseCollection(rejection_for('Full interview should not be unwrapped'))
        );
        $withOut = new Interview('id', $intervieweeWithOut, 'title', new DateTimeImmutable(), null,
            new PromiseCollection(rejection_for('Full interview should not be unwrapped'))
        );

        $this->assertSame('impact statement', $with->getImpactStatement());
        $this->assertNull($withOut->getImpactStatement());
    }

    /**
     * @test
     */
    public function it_has_a_published_date()
    {
        $person = new Person('preferred name', 'index name');
        $interviewee = new Interviewee($person,
            new PromiseCollection(rejection_for('Full interviewee should not be unwrapped')));
        $interview = new Interview('id', $interviewee, 'title', $date = new DateTimeImmutable(), null,
            new PromiseCollection(rejection_for('Full interview should not be unwrapped'))
        );

        $this->assertEquals($date, $interview->getPublishedDate());
    }

    /**
     * @test
     */
    public function it_has_content()
    {
        $content = [new Block\Paragraph('foo')];

        $person = new Person('preferred name', 'index name');
        $interviewee = new Interviewee($person,
            new PromiseCollection(rejection_for('Full interviewee should not be unwrapped')));

        $interview = new Interview('id', $interviewee, 'title', new DateTimeImmutable(), null,
            new ArrayCollection($content)
        );

        $this->assertEquals($content, $interview->getContent()->toArray());
    }
}