<?php
echo 'Hello World!';
/*
bar();//function body can post
function bar()
{
echo 'this is functon bar(). ';
}
// return type declare
function welcome():string
{
return 123;
}

echo welcome();
*/

/*
$var = 10;

valueAdd($var);
echo $var;
valueAddByAdr($var);
echo $var;
valueAdd();
valueAddByAdr();

function valueAdd($val=1)
{
echo "function valueAdd value is ",++$val;
}

function valueAddByAdr(&$val=1)
{
echo "function valueAdd value is ",++$val;
}
*/
/*
$someRef = 'test ref';
function & rtnRef()
{
$someRef=0;
return $someRef;
}

echo $newRef = & rtnRef();
$newRef++;
echo $newRef = & rtnRef();
*/


$func = "f1";
//$func();
$func = "f2";
$func('asdf');
function f1(){ echo "this is f1.";}
function f2($arg = ''){ echo "this is f2.",$arg;}

class Foo
{
    static $variable = "static property.";
    
    function variable($value='')
    {
        echo "static function";
    }
}

//echo Foo::$variable;
$variable = 'variable';
Foo::$variable();


/*
class Cart
{
const PRICE_BUTTER = 1.00;
const PRICE_MILK = 3.00;
const PRICE_EGGS = 6.75;

protected $products = array();

public function add($product='',$quantity = 0)
{
$this->products[$product] = $quantity;
}

public function getQuantity($product='')
{
return isset($this->products[$product])?$this->products[$product]:false;
}

public function getTotal($tax='')
{
$total = 0.00;
$callback =
function ($quantity,$product)use ($tax,&$total)
{
$pricePeritem = constant(__CLASS__."::PRICE_".strtoupper($product));
$total += $pricePeritem*$quantity*(1+$tax);
};


array_walk($this->products,$callback);
return round($total,3);
}
}

$myCart = new Cart;
$myCart->add('butter',1);
$myCart->add('milk',2);
$myCart->add('eggs',6);

echo $myCart->getTotal(0.05);
*/


echo "\nThis is the last statement.";
?>