<?php
$servername = "localhost";
$username = "root";
$password = "msroot17";
$dbname = "myDB";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error)
{
    die("connection failed :".$conn->connect_error);
}

echo "connect successfully";

$sql1 = "CREATE DATABASE myDB";
// if($conn->query($sql1)===true)
// {
//     echo "DATABASE creates successfully";
// }else
// {
//     echo "Error creating database : ".$conn->error;
// }

$sql2 = "create table tabTest (
id int(6) unsigned auto_increment primary key,
firstname varchar(30) not null,
lastname varchar(30) not null,
email varchar(50),
reg_date timestamp
)";

// if($conn->query($sql2)===true)
// {
//     echo "Table tabTest creates successfully";
// }else
// {
//     echo "Error creating table : ".$conn->error;
// }

$sql3 = "insert into tabTest(firstname,lastname,email)
values ('Si','Li','1111@hotmail.com')";
// if($conn->query($sql3)===true)
// {
//     $last_id = mysqli_insert_id($conn);
//     echo "New Record insert successfully.last ID is ".$last_id;
// }else
// {
//     echo "Error : ".$sql3."<br>".$conn->error;
// }

$sql4 = "select id ,firstname ,lastname,email from tabTest limit 5";
$result = $conn->query($sql4);

if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    echo "id: ".$row["id"]."-name : ".$row["firstname"]." ".
    $row["lastname"]."-email : ".$row["email"]." \t";

}else
{
    echo "0 results";
}


$sql5 = "delete from tabTest where id = 2";
$sql6 = "update tabTest set firstname = 'Wu' , lastname = 'Wang' where id = 1";
// if($conn->query($sql6)===true)
// {
//     echo "New Record operate successfully." ;
// }else
// {
//     echo "Error operate :".$conn->error;
// }

$conn->close();
?>