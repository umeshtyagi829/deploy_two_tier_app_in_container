<!DOCTYPE html>

<?php
    // initialize errors variable
        $errors = "";

        #assignment - 1 credentials
        #$servername = getenv("DB_HOST");
        #$user = getenv("MYSQL_USER");
        #$pass = getenv("MYSQL_PASSWORD");
        #$database = getenv("MYSQL_DATABASE");

        #assignment - 2 credentials
        $servername = getenv("DB_HOST");
        $user = getenv("MYSQL_USER");
        #$pass = getenv("MYSQL_PASSWORD_FILE");
        $pass = shell_exec('cat /run/secrets/db_password');
        $database = getenv("MYSQL_DATABASE");

        #echo $servername;
        #echo $user;
        #echo $pass;
        #echo $pass1;
        #echo $database;

        // connect to database
        $db = @mysqli_connect($servername, $user, $pass, $database);
        #$db = @mysqli_connect("mydb", "umesh", "Umesh@123", "todo");

        // insert a quote if submit button is clicked
        if (isset($_POST['submit'])) {
                if (empty($_POST['task'])) {
                        $errors = "You must fill in the task";
                }else{
                        $task = $_POST['task'];
                        $sql = "INSERT INTO tasks (task) VALUES ('$task')";
                        @mysqli_query($db, $sql);
                        @header('location: index.php');
                }
        }
        // delete task
        if (isset($_GET['del_task'])) {
                $id = $_GET['del_task'];

                mysqli_query($db, "DELETE FROM tasks WHERE id=".$id);
                @header('location: index.php');
                }
?>

<html>
<head>
        <link rel="stylesheet" type="text/css" href="style.css">        
        <title>ToDo List Application PHP and MySQL</title>
</head>
<body>
        <div class="heading">
                <h2 style="font-style: 'Hervetica';">ToDo List Application PHP and MySQL database</h2>
        </div>
        <form method="post" action="index.php" class="input_form">
                <input type="text" name="task" class="task_input">
                <button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
                <?php if (isset($errors)) { ?>  <p><?php echo $errors; ?></p><?php } ?>
        </form>
<table>
        <thead>
                <tr>
                        <th>N</th>
                        <th>Tasks</th>
                        <th style="width: 60px;">Action</th>
                </tr>
        </thead>

        <tbody>
                <?php
                // select all tasks if page is visited or refreshed
                $tasks = @mysqli_query($db, "SELECT * FROM tasks");

                $i = 1; while ($row = @mysqli_fetch_array($tasks)) { ?>
                        <tr>
                                <td> <?php echo $i; ?> </td>
                                <td class="task"> <?php echo $row['task']; ?> </td>
                                <td class="delete">
                                        <a href="index.php?del_task=<?php echo $row['id'] ?>">x</a>
                                </td>
                        </tr>
                <?php $i++; } ?>
        </tbody>
</table>
</body>
</html>
