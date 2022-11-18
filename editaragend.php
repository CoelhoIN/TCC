<html>

<?php
include('conexaonl.php');

$codagend = $_GET['codagend'];

if (isset($_POST['submit'])) {
    $dataagend = $_POST['dataagend'];
	$horario = $_POST['horario'];
	$descricao = $_POST['descricao'];
    $sql = "UPDATE agendamento  SET  dataagend='$dataagend', horario='$horario', descricao='$descricao'	WHERE codagend='$codagend'";

    mysqli_query($conn, $sql);

	$sqlDelete ="DELETE FROM possui WHERE cod_agend='$codagend'";
	mysqli_query($conn, $sqlDelete);

	if (isset($_POST['cabelo'])) {
		$sql= "INSERT INTO possui (cod_agend, cod_serv)
		VALUES ('$codagend', '1')";
		    mysqli_query($conn, $sql);

			}
	if (isset($_POST['manicure'])) {
		$sql= "INSERT INTO possui (cod_agend, cod_serv)
		VALUES ('$codagend', '2')";
		    mysqli_query($conn, $sql);

	}
	if (isset($_POST['pedicure'])) {
		$sql= "INSERT INTO possui (cod_agend, cod_serv)
		VALUES ('$codagend', '3')";
		    mysqli_query($conn, $sql);
	}
	if (isset($_POST['massagem'])) {
		$sql= "INSERT INTO possui (cod_agend, cod_serv)
		VALUES ('$codagend', '4')";
		    mysqli_query($conn, $sql);
	}
	if (isset($_POST['depilacao'])) {
		$sql= "INSERT INTO possui (cod_agend, cod_serv)
		VALUES ('$codagend', '5')";
		    mysqli_query($conn, $sql);
	}
	if (isset($_POST['drenagemlinfatica'])) {
		$sql= "INSERT INTO possui (cod_agend, cod_serv)
		VALUES ('$codagend', '6')";
		    mysqli_query($conn, $sql);
	}
	
    echo "<script> alert('Agendamento alterado com sucesso') </script>";
	header('Refresh:0.7, url=minhaconta.php');
}

$sql = "SELECT * FROM agendamento WHERE codagend=$codagend";
$rs = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($rs);


$sqlServicos = "SELECT * FROM possui WHERE cod_agend=$codagend";
$rsServicos = mysqli_query($conn, $sqlServicos);
$servicos= array();
while($serv = mysqli_fetch_array($rsServicos)) {
	array_push($servicos, $serv['cod_serv']);
}
?>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="editaragend.css">

	<title>Login</title>
</head>
<body>
	<div class="container">
		<form method="POST" class="formulario">
			<p class="titulo" style="font-size: 2rem; font-weight: 800;">Agendamento</p>
			<p>Reserve uma data:</p>
			<div class="input-group">
				<input type="date" placeholder="Data agendamento" value="<?php echo $linha['dataagend'] ?>"name="dataagend" required>
			</div>
			<p>Escolha um horário:</p>
			<div class="input-group">
  				<input type="time" id="hora" name="horario" value="<?php echo $linha['horario'] ?>">
			</div>
			<p>Procedimentos:</p>
			<div class="checkboxes">
				<label><input type="checkbox" <?php if(in_array(1,$servicos)) echo "checked";?> name="cabelo"> <span>Cabelo</span></label>
   		 		<label><input type="checkbox" <?php if(in_array(2,$servicos)) echo "checked";?> name="manicure"> <span>Manicure</span></label>
    			<label><input type="checkbox" <?php if(in_array(3,$servicos)) echo "checked";?> name="pedicure"> <span>Pedicure</span></label>
				<label><input type="checkbox" <?php if(in_array(4,$servicos)) echo "checked";?> name="massagem"> <span>Massagem</span></label>
    			<label><input type="checkbox" <?php if(in_array(5,$servicos)) echo "checked";?> name="depilacao"> <span>Depilação</span></label>
    			<label><input type="checkbox" <?php if(in_array(6,$servicos)) echo "checked";?> name="drenagemlinfatica"> <span>Drenagem Linfática</span></label>
			</div>
			<br>
			<p>Descrição:</p>
			<div class="input-group">
			<textarea name="descricao" id="mensagem" placeholder="Descreva o procedimento se necessário" required>
			<?php echo $linha['descricao'] ?>
			</textarea>
        </div>
		<br>
		<br>
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