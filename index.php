<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>PySys</title>
        <style type="text/css" media="screen">
         body {
             overflow: hidden;
             width: 100%;
             height: 100%;
         }

         #editor {
             margin: 0;
             position: relative;
             width: 100%;
             height: 300px;
             bottom: 0;
         }
        </style>

    </head>
    <body>
        <?php
        if (isset($_GET['title'])) {
            $filename = $_GET['title'] . ".py";
            $filename = str_replace(" ", "_", $filename);
        } else{
            $filename = "scratch.py";
        }

        if (file_exists("data/" . $filename)) {
            $code = file_get_contents("data/" . $filename);

            $code = str_replace("if __name__ == '__main__': main()", "", $code);
            $code = trim($code);
            $code .= "\n\n";

        } else {
            $code = "\n\n\ndef main():\n    ";
        }

        ?>
        
        To do: Manage files, run existing files<br>
        Enter Python code. Only the <code>main()</code> function will be called.<br><br>
        <form name="form" target="_blank" action="run.php" method="POST">
            <input type="button" value="Submit" onclick="aceSubmit()"><br><br>
            Title: <input type="text" size="60" name="title" autofocus><br>
            <br>
            <pre id="editor" name="py"><?= $code ?></pre>
            <textarea id="pyTextarea" name="py" style="display: none;"></textarea>
        </form>
        <script src="ace/ace.js"></script>
        <script src="ace/ext-language_tools.js"></script>
        <script>
         ace.require("ace/ext/language_tools");
         var editor = ace.edit("editor");
         editor.session.setMode("ace/mode/python");
         editor.setTheme("ace/theme/tomorrow");
         editor.setOptions({
             enableBasicAutocompletion: true,
             enableSnippets: true,
             enableLiveAutocompletion: false
         });

         var pyTextarea = document.getElementById("pyTextarea");
         function aceSubmit() {
             pyTextarea.value = editor.getSession().getValue();
             document.forms['form'].submit();
         }
        </script>
    </body>
</html>
