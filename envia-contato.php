<?php

session_start();

require_once('PHPMailerAutoload.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

$mailer = new PHPMailer();
$mailer->isSMTP();
$mailer->Host = 'smtp.mailtrap.io';
$mailer->Port = 25;
$mailer->SMTPSecure = 'tls';
$mailer->SMTPAuth = true;
$mailer->Username = 'b00fa034bae816';
$mailer->Password = 'cb74671a707b9c';

$mailer->setFrom('4b4264fcaf-450e57@inbox.mailtrap.io', 'Alura Curso PHP e MySQL');
$mailer->addAddress('rfdeoliveira.pmsp@gmail.com');
$mailer->Subject = "E-mail de contato da loja";
$mailer->msgHTML("<html>de: {$nome}<br/>email: {$email}<br>mensagem: {$mensagem}</html>");
$mailer->AltBody = "de: {$nome}\nemail: {$email}\nmensagem: {$mensagem}";

if ($mailer->send()) {
    $_SESSION['success'] = 'Mensagem enviada com sucesso';
    header('Location: contato.php');
} else {
    $_SESSION['danger'] = 'Mensagem não foi enviada. Tente novamente mais tarde.';
    header('Location: index.php');
}

die;
