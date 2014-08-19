<?php
namespace Databowl\Actions;

use Databowl\Exceptions\MissingInstanceException;
use GuzzleHttp\Client;

abstract class AbstractAction
{
    const BASE_URL = "https://%s.databowl.com/%s";

    /**
     * Name of Databowl instance.
     *
     * @var string
     */
    protected $instanceName;

    /**
     * Executes the action
     *
     * @return mixed
     */
    abstract public function execute();

    /**
     * Set the instance name to run this action on.
     *
     * @param string $instance
     */
    public function setInstance($instance)
    {
        $this->instanceName = $instance;
    }

    /**
     * Submits a payload (POST request) to the specified target.
     *
     * @param string $target
     * @param array $payload
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    protected function submitPayload($target, array $payload)
    {
        $client = $this->createClient();
        $targetUrl = $this->getTargetUrl($target);

        return $client->post($targetUrl, [
            'body' => $payload
        ]);
    }

    /**
     * Creates a guzzle client for communicating with Databowl.
     *
     * @return Client
     * @throws \Databowl\Exceptions\MissingInstanceException
     */
    private function createClient()
    {
        if (!$this->instanceName) {
            throw new MissingInstanceException("Instance name not specified!");
        }

        $client = new Client();

        return $client;
    }

    /**
     * Returns a URL for a given target.
     *
     * @param string $target
     * @return string
     */
    private function getTargetUrl($target)
    {
        return sprintf(self::BASE_URL, $this->instanceName, $target);
    }
}