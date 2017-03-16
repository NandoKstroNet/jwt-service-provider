<?php

use CodeExperts\Provider\JWTServiceProvider;
use Silex\Application;

class JWTServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testIfProviderHasWorking()
    {
        $app = new Application();
        $app->register(new JWTServiceProvider(), [
            'iss'     => 'http://remote.com',
            'secret'  => 'xyzxyz',
            'expires' => 3600,
            'signer'  => 'HMACS',
            'jti'     => '4f1g23a12aa'
        ]);

        $this->assertInstanceOf('CodeExperts\Api\Auth\Token', $app['jwt']);
    }
}