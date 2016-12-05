<?php

namespace PulkitJalan\Google\tests;

use Mockery;
use PHPUnit_Framework_TestCase;

class ClientTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function testClientGetter()
    {
        $client = Mockery::mock('PulkitJalan\Google\Client', [[]])->makePartial();

        $this->assertInstanceOf('Google_Client', $client->getClient());
    }

    public function testServiceMake()
    {
        $client = Mockery::mock('PulkitJalan\Google\Client', [[]])->makePartial();

        $this->assertInstanceOf('Google_Service_Storage', $client->make('storage'));
    }

    public function testServiceMakeException()
    {
        $client = Mockery::mock('PulkitJalan\Google\Client', [[]])->makePartial();

        $this->setExpectedException('PulkitJalan\Google\Exceptions\UnknownServiceException');

        $client->make('storag');
    }

    public function testMagicMethodException()
    {
        $client = new \PulkitJalan\Google\Client([]);

        $this->setExpectedException('BadMethodCallException');

        $client->getAuthTest();
    }

    public function testNoCredentials()
    {
        $client = new \PulkitJalan\Google\Client([]);

        $this->assertFalse($client->isUsingApplicationDefaultCredentials());
    }

    public function testDefaultCredentials()
    {
        $client = new \PulkitJalan\Google\Client([
            'service' => [
                'enable' => true,
                'file'   => __DIR__.'/data/test.json',
            ],
        ]);

        $this->assertTrue($client->isUsingApplicationDefaultCredentials());
    }
}
