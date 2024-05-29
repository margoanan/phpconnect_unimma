<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Title of the document</title>
    </head>
    <body>
        <h2>Hello <?=$_SESSION['auth']['name']?></h2>
    </body>
</html>