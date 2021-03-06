<?php

namespace test\eLife\ApiSdk\Model;

use eLife\ApiSdk\Collection\ArraySequence;
use eLife\ApiSdk\Collection\EmptySequence;
use eLife\ApiSdk\Model\Author;
use eLife\ApiSdk\Model\GroupAuthor;
use eLife\ApiSdk\Model\PersonAuthor;
use eLife\ApiSdk\Model\PersonDetails;

final class GroupAuthorTest extends AuthorTest
{
    /**
     * @test
     */
    public function it_has_a_name()
    {
        $author = new GroupAuthor('name', new EmptySequence());

        $this->assertSame('name', $author->getName());
        $this->assertSame('name', $author->toString());
    }

    /**
     * @test
     */
    public function it_may_have_people()
    {
        $with = new GroupAuthor('name',
            $people = new ArraySequence([new PersonAuthor(new PersonDetails('preferred name', 'index name'))]));
        $withOut = new GroupAuthor('name', new EmptySequence());

        $this->assertEquals($people, $with->getPeople());
        $this->assertEmpty($withOut->getPeople());
    }

    /**
     * @test
     */
    public function it_may_have_groups()
    {
        $with = new GroupAuthor('name', new EmptySequence(),
            $groups = ['group' => [new PersonDetails('preferred name', 'index name')]]);
        $withOut = new GroupAuthor('name', new EmptySequence());

        $this->assertEquals($groups, $with->getGroups());
        $this->assertEmpty($withOut->getGroups());
    }

    protected function createAuthor(
        array $additionalInformation = [],
        array $affiliations = [],
        string $competingInterests = null,
        string $contribution = null,
        array $emailAddresses = [],
        array $equalContributionGroups = [],
        array $phoneNumbers = [],
        array $postalAddresses = []
    ) : Author {
        return new GroupAuthor('name', new EmptySequence(), [], $additionalInformation, $affiliations,
            $competingInterests, $contribution, $emailAddresses, $equalContributionGroups, $phoneNumbers,
            $postalAddresses);
    }
}
