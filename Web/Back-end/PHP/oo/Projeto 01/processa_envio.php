<?php


    require './libraries/PHPMailer/Exception.php';
    require './libraries/PHPMailer/OAuth.php';
    require './libraries/PHPMailer/PHPMailer.php';
    require './libraries/PHPMailer/POP3.php';
    require './libraries/PHPMailer/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;


    class Mensagem
    {
        private $para = null;
        private $assunto = null;
        private $mensagem = null;
        public $status = ['codigo_status' => null, 'descricao_status' => null];

        public function __get($name)
        {
            return $this->$name;
        }

        public function __set($name, $value)
        {
            $this->$name = $value;
        }

        public function validarMensagem()
        {
            if(empty($this->para) || empty($this->assunto) || empty($this->mensagem)) {
                return false;
            }
            return true;
        }
    }

    $mensagem = new Mensagem();
    $mensagem->__set('para', $_POST['para']);
    $mensagem->__set('assunto', $_POST['assunto']);
    $mensagem->__set('mensagem', $_POST['mensagem']);

    if(!$mensagem->validarMensagem()) {
        header('Location: index.php');
        //die(); Mata o processamento do script, ou seja, tudo daqui pra baixo já era

    }

    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'phptreinando@gmail.com';                     //SMTP username
        $mail->Password   = '!@#3232#@!';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('phptreinando@gmail.com', 'App Send Mail');
        $mail->addAddress($mensagem->__get('para'));     //Add a recipient
        //$mail->addReplyTo('phptreinando@gmail.com', 'Responda em');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $mensagem->__get('assunto');
        $mail->Body    = $mensagem->__get('mensagem');
        $mail->AltBody = 'Para visualizar essa mensagem é necessário utilizar um serviço de visualização de e-mails capaz de reenderizar o HTML.';

        $mail->send();
        $mensagem->status['codigo_status'] = 1;
        $mensagem->status['descricao_status'] = 'E-mail enviado com sucesso!';
    } catch (Exception $e) {
        $mensagem->status['codigo_status'] = 0;
        $mensagem->status['descricao_status'] = 'Não foi possível enviar o e-mail, tente novamente mais tarde!';
    }
?>

<html>
	<head>
		<meta charset="utf-8" />
    	<title>App Mail Send</title>

    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	</head>

	<body>

		<div class="container">  

			<div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
				<h2>Send Mail</h2>
				<p class="lead">Seu app de envio de e-mails particular!</p>
			</div>

      		<div class="row">
      			<div class="col-md-12">
                    <?php if($mensagem->status['codigo_status'] == 1) { ?>
                        <h1 class="text-success display-4 mb-3">Sucesso</h1>
                        <h5><?=$mensagem->status['descricao_status']?></h5>
                        <a href="index.php" class="btn btn-lg btn-success mt-5">Voltar</a>
                    <?php } ?>

                    <?php if($mensagem->status['codigo_status'] == 0) { ?>
                        <h1 class="text-danger display-4 mb-3">Erro</h1>
                        <h5><?=$mensagem->status['descricao_status'];?></h5>
                        <h6><?='Detalhe do erro: '.$mail->ErrorInfo ?></h6>
                        <a href="index.php" class="btn btn-lg btn-danger mt-5">Voltar</a>
                    <?php } ?>
				</div>
      		</div>
      	</div>

	</body>
</html>