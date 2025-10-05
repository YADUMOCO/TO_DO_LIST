<?php
session_start();
include("connect.php");

$sql= "SELECT * FROM `task`";
$result=$conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOMEPAGE TODO</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container" id="add">
        <header>
            <h1>MY TO-DO LIST</h1>
        </header>
    <form method="post" action="addtask.php">
    <div class="todo-input">
            <input type="text" name="new-task" id="new-task" placeholder="Add a new task..." required>
            
            <input type="submit" class="addd" value="ADD" name="a" id="add">
    </div>
    </form>
    <div>
        <button id="logout-btn" class="todo-l">LOGOUT</button>

        <script>
            document.getElementById('logout-btn').addEventListener('click', () => {
            localStorage.removeItem('isAuthenticated');  // Clear authentication status
            localStorage.removeItem('username');         // Clear username
            window.location.href = 'index.php';         // Redirect to login
            });
        </script>
    </div>
  
    <header>    
        <h2>TASKS</h2>
    </header>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>TASK NAME</th>
            <th>ACTION</td>
           
        </tr>

        <?php
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["tasks"] . "</td>";
                    echo "<td><form method='post' action='delete.php'>
                            <input type='hidden' name='id' value='" . $row['id'] . "'>
                            <button type='submit'>DELETE</button>
                        </form></td>";
                    echo "</tr>";
                }
            }else{
                echo "<tr><td colspan='3'>No data found</td></tr>";
            }
        ?>
    </table>

    <?php
    $conn->close();
    ?>
        <ul id="task-list">
            <!-- List of tasks will be added here dynamically -->
        </ul>
           
        <a href="logout.php">Logout</a>
    </div>
<script src="app.js"></script>
</body>
</html>