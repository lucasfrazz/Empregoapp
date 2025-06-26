document.addEventListener('DOMContentLoaded', function() {
    // Elementos dos cards
    const cards = document.querySelectorAll('.card');
    const cardsContainer = document.querySelector('.cards-container');
    let currentCardIndex = 0;
    let isAnimating = false;

    // Função para mostrar o próximo card
    function showNextCard() {
        if (isAnimating) return;
        isAnimating = true;

        const currentCard = cards[currentCardIndex];
        const nextCard = cards[(currentCardIndex + 1) % cards.length];

        // Animar saída do card atual
        currentCard.style.transform = 'translateX(-100%) rotate(-20deg)';
        currentCard.style.opacity = '0';
        currentCard.classList.remove('active');

        setTimeout(() => {
            // Resetar posição do card atual
            currentCard.style.transform = 'translateX(100%) rotate(20deg)';
            currentCard.style.opacity = '0';
            
            // Mostrar próximo card
            nextCard.style.transform = 'translateX(0) rotate(0deg)';
            nextCard.style.opacity = '1';
            nextCard.classList.add('active');
            
            currentCardIndex = (currentCardIndex + 1) % cards.length;
            isAnimating = false;
        }, 300);
    }

    // Função para mostrar o card anterior
    function showPreviousCard() {
        if (isAnimating) return;
        isAnimating = true;

        const currentCard = cards[currentCardIndex];
        const previousCard = cards[(currentCardIndex - 1 + cards.length) % cards.length];

        // Animar saída do card atual
        currentCard.style.transform = 'translateX(100%) rotate(20deg)';
        currentCard.style.opacity = '0';
        currentCard.classList.remove('active');

        setTimeout(() => {
            // Resetar posição do card atual
            currentCard.style.transform = 'translateX(-100%) rotate(-20deg)';
            currentCard.style.opacity = '0';
            
            // Mostrar card anterior
            previousCard.style.transform = 'translateX(0) rotate(0deg)';
            previousCard.style.opacity = '1';
            previousCard.classList.add('active');
            
            currentCardIndex = (currentCardIndex - 1 + cards.length) % cards.length;
            isAnimating = false;
        }, 300);
    }

    // Event listeners para os botões
    document.querySelectorAll('.btn-like').forEach(btn => {
        btn.addEventListener('click', function() {
            const card = this.closest('.card');
            card.style.transform = 'translateX(100%) rotate(20deg)';
            card.style.opacity = '0';
            
            setTimeout(() => {
                showNextCard();
            }, 300);
        });
    });

    document.querySelectorAll('.btn-dislike').forEach(btn => {
        btn.addEventListener('click', function() {
            const card = this.closest('.card');
            card.style.transform = 'translateX(-100%) rotate(-20deg)';
            card.style.opacity = '0';
            
            setTimeout(() => {
                showNextCard();
            }, 300);
        });
    });

    // Touch/swipe functionality
    let startX = 0;
    let startY = 0;
    let endX = 0;
    let endY = 0;

    cardsContainer.addEventListener('touchstart', function(e) {
        startX = e.touches[0].clientX;
        startY = e.touches[0].clientY;
    });

    cardsContainer.addEventListener('touchend', function(e) {
        endX = e.changedTouches[0].clientX;
        endY = e.changedTouches[0].clientY;
        
        const diffX = startX - endX;
        const diffY = startY - endY;
        
        // Verificar se é um swipe horizontal
        if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > 50) {
            if (diffX > 0) {
                // Swipe para esquerda (dislike)
                const currentCard = cards[currentCardIndex];
                currentCard.style.transform = 'translateX(-100%) rotate(-20deg)';
                currentCard.style.opacity = '0';
                
                setTimeout(() => {
                    showNextCard();
                }, 300);
            } else {
                // Swipe para direita (like)
                const currentCard = cards[currentCardIndex];
                currentCard.style.transform = 'translateX(100%) rotate(20deg)';
                currentCard.style.opacity = '0';
                
                setTimeout(() => {
                    showNextCard();
                }, 300);
            }
        }
    });

    // Mouse drag functionality
    let isDragging = false;
    let dragStartX = 0;
    let dragStartY = 0;

    cardsContainer.addEventListener('mousedown', function(e) {
        isDragging = true;
        dragStartX = e.clientX;
        dragStartY = e.clientY;
    });

    cardsContainer.addEventListener('mousemove', function(e) {
        if (!isDragging) return;
        
        const currentCard = cards[currentCardIndex];
        const diffX = e.clientX - dragStartX;
        const diffY = e.clientY - dragStartY;
        
        // Aplicar transformação baseada no drag
        const rotation = (diffX / 10) * (diffX > 0 ? 1 : -1);
        currentCard.style.transform = `translateX(${diffX}px) rotate(${rotation}deg)`;
        currentCard.style.opacity = Math.max(0.5, 1 - Math.abs(diffX) / 200);
    });

    cardsContainer.addEventListener('mouseup', function(e) {
        if (!isDragging) return;
        
        isDragging = false;
        const diffX = e.clientX - dragStartX;
        const currentCard = cards[currentCardIndex];
        
        if (Math.abs(diffX) > 100) {
            // Swipe detectado
            if (diffX > 0) {
                // Swipe para direita (like)
                currentCard.style.transform = 'translateX(100%) rotate(20deg)';
                currentCard.style.opacity = '0';
                
                setTimeout(() => {
                    showNextCard();
                }, 300);
            } else {
                // Swipe para esquerda (dislike)
                currentCard.style.transform = 'translateX(-100%) rotate(-20deg)';
                currentCard.style.opacity = '0';
                
                setTimeout(() => {
                    showNextCard();
                }, 300);
            }
        } else {
            // Resetar posição
            currentCard.style.transform = 'translateX(0) rotate(0deg)';
            currentCard.style.opacity = '1';
        }
    });

    // Smooth scrolling para links do dropdown
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Animação de entrada dos cards
    function initializeCards() {
        cards.forEach((card, index) => {
            if (index === 0) {
                card.style.transform = 'translateX(0) rotate(0deg)';
                card.style.opacity = '1';
                card.classList.add('active');
            } else {
                card.style.transform = 'translateX(100%) rotate(20deg)';
                card.style.opacity = '0';
                card.classList.remove('active');
            }
        });
    }

    // Inicializar cards
    initializeCards();

    // Auto-play dos cards (opcional)
    let autoPlayInterval;
    
    function startAutoPlay() {
        autoPlayInterval = setInterval(() => {
            if (!isDragging && !isAnimating) {
                showNextCard();
            }
        }, 5000); // Trocar card a cada 5 segundos
    }
    
    function stopAutoPlay() {
        clearInterval(autoPlayInterval);
    }
    
    // Pausar auto-play quando o mouse está sobre os cards
    cardsContainer.addEventListener('mouseenter', stopAutoPlay);
    cardsContainer.addEventListener('mouseleave', startAutoPlay);
    
    // Iniciar auto-play
    startAutoPlay();

    // Efeito de parallax no background
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const background = document.querySelector('.background-image');
        const rate = scrolled * -0.5;
        background.style.transform = `translateY(${rate}px)`;
    });

    // Animação de entrada dos elementos
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observar seções para animação
    document.querySelectorAll('.section').forEach(section => {
        section.style.opacity = '0';
        section.style.transform = 'translateY(50px)';
        section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(section);
    });

    // Funcionalidade do formulário de contato
    const contactForm = document.querySelector('.contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Pegar os valores do formulário
            const formData = new FormData(this);
            const nome = formData.get('nome');
            const email = formData.get('email');
            const assunto = formData.get('assunto');
            const mensagem = formData.get('mensagem');
            
            // Validação básica
            if (!nome || !email || !assunto || !mensagem) {
                alert('Por favor, preencha todos os campos obrigatórios.');
                return;
            }
            
            // Simular envio (em um projeto real, aqui seria feita uma requisição AJAX)
            alert('Mensagem enviada com sucesso! Entraremos em contato em breve.');
            
            // Limpar formulário
            this.reset();
        });
    }

    // Funcionalidade para destacar a página atual no menu
    const currentPage = window.location.pathname.split('/').pop();
    const menuLinks = document.querySelectorAll('.dropdown-content a');
    
    menuLinks.forEach(link => {
        const linkPage = link.getAttribute('href');
        if (linkPage === currentPage) {
            link.style.backgroundColor = '#667eea';
            link.style.color = 'white';
        }
    });

    // Funcionalidade do carrossel de empresas
    const carouselTrack = document.querySelector('.carousel-track');
    if (carouselTrack) {
        // Pausar animação quando o mouse está sobre o carrossel
        carouselTrack.addEventListener('mouseenter', function() {
            this.style.animationPlayState = 'paused';
        });
        
        carouselTrack.addEventListener('mouseleave', function() {
            this.style.animationPlayState = 'running';
        });
        
        // Adicionar controles de navegação (opcional)
        const companiesSection = document.querySelector('.companies-section');
        if (companiesSection) {
            // Adicionar indicadores de progresso
            const progressBar = document.createElement('div');
            progressBar.className = 'carousel-progress';
            progressBar.style.cssText = `
                position: absolute;
                bottom: 10px;
                left: 50%;
                transform: translateX(-50%);
                width: 100px;
                height: 4px;
                background: rgba(102, 126, 234, 0.3);
                border-radius: 2px;
                overflow: hidden;
            `;
            
            const progressFill = document.createElement('div');
            progressFill.style.cssText = `
                height: 100%;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                border-radius: 2px;
                animation: progress 30s linear infinite;
            `;
            
            progressBar.appendChild(progressFill);
            companiesSection.appendChild(progressBar);
            
            // Pausar progresso quando o carrossel é pausado
            carouselTrack.addEventListener('mouseenter', function() {
                progressFill.style.animationPlayState = 'paused';
            });
            
            carouselTrack.addEventListener('mouseleave', function() {
                progressFill.style.animationPlayState = 'running';
            });
        }
    }
    
    // Adicionar keyframes para a barra de progresso
    const style = document.createElement('style');
    style.textContent = `
        @keyframes progress {
            0% { width: 0%; }
            100% { width: 100%; }
        }
    `;
    document.head.appendChild(style);

    // Carregar empresas no carrossel
    const companiesCarousel = document.getElementById('companies-carousel');
    if (companiesCarousel) {
        const companies = [
            { name: 'Google', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/2560px-Google_2015_logo.svg.png' },
            { name: 'Microsoft', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/Microsoft_logo_%282012%29.svg/2560px-Microsoft_logo_%282012%29.svg.png' },
            { name: 'Apple', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Apple_logo.svg/2560px-Apple_logo.svg.png' },
            { name: 'Amazon', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Amazon_logo.svg/2560px-Amazon_logo.svg.png' },
            { name: 'IBM', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/IBM_logo.svg/2560px-IBM_logo.svg.png' },
            { name: 'Intel', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/Intel_logo_%282020%2C_light_blue%29.svg/2560px-Intel_logo_%282020%2C_light_blue%29.svg.png' },
            { name: 'Adobe', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Adobe_Systems_logo.svg/2560px-Adobe_Systems_logo.svg.png' },
            { name: 'SAP', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/SAP_2011_logo.svg/2560px-SAP_2011_logo.svg.png' },
            { name: 'Nike', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Nike_logo.svg/2560px-Nike_logo.svg.png' },
            { name: 'Adidas', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/Adidas_Logo.svg/2560px-Adidas_Logo.svg.png' },
            { name: 'Netflix', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/Netflix_logo.svg/2560px-Netflix_logo.svg.png' },
            { name: 'Spotify', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/08/Spotify_logo.svg/2560px-Spotify_logo.svg.png' },
            { name: 'Tesla', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Tesla_Motors_logo.svg/2560px-Tesla_Motors_logo.svg.png' },
            { name: 'BMW', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/BMW.svg/2560px-BMW.svg.png' },
            { name: 'McDonald\'s', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/McDonald%27s_logo.svg/2560px-McDonald%27s_logo.svg.png' },
            { name: 'Coca-Cola', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Coca-Cola_logo.svg/2560px-Coca-Cola_logo.svg.png' },
            { name: 'Steam', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Steam_icon_logo.svg/2560px-Steam_icon_logo.svg.png' },
            { name: 'LinkedIn', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/01/LinkedIn_Logo.svg/2560px-LinkedIn_Logo.svg.png' }
        ];

        // Duplicar empresas para criar o efeito infinito
        const duplicatedCompanies = [...companies, ...companies];
        
        // Gerar HTML do carrossel
        const carouselHTML = duplicatedCompanies.map(company => `
            <div class="company-logo">
                <img src="${company.logo}" alt="${company.name}" onerror="this.style.display='none'">
            </div>
        `).join('');
        
        companiesCarousel.innerHTML = carouselHTML;
    }
}); 