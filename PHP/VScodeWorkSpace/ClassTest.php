<?php
echo 'Hello World!';
// function __autoload($class_name)
// {
//     require_once $class_name.'.php';
// }

// spl_autoload_register(function($class){include $class.'.php';});



// $obj1=new TypeTest();
// $obj1->TypeTest();

/*
class cla{

}

echo cla::class;

class Animal
{
const constant = 'this is contant variable';
function Run()
{
echo "animal is running.";
}
}
class Human extends Animal
{
public static $staVar = "this is static variable";
public  $Var = "this is variable";
function Run()
{
echo "human is running.";
}
public function ShowConstant($value='')
{
echo parent::constant."fun\n";
}
function ShowStatic()
{
echo self::$staVar."fun\n";
}
}
class Man extends Human
{}
Human::ShowConstant();
echo Human::$staVar;

$human = new Human();
$human::$staVar;
$human->Var;
$human->ShowStatic();


Man::Run();
*/

/*
abstract class AbsCla
{
abstract function AbsFun();

function funImp()
{
echo 'this is funImp in Abstract Class';
}
}
interface Inter
{
function fun();
}

trait tra
{
public function traFun()
{
echo 'traFun ';
}
public function traFun1()
{
echo 'traFun1 ';
}
}

class A{}
class B extends AbsCla implements Inter
{
use tra;
function AbsFun()
{
echo 'Implement AbsFun in AbsCla ';
}

function fun()
{
echo "Implement funImp in Inter ";
}
}
$claB = new B();
$claB->traFun1();

*/
// //anonymous class
// $util=new class { public function log($log){ echo "anonymous class ",$log;}};
// $util->log("this is log");

//$util2->log(new class { public function log($log=""){ echo "anonymous class ",$log;}},"adsf");


// //itration
// class MyClass
// {
//     public $var1 = 'value1';
//     public $var2 = 'value2';
//     public $var3 = 'value3';

//     protected $varPro = 'value protected';
//     private $varPri = 'value private';


//     function iteratorVisible()
//     {
//         echo "MyClass::iteratorVisible().\n";
//         foreach($this as $key => $value)
//         {
//             print "$key => $value \n";
//         }
//     }
// }
// $class = new MyClass();
// foreach($class as $key=>$value)
// {
//     echo "$key => $value \n";
// }
// $class->iteratorVisible();
//MyClass::iteratorVisible();

// class MyIterater// implements Iteartor
// {

// }

// class MyCollection implements IteratorAggregate
// {
//     private $items = array();
//     private $count = 0;

//     public function getIterator()
//     {
//         return new MyIterator($this->items);
//     }
//     public function add($value)
//     {
//         $this->items[$this->count++] = $value;
//     }
// }

// $coll = new MyCollection();
// $coll->add('value add 1');
// $coll->add('value add 2');
// $coll->add('value add 3');

// foreach($coll as $key => $value)
// {
//     echo "key/value : $key=> $value .";
// }

// class Conn
// {
// public function __sleep()
// {
//     //return array('username','server');
//     echo "__sleep";
// }

// }
// $c = new Conn();
// echo serialize("value is serialize");


// class TestClass
// {
//     public $foo;

//     public function __construct($foo)
//     {$this->foo = $foo;}

//     public function __tostring()
//     {
//         return $this->foo;
//     }
// }

// $class = new TestClass("hello");
// echo $class;

// class CallableClass
// {
//     function __invoke($x,$y)
//     {
//         echo "__invoke ".$x." ".$y;
//     }
// }
// $obj = new CallableClass;
// $obj("asdf",45);


class A {
    public static function who(){echo __class__;}
    public static function test(){echo self::who();}
}

class B extends A {
public static function who(){echo __class__;}
}
B::test();



echo "\nLast Statement.";

?>