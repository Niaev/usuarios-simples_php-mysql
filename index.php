<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>cadastro - login</title>
    </head>

    <body>
        <h1>Bem-vindo, 
            <?= isset($_SESSION["logged"]) ? $_SESSION["nome"] : "guest" ?>!
        </h1>

        <?php if (!isset($_SESSION["logged"])) { ?>
            <a href="login.php">Entrar</a> /
            <a href="signup.php">Cadastrar</a>
        <?php } else { ?>
            <form action="back/sair.php" method="post">
                <input type="submit" value="sair">
            </form>
        <?php } ?>
    </body>
</html>