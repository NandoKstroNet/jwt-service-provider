<?php
namespace CodeExperts\Api\Auth;

use CodeExperts\Provider\JWTServiceProvider;
use Silex\Application;

class TokenTest extends \PHPUnit_Framework_TestCase
{
    public function assertPreConditions()
    {
        $this->assertTrue(class_exists('CodeExperts\\Api\\Auth\\Token'), 'Class does not exists!');
    }

    public function testGenerateAndValidateANewJwtToken()
    {
        $conf = [
            'iss'     => 'http://exemple.com',
            'remote'  => 'http://remote.com',
            'secret'  => 'xyzxyz',
            'signer' => 'HMACS',
            'expires' => 3600,
            'jti'     => '4f1g23a12aa'
        ];

        $app = new Application();
        $app->register(new JWTServiceProvider(), $conf);

        $token = $app['jwt'];
        $token->setPayloadData(['username' => 'CodeExpertsLearning']);

        $tokenGenerated = $token->generateToken()->__toString();

        $this->assertTrue($token->validateToken($tokenGenerated));
    }
}