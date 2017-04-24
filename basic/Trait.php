<?php

/**
 * Trait example Code
 * User: a88wangtian@163.com
 * Date: 2017/4/24
 */
trait ezcReflectionReturnInfo
{
    function getReturnType()
    { /*1*/
        return "this is second trait";
    }
    
    function getReturnDescription()
    { /*2*/
    }
}

class ezcReflectionMethod extends ReflectionMethod
{
    use ezcReflectionReturnInfo;
    /* ... */
}

class ezcReflectionFunction extends ReflectionFunction
{
    use ezcReflectionReturnInfo;
    /* ... */
}

class Base
{
    public function sayHello()
    {
        echo 'Hello ';
    }
}

trait SayWorld
{
    public function sayHello()
    {
        parent::sayHello();
        echo 'World!';
    }
}

class MyHelloWorld extends Base
{
    use SayWorld,ezcReflectionReturnInfo;

    public function sayHello()
    {
        echo 'the is begin:';
    }
}

$o = new MyHelloWorld();
$o->sayHello();
$o->getReturnType();