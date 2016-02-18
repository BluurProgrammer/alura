<?php 
session_start();

$nome = $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];

require_once("PHPMailerAutoload.php");

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "ermacmk110p@gmail.com";
$mail->Password = "tubaraobranco";

$mail->setFrom("ermacmk110p@gmail.com", "Alura Curso PHP e MySQL");
$mail->addAddress("ermacmk110p@gmail.com");
$mail->Subject = "Email de contato da loja";
$mail->msgHTML("<html>De: {$nome}<br/>Email: {$email}<br/>Mensagem: {$mensagem}</html>");
$mail->AltBody = "De: {$nome} \n Email: {$email} \n Mensagem: {$mensagem}";

if ($mail->send()) {
	$_SESSION["success"] = "Mensagem enviada com sucesso!";
	header("Location: index.php");
} else {
	$_SESSION["danger"] = "Erro ao enviar mensagem" . $mail->ErrorInfo;
	header("Location: contato.php");
}
die();