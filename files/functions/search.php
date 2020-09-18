<?php

include 'db_connection.php';
    $query = $_GET['query'];
    $min_length = 3;
    if(strlen($query) >= $min_length){

        $query = htmlspecialchars($query);
        $query = mysqli_real_escape_string($conn,$query);
        $raw_results = mysqli_query($conn, "SELECT * FROM message_received
            WHERE (`received_from` LIKE '%".$query."%')") or die(mysqli_error($conn));
        if(mysqli_num_rows($raw_results) > 0){
            echo "<h1>Your Search Result</h2>";
            while($results = mysqli_fetch_array($raw_results)){
                echo "<table ><th>Number with Message</th><tr ><td style='border:1px solid black;padding:10px'>".$results['received_from']."</td><td style='border:1px solid black'>".$results['received_msg']."</td></tr></table>";
            }

        }
        else{
            echo "No results";
        }

    }
    else{
        echo "Minimum length is ".$min_length;
    }
?>
