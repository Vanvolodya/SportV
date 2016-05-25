<?php
    //phpinfo();
    
    error_reporting(E_ALL);
    ini_set('display_startup_errors',1);
    ini_set('display_errors',1);
    error_reporting(-1);
    
    echo "Testing database PDO connection...<br>";
    
    $SECRET = "diu7ajksf8sj,vKLDHliewudksfj"; //  place this in WebApp settings
    
    
    $connenv = getenv("SQLAZURECONNSTR_defaultConnection");
    parse_str(str_replace(";", "&", $connenv), $connarray);
    
    $connstring = "sqlsrv:Server=".$connarray["Data_Source"].";Database=".$connarray["Initial_Catalog"];
    $item = $connarray["item_title"];
    $descr = $connarray["item_description"];
	$price = $connarray["item_price"];
    
    function printCollations($conn)
    {
        $sql = "SELECT title, description FROM sys.fn_helpcollations()";
        foreach ($conn->query($sql) as $row)
        {
            print $row['title'] . "\t";
			print $row['description'] . "\t";
            print $row['price'] . "<br>";
        }
    }

    try
    {
        $conn = new PDO( $connstring, $item, $descr, $price );
        
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        
        
        $sqlcreate ="CREATE TABLE items( ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,".
                 "title         VARCHAR( 250 ) NOT NULL,".
                 "description   VARCHAR( 128 ) NOT NULL,".
                 "price         INT);";
        
        try { $conn->exec($sqlcreate); } catch ( PDOException $e ) { echo "Create table error. May be it exists."; }
        
        print("The table was created.<br><br>");
        
        $sqlinsert = "insert into items (title,description,price) values (?, ?, ?)";
        $insertquery = $conn->prepare($sqlinsert);
      
        // test set of items
        $myitems = array(
            array("Мяч для футболу SELECT Contra", "Опис", 598),
            array("Мяч для футболу K-Sector Pro Team", "Опис", 403),
			array("Мяч для футболу NIKE SABER", "Опис", 907),
			array("Мяч для футболу Joma Egeo 5", "Опис", 706),
            array("Мяч для футболу NIKE PREMIER TEAM FIFA", "Опис", 907) );
        
        foreach($myitems as $item)
        {
            $title = $item[0];
            $description = $item[1];
            $price = $item[2];
            $insertquery->execute(array($title, $description, $price));
            
            echo "Insert error code = ".$insertquery->errorCode()." "; // Five zeros are good like this 00000 but HY001 is a common error
            echo "Number of rows inserted = ".$insertquery->rowCount()."<br>";
        }
        
        print "<br>Selecting rows from the table...<br>";
        
        $sqlselect = "SELECT * FROM items";
        foreach ($conn->query($sqlselect) as $row)
        {
            print   htmlspecialchars($row['title']).", ".
                    htmlspecialchars($row['description']).", ".
                    "price = ".htmlspecialchars($row['price'])."<br>";
        }
        
        print "<br>Dropping the table...<br>";
        
        $sqldrop ="DROP TABLE items";
        
        $conn->exec($sqldrop);
        
        print "The table was dropped <br>";
    }
    catch ( PDOException $e )
    {
        // TODO: There is a security problem here. Do not do this in production!!!
        print( "PDO Error : " );
        die(print_r($e));
    }

?>

<!DOCTYPE html>
<html>
    <meta charset="UTF-8"></meta>
    <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
    <link rel="stylesheet" href="w3.css"></link>
    <link rel="stylesheet" href="w3-theme-green.css"></link>
    <body>
        <header class="w3-container w3-card-4 w3-theme">
            <title>SportV</title>
            <h1>SportV</h1>
        </header>
        
        <div class="w3-container" id="itemcontainer">
        </div>
        	
		<footer class="w3-container w3-center w3-theme w3-bottom"> 
		</footer>
    </body>
</html>
