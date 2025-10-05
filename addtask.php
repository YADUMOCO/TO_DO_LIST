<?php

include 'connect.php';

if(isset($_POST['a'])){
    $t=$_POST['new-task'];
    
    $checktask="SELECT * FROM `task` WHERE `tasks` = '$t'";
    echo "SORRY ";
     $result=$conn->query($checktask);
     if($result->num_rows>0){
        echo "Task Already Exist !";
     }
     else{
        $insert="INSERT INTO `task` (`tasks`)
                        VALUES ('$t')";
            if($conn->query($insert)==TRUE){
                header("location: homepage.php");
                exit;
            }
            else{
                echo "Error: ".$conn->error;
            }
     }
}


?>