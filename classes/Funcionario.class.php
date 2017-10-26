<?php
//BUSCANDO AS CLASSES
include_once "Conexao.class.php";
include_once "Funcoes.class.php";
include 'PHPMailer/PHPMailerAutoload.php';
//CRIANDO A CLASSE
class Funcionario extends Conexao{
	//ATRIBUTOS
	private $con;
	private $objfc;
	private $idFuncionario;
	private $nome;
	private $email;
        private $data_nascimento;
        private $telefone;
        private $senha;
	private $dataCadastro;
        private $caminho;
	//CONSTRUTOR
	public function __construct(){
		$this->con = new Conexao();
		$this->objfc = new Funcoes();
	}
	//METODOS MAGICO
	public function __set($atributo, $valor){
		$this->$atributo = $valor;
	}
	public function __get($atributo){
		return $this->$atributo;
	}
	//METODOS
	
	public function querySeleciona($dado){
		try{
			$this->idFuncionario = $this->objfc->base64($dado, 2);
			$cst = $this->con->conectar()->prepare("SELECT `idFuncionario`, `nome`, `email`, `data_cadastro` FROM `funcionario` WHERE `idFuncionario` = :idFunc;");
			$cst->bindParam(":idFunc", $this->idFuncionario, PDO::PARAM_INT);
			if($cst->execute()){
				return $cst->fetch();
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}
	
	public function querySelect(){
		try{
			$cst = $this->con->conectar()->prepare("SELECT `idFuncionario`, `nome`, `email`, `data_cadastro` FROM `funcionario`");
			$cst->execute();
			return $cst->fetchAll();
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}
	
	public function queryInsert($dados){
		try{
			$this->nome = $this->objfc->tratarCaracter($dados['nome'], 1);
			$this->email = $this->objfc->tratarCaracter($dados['email'], 1);
                        $this->data_nascimento = $dados['data_nascimento'];
                        $this->telefone = $dados['telefone'];
			$this->senha = md5($dados['senha']);
			$this->dataCadastro = $this->objfc->dataAtual(2);
                        $perfil = "comum";
                        
			$cst = $this->con->conectar()->prepare("INSERT INTO `funcionario` (`nome`, `email`,`data_nascimento`, `telefone`, `senha`, `perfil`, `data_cadastro`) VALUES (:nome, :email, :data_nascimento, :telefone, :senha, :perfil, :data);");
			$cst->bindParam(":nome", $this->nome, PDO::PARAM_STR);
			$cst->bindParam(":email", $this->email, PDO::PARAM_STR);
                        $cst->bindParam(":data_nascimento", $this->data_nascimento, PDO::PARAM_STR);
                        $cst->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
			$cst->bindParam(":senha", $this->senha, PDO::PARAM_STR);
                        $cst->bindParam(":perfil", $perfil, PDO::PARAM_STR);
			$cst->bindParam(":data", $this->dataCadastro, PDO::PARAM_STR);
			if($cst->execute()){
                        $id = md5($this->con->conectar()->lastInsertId());
                        // Instância do objeto PHPMailer
                        $mail = new PHPMailer;

                        // Configura para envio de e-mails usando SMTP
                        $mail->isSMTP();

                        // Servidor SMTP
                        $mail->Host = 'smtp.live.com';

                        // Usar autenticação SMTP
                        $mail->SMTPAuth = true;

                        // Usuário da conta
                        $mail->Username = 'wesllen1993@hotmail.com';

                        // Senha da conta
                        $mail->Password = '*********';

                        // Tipo de encriptação que será usado na conexão SMTP
                        $mail->SMTPSecure = 'tls';

                        // Porta do servidor SMTP
                        $mail->Port = 587;

                        // Informa se vamos enviar mensagens usando HTML
                        $mail->IsHTML(true);

                        // Email do Remetente
                        $mail->From = 'wesllen1993@hotmail.com';

                        // Nome do Remetente
                        $mail->FromName = 'William';

                        // Endereço do e-mail do destinatário
                        $mail->addAddress('wesllenalves@gmail.com');

                        // Assunto do e-mail
                        $mail->Subject = 'Confirme seu Cadastro';

                        // Mensagem que vai no corpo do e-mail
                        $mail->Body = '<h1>Seja bem-vindo ao ADLOGADOS.<h1><br>

                        <p>Por favor, confirme o seu e-mail clicando abaixo. Para que o acesso a 
                        sua conta seja realizado com segurança, você deve verificá-lo.</p><br>
                        <a href="https://localhost/crud_phpoo/confirma.php?key='.$id.'">Aqui um link para Confirma</a>';

                        // Envia o e-mail e captura o sucesso ou erro
                        if($mail->Send()):
                            echo 'Enviado com sucesso !';
                        else:
                            echo 'Erro ao enviar Email:' . $mail->ErrorInfo;
                        endif;                       

//				header('location: http://localhost/crud_phpoo/cadastro.php?cadastro=ok');
			}else{
				return 'Error ao cadastrar';
			} 
//                        if($cst === 'ok'){
//                            header('location: http://localhost/crud_phpoo/cadastro.php?cadastro=ok');
//                        }
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}
        
        public function desbloqueaConta($key){
            
		try{
                    $cst = $this->con->conectar()->prepare("UPDATE `funcionario` SET `status` = '1' WHERE md5(idFuncionario) = '$key';");
						
			if($cst->execute()){
				header('location: http://localhost/crud_phpoo/login.php?ativado=true');
			}else{
				echo 'Error ao alterar';
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}
        
        public function updateFoto($nome_final){
           try{           
			$cst = $this->con->conectar()->prepare("UPDATE `imagemperfil` SET `nome` = '$nome_final';");
//			$cst->bindParam(":idFunc", $this->idFuncionario, PDO::PARAM_INT);
						
			if($cst->execute()){
				echo 'ok';
			}else{
				echo 'Error ao alterar';
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
        }
	
	public function queryUpdade($dados){
		try{
			$this->idFuncionario = $this->objfc->base64($dados['func'], 2);
			$this->nome = $dados['nome'];
			$this->email = $dados['email'];
			$cst = $this->con->conectar()->prepare("UPDATE `funcionario` SET `nome` = :nome, `email` = :email WHERE `idFuncionario` = :idFunc;");
			$cst->bindParam(":idFunc", $this->idFuncionario, PDO::PARAM_INT);
			$cst->bindParam(":nome", $this->nome, PDO::PARAM_STR);
			$cst->bindParam(":email", $this->email, PDO::PARAM_STR);
			if($cst->execute()){
				return 'ok';
			}else{
				return 'Error ao alterar';
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}
	
	public function queryDelete($dado){
		try{
			$this->idFuncionario = $this->objfc->base64($dado, 2);
			$cst = $this->con->conectar()->prepare("DELETE FROM `funcionario` WHERE `idFuncionario` = :idFunc;");
			$cst->bindParam(":idFunc", $this->idFuncionario, PDO::PARAM_INT);
			if($cst->execute()){
				return 'ok';
			}else{
				return 'Erro ao deletar';
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}
	
	public function logaFuncionario($dados){
		$this->email = $dados['email'];
		$this->senha = md5($dados['senha']);
		try{
                        $cst = $this->con->conectar()->prepare("SELECT `idFuncionario`, `email`, `senha`, `status` FROM `funcionario` WHERE `email` = :email AND `senha` = :senha; AND `status` = '1'");
			$cst->bindParam(':email', $this->email, PDO::PARAM_STR);
			$cst->bindParam(':senha', $this->senha, PDO::PARAM_STR);
			$cst->execute();                        
			if($cst->rowCount() == 0){
				header('location: http://localhost/crud_phpoo/login.php?login=error');
			}else{
				session_start();
				$rst = $cst->fetch();
				$_SESSION['logado'] = "sim";
                                $_SESSION['ativo'] = $rst['status'];
				$_SESSION['func'] = $rst['idFuncionario'];
                                
				header("location: http://localhost/crud_phpoo/admin");
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMassage();
		}
	}
	
	public function funcionarioLogado($dado){
		$cst = $this->con->conectar()->prepare("SELECT `idFuncionario`, `nome`, `email` FROM `funcionario` WHERE `idFuncionario` = :idFunc;");
		$cst->bindParam(':idFunc', $dado, PDO::PARAM_INT);
		$cst->execute();
		$rst = $cst->fetch();
		$_SESSION['nome'] = $rst['nome'];
	}
	
	public function sairFuncionario(){
		session_destroy();
		header ('location: http://localhost/crud_phpoo/');
	}
	
}
?>
