<?php

//declare(encoding='ISO-8859-1');

echo "Hello World!";

$a = 2;
$b = 1;
if($a > $b)
{
echo '$a > $b';
}
else if($a == $b)
{
echo $a , $b;
echo '$a = $b';
}
else
{
echo $a , $b;
echo '$a < $b';
}


/*$myAry = array('aa','bb','cc');
var_dump($myAry);
while(list($key,$v)=each($myAry)) echo $v;
var_dump($myAry);
reset($myAry);


while(list($key,$v)=each($myAry)) echo $v;
while(list($key,$v)=each($myAry)) echo $v;
reset($myAry);
*/
/*
$i=1;
while($i<=3)
{echo $i++;}

$i=1;
do{echo $i++;}
while($i<=3);

for($i=0;$i<3;print $i++);

for($i=0;;)
{
if($i<=3)
echo $i++;
else
break;
}
*/
/*
$myAry = array('aa','bb','cc');
foreach($myAry as $key => $value)
//echo $key,$value;
unset($value);

$myAryNest = [[1,2],[3,4]];
foreach($myAryNest as list($a,$b))
{
echo "A : $a; B : ",$b.PHP_EOL,";  ";
}
*/
/*
$i = 5;
switch($i)
{
case 0:
echo "value is $i";
break;
case 1:
echo "value is $i";
break;
case 2:
echo "value is $i";
break;
default:
echo "value is $i";
}
*/
//declare (ticks=1);
/*
function funTick()
{
echo "funTick () called.\n";
}

register_tick_function("funTick");

$a = 1;

if($a>0){
$a+=2;
print($a);
}

include_once('Typetest.php');
include_once('Typetest.php');

include('Typetest.php');
include('Typetest.php');
*/

// $count=1;

// echo "\n",$count++,"\n";
// if($count >10)
// return;
// for($i=1, $j=3; $i < 4 ;$i++)
// {
    
//     echo $i;goto hit;echo $i;
    
// }
// hit:
// echo 'you get a hit.';




echo "\nThis is END statement";
?>