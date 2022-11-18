<!DOCTYPE html>

<?php

if (isset($_POST['entrar'])) {
	include('conexaonl.php');
	session_start();
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$sql = "SELECT * FROM newlook.cliente WHERE email='$email' AND senha='$senha'";
	$rs = mysqli_query($conn, $sql);
	if (mysqli_affected_rows($conn) > 0) {
		$linha = mysqli_fetch_array($rs);
		$_SESSION['codcliente'] = $linha['codcliente'];
		header('Location:index.php');
	}
}
?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="logincad.css">

	<title>Login</title>
</head>

<body>
	<div class="container">
		<a href="index.php" style="text-decoration:none; color:#B21E1E; font-weight: bold; font-size:1.1rem;">
			< Voltar</a>
				<form action="" method="POST" class="formulario">
					<p class="titulo" style="font-size: 2rem; font-weight: 800;">Login</p>
					<div class="input-group">
						<input type="email" placeholder="Email" name="email" required>
					</div>
					<div class="input-group">
						<input type="password" placeholder="Senha" name="senha" required>
					</div>
					<div class="input-group">
						<input type="submit" name="entrar" class="btn" value="Entrar">
					</div>
					<p class="login-register-text">Não possui uma conta? <a href="telacad.php">Clique aqui</a>.</p>
				</form>
	</div>

	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
	</script>
</body>

</html>