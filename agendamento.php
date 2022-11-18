<?php
include('conexaonl.php');
session_start();
$codcliente=$_SESSION['codcliente'];
if (isset($_POST['submit'])) {
    $dataagend = $_POST['dataagend'];
	$horario = $_POST['horario'];
	$descricao = $_POST['descricao'];
    $sql = "INSERT INTO agendamento (dataagend, horario, descricao,cod_cliente)
            VALUES ('$dataagend', '$horario', '$descricao','$codcliente')";

	mysqli_query($conn, $sql);
	if (mysqli_affected_rows($conn)>1) {
		echo "<script>
		Agendamento realizado com sucesso.
		</script>";
		header('Refresh:0.7, url=minhaconta.php');
	}	else {
		echo "<script>
		Erro no Agendamento.
		</script>";
		exit;
	}
	
	$cod_agend=mysqli_insert_id($conn);
	

    if (isset($_POST['cabelo'])) {
		$sql= "INSERT INTO possui (cod_agend, cod_serv)
		VALUES ('$cod_agend', '1')";
		    mysqli_query($conn, $sql);

	}
	if (isset($_POST['manicure'])) {
		$sql= "INSERT INTO possui (cod_agend, cod_serv)
		VALUES ('$cod_agend', '2')";
		    mysqli_query($conn, $sql);

	}
	if (isset($_POST['pedicure'])) {
		$sql= "INSERT INTO possui (cod_agend, cod_serv)
		VALUES ('$cod_agend', '3')";
		    mysqli_query($conn, $sql);
	}
	if (isset($_POST['massagem'])) {
		$sql= "INSERT INTO possui (cod_agend, cod_serv)
		VALUES ('$cod_agend', '4')";
		    mysqli_query($conn, $sql);
	}
	if (isset($_POST['depilacao'])) {
		$sql= "INSERT INTO possui (cod_agend, cod_serv)
		VALUES ('$cod_agend', '5')";
		    mysqli_query($conn, $sql);
	}
	if (isset($_POST['drenagemlinfatica'])) {
		$sql= "INSERT INTO possui (cod_agend, cod_serv)
		VALUES ('$cod_agend', '6')";
		    mysqli_query($conn, $sql);
	}
	
	
   
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="logincad.css">

	<title>Login</title>
</head>
<body>
	<div class="container">
		<form action="agendamento.php" method="POST" class="formulario">
			<p class="titulo" style="font-size: 2rem; font-weight: 800;">Agendamento</p>
			<p>Reserve uma data:</p>
			<div class="input-group">
				<input type="date" placeholder="Data agendamento" name="dataagend" required>
			</div>
			<p>Escolha um horário:</p>
			<div class="input-group">
  				<input type="time" id="hora" name="horario">
			</div>
			<p>Procedimentos:</p>
            <div class="checkboxes">
				<label><input type="checkbox" value="true" name="cabelo"> <span>Cabelo</span></label>
   		 		<label><input type="checkbox" value="true" name="manicure"> <span>Manicure</span></label>
    			<label><input type="checkbox" value="true" name="pedicure"> <span>Pedicure</span></label>
				<label><input type="checkbox" value="true" name="massagem"> <span>Massagem</span></label>
    			<label><input type="checkbox" value="true" name="depilacao"> <span>Depilação</span></label>
    			<label><input type="checkbox" value="true" name="drenagemlinfatica"> <span>Drenagem Linfática</span></label>
			</div>
			<br>
			
			<p>Descrição:</p>
			<div class="input-group">
			<textarea name="descricao" id="mensagem" placeholder="Descreva o procedimento se necessário"></textarea>
        </div>
		<br>
		<br>
		<div class="input-group">
				<button name="submit" class="btn">Agendar</button>
		</div>
		</form>
	</div>

	<!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>
</html>