<?php
/**
 * NodesInfoApi
 * PHP version 5
 *
 * @category Class
 * @package  Killbill\Client\Swagger
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Kill Bill
 *
 * Kill Bill is an open-source billing and payments platform
 *
 * OpenAPI spec version: 0.20.10
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.7
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Killbill\Client\Swagger\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Killbill\Client\Swagger\ApiException;
use Killbill\Client\Swagger\Configuration;
use Killbill\Client\Swagger\HeaderSelector;
use Killbill\Client\Swagger\ObjectSerializer;

/**
 * NodesInfoApi Class Doc Comment
 *
 * @category Class
 * @package  Killbill\Client\Swagger
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class NodesInfoApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getNodesInfo
     *
     * Retrieve all the nodes infos
     *
     *
     * @throws \Killbill\Client\Swagger\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Killbill\Client\Swagger\Model\PluginInfo[]
     */
    public function getNodesInfo()
    {
        list($response) = $this->getNodesInfoWithHttpInfo();
        return $response;
    }

    /**
     * Operation getNodesInfoWithHttpInfo
     *
     * Retrieve all the nodes infos
     *
     *
     * @throws \Killbill\Client\Swagger\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Killbill\Client\Swagger\Model\PluginInfo[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getNodesInfoWithHttpInfo()
    {
        $returnType = '\Killbill\Client\Swagger\Model\PluginInfo[]';
        $request = $this->getNodesInfoRequest();

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Killbill\Client\Swagger\Model\PluginInfo[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getNodesInfoAsync
     *
     * Retrieve all the nodes infos
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getNodesInfoAsync()
    {
        return $this->getNodesInfoAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getNodesInfoAsyncWithHttpInfo
     *
     * Retrieve all the nodes infos
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getNodesInfoAsyncWithHttpInfo()
    {
        $returnType = '\Killbill\Client\Swagger\Model\PluginInfo[]';
        $request = $this->getNodesInfoRequest();

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getNodesInfo'
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getNodesInfoRequest()
    {

        $resourcePath = '/1.0/kb/nodesInfo';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
            elseif (is_array($httpBody) && $headers['Content-Type'] === 'application/json') {
                $httpBody = array_map(function($value) {
                    return ObjectSerializer::sanitizeForSerialization($value);
                }, $_tempBody);
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation triggerNodeCommand
     *
     * Trigger a node command
     *
     * @param  \Killbill\Client\Swagger\Model\NodeCommand $body body (required)
     * @param  string $xKillbillCreatedBy xKillbillCreatedBy (required)
     * @param  string $xKillbillReason xKillbillReason (optional)
     * @param  string $xKillbillComment xKillbillComment (optional)
     * @param  bool $localNodeOnly localNodeOnly (optional)
     *
     * @throws \Killbill\Client\Swagger\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function triggerNodeCommand($body, $xKillbillCreatedBy, $xKillbillReason = null, $xKillbillComment = null, $localNodeOnly = null)
    {
        $this->triggerNodeCommandWithHttpInfo($body, $xKillbillCreatedBy, $xKillbillReason, $xKillbillComment, $localNodeOnly);
    }

    /**
     * Operation triggerNodeCommandWithHttpInfo
     *
     * Trigger a node command
     *
     * @param  \Killbill\Client\Swagger\Model\NodeCommand $body (required)
     * @param  string $xKillbillCreatedBy (required)
     * @param  string $xKillbillReason (optional)
     * @param  string $xKillbillComment (optional)
     * @param  bool $localNodeOnly (optional)
     *
     * @throws \Killbill\Client\Swagger\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function triggerNodeCommandWithHttpInfo($body, $xKillbillCreatedBy, $xKillbillReason = null, $xKillbillComment = null, $localNodeOnly = null)
    {
        $returnType = '';
        $request = $this->triggerNodeCommandRequest($body, $xKillbillCreatedBy, $xKillbillReason, $xKillbillComment, $localNodeOnly);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation triggerNodeCommandAsync
     *
     * Trigger a node command
     *
     * @param  \Killbill\Client\Swagger\Model\NodeCommand $body (required)
     * @param  string $xKillbillCreatedBy (required)
     * @param  string $xKillbillReason (optional)
     * @param  string $xKillbillComment (optional)
     * @param  bool $localNodeOnly (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function triggerNodeCommandAsync($body, $xKillbillCreatedBy, $xKillbillReason = null, $xKillbillComment = null, $localNodeOnly = null)
    {
        return $this->triggerNodeCommandAsyncWithHttpInfo($body, $xKillbillCreatedBy, $xKillbillReason, $xKillbillComment, $localNodeOnly)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation triggerNodeCommandAsyncWithHttpInfo
     *
     * Trigger a node command
     *
     * @param  \Killbill\Client\Swagger\Model\NodeCommand $body (required)
     * @param  string $xKillbillCreatedBy (required)
     * @param  string $xKillbillReason (optional)
     * @param  string $xKillbillComment (optional)
     * @param  bool $localNodeOnly (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function triggerNodeCommandAsyncWithHttpInfo($body, $xKillbillCreatedBy, $xKillbillReason = null, $xKillbillComment = null, $localNodeOnly = null)
    {
        $returnType = '';
        $request = $this->triggerNodeCommandRequest($body, $xKillbillCreatedBy, $xKillbillReason, $xKillbillComment, $localNodeOnly);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'triggerNodeCommand'
     *
     * @param  \Killbill\Client\Swagger\Model\NodeCommand $body (required)
     * @param  string $xKillbillCreatedBy (required)
     * @param  string $xKillbillReason (optional)
     * @param  string $xKillbillComment (optional)
     * @param  bool $localNodeOnly (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function triggerNodeCommandRequest($body, $xKillbillCreatedBy, $xKillbillReason = null, $xKillbillComment = null, $localNodeOnly = null)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling triggerNodeCommand'
            );
        }
        // verify the required parameter 'xKillbillCreatedBy' is set
        if ($xKillbillCreatedBy === null || (is_array($xKillbillCreatedBy) && count($xKillbillCreatedBy) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $xKillbillCreatedBy when calling triggerNodeCommand'
            );
        }

        $resourcePath = '/1.0/kb/nodesInfo';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($localNodeOnly !== null) {
            $queryParams['localNodeOnly'] = ObjectSerializer::toQueryValue($localNodeOnly);
        }
        // header params
        if ($xKillbillCreatedBy !== null) {
            $headerParams['X-Killbill-CreatedBy'] = ObjectSerializer::toHeaderValue($xKillbillCreatedBy);
        }
        // header params
        if ($xKillbillReason !== null) {
            $headerParams['X-Killbill-Reason'] = ObjectSerializer::toHeaderValue($xKillbillReason);
        }
        // header params
        if ($xKillbillComment !== null) {
            $headerParams['X-Killbill-Comment'] = ObjectSerializer::toHeaderValue($xKillbillComment);
        }


        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
            elseif (is_array($httpBody) && $headers['Content-Type'] === 'application/json') {
                $httpBody = array_map(function($value) {
                    return ObjectSerializer::sanitizeForSerialization($value);
                }, $_tempBody);
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
