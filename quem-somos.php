<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quem Somos - App de Emprego</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .about-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 80px 0;
            text-align: center;
            margin-bottom: 60px;
        }
        
        .about-hero h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .about-hero p {
            font-size: 1.3rem;
            max-width: 800px;
            margin: 0 auto;
            opacity: 0.9;
        }
        
        .stats-section {
            background: #f8f9fa;
            padding: 60px 0;
            margin: 60px 0;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        
        .stat-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        
        .stat-card i {
            font-size: 3rem;
            color: #667eea;
            margin-bottom: 15px;
        }
        
        .stat-card h3 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 10px;
        }
        
        .stat-card p {
            color: #666;
            font-weight: 500;
        }
        
        .content-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin: 60px 0;
        }
        
        .content-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(102, 126, 234, 0.1);
        }
        
        .content-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
        }
        
        .content-card h3 {
            color: #667eea;
            font-size: 1.8rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .content-card h3 i {
            font-size: 2rem;
        }
        
        .content-card p {
            color: #555;
            line-height: 1.8;
            margin-bottom: 20px;
        }
        
        .values-list {
            list-style: none;
            padding: 0;
        }
        
        .values-list li {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            margin-bottom: 15px;
            padding: 20px;
            border-radius: 10px;
            border-left: 4px solid #667eea;
            transition: transform 0.3s ease;
        }
        
        .values-list li:hover {
            transform: translateX(10px);
        }
        
        .values-list strong {
            color: #667eea;
            font-size: 1.1rem;
        }
        
        .team-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 80px 0;
            margin: 60px 0;
            border-radius: 20px;
        }
        
        .team-content {
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .team-content h3 {
            font-size: 2.5rem;
            margin-bottom: 30px;
        }
        
        .team-content p {
            font-size: 1.2rem;
            line-height: 1.8;
            opacity: 0.9;
        }
        
        .team-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            opacity: 0.8;
        }
        
        @media (max-width: 768px) {
            .about-hero h1 {
                font-size: 2.5rem;
            }
            
            .content-cards {
                grid-template-columns: 1fr;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
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
                        Menu <i class="fas fa-chevron-down"></i>
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

    <!-- Hero Section -->
    <section class="about-hero">
        <div class="container">
            <h1>Quem Somos</h1>
            <p>Somos uma plataforma inovadora que conecta talentos às melhores oportunidades de emprego. Nossa missão é transformar a forma como as pessoas encontram e se candidatam a vagas, tornando o processo mais simples, eficiente e gratificante.</p>
        </div>
    </section>

    <!-- Estatísticas -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-card">
                    <i class="fas fa-users"></i>
                    <h3>50k+</h3>
                    <p>Candidatos Contratados</p>
                </div>
                <div class="stat-card">
                    <i class="fas fa-building"></i>
                    <h3>500+</h3>
                    <p>Empresas Parceiras</p>
                </div>
                <div class="stat-card">
                    <i class="fas fa-briefcase"></i>
                    <h3>10k+</h3>
                    <p>Vagas Disponíveis</p>
                </div>
                <div class="stat-card">
                    <i class="fas fa-star"></i>
                    <h3>98%</h3>
                    <p>Satisfação dos Usuários</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Conteúdo Principal -->
    <main class="page-content">
        <div class="container">
            <div class="content-cards">
                <div class="content-card">
                    <h3><i class="fas fa-history"></i>Nossa História</h3>
                    <p>Fundada em 2025, nossa empresa nasceu da necessidade de modernizar o processo de busca por emprego. Percebemos que as plataformas tradicionais eram complexas e pouco intuitivas, então criamos uma solução que combina simplicidade com tecnologia avançada.</p>
                    <p>Desde o início, nosso objetivo foi claro: criar uma experiência que fosse tão natural quanto usar um aplicativo de relacionamento, mas focada em conectar pessoas às suas oportunidades profissionais ideais.</p>
                </div>
                
                <div class="content-card">
                    <h3><i class="fas fa-heart"></i>Nossos Valores</h3>
                    <ul class="values-list">
                        <li><strong>Inovação:</strong> Sempre buscamos as melhores tecnologias para melhorar a experiência do usuário</li>
                        <li><strong>Transparência:</strong> Acreditamos em processos claros e honestos</li>
                        <li><strong>Eficiência:</strong> Otimizamos cada etapa para economizar seu tempo</li>
                        <li><strong>Qualidade:</strong> Conectamos apenas as melhores oportunidades</li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <!-- Seção da Equipe -->
    <section class="team-section">
        <div class="container">
            <div class="team-content">
                <div class="team-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Nossa Equipe</h3>
                <p>Contamos com uma equipe multidisciplinar de especialistas em tecnologia, recursos humanos e experiência do usuário, todos comprometidos em criar a melhor plataforma de busca por emprego do mercado.</p>
                <p>Nossa equipe combina anos de experiência em recrutamento com as mais recentes tecnologias de desenvolvimento, garantindo que cada funcionalidade seja pensada para maximizar suas chances de sucesso.</p>
            </div>
        </div>
    </section>

    <script src="script.js"></script>
</body>
</html> 