<?php

namespace Tests\Unit;
use App\Http\Controllers\HelloController;
use PHPUnit\Framework\TestCase;

class HelloControllerTest extends TestCase
{
    /**
     * メソッド単位が unit で、laravel起動なしで実行される。
     */
    public function test_isOverZero1()
    {
        $class  = new HelloController();
        $method = new \ReflectionMethod($class, 'isOverZero');
        $method->setAccessible(true);
        $result = $method->invokeArgs($class, [1]);
        $this->assertTrue($result);
    }

    /**
     * バリエーション
     */
    public function test_isOverZero2()
    {
        $class  = new HelloController();
        $method = new \ReflectionMethod($class, 'isOverZero');
        $method->setAccessible(true);
        $result = $method->invokeArgs($class, [0]);
        $this->assertFalse($result);
    }

    /**
     * 引数なし関数
     */
    public function test_getSomething()
    {
        $class  = new HelloController();
        $method = new \ReflectionMethod($class, 'getSomething');
        $method->setAccessible(true);
        $result = $method->invoke($class);
        $this->assertTrue($result === "TEST");
    } 
}
