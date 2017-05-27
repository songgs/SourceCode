<?php

//echo "Hello World!";
#echo "Hello World!";


#var_dump(null);

// define("F00","define variable");
// const F01 = 'const varable';
// //print_r(get_defined_constants(true));// all constant
// echo F00."\n";
// echo constant("F01")."\n";

// echo "当前文件路径：".__FILE__;
// echo "\n当前行数：".__LINE__;
// echo "\n当前PHP版本信息：".PHP_VERSION;
// echo "\n当前操作系统：".PHP_OS;

// $a="hello";
// $hello = "world";
// echo $$a;
// const constanta = "asdf";

// class claTest
// {
//  var $pro1 ;

//  public function funtest ()
//  {
//      echo "funtest1".$this->pro1;
//  }

// }
// $cla = new claTest();
// $cla->pro1 = "asd";
// echo $cla->funtest();


echo (3+1) * (5||2);
echo "\n";
echo 3+1 * 5||2;
echo "\n";

echo "32"."we"."\t";
echo "32"+"we"."\t";

$a=1;
$b=1;
$c='1';
if($a==$b)
echo '=='."\n";
if($a===$b)
echo '==='."\n";
if($a==$c)
echo '=='."\n";
if($a===$c)
echo '==='."\n";

for ($i = 1; $i <= 5; $i++) {
    if(($i % 2) == 1)  //odd
    {echo "odd:$i\n";}
    else//even
    {echo "even$i\n";}
}