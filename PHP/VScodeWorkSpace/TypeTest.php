<?php

//echo "hello  world";

/*$str1 = "this is a string .";
class TypeTest
{
public $str11 = "this is a string .";




public function TypeTest($value='')
{
echo 'this is class Typetest.'    ;
}

function __construct()
{
echo ' this is TypeTest __construct';
}




function test()
{
echo $this->str1;
}


function __destruct()
{
echo ' this is TypeTest __destruct';
}


}



echo "&th->$1;" ;
*/

//bool
$foo=true;$action = "action";
if($foo)
echo "bool value is true";
echo "\n";

if($action = "show")
echo "operation value is ";
echo $action;echo "\n";

var_dump((bool) 0);echo "\n";
var_dump((bool) 1);echo "\n";
var_dump((bool) -1);echo "\n";
var_dump((bool) '');echo "\n";
var_dump((bool) 'bool');echo "\n";
var_dump((bool) null);echo "\n";
var_dump((bool) "false");echo "\n";
var_dump((bool) array());echo "\n";

/*
var_dump(0==false);
var_dump(0=="all");
var_dump(true=="all");
var_dump(false=="all");


if(false != "show")
echo "operation value is ";
if(false == null)
echo "operation value is 2 ";
*/
/*
$var1 = true;
$var2 = false;

echo (int)$var1;
echo (int)$var2;

if(true || false)
echo "a";
*/

//integer
/*echo 0b11111;echo "<br>";
echo 012;echo "<br>";
echo 12;echo "<br>";
echo 0x12;echo "<br>";
echo (int)true;echo "<br>";
echo (int)111.222;echo "<br>";
echo round(1.95583,2); echo "<br>";

if("2" == 2)
echo "eql";echo "<br>";
echo 2<<3;echo "<br>";
echo 64>>3;echo "<br>";
echo 1.2e3;echo "<br>";
echo 100e-3;echo "<br>";
*/

// echo 'this has special "",\n,\\n ';
// echo "\n";
// echo "this has special '',\n,\\n ";
// echo <<<std
// \nheredoc syntax test \n
// this is the second line.\n
// std;
// echo <<<'std'
// \nnowdoc syntax test \n
// this is the second line.\n
// std;






//array
// $array = array("key"=>"value",
// 2 => 222,
// 3 => "333",
// 'mulAray1' => array("dimen2"=>array(3=>"array3")),'four','5');
// print_r($array);
// print_r($array["4"]);echo "\n";
// $array["4"] ='four modify';
// print_r($array["4"]);echo "\n";
// unset($array[4]);
// $array=array_values($array);
// print_r($array[4]); echo "\n";


// $data = array(1,3=>'arrayfun','test');
// foreach($data as $value)
// echo $value."\n";
// $str = implode(' ',$data);
// echo $str."\n";
// $data2 = explode(' ',$str);
// while(list($name,$value)=each($data2))
// echo $name.":".$value."\t";

// echo "\n".count($data2);
// echo "\n".array_search('test',$data2)."\n";
// $datapop=array_pop($data2);
// print_r($data2);print_r($datapop);
// array_push($data2,'testpush');
// print_r($data2);


// $fp = fopen("test.txt","w");// create test.txt
// $intType = 123;
// echo get_resource_type($fp)."\n";
// echo is_resource($intType)?"true":"false"."\n";
// echo gettype($intType)."\n"; 
// echo gettype($fp)."\n"; 



//class

class stdclas
{
    
    public $a = "I'm a!";
    public $c ;
    
    function course($coursename)
    {
        echo $coursename," is learning.\n";
    }
    
    public function Getc()
    {
        return $this->c;
    }
    public function Setc($c11)
    {
        $this->c = $c11;
        return $this->c;
    }
    
}

// $math = new stdclas;
// $math->course("math");
// $math->Setc("I am c !\n");
// print $math->Getc();

// print (new stdclas)
// ->Setc("I'm C too !")
// ->Getc();





//callbacks
// function my_function($people,$people2)
// {
//     echo $people ," say Hello World.\n";
//     echo $people2 ," say Hello World too.\n ";
// }

// call_user_func("my_function","jack","marry");
// call_user_func('stdclas::course','math');
// function my_func($p_array)
// {
//     foreach($p_array as $value) 
//     echo "Array value : $value \n"; 
// }
// call_user_func("my_function","jack","marry");
// $array3 = array(1,2,344);
// $value3 = 'my_func';
// call_user_func("my_func",$array3);

//echo str_replace("blue","Yellow","The Color is blue.");

//integer
// echo 0b11111;echo "\n"; 
// echo 012;echo "\n";
// echo 12;echo "\n";
// echo 0x12;echo "\n";
// echo (int)true;echo "\n";
// echo (int)111.222;echo "\n";
// echo round(1.95583,2); echo "\n";
// if("2" == 2)
// echo "eql";echo "\n";
// echo 2<<3;echo "\n";
// echo 64>>3;echo "\n";
// echo 1.2e3;echo "\n";
// echo 100e-3;echo "\n";
