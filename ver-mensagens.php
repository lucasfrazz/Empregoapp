<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensagens de Contato - App de Emprego</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .messages-container {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        
        .message-item {
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            background: #f9f9f9;
            transition: all 0.3s ease;
        }
        
        .message-item:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }
        
        .message-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .message-info {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }
        
        .message-info span {
            background: #667eea;
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .message-date {
            color: #666;
            font-size: 14px;
        }
        
        .message-content {
            line-height: 1.6;
        }
        
        .message-content strong {
            color: #667eea;
        }
        
        .no-messages {
            text-align: center;
            padding: 50px;
            color: #666;
        }
        
        .no-messages i {
            font-size: 48px;
            color: #ddd;
            margin-bottom: 20px;
        }
        
        .back-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 25px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }
        
        .back-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .message-actions {
            margin-top: 15px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        
        .btn-responder {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 20px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .btn-responder:hover {
            transform: translateY(-1px);
            box-shadow: 0 3px 10px rgba(76, 175, 80, 0.4);
        }
        
        .btn-copiar {
            background: linear-gradient(135deg, #2196F3 0%, #1976D2 100%);
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 20px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .btn-copiar:hover {
            transform: translateY(-1px);
            box-shadow: 0 3px 10px rgba(33, 150, 243, 0.4);
        }
        
        .btn-copiar.copied {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
        }
    </style>
</head>
<body>
    <!-- Header com dropdown menu -->
    <header class="header">
        <div class="container">
            <nav class="nav">
                <div class="dropdown">
                    <button class="dropdown-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                        </svg>
                    </button>
                    <div class="dropdown-content">
                        <a href="quem-somos.php">Quem Somos</a>
                        <a href="o-que-fazemos.php">O Que Fazemos</a>
                        <a href="contato.php">Contato</a>
                    </div>
                </div>
            </nav>
            <div class="logo">
                <h2><a href="index.php" style="text-decoration: none; color: inherit;">App de Emprego</a></h2>
            </div>
        </div>
    </header>

    <!-- Seção principal -->
    <main class="page-content">
        <div class="container">
            <section class="section">
                <a href="contato.php" class="back-btn">
                    <i class="fas fa-arrow-left"></i>
                    Voltar ao Contato
                </a>
                
                <h1>📧 Mensagens de Contato</h1>
                <p>Visualize todas as mensagens recebidas através do formulário de contato.</p>
                
                <div class="messages-container">
                    <?php
                    $logs_dir = 'logs';
                    $messages = [];
                    
                    if (file_exists($logs_dir)) {
                        $files = glob($logs_dir . '/contatos_*.json');
                        
                        foreach ($files as $file) {
                            $file_data = json_decode(file_get_contents($file), true);
                            if ($file_data) {
                                $messages = array_merge($messages, $file_data);
                            }
                        }
                        
                        // Ordenar por data (mais recente primeiro)
                        usort($messages, function($a, $b) {
                            return strtotime($b['data']) - strtotime($a['data']);
                        });
                    }
                    
                    if (empty($messages)): ?>
                        <div class="no-messages">
                            <i class="fas fa-inbox"></i>
                            <h3>Nenhuma mensagem encontrada</h3>
                            <p>Ainda não há mensagens de contato salvas.</p>
                        </div>
                    <?php else: ?>
                        <?php foreach ($messages as $message): ?>
                            <div class="message-item">
                                <div class="message-header">
                                    <div class="message-info">
                                        <span><i class="fas fa-user"></i> <?php echo htmlspecialchars($message['nome']); ?></span>
                                        <span><i class="fas fa-envelope"></i> <?php echo htmlspecialchars($message['email']); ?></span>
                                        <span><i class="fas fa-tag"></i> <?php echo htmlspecialchars($message['assunto']); ?></span>
                                        <span><i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($message['ip']); ?></span>
                                    </div>
                                    <div class="message-date">
                                        <i class="fas fa-clock"></i>
                                        <?php echo date('d/m/Y H:i', strtotime($message['data'])); ?>
                                    </div>
                                </div>
                                <div class="message-content">
                                    <strong>Mensagem:</strong><br>
                                    <?php echo nl2br(htmlspecialchars($message['mensagem'])); ?>
                                </div>
                                
                                <div class="message-actions">
                                    <a href="mailto:<?php echo htmlspecialchars($message['email']); ?>?subject=Re: <?php echo urlencode($message['assunto']); ?>" class="btn-responder">
                                        <i class="fas fa-reply"></i>
                                        Responder
                                    </a>
                                    <button class="btn-copiar" onclick="copiarEmail('<?php echo htmlspecialchars($message['email']); ?>', this)">
                                        <i class="fas fa-copy"></i>
                                        Copiar Email
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </section>
        </div>
    </main>

    <script src="script.js"></script>
    <script>
        function copiarEmail(email, button) {
            // Criar elemento temporário para copiar
            const tempInput = document.createElement('input');
            tempInput.value = email;
            document.body.appendChild(tempInput);
            tempInput.select();
            tempInput.setSelectionRange(0, 99999); // Para dispositivos móveis
            
            try {
                // Copiar o texto
                document.execCommand('copy');
                
                // Feedback visual
                const originalText = button.innerHTML;
                button.innerHTML = '<i class="fas fa-check"></i> Copiado!';
                button.classList.add('copied');
                
                // Restaurar após 2 segundos
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.classList.remove('copied');
                }, 2000);
                
            } catch (err) {
                console.error('Erro ao copiar:', err);
                alert('Erro ao copiar email. Email: ' + email);
            }
            
            // Remover elemento temporário
            document.body.removeChild(tempInput);
        }
        
        // Adicionar funcionalidade de copiar usando Clipboard API moderna (se disponível)
        if (navigator.clipboard) {
            // Substituir função se Clipboard API estiver disponível
            window.copiarEmail = async function(email, button) {
                try {
                    await navigator.clipboard.writeText(email);
                    
                    // Feedback visual
                    const originalText = button.innerHTML;
                    button.innerHTML = '<i class="fas fa-check"></i> Copiado!';
                    button.classList.add('copied');
                    
                    // Restaurar após 2 segundos
                    setTimeout(() => {
                        button.innerHTML = originalText;
                        button.classList.remove('copied');
                    }, 2000);
                    
                } catch (err) {
                    console.error('Erro ao copiar:', err);
                    // Fallback para método antigo
                    const tempInput = document.createElement('input');
                    tempInput.value = email;
                    document.body.appendChild(tempInput);
                    tempInput.select();
                    document.execCommand('copy');
                    document.body.removeChild(tempInput);
                    
                    alert('Email copiado: ' + email);
                }
            };
        }
    </script>
</body>
</html> 