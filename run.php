<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>PySys</title>
        <style>
         pre {
             background-color: #FFA;
             padding: 1.2em;
         }
        </style>
    </head>
    <body>
        <?php
        require("settings.php");

        ob_implicit_flush(true);
        
        if (file_exists("data")) {
            echo("Writing to folder data/ <br><br>");
        } else {
            mkdir("data");
        }
        
        $pyScript = $_POST['py'];
        
        $pyScript .= "

if __name__ == '__main__': main()";

        $timestamp = date('YmdHis');
        $folder = "data";
        $title = $_POST['title'];
        $title = str_replace(" ", "_", $title);

        $filename = "$folder/{$title}_{$timestamp}.py";
        $filename = "$folder/{$title}.py";

        file_put_contents($filename, $pyScript);

        ?>

        <a href="index.php?title=<?= $title ?>">Back to <?= $title ?></a>
        
        <pre><?php system("timeout --signal=2 --kill-after=4 3 $PYTHON $filename 2>&1", $retval);
             if ($retval == 124) {
                 echo("\n\nProgram timed out.");
             } ?></pre>
        <br>
        <a href="index.php?title=<?= $title ?>">Back to <?= $title ?></a>
    </body>
</html>
