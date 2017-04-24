<?php

/**
 * Trait example Code
 * User: a88wangtian@163.com
 * Date: 2017/4/24
 */
trait traitClass {
    public function testTraitMethod(){
        echo "the web site is www.ieo.xin";
    }
    public function testTraitOne(){
        echo "the traitClass is www.ieo.xin";
    }
}

class Base
{
    public function testTraitMethod()
    {
        echo 'This is a Base Class ';
    }
    public function testTraitOne(){
        echo "the Base is www.ieo.xin";
    }
}
class testTraitOne extends Base
{
    use traitClass;
    public function testTraitMethod()
    {
        echo 'the is begin:';
    }

}

$o = new testTraitOne();
$o->testTraitMethod();
$o->testTraitOne();


//冲突以及解决方法
//Fatal error: Trait method sayHello has not been applied, because there are collisions with other trait methods on MyHelloWorld in E:\php-learning\basic\Trait.php on line 59
trait traitTestClass1 {
    public function testMethodTwo(){
        echo "\n this is a method \n";
    }
}

trait traitTestClass2{
    public function testMethodTwo(){
        echo "hello this  is a same method \n";
    }
}

class traitTestIoe{
    use traitTestClass1,traitTestClass2{
        traitTestClass1::testMethodTwo insteadof traitTestClass2;
        traitTestClass2::testMethodTwo as testMethodThree;
    }
}
$ex = new traitTestIoe();
$ex->testMethodTwo();
$ex->testMethodThree();
//修改方法的访问控制
class traitTestIoe2{
    use traitTestClass1,traitTestClass2{
        traitTestClass1::testMethodTwo as public;
        traitTestClass1::testMethodTwo insteadof traitTestClass2;
        traitTestClass2::testMethodTwo as private;
        traitTestClass2::testMethodTwo as testMethodThree;
    }
}
//抽象方法的使用
//使用trait的类必须实现相应的方法
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
//Trait 的静态成员
$ex = new testInstanceTrait();
$ex->getType();
$ex->getData();
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