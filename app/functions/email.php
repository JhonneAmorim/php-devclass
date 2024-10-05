<?php
// function send($data)
// {

//     $to = 'jhonneamorim828@gmail.com';
//     $subject = $data->subject;
//     $message = $data->message;
//     $headers = "From: {$data->email}" . "\r\n" .
//         "Reply-To: {$data->email}" . "\r\n" .
//         "X-Mailer: PHP/" . phpversion();



//     return mail($to, $subject, $message, $headers);
// }

function send(array $data)
{
    $email = new PHPMailer\PHPMailer\PHPMailer;;
    $email->CharSet = 'UTF-8';
    $email->SMTPSecure = 'PLAIN';
    $email->isSMTP();
    $email->Host = 'sandbox.smtp.mailtrap.io';
    $email->Port = 465;
    $email->SMTPAuth = true;
    $email->Username = '1e85acc1d6c430';
    $email->Password = '73692d4ccece63';
    $email->isHTML(true);
    $email->setFrom('jhonneamorimao@gmail.com');
    $email->FromName = $data['quem'];
    $email->addAddress($data['para']);
    $email->Body = $data['mensagem'];
    $email->Subject = $data['assunto'];
    $email->AltBody = 'Para ver esse email tenha certeza de estar vendo em um programa que aceita ver HTML';
    $email->MsgHTML($data['mensagem']);

    return $email->send();
}
