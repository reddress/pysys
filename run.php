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
        <a href="index.php">Write some more Python</a>
        <br>
        Close this tab if an error is shown to go back to the code.
        <br><br>
        <?php
        require("settings.php");
        
        echo("Running $PYTHON as user " . exec('whoami'));

        echo("<br>");
        
        if (file_exists("data")) {
            echo("Writing to folder data/");
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

        file_put_contents($filename, $pyScript);

        ?>

        <pre><?php system("$PYTHON $filename 2>&1"); ?></pre>
        <br>
        <a href="index.php">Write some more Python</a>
    </body>
</html>
