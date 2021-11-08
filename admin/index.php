<?php 
    if (!isset($_SESSION["ADMIN"]) ) {
        http_response_code(404);
        die("page introuvable ");


    }



?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>
<body>
   <p>test</p> 
</body>
</html>