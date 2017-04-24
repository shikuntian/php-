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
    /*public function sayHello()
    {
        echo 'hello';
    }*/
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
        echo 'World!';
    }
}

class MyHelloWorld extends Base
{
    /*use SayWorld,ezcReflectionReturnInfo{
        ezcReflectionReturnInfo::sayHello insteadof SayWorld;
        SayWorld::sayHello as say;
    }*/

    public function sayHello()
    {
        echo 'the is begin:';
    }

}

/*$o = new MyHelloWorld();
$o->sayHello();
$o->getReturnType();*/
//冲突以及解决方法
//Fatal error: Trait method sayHello has not been applied, because there are collisions with other trait methods on MyHelloWorld in E:\php-learning\basic\Trait.php on line 59
//修改方法的访问控制
class controllerClass extends Base {
    /*use SayWorld,ezcReflectionReturnInfo {
        SayWorld::sayHello as private;
        ezcReflectionReturnInfo::getReturnType as public;
    }*/
}
/*$ex = new controllerClass();
$ex->getReturnType();*/
trait baseTrait {
    use SayWorld,ezcReflectionReturnInfo;
}
class baseTraitTestClass {
    use baseTrait;
}

//抽象方法的使用
trait instanceTrait {
    public function getType(){
        echo "trait";
    }
    abstract public function getData();
}

class testInstanceTrait {
    use instanceTrait;
    public function getData(){
        echo "is end";
    }
}
$ex = new testInstanceTrait();
$ex->getType();
$ex->getData();
//Trait 的静态成员
trait staticMember{
    static $c = 4;
    public static function get(){
        echo "this is static method in trait";
    }
}
class testTraitStatic{
    use staticMember;
}
$ex = new testTraitStatic();
echo staticMember::$c;
testTraitStatic::get();