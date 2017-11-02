<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>PySys</title>
    </head>
    <body>
        <?php
        $title = $_GET['title'];
        unlink("data/" . $title . ".py");
        ?>
        Deleted <?= $title ?>
                <br><br>
                <a href="index.php">Back to home</a><br><br>
                <a href="ls.php">Back to file list</a>
    </body>
</html>
