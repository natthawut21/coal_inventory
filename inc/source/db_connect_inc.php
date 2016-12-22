<?php 
        $_server_name="localhost";


        $_username="coal_inv_user";        $_password="popeye";
        //$_username="test_user_01";        $_password="passw0rd";
        //$_username="root";        $_password="password";
        $_dbname="coal_inventory";

      /*    Inkberry Server*/
      /* 
      $_username="inkberry_coal01";
        $_password="POPeye2120";
        $_dbname="inkberry_coal";
       */
        /*try {
                $conn = new PDO("mysql:host=$_server_name;dbname=$_dbname", $_username, $_password);
                        // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              
                echo "Connected successfully"; 
                }
                catch(PDOException $e)
                {
                    echo "Connection failed: " . $e->getMessage();
                }
*/
        
// Create connection
$conn = new mysqli($_server_name, $_username, $_password, $_dbname);
// Check connection
if ($conn->connect_error) {
   // die("Connection failed: " . $conn->connect_error);
} 
else 
{ 
   // echo "Connect Mysqli OO";
}

if (!$conn->set_charset("utf8")) {
  //  printf("Error loading character set utf8: %s\n", $conn->error);
    exit();
} else {
   // printf("Current character set: %s\n", $conn->character_set_name());
}

?>