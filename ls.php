<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>PySys</title>
        <style>
            td {
            padding: 10px 18px;
            }
        </style>
    </head>
    <body>
        Load Python file<br><br>
        <a href="index.php">New file</a>
        <br><br>
        <table>
        <?php
        if (file_exists("data")) {
            $files = scandir("data");
            foreach ($files as $file) {
                if (strstr($file, ".py")) {
                    $title = str_replace(".py", "", $file);
                    echo "<tr><td><a href='index.php?title=$title'>$title</a></td>";
                    echo "<td>" . date("d/m/Y H:i", filemtime("data/$file")) . "</td>";
                    echo '<td><a href="delete.php?title=' . $title . '">delete</a></td></tr>';
                }
            }
        } else {
            mkdir("data");
        }

        ?>
        </table>
    </body>
</html>
