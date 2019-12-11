

<?php
$dbConnection = mysqli_connect('localhost', 'root', '', 'khanstore');

$query  = "SELECT email FROM user_info";
$result = mysqli_query($dbConnection, $query);

                  $i = 0;
                  foreach ($result as $row) {
                    $i++;
    ini_set( 'display_errors', 1 );
 
    error_reporting( E_ALL );
 
    $from = "aminos.ayari@gmail.com";
 
    $to = $row['email'];
 
    $subject = "promotion";
 
    $message = "nouvelle promotion ajouter !!! ";
 
    $headers = "From:" . $from;
 
    mail($to,$subject,$message, $headers);
 }
    echo "L'email a été envoyé.";
?>