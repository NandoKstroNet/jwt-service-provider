<?php
namespace CodeExperts\Api;

class TokenTest extends \PHPUnit_Framework_TestCase
{
    public function assertPreConditions()
    {
        $this->assertTrue(class_exists('CodeExperts\\Api\\Token'));
    }
}