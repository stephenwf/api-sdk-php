<?php

namespace test\eLife\ApiSdk\Serializer\Reference;

use eLife\ApiSdk\Model\Date;
use eLife\ApiSdk\Model\PersonAuthor;
use eLife\ApiSdk\Model\PersonDetails;
use eLife\ApiSdk\Model\Place;
use eLife\ApiSdk\Model\Reference;
use eLife\ApiSdk\Model\Reference\BookReference;
use eLife\ApiSdk\Serializer\PersonAuthorNormalizer;
use eLife\ApiSdk\Serializer\PersonDetailsNormalizer;
use eLife\ApiSdk\Serializer\PlaceNormalizer;
use eLife\ApiSdk\Serializer\Reference\BookReferenceNormalizer;
use PHPUnit_Framework_TestCase;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;

final class BookReferenceNormalizerTest extends PHPUnit_Framework_TestCase
{
    /** @var BookReferenceNormalizer */
    private $normalizer;

    /**
     * @before
     */
    protected function setUpNormalizer()
    {
        $this->normalizer = new BookReferenceNormalizer();

        new Serializer([
            $this->normalizer,
            new PersonDetailsNormalizer(),
            new PersonAuthorNormalizer(),
            new PlaceNormalizer(),
        ]);
    }

    /**
     * @test
     */
    public function it_is_a_normalizer()
    {
        $this->assertInstanceOf(NormalizerInterface::class, $this->normalizer);
    }

    /**
     * @test
     * @dataProvider canNormalizeProvider
     */
    public function it_can_normalize_book_references($data, $format, bool $expected)
    {
        $this->assertSame($expected, $this->normalizer->supportsNormalization($data, $format));
    }

    public function canNormalizeProvider() : array
    {
        $reference = new BookReference('id', Date::fromString('2000'), null,
            [new PersonAuthor(new PersonDetails('preferred name', 'index name'))], false, 'book title',
            new Place(null, null, ['publisher']));

        return [
            'book reference' => [$reference, null, true],
            'book reference with format' => [$reference, 'foo', true],
            'non-book reference' => [$this, null, false],
        ];
    }

    /**
     * @test
     * @dataProvider normalizeProvider
     */
    public function it_normalize_book_references(BookReference $reference, array $expected)
    {
        $this->assertSame($expected, $this->normalizer->normalize($reference));
    }

    public function normalizeProvider() : array
    {
        return [
            'complete' => [
                new BookReference('id', Date::fromString('2000-01-01'), 'a',
                    [new PersonAuthor(new PersonDetails('preferred name', 'index name'))], true, 'book title',
                    new Place(null, null, ['publisher']), 'volume', 'edition', '10.1000/182', 18183754,
                    '978-3-16-148410-0'),
                [
                    'type' => 'book',
                    'id' => 'id',
                    'date' => '2000-01-01',
                    'authors' => [
                        [
                            'type' => 'person',
                            'name' => [
                                'preferred' => 'preferred name',
                                'index' => 'index name',
                            ],
                        ],
                    ],
                    'bookTitle' => 'book title',
                    'publisher' => [
                        'name' => ['publisher'],
                    ],
                    'discriminator' => 'a',
                    'authorsEtAl' => true,
                    'volume' => 'volume',
                    'edition' => 'edition',
                    'doi' => '10.1000/182',
                    'pmid' => 18183754,
                    'isbn' => '978-3-16-148410-0',
                ],
            ],
            'minimum' => [
                new BookReference('id', Date::fromString('2000'), null,
                    [new PersonAuthor(new PersonDetails('preferred name', 'index name'))], false, 'book title',
                    new Place(null, null, ['publisher'])),
                [
                    'type' => 'book',
                    'id' => 'id',
                    'date' => '2000',
                    'authors' => [
                        [
                            'type' => 'person',
                            'name' => [
                                'preferred' => 'preferred name',
                                'index' => 'index name',
                            ],
                        ],
                    ],
                    'bookTitle' => 'book title',
                    'publisher' => [
                        'name' => ['publisher'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @test
     */
    public function it_is_a_denormalizer()
    {
        $this->assertInstanceOf(DenormalizerInterface::class, $this->normalizer);
    }

    /**
     * @test
     * @dataProvider canDenormalizeProvider
     */
    public function it_can_denormalize_book_references($data, $format, array $context, bool $expected)
    {
        $this->assertSame($expected, $this->normalizer->supportsDenormalization($data, $format, $context));
    }

    public function canDenormalizeProvider() : array
    {
        return [
            'book reference' => [[], BookReference::class, [], true],
            'reference that is a book' => [['type' => 'book'], Reference::class, [], true],
            'reference that isn\'t a book' => [['type' => 'foo'], Reference::class, [], false],
            'non-book reference' => [[], get_class($this), [], false],
        ];
    }

    /**
     * @test
     * @dataProvider denormalizeProvider
     */
    public function it_denormalize_book_references(array $json, BookReference $expected)
    {
        $this->assertEquals($expected, $this->normalizer->denormalize($json, BookReference::class));
    }

    public function denormalizeProvider() : array
    {
        return [
            'complete' => [
                [
                    'type' => 'book',
                    'id' => 'id',
                    'date' => '2000-01-01',
                    'discriminator' => 'a',
                    'authors' => [
                        [
                            'type' => 'person',
                            'name' => [
                                'preferred' => 'preferred name',
                                'index' => 'index name',
                            ],
                        ],
                    ],
                    'authorsEtAl' => true,
                    'bookTitle' => 'book title',
                    'publisher' => [
                        'name' => ['publisher'],
                    ],
                    'volume' => 'volume',
                    'edition' => 'edition',
                    'doi' => '10.1000/182',
                    'pmid' => 18183754,
                    'isbn' => '978-3-16-148410-0',
                ],
                new BookReference('id', Date::fromString('2000-01-01'), 'a',
                    [new PersonAuthor(new PersonDetails('preferred name', 'index name'))], true, 'book title',
                    new Place(null, null, ['publisher']), 'volume', 'edition', '10.1000/182', 18183754,
                    '978-3-16-148410-0'),
            ],
            'minimum' => [
                [
                    'type' => 'book',
                    'id' => 'id',
                    'date' => '2000',
                    'authors' => [
                        [
                            'type' => 'person',
                            'name' => [
                                'preferred' => 'preferred name',
                                'index' => 'index name',
                            ],
                        ],
                    ],
                    'bookTitle' => 'book title',
                    'publisher' => [
                        'name' => ['publisher'],
                    ],
                ],
                new BookReference('id', Date::fromString('2000'), null,
                    [new PersonAuthor(new PersonDetails('preferred name', 'index name'))], false, 'book title',
                    new Place(null, null, ['publisher'])),
            ],
        ];
    }
}
