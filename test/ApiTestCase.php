<?php

namespace test\eLife\ApiSdk;

use Csa\Bundle\GuzzleBundle\GuzzleHttp\Middleware\MockMiddleware;
use eLife\ApiClient\HttpClient;
use eLife\ApiClient\HttpClient\Guzzle6HttpClient;
use eLife\ApiValidator\MessageValidator\JsonMessageValidator;
use eLife\ApiValidator\SchemaFinder\PuliSchemaFinder;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use PHPUnit_Framework_TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Webmozart\Json\JsonDecoder;

abstract class ApiTestCase extends PHPUnit_Framework_TestCase
{
    use PuliAwareTestCase;

    /** @var InMemoryStorageAdapter */
    private $storage;

    /** @var HttpClient */
    private $httpClient;

    /**
     * @after
     */
    final public function resetMocks()
    {
        $this->httpClient = null;
    }

    final protected function getHttpClient() : HttpClient
    {
        if (null === $this->httpClient) {
            $storage = new InMemoryStorageAdapter();
            $validator = new JsonMessageValidator(
                new PuliSchemaFinder(self::$puli),
                new JsonDecoder()
            );

            $this->storage = new ValidatingStorageAdapter($storage, $validator);

            $stack = HandlerStack::create();
            $stack->push(new MockMiddleware($this->storage, 'replay'));

            $this->httpClient = new Guzzle6HttpClient(new Client([
                'base_uri' => 'http://api.elifesciences.org',
                'handler' => $stack,
            ]));
        }

        return $this->httpClient;
    }

    final protected function mock(RequestInterface $request, ResponseInterface $response)
    {
        $this->storage->save($request, $response);
    }
}
