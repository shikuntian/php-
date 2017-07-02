# Trait
#### 版本From
PHP5.4
#### 作用:
实现代码复用,由于PHP是单继承，当需要继承多个类的时候,可以使用Trait实现，Trait 和 Class 相似，但仅仅旨在用细粒度和一致的方式来组合功能。 无法通过 trait 自身来实例化。
它为传统继承增加了水平特性的组合；也就是说，应用的几个 Class 之间不需要继承。 
#### 优先级
从基类继承的成员会被 trait 插入的成员所覆盖。优先顺序是来自当前类的成员覆盖了 trait 的方法，而 trait 则覆盖了被继承的方法。
所以覆盖顺序:类-》trait的类-》继承的类
#### 声明方式
trait traitName{}
#### 使用方式
use traitName;多个 trait：通过逗号分隔，在 use 声明列出多个 trait，可以都插入到一个类中。
#### 冲突的解决
如果两个 trait 都插入了一个同名的方法，如果没有明确解决冲突将会产生一个致命错误。 错误信息:
Fatal error: Trait method sayHello has not been applied, because there are collisions with other trait methods on MyHelloWorld in E:\php-learning\basic\Trait.php on line 59
为了解决多个 trait 在同一个类中的命名冲突，需要使用 insteadof 操作符来明确指定使用冲突方法中的哪一个。 
以上方式仅允许排除掉其它方法，as 操作符可以将其中一个冲突的方法以另一个名称来引入
#### 修改方法的访问控制
#### 从 trait 来组成 trait 
#### Trait 的抽象成员
为了对使用trait的类进行控制,trait支持抽象方法的使用