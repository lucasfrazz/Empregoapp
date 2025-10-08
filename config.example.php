<?php
/**
 * Arquivo de Configuração de Exemplo
 * 
 * INSTRUÇÕES:
 * 1. Copie este arquivo para 'config.php'
 * 2. Configure suas informações pessoais
 * 3. NUNCA faça commit do arquivo config.php para o Git
 */

// Configurações de Email
define('EMAIL_DESTINATARIO', 'seu-email@exemplo.com');
define('EMAIL_ASSUNTO_SITE', 'App de Emprego - Nova Mensagem de Contato');

// Configurações de Contato
define('CONTATO_EMAIL', 'seu-email@exemplo.com');
define('CONTATO_TELEFONE', '(XX) XXXXX-XXXX');
define('CONTATO_ENDERECO', 'Sua Cidade, UF - Brasil');
define('CONTATO_HORARIO', 'Segunda a Sexta: 9h às 18h');

// Configurações de Segurança
define('CSRF_TOKEN_LIFETIME', 3600); // 1 hora em segundos
define('MAX_MESSAGE_LENGTH', 1000);
define('MAX_NAME_LENGTH', 100);
define('MAX_EMAIL_LENGTH', 100);
define('MAX_SUBJECT_LENGTH', 50);

// Configurações de Log
define('LOG_DIR', 'logs');
define('LOG_FILE_PREFIX', 'contatos_');
define('LOG_RETENTION_DAYS', 30); // Manter logs por 30 dias

// Configurações de Validação
define('ALLOWED_SUBJECTS', [
    'duvida' => 'Dúvida sobre o App',
    'sugestao' => 'Sugestão',
    'parceria' => 'Proposta de Parceria',
    'suporte' => 'Suporte Técnico',
    'outro' => 'Outro'
]);

// Configurações de Email (SMTP - Opcional)
define('SMTP_HOST', 'smtp.exemplo.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'seu-email@exemplo.com');
define('SMTP_PASSWORD', 'sua-senha');
define('SMTP_ENCRYPTION', 'tls'); // ou 'ssl'

// Configurações de Segurança Adicional
define('RATE_LIMIT_ENABLED', true);
define('RATE_LIMIT_MAX_ATTEMPTS', 5); // Máximo de tentativas por IP
define('RATE_LIMIT_TIME_WINDOW', 300); // 5 minutos em segundos

// Configurações de Debug (apenas para desenvolvimento)
define('DEBUG_MODE', false);
define('LOG_ERRORS', true);
define('ERROR_LOG_FILE', 'error.log');
?>
