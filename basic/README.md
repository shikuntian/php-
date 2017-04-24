1.Trait<br>
From:PHP5.4<br/>
作用:实现代码复用,由于PHP是单继承，当需要继承多个类的时候,可以使用Trait实现，Trait 和 Class 相似，但仅仅旨在用细粒度和一致的方式来组合功能。 无法通过 trait 自身来实例化。
它为传统继承增加了水平特性的组合；也就是说，应用的几个 Class 之间不需要继承。 
优先级:从基类继承的成员会被 trait 插入的成员所覆盖。优先顺序是来自当前类的成员覆盖了 trait 的方法，而 trait 则覆盖了被继承的方法。
所以覆盖顺序:类-》trait的类-》继承的类<br/>
定义：trait traitName{}<br>
使用: use traitName;<br>
多个 trait：通过逗号分隔，在 use 声明列出多个 trait，可以都插入到一个类中。