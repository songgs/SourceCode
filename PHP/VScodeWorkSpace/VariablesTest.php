<?php
// echo "Hello World!";
//$Var = 'Jack';
//echo $var,"\n$Var";

$var = 'Bob';

$bar = &$var;
echo $bar."\n";
$var = "Bob Rename";
echo $bar."\n";
echo $var."\n";
$a = 'b';
$b = 'c';
$c = 'a';
echo $a."\t";
echo ${$a}."\t"; echo $$$a."\t";
echo $$$$a."\t";


// $name;
// echo var_dump(isset($name));
// echo var_dump($_SERVER['DOCUMENT_ROOT']);

/*
//echo var_dump($array);
include 'Typetest.php';
echo var_dump($array);
*/
/*
$a = 1;
$b = 2;
function Sum()
{
global $a,$b;
$b = $a+$b;
}
function Sum1()
{
$GLOBALS['b'] =  $GLOBALS['b'] + $GLOBALS['a'];
}
Sum1();
echo $b;
*/
/*
function FunStatics()
{
static $count = 0;
$count ++;

echo $count;
if ($count < 10)
FunStatics();

$count--;
}

FunStatics();

*/
/*
$a = "b";
$b = "r";
$r = 'a';

echo $a,$$a,"is same to ",'$b',": $b",$$$a,$$$$a;
*/

/*
define("F00","define variable");
const F01 = 'const varable';
//echo constant(F01);
function FunctionName( )
{
$v = F00;
echo $v;
$v1 = F01;
echo $v1;
//echo f00;
// echo f01;
}
FunctionName();
$v = F00;
echo $v;
$v1 = F01;
echo $v1;
*/
/*
$vbol = true;
//echo $vbol?'true':"false";


function a(){echo 0;}
function b(){echo 'b';}
var_dump(a() == b());//a=>b a==b 1==1
//if((a() == b()))
echo 'true';
var_dump("a"=="b");
$a=3;
var_dump($a==$a=4);//a=4,4=44
*/
/*
echo 5**2;
$a = 2;
$a .= "5";
echo '2'.'3'  ;
echo 7&12;

echo @we??23??null;

$output = `ls -al`;
echo "<pre>$output<pre>";
echo shell_exec("ls -al");
*/

/*
$ary1 = array(1,2,3);
$ary2 = array(1,2,"3");
if($ary1===$ary2)
echo "==";
*/

/*
interface myInterf{}
class myCls implements myInterf{}
$a = new myCls;
var_dump($a instanceof myCls);
var_dump($a instanceof myInterf);
$c = 'myCls';
var_dump($a instanceof $c);
*/


// $a = 2;
// $b = 1;
// if($a > $b)
// {
//     echo '$a > $b';
// }
// else if($a == $b)
// {
//     echo $a , $b;
//     echo '$a = $b';
// }
// else
// {
//     echo $a , $b;
//     echo '$a < $b';
// }




echo "\nThis is END statement";
?>