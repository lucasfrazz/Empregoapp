<?php
// Configurações de email
$destinatario = "spacepenapp@gmail.com";
$assunto_site = "App de Emprego - Nova Mensagem de Contato";

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Pegar os dados do formulário
    $nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $assunto = isset($_POST['assunto']) ? trim($_POST['assunto']) : '';
    $mensagem = isset($_POST['mensagem']) ? trim($_POST['mensagem']) : '';
    
    // Validação básica
    if (empty($nome) || empty($email) || empty($assunto) || empty($mensagem)) {
        $erro = "Por favor, preencha todos os campos obrigatórios.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "Por favor, insira um e-mail válido.";
    } else {
        
        // Mapear assuntos para nomes mais amigáveis
        $assuntos = [
            'duvida' => 'Dúvida sobre o App',
            'sugestao' => 'Sugestão',
            'parceria' => 'Proposta de Parceria',
            'suporte' => 'Suporte Técnico',
            'outro' => 'Outro'
        ];
        
        $assunto_nome = isset($assuntos[$assunto]) ? $assuntos[$assunto] : $assunto;
        
        // Criar o corpo do email
        $corpo_email = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; text-align: center; border-radius: 10px 10px 0 0; }
                .content { background: #f9f9f9; padding: 20px; border-radius: 0 0 10px 10px; }
                .field { margin-bottom: 15px; }
                .field strong { color: #667eea; }
                .footer { text-align: center; margin-top: 20px; color: #666; font-size: 12px; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>📧 Nova Mensagem de Contato</h2>
                    <p>App de Emprego - Plataforma de Busca de Vagas</p>
                </div>
                <div class='content'>
                    <div class='field'>
                        <strong>Nome:</strong> {$nome}
                    </div>
                    <div class='field'>
                        <strong>E-mail:</strong> {$email}
                    </div>
                    <div class='field'>
                        <strong>Assunto:</strong> {$assunto_nome}
                    </div>
                    <div class='field'>
                        <strong>Mensagem:</strong><br>
                        " . nl2br(htmlspecialchars($mensagem)) . "
                    </div>
                    <div class='field'>
                        <strong>Data/Hora:</strong> " . date('d/m/Y H:i:s') . "
                    </div>
                    <div class='field'>
                        <strong>IP do Remetente:</strong> " . $_SERVER['REMOTE_ADDR'] . "
                    </div>
                </div>
                <div class='footer'>
                    <p>Esta mensagem foi enviada através do formulário de contato do App de Emprego.</p>
                    <p>Para responder, use o e-mail: {$email}</p>
                </div>
            </div>
        </body>
        </html>
        ";
        
        // Configurar headers do email
        $headers = array();
        $headers[] = "MIME-Version: 1.0";
        $headers[] = "Content-type: text/html; charset=UTF-8";
        $headers[] = "From: {$nome} <{$email}>";
        $headers[] = "Reply-To: {$email}";
        $headers[] = "X-Mailer: PHP/" . phpversion();
        
        // Tentar enviar o email
        if (mail($destinatario, $assunto_site, $corpo_email, implode("\r\n", $headers))) {
            $sucesso = "Mensagem enviada com sucesso! Entraremos em contato em breve.";
        } else {
            $erro = "Erro ao enviar mensagem. Por favor, tente novamente ou entre em contato diretamente pelo e-mail.";
        }
    }
}

// Redirecionar de volta para a página de contato com mensagem
$redirect_url = "contato.php";
if (isset($erro)) {
    $redirect_url .= "?erro=" . urlencode($erro);
} elseif (isset($sucesso)) {
    $redirect_url .= "?sucesso=" . urlencode($sucesso);
}

header("Location: " . $redirect_url);
exit();
?> 