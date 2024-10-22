<?php
  // Configuração do seu e-mail de destino
  $receiving_email_address = 'wandersonwebsantos@gmail.com';

  // Verifica se o formulário foi enviado
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Coleta as informações do formulário
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Validação simples dos campos
    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {

      // Cria o corpo do e-mail
      $email_content = "From: $name\n";
      $email_content .= "Email: $email\n\n";
      $email_content .= "Message:\n$message\n";

      // Define os headers do e-mail
      $headers = "From: $email\r\n";
      $headers .= "Reply-To: $email\r\n";

      // Envia o e-mail
      if (mail($receiving_email_address, $subject, $email_content, $headers)) {
        // Exibe uma mensagem de sucesso
        echo 'E-mail enviado com sucesso!';
      } else {
        // Exibe uma mensagem de erro
        echo 'Falha no envio do e-mail. Tente novamente.';
      }

    } else {
      echo 'Por favor, preencha todos os campos.';
    }
  } else {
    echo 'Formulário não enviado corretamente.';
  }
?>
