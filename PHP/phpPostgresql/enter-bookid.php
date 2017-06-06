<!DOCTYPE html>
    <head>
    <title>Enter bookid to display data - simple web application</title>
    <meta Http-equiv="Content-Type" content="text/html; charset=utf-8"/>
       <style>       li {list-style:none; }       </style> 
    </head>

    <body>
    <h2>Enter bookid</h2>
    <ul>
        <form name="display" action="enter-bookid.php" method="POST">
            <li>Book ID:</li> <li><input type="text" name="bookid"></li>
            <li><input type="submit" name="submit"></li>
            
        </form>
    </ul>
    </body>
</html>

<?php

require_once('connection.php');

try {
    $conn=Connection::get()->connect();
} catch (Exception $e) {
    echo 'error: connection '.$e->getMessage();
}

//$db = pg_connect('host=104.209.45.95 dbname=postgres user=postgres password=PDQ5gmadmgQC port=5432'); 
 
if (!$conn) :
    echo "error: connect database"+ pg_last_error($conn).PHP_EOL ;
endif;

$result = pg_query($conn, "SELECT * FROM book where book_id = '$_POST[bookid]'");
$row = pg_fetch_assoc($result);
if (isset($_POST['submit'])) {
    echo "<ul>
<form name='update' action='enter-bookid.php' method='POST' >
<li>Book ID:</li><li><input type='text' name='bookid_updated' value='$row[book_id]' readonly /></li>
<li>Book Name:</li><li><input type='text' name='book_name_updated' value='$row[bookname]' />
</li><li>Author:</li><li><input type='text' name='author_updated' value='$row[author]' /></li> 
<li>Publisher:</li><li><input type='text' name='publisher_updated' value='$row[publisher]' /></li>  
<li>Date of publication:</li><li><input type='text' name='dop_updated' value='$row[date_of_publication]' /></li>
<li>Price (USD):</li><li><input type='text' name='price_updated' value='$row[price]' /></li>
<li><input type='submit' name='new' /></li>
  </form>
</ul>";
}
if (isset($_POST['new'])) {
    $query = "UPDATE book SET bookname = '$_POST[book_name_updated]', 
    author = '$_POST[author_updated]', publisher = '$_POST[publisher_updated]',date_of_publication = '$_POST[dop_updated]',
    price = '$_POST[price_updated]' where  book_id = '$_POST[bookid_updated]';";
    $result1 = pg_query($conn, $query);
    if (!$result1) {
        echo $query;
        echo "Update failed!!".preg_last_error().PHP_EOL;
    } 
}
?>
