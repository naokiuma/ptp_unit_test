<?php
use PHPUnit\Framework\TestCase;

class HogeTest extends TestCase
{
    public function testHoge()
    {
        $stack = [];
        $this->assertEquals(0, count($stack));
    }
}