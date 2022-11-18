<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilocabecalho.css" />
    <title>New Look</title>
</head>

<body>
    <nav>
        <img src="logo3.png">

        <ul>
            <li><a href="index.php">Início</a></li>
            <li><a href="minhaconta.php">Minha conta</a></li>
            <li><a href="index.php#contato">Contato</a></li>
            <?php
            if (isset($_SESSION['codcliente'])) { ?>
                <li><a href="logout.php">Sair</a></li>
            <?php } ?>
            <?php
            if (!isset($_SESSION['codcliente'])) { ?>
                <li><a href="telalogin.php">Login</a></li>
            <?php } ?>
        </ul>
    </nav>

</body>

</html>