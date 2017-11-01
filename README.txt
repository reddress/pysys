PySys

WARNING: Extremely dangerous code.
Allows executing any Python code as the user running PHP.

Idea:

index.php - accepts filename in query string, excluding .py extension and loads if it exists. Otherwise it is used as the name for a new file.

Has a text field for filename and a save & run button.

ls.php - Displays list of filenames to load, each filename is a link to index.php with filename in query string

run.php - accepts filename in query string, minus .py extension
