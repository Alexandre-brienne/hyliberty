<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>authentification</title>
</head>
<body>
    <form action="auth.php" method="post">
        <div>
            <p>email :</p>
            <input type="email" name="email" id="email">
        </div>
        <div>  
            <p>mot de passe</p>
            <input type="password" name="password" id="password">
        </div>

        <button type="submit">connecter</button>
    </form>
</body>
</html>