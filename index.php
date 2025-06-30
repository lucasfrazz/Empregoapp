<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App de Emprego</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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


    
    <!-- Seção principal com imagem de fundo -->
    <main class="hero-section">
        <div class="background-image">
            <div class="overlay"></div>
        </div>
        
        <div class="hero-content">
            <div class="person-phone">
                <div class="phone-container">
                    <div class="phone-screen">
                        <div class="cards-container">
                            <div class="card active">
                                <div class="card-content">
                                    <h3>Vagas de Desenvolvedor</h3>
                                    <p>Encontre as melhores oportunidades na área de tecnologia</p>
                                    <div class="card-actions">
                                        <button class="btn-like"><i class="fas fa-heart"></i></button>
                                        <button class="btn-dislike"><i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card">
                                <div class="card-content">
                                    <h3>Analista de Marketing</h3>
                                    <p>Empresa líder no setor busca profissional experiente</p>
                                    <div class="card-actions">
                                        <button class="btn-like"><i class="fas fa-heart"></i></button>
                                        <button class="btn-dislike"><i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card">
                                <div class="card-content">
                                    <h3>Designer UX/UI</h3>
                                    <p>Projete experiências incríveis para milhões de usuários</p>
                                    <div class="card-actions">
                                        <button class="btn-like"><i class="fas fa-heart"></i></button>
                                        <button class="btn-dislike"><i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card">
                                <div class="card-content">
                                    <h3>Gerente de Projetos</h3>
                                    <p>Lidere equipes e entregue resultados excepcionais</p>
                                    <div class="card-actions">
                                        <button class="btn-like"><i class="fas fa-heart"></i></button>
                                        <button class="btn-dislike"><i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="hero-text">
                <h1>Encontre seu emprego dos sonhos</h1>
                <p>Deslize para direita para curtir, esquerda para pular. Encontre a vaga perfeita para você!</p>
                <button class="cta-button">Começar Agora</button>
            </div>
        </div>
    </main>

    <!-- Seção de Empresas Parceiras -->
    <section class="companies-section">
        <div class="container">
            <div class="companies-content">
                <h2>Onde Nossos Usuarios podem encontar Emprego </h2>
                <p>Conectamos você às melhores empresas do mercado</p>
                <div class="companies-grid">
                    <div class="companies-carousel">
                        <div class="carousel-track" id="companies-carousel">
                            <!-- Empresas serão carregadas via JavaScript -->
                        </div>
                    </div>
                </div>
                <div class="companies-stats">
                    <div class="stat-item">
                        <span class="stat-number">500+</span>
                        <span class="stat-label">Empresas Parceiras</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">10k+</span>
                        <span class="stat-label">Vagas Disponíveis</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">50k+</span>
                        <span class="stat-label">Candidatos Contratados</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção de Redes Sociais -->
    <section class="social-section">
        <div class="container">
            <div class="social-content">
                <h2>Conecte-se Conosco</h2>
                <p>Siga-nos nas redes sociais e fique por dentro de tudo que acontece!</p>
                <div class="social-links-main">
                    <a href="#" class="social-link-main">
                        <i class="fab fa-linkedin"></i>
                        <span>LinkedIn</span>
                    </a>
                    <a href="#" class="social-link-main">
                        <i class="fab fa-facebook"></i>
                        <span>Facebook</span>
                    </a>
                    <a href="#" class="social-link-main">
                        <i class="fab fa-instagram"></i>
                        <span>Instagram</span>
                    </a>
                    <a href="#" class="social-link-main">
                        <i class="fab fa-twitter"></i>
                        <span>Twitter</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <script src="script.js"></script>
</body>
</html> 