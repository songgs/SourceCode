<?php
// echo (5 / -2)."\n";          // prints -2.5
// echo (5 % -3)."\n";          // prints 2
// echo (-5 % 3)."\n";          // prints -2
// echo (-5 % -3)."\n";         // prints -2
// echo pow(-5,-2)."\n" ;       // prints 0.04
// echo sin(pi()/6)."\n";       // prints 0.5
// echo exp(pow(-1,1/2)*pi())."\n";       // prints NAN, no imaginary number



// $a = 3;
// $a += 5;
// echo $a."\n";
// $b = 'Hello';
// $b .= ' World';
// echo $b;


// echo (1&0)."\n";// prints 0
// echo (1|0)."\n";// prints 1
// echo (1^0)."\n";// prints 1
// echo (~1)."\n";// prints -2
// echo (2<<3)."\n";// prints 1
// echo (-2>>3)."\n";// prints -1
// echo (2>>3)."\n";// prints 0

// echo 'with @'.@(3/0)."\n";
// echo 'without @'.(3/0)."\n";

// ini_set("safe_mode",false);

//  $output = `cmd`;
//  echo "<pre>$output</pre>";

// $output = shell_exec('cmd');
// echo "<pre>$output</pre>";



// $a = 3;
// echo '$a:'.$a."\n";
// echo '++$a:'.++$a."\n";
// echo '$a:'.$a."\n";
// echo '$a++:'.$a++."\n";
// echo '$a:'.$a."\n";

// echo '--$a:'.--$a."\n";
// echo '$a:'.$a."\n";
// echo '$a--:'.$a--."\n";
// echo '$a:'.$a."\n";

// var_dump(true && true);
// var_dump(true && false);
// var_dump(true || true);
// var_dump(true || false);
// var_dump(!true);
// var_dump(!false);
// var_dump(true xor true);
// var_dump(true xor false);

// $v1='hello ';
// $v2=$v1.'world';
// echo  $v2;
// echo "\n";
// $v3='hello ';
// $v3.='world';
// echo $v3;


// class ClassA{}
// class ClassB{}
// class ClassExtendsClassA extends ClassA{}
// $a = new ClassA;
// $ac = new ClassExtendsClassA;
// $a2 = new ClassA;
// var_dump($a instanceof ClassA);
// var_dump($a instanceof ClassB);
// var_dump($ac instanceof ClassA);
// var_dump($a instanceof $a2);
// $va = "ClassA";
// var_dump($a instanceof $va);

// $a=1;
// $b=2;
// function funSwap($a,$b)
// {
//     return null;
// }
// //var_dump(funSwap($a=1,$b=2));


// function swap($left, $right)
// {
//     if ($left === $right) {
//         return;
//     }

//     $tmp = $left;
//     $left = $right;
//     $right = $tmp;
// }

// $a = 1;
// $b = 2;
// var_dump(swap($a, $b), $a, $b);

//array
// +
$a = array(0=>'a0',1=>'a1');
$b = array('b0',1=>'b1',2=>'b2');
$c = $a + $b;
echo '$a + $b'."\n"; 
var_dump($c);
$a = array(0=>'a0',1=>'a1');
$b = array('b0',1=>'b1',2=>'b2');
$c = $b + $a;
echo '$b + $a'."\n"; 
var_dump($c);
// ==/===
$a = array(0=>'a0',1=>'a1');
$c = array(0=>'a0',"1"=>"a1");
$b = array(1=>'a1',0=>'a0'); 
var_dump($a==$b);
var_dump($a===$b);
var_dump($a==$c);
var_dump($a===$c);