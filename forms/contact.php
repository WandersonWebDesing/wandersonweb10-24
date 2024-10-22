<?php
// Carregar o PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Se estiver usando Composer

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Coleta as informações do formulário
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Validação simples dos campos
    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {

        // Instancia o PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configurações do servidor SMTP


          /*  'smtp_host' => 'smtp.gmail.com',
    'smtp_username' => 'wanderson.iesb@gmail.com',
    'smtp_password' => 'zwda qvtk ygpy vqje', // Senha de aplicativo do Gmail
    'smtp_port' => 587,*/
            
            
            
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // Use o servidor SMTP do seu provedor
            $mail->SMTPAuth   = true;
            $mail->Username   = 'wanderson.iesb@gmail.com'; // Seu e-mail
            $mail->Password   = 'zwda qvtk ygpy vqje'; // Sua senha de e-mail ou App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
            
            // Definições do e-mail
            $mail->setFrom($email, $name); // Remetente
            $mail->addAddress('wandersonwebsantos@gmail.com'); // Destinatário

            // Conteúdo do e-mail
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = nl2br($message); // Mensagem convertida para HTML
            $mail->AltBody = $message; // Alternativa em texto simples

            // Enviar o e-mail
            $mail->send();
            echo 'E-mail enviado com sucesso!';
        } catch (Exception $e) {
            echo "Erro ao enviar e-mail: {$mail->ErrorInfo}";
        }

    } else {
        echo 'Por favor, preencha todos os campos.';
    }
} else {
    echo 'Formulário não enviado corretamente.';
}
?>
