<!DOCTYPE html>
<html>

<?php
include('conexaonl.php');

$codcliente = $_GET['codcliente'];

if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $datanasc = $_POST['datanasc'];

    $sql = "UPDATE cliente SET 
                nome='$nome', 
                telefone='$telefone', 
                email='$email', 
                senha='$senha',
                datanasc='$datanasc' 
            WHERE codcliente='$codcliente'";

    mysqli_query($conn, $sql);
    echo "<script> alert('Cadastro alterado com sucesso') </script>";
    header('Refresh:0.7, url=minhaconta.php');
}
$sql = "SELECT * FROM cliente WHERE codcliente=$codcliente";
$rs = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($rs);
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
	<a href="minhaconta.php" style="text-decoration:none; color:#B21E1E; font-weight: bold; font-size:1.1rem;"> < Voltar</a>
		<form action="" method="POST" class="formulario">
            <p class="titulo" style="font-size: 2rem; font-weight: 800;">Cadastro</p>
			<div class="input-group">
				<input type="text" placeholder="Nome completo" name="nome" value="<?php echo $linha['nome'] ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Telefone" name="telefone" value="<?php echo $linha['telefone'] ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $linha['email'] ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Senha" name="senha" value="<?php echo $linha['senha'] ?>" required>
            </div>
			<p style="color:#B21E1E; margin-left:3%;">Data de nascimento:</p>
			<div class="input-group">
				<input type="date" placeholder="Data nascimento" name="datanasc" value="<?php echo $linha['datanasc'] ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Salvar</button>
			</div>
		</form>
	</div>

	<!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>
</html>