<?php
$servername = "localhost";
$username = "root";
$password = "Not6lpj2sNRvKsOT";
$dbname = "CMS";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    $stmt= $conn->query('SELECT * FROM test');
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['ID'], $row['note1'] , $row['note2'] , $row['text'] , '<br>';
    }
    
    // prepared steatements 
    // unsafe
    
    $sql = "SELECT * FROM test";
    
    // fetch multiple posts 
    
    // positional params
    
    $sql = 'SELECT * FROM test';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$sql]);
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
   // var_dump($result);
    
   foreach ($result as $r) {
       echo $r->note1 . '<br>';
   }
    
    ?>