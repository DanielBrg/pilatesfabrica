<?php
date_default_timezone_set('America/Sao_Paulo');
require_once('../src/PHPMailer.php');
require_once('../src/SMTP.php');
require_once('../src/Exception.php');
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

  if((isset($_POST['email']) && !empty(trim($_POST['email']))) && (isset($_POST['message']) && !empty(trim($_POST['message'])))){

    $name = !empty($_POST['name']) ? utf8_decode($_POST['name']) : 'Nome n«ªo informado';
    $email = utf8_decode($_POST['email']);
    $subject = !empty($_POST['subject']) ? utf8_decode($_POST['subject']) : 'Assunto n«ªo informado';
    $message = utf8_decode($_POST['message']);

    $mail = new PHPMailer();
   
    $mail->setFrom('contato@pilatesfabrica.com.br');
    $mail->addAddress('contato@pilatesfabrica.com.br');
   
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = "Nome: {$name}<br>
    Email: {$email}<br>
    Assunto: {$subject}<br>
    Mensagem: {$message}<br>
    ";
   
    if($mail->send()) {
      echo 'Email enviado com sucesso.';
    } else {
      echo 'Email n«ªo enviado.';
    }
  } else {
    echo 'N«ªo enviado: informar o email e a mensagem.';
  }