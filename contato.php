<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato - App de Emprego</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header com dropdown menu -->
    <header class="header">
        <div class="container">
            <div class="logo">
                <h2><a href="index.php" style="text-decoration: none; color: inherit;">App de Emprego</a></h2>
            </div>
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
        </div>
    </header>

    <!-- Seção principal -->
    <main class="page-content">
        <div class="container">
            <section class="section">
                <h1>Contato</h1>
                
                <!-- Mensagens de feedback -->
                <?php if (isset($_GET['sucesso'])): ?>
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i>
                        <?php echo htmlspecialchars($_GET['sucesso']); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (isset($_GET['erro'])): ?>
                    <div class="alert alert-error">
                        <i class="fas fa-exclamation-circle"></i>
                        <?php echo htmlspecialchars($_GET['erro']); ?>
                    </div>
                <?php endif; ?>
                
                <div class="content-wrapper">
                    <div class="contact-form-section">
                        <h3>Entre em Contato</h3>
                        <form class="contact-form" method="POST" action="enviar-contato.php">
                            <div class="form-group">
                                <label for="nome">Nome Completo</label>
                                <input type="text" id="nome" name="nome" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="assunto">Assunto</label>
                                <select id="assunto" name="assunto" required>
                                    <option value="">Selecione um assunto</option>
                                    <option value="duvida">Dúvida sobre o App</option>
                                    <option value="sugestao">Sugestão</option>
                                    <option value="parceria">Proposta de Parceria</option>
                                    <option value="suporte">Suporte Técnico</option>
                                    <option value="outro">Outro</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="mensagem">Mensagem</label>
                                <textarea id="mensagem" name="mensagem" rows="5" required></textarea>
                            </div>
                            
                            <button type="submit" class="submit-btn">Enviar Mensagem</button>
                        </form>
                    </div>
                    
                    <div class="contact-info-section">
                        <h3>Informações de Contato</h3>
                        <div class="contact-info">
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <div>
                                    <h4>E-mail</h4>
                                    <p>spacepenapp@gmail.com</p>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <div>
                                    <h4>Telefone</h4>
                                    <p>(11) 99999-9999</p>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <h4>Endereço</h4>
                                    <p>Brasilia, DF - Brasil</p>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <i class="fas fa-clock"></i>
                                <div>
                                    <h4>Horário de Atendimento</h4>
                                    <p>Segunda a Sexta: 9h às 18h</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="social-media">
                            <h4>Redes Sociais</h4>
                            <div class="social-links">
                                <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <script src="script.js"></script>
</body>
</html> 