<?php

namespace test\eLife\ApiSdk\Serializer;

use DateTimeImmutable;
use eLife\ApiClient\ApiClient\CollectionsClient;
use eLife\ApiSdk\ApiSdk;
use eLife\ApiSdk\Collection\ArraySequence;
use eLife\ApiSdk\Model\ArticlePoA;
use eLife\ApiSdk\Model\ArticleVoR;
use eLife\ApiSdk\Model\BlogArticle;
use eLife\ApiSdk\Model\Collection;
use eLife\ApiSdk\Model\Image;
use eLife\ApiSdk\Model\Interview;
use eLife\ApiSdk\Model\Model;
use eLife\ApiSdk\Model\Person;
use eLife\ApiSdk\Model\PodcastEpisode;
use eLife\ApiSdk\Model\Subject;
use eLife\ApiSdk\Serializer\CollectionNormalizer;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use test\eLife\ApiSdk\ApiTestCase;
use test\eLife\ApiSdk\Builder;

final class CollectionNormalizerTest extends ApiTestCase
{
    /** @var CollectionNormalizer */
    private $normalizer;

    /**
     * @before
     */
    protected function setUpNormalizer()
    {
        $apiSdk = new ApiSdk($this->getHttpClient());
        $this->normalizer = new CollectionNormalizer(new CollectionsClient($this->getHttpClient()));
        $this->normalizer->setNormalizer($apiSdk->getSerializer());
        $this->normalizer->setDenormalizer($apiSdk->getSerializer());
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
    public function it_can_normalize_collections($data, $format, bool $expected)
    {
        $this->assertSame($expected, $this->normalizer->supportsNormalization($data, $format));
    }

    public function canNormalizeProvider() : array
    {
        $collection = Builder::for(Collection::class)->__invoke();

        return [
            'collection' => [$collection, null, true],
            'collection with format' => [$collection, 'foo', true],
            'non-collection' => [$this, null, false],
        ];
    }

    /**
     * @test
     * @dataProvider normalizeProvider
     */
    public function it_normalizes_collections(Collection $collection, array $context, array $expected)
    {
        $this->assertEquals($expected, $this->normalizer->normalize($collection, null, $context));
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
    public function it_can_denormalize_collections($data, $format, array $context, bool $expected)
    {
        $this->assertSame($expected, $this->normalizer->supportsDenormalization($data, $format, $context));
    }

    public function canDenormalizeProvider() : array
    {
        return [
            'collection' => [[], Collection::class, [], true],
            'collection by type' => [['type' => 'collection'], Model::class, [], true],
            'non-collection' => [[], get_class($this), [], false],
        ];
    }

    /**
     * @test
     * @dataProvider normalizeProvider
     */
    public function it_denormalizes_collections(
        Collection $expected,
        array $context,
        array $json,
        callable $extra = null
    ) {
        if ($extra) {
            call_user_func($extra, $this);
        }
        $this->mockPersonCall('pjha', $complete = false, $isSnippet = true);
        $this->mockPersonCall('bcooper', $complete = false, $isSnippet = true);

        $actual = $this->normalizer->denormalize($json, Collection::class, null, $context);

        $this->assertObjectsAreEqual($expected, $actual);
    }

    public function normalizeProvider() : array
    {
        return [
            'complete' => [
                Builder::for(Collection::class)
                    ->withId('1')
                    ->withTitle('Tropical disease')
                    ->withPromiseOfSubTitle('A selection of papers')
                    ->withImpactStatement('eLife has published papers on many...')
                    ->withPublishedDate(new DateTimeImmutable('2015-09-16T11:19:26Z'))
                    ->withSubjects(new ArraySequence([
                        Builder::for(Subject::class)
                            ->sample('epidemiology-global-health'),
                        Builder::for(Subject::class)
                            ->sample('microbiology-infectious-disease'),
                    ]))
                    ->withSelectedCurator(
                        $selectedCurator = Builder::for(Person::class)
                            ->sample('pjha')
                    )
                    ->withSelectedCuratorEtAl(true)
                    ->withCurators(new ArraySequence([
                        Builder::for(Person::class)
                            ->sample('bcooper'),
                        $selectedCurator,
                    ]))
                    ->withContent(new ArraySequence([
                        Builder::for(ArticleVoR::class)
                            ->sample('homo-naledi'),
                        Builder::for(BlogArticle::class)
                            ->sample('slime'),
                        Builder::for(Interview::class)
                            ->sample('controlling-traffic'),
                    ]))
                    ->withRelatedContent(new ArraySequence([
                        Builder::for(ArticlePoa::class)
                            ->sample('growth-factor'),
                    ]))
                    ->withPodcastEpisodes(new ArraySequence([
                        Builder::for(PodcastEpisode::class)
                            ->sample('29'),
                    ]))
                    ->__invoke(),
                ['complete' => true],
                [
                    'id' => '1',
                    'title' => 'Tropical disease',
                    'subTitle' => 'A selection of papers',
                    'impactStatement' => 'eLife has published papers on many...',
                    'updated' => '2015-09-16T11:19:26Z',
                    'image' => [
                        'banner' => [
                            'alt' => '',
                            'sizes' => [
                                '2:1' => [
                                    900 => 'https://placehold.it/900x450',
                                    1800 => 'https://placehold.it/1800x900',
                                ],
                            ],
                        ],
                        'thumbnail' => [
                            'alt' => '',
                            'sizes' => [
                                '16:9' => [
                                    250 => 'https://placehold.it/250x141',
                                    500 => 'https://placehold.it/500x281',
                                ],
                                '1:1' => [
                                    70 => 'https://placehold.it/70x70',
                                    140 => 'https://placehold.it/140x140',
                                ],
                            ],
                        ],
                    ],
                    'subjects' => [
                        0 => [
                            'id' => 'epidemiology-global-health',
                            'name' => 'Epidemiology and Global Health',
                        ],
                        1 => [
                            'id' => 'microbiology-infectious-disease',
                            'name' => 'Microbiology and Infectious Disease',
                        ],
                    ],
                    'selectedCurator' => [
                        'id' => 'pjha',
                        'type' => 'senior-editor',
                        'name' => [
                            'preferred' => 'Prabhat Jha',
                            'index' => 'Jha, Prabhat',
                        ],
                        'etAl' => true,
                    ],
                    'curators' => [
                        0 => [
                            'id' => 'bcooper',
                            'type' => 'reviewing-editor',
                            'name' => [
                                'preferred' => 'Ben Cooper',
                                'index' => 'Cooper, Ben',
                            ],
                        ],
                        1 => [
                            'id' => 'pjha',
                            'type' => 'senior-editor',
                            'name' => [
                                'preferred' => 'Prabhat Jha',
                                'index' => 'Jha, Prabhat',
                            ],
                        ],
                    ],
                    'content' => [
                        0 => [
                            'type' => 'research-article',
                            'status' => 'vor',
                            'stage' => 'published',
                            'id' => '09560',
                            'version' => 1,
                            'doi' => '10.7554/eLife.09560',
                            'authorLine' => 'Lee R Berger et al',
                            'title' => '<i>Homo naledi</i>, a new species of the genus <i>Homo</i> from the Dinaledi Chamber, South Africa',
                            'volume' => 4,
                            'elocationId' => 'e09560',
                            'published' => '2015-09-10T00:00:00Z',
                            'versionDate' => '2015-09-10T00:00:00Z',
                            'statusDate' => '2015-09-10T00:00:00Z',
                            'pdf' => 'https://elifesciences.org/content/4/e09560.pdf',
                            'subjects' => [
                                0 => [
                                    'id' => 'genomics-evolutionary-biology',
                                    'name' => 'Genomics and Evolutionary Biology',
                                ],
                            ],
                            'impactStatement' => 'A new hominin species has been unearthed in the Dinaledi Chamber of the Rising Star cave system in the largest assemblage of a single species of hominins yet discovered in Africa.',
                            'image' => [
                                'thumbnail' => [
                                    'alt' => '',
                                    'sizes' => [
                                        '16:9' => [
                                            250 => 'https://placehold.it/250x141',
                                            500 => 'https://placehold.it/500x281',
                                        ],
                                        '1:1' => [
                                            70 => 'https://placehold.it/70x70',
                                            140 => 'https://placehold.it/140x140',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                        1 => [
                            'type' => 'blog-article',
                            'id' => '359325',
                            'title' => 'Media coverage: Slime can see',
                            'impactStatement' => 'In their research paper – Cyanobacteria use micro-optics to sense light direction – Schuergers et al. reveal how bacterial cells act as the equivalent of a microscopic eyeball or the world’s oldest and smallest camera eye, allowing them to ‘see’.',
                            'published' => '2016-07-08T08:33:25Z',
                            'subjects' => [
                                0 => [
                                    'id' => 'biophysics-structural-biology',
                                    'name' => 'Biophysics and Structural Biology',
                                ],
                            ],
                        ],
                        2 => [
                            'type' => 'interview',
                            'id' => '1',
                            'interviewee' => [
                                'name' => [
                                    'preferred' => 'Ramanath Hegde',
                                    'index' => 'Hegde, Ramanath',
                                ],
                            ],
                            'title' => 'Controlling traffic',
                            'impactStatement' => 'Ramanath Hegde is a Postdoctoral Fellow at the Institute of Protein Biochemistry in Naples, Italy, where he investigates ways of preventing cells from destroying mutant proteins.',
                            'published' => '2016-01-29T16:22:28Z',
                        ],
                    ],
                    'relatedContent' => [
                        0 => [
                            'type' => 'research-article',
                            'status' => 'poa',
                            'stage' => 'published',
                            'id' => '14107',
                            'version' => 1,
                            'doi' => '10.7554/eLife.14107',
                            'authorLine' => 'Yongjian Huang et al',
                            'title' => 'Molecular basis for multimerization in the activation of the epidermal growth factor',
                            'volume' => 5,
                            'elocationId' => 'e14107',
                            'published' => '2016-03-28T00:00:00Z',
                            'versionDate' => '2016-03-28T00:00:00Z',
                            'statusDate' => '2016-03-28T00:00:00Z',
                        ],
                    ],
                    'podcastEpisodes' => [
                        0 => [
                            'number' => 29,
                            'title' => 'April/May 2016',
                            'published' => '2016-05-27T13:19:42Z',
                            'image' => [
                                'thumbnail' => [
                                    'alt' => '',
                                    'sizes' => [
                                        '16:9' => [
                                            250 => 'https://placehold.it/250x141',
                                            500 => 'https://placehold.it/500x281',
                                        ],
                                        '1:1' => [
                                            70 => 'https://placehold.it/70x70',
                                            140 => 'https://placehold.it/140x140',
                                        ],
                                    ],
                                ],
                            ],
                            'sources' => [
                                0 => [
                                    'mediaType' => 'audio/mpeg',
                                    'uri' => 'https://nakeddiscovery.com/scripts/mp3s/audio/eLife_Podcast_16.05.mp3',
                                ],
                            ],
                        ],
                    ],
                ],
                function ($test) {
                    $test->mockSubjectCall('biophysics-structural-biology', true);
                    $test->mockSubjectCall('epidemiology-global-health', true);
                    $test->mockSubjectCall('microbiology-infectious-disease', true);
                    $test->mockSubjectCall('genomics-evolutionary-biology', true);
                    $test->mockBlogArticleCall('359325');
                    $test->mockArticleCall('09560', true, $vor = true, 1);
                    $test->mockInterviewCall('1', true);
                    $test->mockArticleCall('14107', true, false, 1);
                    $test->mockPodcastEpisodeCall(29, true);
                    $test->mockSubjectCall('1', true);
                    $test->mockArticleCall('1', true, false, 1);
                },
            ],
            'minimum' => [
                Builder::for(Collection::class)
                    ->withId('1')
                    ->withTitle('Tropical disease')
                    ->withPublishedDate(new DateTimeImmutable('2015-09-16T11:19:26Z'))
                    ->withSelectedCurator(
                        $selectedCurator = Builder::for(Person::class)
                            ->sample('pjha', ['snippet' => false])
                    )
                    ->withCurators(new ArraySequence([
                        $selectedCurator,
                    ]))
                    ->withContent(new ArraySequence([
                        Builder::for(ArticlePoA::class)
                            ->sample('growth-factor'),
                    ]))
                    ->__invoke(),
                [],
                [
                    'id' => '1',
                    'title' => 'Tropical disease',
                    'updated' => '2015-09-16T11:19:26Z',
                    'image' => [
                        'banner' => [
                            'alt' => '',
                            'sizes' => [
                                '2:1' => [
                                    900 => 'https://placehold.it/900x450',
                                    1800 => 'https://placehold.it/1800x900',
                                ],
                            ],
                        ],
                        'thumbnail' => [
                            'alt' => '',
                            'sizes' => [
                                '16:9' => [
                                    250 => 'https://placehold.it/250x141',
                                    500 => 'https://placehold.it/500x281',
                                ],
                                '1:1' => [
                                    70 => 'https://placehold.it/70x70',
                                    140 => 'https://placehold.it/140x140',
                                ],
                            ],
                        ],
                    ],
                    'selectedCurator' => [
                        'id' => 'pjha',
                        'type' => 'senior-editor',
                        'name' => [
                            'preferred' => 'Prabhat Jha',
                            'index' => 'Jha, Prabhat',
                        ],
                    ],
                    'curators' => [
                        0 => [
                            'id' => 'pjha',
                            'type' => 'senior-editor',
                            'name' => [
                                'preferred' => 'Prabhat Jha',
                                'index' => 'Jha, Prabhat',
                            ],
                        ],
                    ],
                    'content' => $minimumContent = [
                        0 => [
                            'type' => 'research-article',
                            'status' => 'poa',
                            'stage' => 'published',
                            'id' => '14107',
                            'version' => 1,
                            'doi' => '10.7554/eLife.14107',
                            'authorLine' => 'Yongjian Huang et al',
                            'title' => 'Molecular basis for multimerization in the activation of the epidermal growth factor',
                            'published' => '2016-03-28T00:00:00Z',
                            'versionDate' => '2016-03-28T00:00:00Z',
                            'statusDate' => '2016-03-28T00:00:00Z',
                            'volume' => 5,
                            'elocationId' => 'e14107',
                        ],
                    ],
                ],
                function (ApiTestCase $test) {
                    $test->mockSubjectCall('biophysics-structural-biology', true);
                    $test->mockArticleCall('14107', true, false, 1);
                },
            ],
            'complete snippet' => [
                Builder::for(Collection::class)
                    ->withId('1')
                    ->withTitle('Tropical disease')
                    ->withPromiseOfSubTitle('1 subtitle')
                    ->withImpactStatement('eLife has published papers on many...')
                    ->withPublishedDate(new DateTimeImmutable('2015-09-16T11:19:26Z'))
                    ->withSubjects(new ArraySequence([
                        Builder::for(Subject::class)
                            ->sample('epidemiology-global-health'),
                        Builder::for(Subject::class)
                            ->sample('microbiology-infectious-disease'),
                    ]))
                    ->withSelectedCurator(
                        $selectedCurator = Builder::for(Person::class)
                            ->sample('pjha')
                    )
                    ->withSelectedCuratorEtAl(true)
                    ->withCurators(new ArraySequence([
                        Builder::for(Person::class)
                            ->sample('bcooper', ['snippet' => false]),
                        Builder::for(Person::class)
                            ->sample('pjha', ['snippet' => false]),
                    ]))
                    ->withContent(new ArraySequence([
                        $blogArticle = Builder::for(BlogArticle::class)
                            ->sample('slime'),
                    ]))
                    ->withRelatedContent(new ArraySequence([
                        Builder::for(ArticlePoa::class)
                            ->sample('growth-factor'),
                    ]))
                    ->withPodcastEpisodes(new ArraySequence([
                        Builder::for(PodcastEpisode::class)
                            ->sample('29'),
                    ]))
                    ->__invoke(),
                ['complete' => true, 'snippet' => true, 'type' => true],
                [
                    'id' => '1',
                    'title' => 'Tropical disease',
                    'impactStatement' => 'eLife has published papers on many...',
                    'updated' => '2015-09-16T11:19:26Z',
                    'image' => [
                        'thumbnail' => [
                            'alt' => '',
                            'sizes' => [
                                '16:9' => [
                                    250 => 'https://placehold.it/250x141',
                                    500 => 'https://placehold.it/500x281',
                                ],
                                '1:1' => [
                                    70 => 'https://placehold.it/70x70',
                                    140 => 'https://placehold.it/140x140',
                                ],
                            ],
                        ],
                    ],
                    'subjects' => [
                        0 => [
                            'id' => 'epidemiology-global-health',
                            'name' => 'Epidemiology and Global Health',
                        ],
                        1 => [
                            'id' => 'microbiology-infectious-disease',
                            'name' => 'Microbiology and Infectious Disease',
                        ],
                    ],
                    'selectedCurator' => [
                        'id' => 'pjha',
                        'type' => 'senior-editor',
                        'name' => [
                            'preferred' => 'Prabhat Jha',
                            'index' => 'Jha, Prabhat',
                        ],
                        'etAl' => true,
                    ],
                    'type' => 'collection',
                ],
                function (ApiTestCase $test) {
                    $test->mockCollectionCall('1', true);
                    $test->mockSubjectCall('biophysics-structural-biology', true);
                    $test->mockSubjectCall('epidemiology-global-health', true);
                    $test->mockSubjectCall('microbiology-infectious-disease', true);
                    $test->mockBlogArticleCall('359325');
                    $test->mockArticleCall('14107', true, false, 1);
                    $test->mockPodcastEpisodeCall('29', true);
                    $test->mockSubjectCall('1', true);
                    $test->mockArticleCall('1', true, false, 1);
                },
            ],
            'minimum snippet' => [
                Builder::for(Collection::class)
                    ->withId('1')
                    ->withTitle('Tropical disease')
                    ->withPublishedDate(new DateTimeImmutable('2015-09-16T11:19:26Z'))
                    ->withSelectedCurator(
                        $selectedCurator = Builder::for(Person::class)
                            ->sample('pjha', ['snippet' => false])
                    )
                    ->withCurators(new ArraySequence([
                        $bcooper = Builder::for(Person::class)
                            ->sample('bcooper', ['snippet' => false]),
                        $selectedCurator,
                    ]))
                    ->withContent(new ArraySequence([
                        $blogArticle = Builder::for(BlogArticle::class)
                            ->sample('slime'),
                    ]))
                    ->__invoke(),
                ['snippet' => true],
                [
                    'id' => '1',
                    'title' => 'Tropical disease',
                    'updated' => '2015-09-16T11:19:26Z',
                    'image' => [
                        'thumbnail' => [
                            'alt' => '',
                            'sizes' => [
                                '16:9' => [
                                    250 => 'https://placehold.it/250x141',
                                    500 => 'https://placehold.it/500x281',
                                ],
                                '1:1' => [
                                    70 => 'https://placehold.it/70x70',
                                    140 => 'https://placehold.it/140x140',
                                ],
                            ],
                        ],
                    ],
                    'selectedCurator' => [
                        'id' => 'pjha',
                        'type' => 'senior-editor',
                        'name' => [
                            'preferred' => 'Prabhat Jha',
                            'index' => 'Jha, Prabhat',
                        ],
                    ],
                ],
                function (ApiTestCase $test) {
                    $test->mockCollectionCall('1', false);
                    $test->mockSubjectCall('biophysics-structural-biology', true);
                    $test->mockBlogArticleCall('359325');
                    $test->mockArticleCall('14107', true);
                },
            ],
        ];
    }
}
