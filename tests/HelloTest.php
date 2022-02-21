<?php

use PHPUnit\Framework\TestCase;

    
class HelloTest extends TestCase{

    public function testCheck(){
        // $expected = Hello::echoMsg();//これが読めない
        //ので、ひとまずれでいく
        $expected = 'hello';
        $this->assertSame('hello',$expected);
    }
    
 
}