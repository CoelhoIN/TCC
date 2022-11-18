<?php

include('conexaonl.php');

$codagend = $_GET['codagend'];

$sql = "DELETE FROM agendamento WHERE codagend=$codagend";
$sql2 = "DELETE FROM possui WHERE cod_agend=$codagend";

mysqli_query($conn, $sql2);
if (mysqli_affected_rows($conn) > 0) {
    mysqli_query($conn, $sql);
    if (mysqli_affected_rows($conn) > 0) {

        header("Location: minhaconta.php");
    }
} else {
    echo "<script>alert('Houve algum erro.');</script>";
    mysqli_error($conn);
    echo $conn->error;
}
