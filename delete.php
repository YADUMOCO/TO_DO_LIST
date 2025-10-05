<?php

include 'connect.php';

if(isset($_POST['id'])){
    $id=$_POST['id'];
    
       $sql= "DELETE FROM `task` WHERE id= ?";

       $stmt = $conn->prepare($sql);
       $stmt->bind_param("i", $id);

       if ($stmt->execute()) {
        echo "Task deleted";
       } else{
        echo "Error deleting task: " . $conn->error;
       }

       $stmt->close();

       header("Location: homepage.php");
       exit();
}

?>
