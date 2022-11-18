<!DOCTYPE html>
<html>
<?php
include('conexaonl.php');

if (isset($_POST['submit'])) {
	session_start();

    $nome = $_POST['nome'];
	$telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $datanasc =  $_POST['datanasc'];
	
    $sql = "INSERT INTO cliente (nome, telefone, email, senha, datanasc) 
            VALUES ('$nome', '$telefone', '$email', '$senha', '$datanasc')";

    mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0) {
		$_SESSION['codcliente'] = mysqli_insert_id($conn);
		echo "<script>alert('cadastrado com sucesso')</script>";
		header('Refresh:0.7, url=index.php');
	}
   
}
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="logincad.css">

	<title>Cadastro</title>
</head>
<body>
	<div class="container">
	<a href="telalogin.php" style="text-decoration:none; color:#B21E1E; font-weight: bold; font-size:1.1rem;"> < Voltar</a>
		<form action="" method="POST" class="formulario">
            <p class="titulo" style="font-size: 2rem; font-weight: 800;">Cadastro</p>
			<div class="input-group">
				<input type="text" placeholder="Nome completo" name="nome" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Telefone" name="telefone" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Senha" name="senha" required>
            </div>
			<p style="color:#B21E1E; margin-left:3%;">Data de nascimento:</p>
			<div class="input-group">
				<input type="date" placeholder="Data nascimento" name="datanasc" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Cadastrar</button>
			</div>
		</form>
	</div>

	<!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>
</html>
