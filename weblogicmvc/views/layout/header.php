<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="public/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="public/css/css.css">
    <!--===============================================================================================-->
    <title>Fatura+</title>

</head>
<body>
<main>
    <header id="header">
        <h1 id="Logo">Fatura+</h1>
        <?php if(isset($_SESSION['userid'])):?>
            <h1 id="username"><?php echo $_SESSION['username']?></h1>
        <?php endif;?>
        <nav>
            <a href="?c=site&a=index">Home</a>
            <?php
            if(isset($_SESSION['userid'])):?>
                <a href="?c=site&a=zonareservada">Zona Reservada</a>
                <a href="?c=login&a=logout">Logout</a>

            <?php else:
                ?> <a href="?c=login&a=index">Login</a>
            <?php endif;?>
        </nav>
    </header>
</main>
