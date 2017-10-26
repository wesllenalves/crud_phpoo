<?php
//BUSCANDO AS CLASSES
require_once '../classes/Funcionario.class.php';
//ESTANCIANDO 
$objFunc = new Funcionario();
//VALIDANDO USUARIO
session_start();



if($_SESSION["logado"] == "sim"){
        
	$objFunc->funcionarioLogado($_SESSION['func']);
        $id = $_SESSION['func'];
        $foto = $_SESSION['fotoperfil'];
        
}else{
	header("location: http://localhost/crud_phpoo/"); 
 }
 
 if($_SESSION['ativo'] == 1){
     $objFunc->funcionarioLogado($_SESSION['func']);
}else{
    header("location: http://localhost/crud_phpoo/login.php?inativo=true");
}
if(isset($_POST['enviaimg'])){
    
    $arquivo = $_FILES['imagem']['name'];
			
			//Pasta onde o arquivo vai ser salvo
			$_UP['pasta'] = '../upload/perfil/';
			
			//Tamanho máximo do arquivo em Bytes
			$_UP['tamanho'] = 1024*1024*100; //5mb
			
			//Array com a extensões permitidas
			$_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');
			
			//Renomeiar
			$_UP['renomeia'] = TRUE;
			
			//Array com os tipos de erros de upload do PHP
			$_UP['erros'][0] = 'Não houve erro';
			$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
			$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
			$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
			$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
			
			//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
			if($_FILES['imagem']['error'] != 0){
				die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['imagem']['error']]);
				exit; //Para a execução do script
			}
			
			//Faz a verificação da extensao do arquivo
			$extensao = strtolower(end(explode('.', $_FILES['imagem']['name'])));
			if(array_search($extensao, $_UP['extensoes'])=== false){		
                            
                            echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/crud_phpoo/admin/index.php?extaocao=erro'>
					<script type=\"text/javascript\">
						alert(\"A imagem não foi cadastrada extesão inválida.\");
					</script>
				";
			}
			
			//Faz a verificação do tamanho do arquivo
			else if ($_UP['tamanho'] < $_FILES['imagem']['size']){
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/crud_phpoo/admin/index.php?tamanho=erro'>
					<script type=\"text/javascript\">
						alert(\"Arquivo muito grande.\");
					</script>
				";
			}
			
			//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
			else{
				//Primeiro verifica se deve trocar o nome do arquivo
				if($_UP['renomeia'] == TRUE){
					//Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
					$nome_final = time().'.jpg';
				}else{
					//mantem o nome original do arquivo
					$nome_final = $_FILES['imagem']['name'];
				}
				//Verificar se é possivel mover o arquivo para a pasta escolhida
				if(move_uploaded_file($_FILES['imagem']['tmp_name'], $_UP['pasta']. $nome_final)){
					//Upload efetuado com sucesso, exibe a mensagem
                                        //
                                    
                                        $objFunc->updateFoto($nome_final);
//					$query = mysqli_query($conn, "INSERT INTO usuarios (
//					nome_imagem) VALUES('$nome_final')");
//					echo "
//						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/upload_imagem.php'>
//						<script type=\"text/javascript\">
//							alert(\"Imagem cadastrada com Sucesso.\");
//						</script>
//					";	
//				}else{
//					//Upload não efetuado com sucesso, exibe a mensagem
//					echo "
//						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/crud_phpoo/admin/index.php?error=true'>
//						<script type=\"text/javascript\">
//							alert(\"Imagem não foi cadastrada com Sucesso.\");
//						</script>
//					";
				}
			}
    
	
}

if(isset($_GET['sair']) == "sim"){
	$objFunc->sairFuncionario();
}
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<meta charset="utf-8">
	<title>Home</title>
	<link href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
	<link href="../bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" media="all">
	<link href="css/estilo-index.css" rel="stylesheet" type="text/css" media="all">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script
	<script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
        <style type="text/css">
                        #FTperfil :hover{
                           border: 1px solid black; 
                           
                        }
                        #Txperfil{                            
                      display: none;
                           
                           
                        }
                        #Txperfil:hover {
                            margin-left: 45px;
                           margin-top: -20px;
                            display: block;
                            position: absolute;
                            height: 20px;
                            width: 20px;
                            background-color: red;
                            
                        }
        </style>
</head>

<body>
<nav class="navbar navbar-inverse navbar-radius">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="funcionario">Funcionários</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?=$_SESSION['nome']?></a></li>
      <li><a href="?sair=sim"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
    </ul>
  </div>
</nav>
    <?php echo $foto; ?>
    <?php
        

    if (!empty($foto) == ''){
       
    echo '<div class="container">
        <a id="FTperfil" data-toggle="modal" data-target="#myModal"><img width="120px" height="120px" src="../upload/perfil/default.png" /></a><br>
    </div>';
    }else{
      echo '<div class="container">
        <a id="FTperfil" data-toggle="modal" data-target="#myModal"><img width="120px" height="120px" src="../upload/perfil/'.$foto.'" /></a><br>
    </div>';  
    }
    ?>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div>Alterar foto      </div>
      <div class="modal-body">
          <form method="POST" enctype="multipart/form-data">
              <input type="file" name="imagem" >
              
              <button  type="submit" name="enviaimg" class="btn btn-default btn-sm">Enviar    
        </button>
          </form>
      </div>      
    </div>

  </div>
</div>
</body>
</html>
