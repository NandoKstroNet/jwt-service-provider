<?php
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;

require __DIR__ . '/../vendor/autoload.php';

//print "Gerando Token...";

$builder = new Builder();
$cypher = new Sha256();

$token = new \CodeExperts\Api\Auth\Token($builder, $cypher);

print $token->generateToken();

$token->validateToken($data);