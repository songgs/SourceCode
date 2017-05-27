<?php
//file exists? :create
if(!file_exists("test.txt"))
{
    $fh = fopen("test.txt","w");
    fclose($fh);
}

//url open
$fh =fopen("http://www.baidu.com","r");
if($fh)
{
    while(!feof($fh)){
        echo fgets($fh);
    }
}

//write to file with auth
$fn = 'test.txt';
$word = "Hello \n World !";
if(is_writable($fn))
{
    if(!file_exists("test.txt"))
    {
        $fh = fopen("test.txt","w");
        fclose($fh);
    }
    if(!$fh = fopen($fn,'a'))
    {
        echo "can not open $fn";
        exit;
    }
    if(fwrite($fh,$word)===false)
    {
        echo "can not write $word to $fn";
        exit;
    }
    
    echo "success: write $word to $fn";
}else
{
    echo "fail: write $word to $fn";
}

//get line from pointer
if($fh = fopen('test.txt','r'))
{
   while(!feof($fh))
    echo fgets($fh)."12";
}

//write something append to file ,default overrite
echo file_put_contents("test.txt","\nthis is a txt file!",FILE_APPEND);

 $fh = fopen("test.txt","r");//put pointer to begin of the file
 echo fread($fh,"2");//read file with length = 2
fclose($fh);//close pointer refer to file

// echo die("error");//exit and echo "error";

//read file by char
if($fh = fopen('test.txt','r') or die("open error!"))
{
   while(!feof($fh))
     echo fgets($fh).'<br/>';
    // echo fgetc($fh).'<br/>';
}

//read file by line
$lines = file("test.txt");
foreach($lines as $linumb=>$line)
{
    echo "Line num : $linumb ".$line."<br/>";
}

if(!is_executable("test.txt"))
{
    echo "not run !";
}

//copy file
if(copy("test.txt","test2.txt"))
echo "copy success";
else
    echo "copy fail";


unlink("test2.txt");//remove file

echo filesize($fn);
echo filetype($fn);
echo date("Y-m-d H:i:s",filemtime($fn));//return last modify time


$fh = fopen($fn,'r');//open file with readonly
fseek($fh,7);//set position where fgets() begin to read.
echo ftell($fh);//return position in file.
echo rewind($fh);//set position to begin
echo  file_get_contents("test.txt").//get complete string from file
"\n-----------------------";

while(!feof($fh))
echo fgets($fh);