<!DOCTYPE html>
<html lang="pt-br">

<?php
include('conexaonl.php');
include('cabecalho.php');
include('verifica_login.php');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estiloindex.css" />
    <title>New Look</title>
</head>

<body>
   
    <div class="container-fluid">
        <div class="row text-container">
            <div class="col">
                <p>Seja bem-vindo ao Salão de Beleza New Look!</p>
                <p>Marque um horário conosco</p>
                <form action="agendamento.php">
                    <button class="agend">Agende aqui</button>
                </form>
            </div>
        </div>
        <div class="row justify-content-center imagemfundo" id="contato">
            <div style="margin:5%; color: white;" class="col-4 fundo">
                <br>
                <h3 style=margin-bottom:5%;>Endereço:</h3>
                <p>• Rua Borges de Medeiros, 209</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2975.4038034134296!2d-49.7265049!3d-29.338135399999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x952269a41b6fe4c1%3A0x1ddea15df47b8cfc!2sR.%20Borges%20de%20Medeiros%2C%20209%20-%20Torres%2C%20RS%2C%2095560-000!5e1!3m2!1spt-BR!2sbr!4v1668697374771!5m2!1spt-BR!2sbr" width="250" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div style="margin: 5% 0% 5%; color: white;" class="col-4 fundo">
                <br>
                <h3>Horário de funcionamento:</h3>
                <br>
                <p>• Segunda a Sábado</p>
                <p>• 08:30 às 19:00</p>
            </div>
            <div style="margin:5%; color: white;" class="col-4 fundo">
                <br>
                <h3>Contato:</h3>
                <br>
                <p> <i class="fa fa-whatsapp" style="font-size:22px"></i>(51) 99501-1950</p>
                <p> <i class="material-icons" style="font-size:22px">&#xe0cd;</i>(51) 2144-2413</p>
                <p> <i class="material-icons" style="font-size:22px">&#xe0be;</i>newlook.2004@outlook.com</p>
               
            </div>
        </div>
    </div>
    <footer id="rodape">
        <p> &copy; 2022. Salão de Beleza New Look | Todos os direitos reservados.</p>
    </footer>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>