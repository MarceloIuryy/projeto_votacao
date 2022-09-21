
<?php
require_once('app/Models/Votante.php');
require_once('app/Controllers/ControllerVotante.php');

$votanteDao = new ControllerVotante();
if(!empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['idade'])  && !empty($_POST['voto'])){
$votante = new Votante($_POST['nome'], $_POST['cpf'], $_POST['idade'], $_POST['voto']);
    
$votante->validarDados();
$votanteDao->createVotante($votante);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css"/>

</head>
<body>
   <div class=" container border border-2 rounded-4 p-4 bg-white mb-3 mt-3" style="max-width: 450px;">
   <div class="row" >
     <h2 class="mb-4 text-center">Contagem de votos</h2>
     <div class="col-sm">
        <img class="rounded-2" src="images/tiru.webp" alt="tiru" style="max-width:100%;" id="tiru">
    </div>
    <div class="col-sm">
    
    </div>
    <div class="col-sm">
        <img class="rounded-2" src="images/tiringa.jfif" alt="tiringa" style="max-width:100%;" id="tiringa">
     </div>
     </div>
   </div>
   <?php if($votanteDao->readVotante()){ ?>
        <div class="container">
            <h1>Relatório</h1>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Idade</th>    
                        <th>Voto</th>    
                        <th>Data_Registro</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($votanteDao->readVotante() as $votante){ ?>
                        <tr>
                        <td> <?php echo $votante["nome"]; ?></td>
                        <td> <?php echo $votante["cpf"]; ?></td>
                        <td> <?php echo $votante["idade"]; ?></td>  
                        <td> <?php echo $votante["voto"]; ?></td>  
                        <td> <?php echo date ('d/m/Y', strtotime($votante["data_registro"])); ?></td>
                    <?php } ?>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php } ?>
</body>
</html>