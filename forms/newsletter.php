<?php
// Carregar o PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Se estiver usando o Composer, o autoload está aqui
require '../vendor/autoload.php'; // Ajuste o caminho conforme a sua estrutura de pastas

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Coleta as informações enviadas pelo formulário
    $email = $_POST['email'];

    // Validação simples para garantir que o e-mail foi preenchido
    if (!empty($email)) {

        // Instancia o PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configurações do servidor SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';  // Use o servidor SMTP do seu provedor
            $mail->SMTPAuth   = true;
            $mail->Username   = 'wanderson.iesb@gmail.com'; // Seu e-mail
            $mail->Password   = 'zwda qvtk ygpy vqje';  // Sua senha de e-mail ou senha de aplicativo gerada
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Definições do e-mail
            $mail->setFrom($email); // E-mail do remetente (pode ser o e-mail do formulário)
            $mail->addAddress('wandersonwebsantos@gmail.com'); // Seu e-mail (destinatário)

            // Conteúdo do e-mail
            $mail->isHTML(true); 
            $mail->Subject = "New Subscription: $email"; // Assunto do e-mail
            $mail->Body    = "Você tem um novo inscrito: $email"; // Corpo do e-mail em HTML
            $mail->AltBody = "Você tem um novo inscrito: $email"; // Texto alternativo caso o HTML não seja suportado

            // Enviar o e-mail
            $mail->send();
            echo 'E-mail enviado com sucesso!';
        } catch (Exception $e) {
            echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
        }

    } else {
        echo 'Por favor, preencha o campo de e-mail.';
    }
} else {
    echo 'Método de envio inválido.';
}
?>
