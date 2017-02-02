<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Atelier sécurité</title>
</head>
<body>
    <h2>Injection</h2>
    <form action="verify.php" method="POST">
        ID<input type="text" name="nom">
        PWD<input type="password" name="motdepasse">
        <input type="submit">
    </form>

    <h2>XSS</h2>
    <form action="verify.php" method="POST">
        <textarea name="message"></textarea>
        <input type="submit">
    </form>
</body>
</html>
