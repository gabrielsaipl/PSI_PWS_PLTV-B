<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/css/css.css">
    <!--===============================================================================================-->
    <title>LoginFatura+</title>

</head>
<body>
<main>
    <header>
        <h1>Fatura+</h1>
        <nav>
            <a href="?c=site&a=index">Home</a>
            <a href="?c=login&a=login">Login</a>
            <?php
            $_SESSION['userid']=1;
            if(isset($_SESSION['userid'])):?>
                <a href="?c=site&a=zonareservada">Zona Reservada</a>
            <?php endif;?>
        </nav>
    </header>
</main>
