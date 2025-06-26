# App de Emprego - Página Web

Uma página web moderna e interativa criada com PHP e HTML, simulando um aplicativo de busca de emprego com interface de cards deslizantes.

## 🚀 Características

- **Design Responsivo**: Adaptável a diferentes tamanhos de tela
- **Cards Interativos**: Sistema de cards deslizantes similar ao Tinder
- **Imagem de Fundo**: Background com pessoa usando celular
- **Dropdown Menu**: Menu suspenso com opções de navegação
- **Animações Suaves**: Transições e efeitos visuais modernos
- **Funcionalidades Touch**: Suporte a gestos de swipe em dispositivos móveis

## 📁 Estrutura dos Arquivos

```
app de emprego/
├── index.php          # Página principal em PHP/HTML
├── styles.css         # Estilos CSS
├── script.js          # Funcionalidades JavaScript
└── README.md          # Este arquivo
```

## 🎯 Funcionalidades

### Cards Deslizantes
- **Swipe para direita**: "Curtir" a vaga
- **Swipe para esquerda**: "Pular" a vaga
- **Botões de ação**: Coração (like) e X (dislike)
- **Auto-play**: Troca automática de cards a cada 5 segundos
- **Drag & Drop**: Arrastar com o mouse para interagir

### Menu Dropdown
- **Quem Somos**: Informações sobre a empresa
- **O Que Fazemos**: Descrição dos serviços
- **Contato**: Informações de contato

### Efeitos Visuais
- **Parallax**: Efeito de profundidade no background
- **Animações de entrada**: Elementos aparecem com animação
- **Transições suaves**: Movimentos fluidos entre cards

## 🛠️ Como Executar

1. **Servidor Local**: Coloque os arquivos em um servidor web local (XAMPP, WAMP, etc.)
2. **Acesso**: Abra `http://localhost/caminho/para/pasta` no navegador
3. **Alternativa**: Abra o arquivo `index.php` diretamente no navegador

## 📱 Compatibilidade

- ✅ Desktop (Chrome, Firefox, Safari, Edge)
- ✅ Tablet (iPad, Android)
- ✅ Mobile (iPhone, Android)

## 🎨 Personalização

### Cores
As cores principais podem ser alteradas no arquivo `styles.css`:
- Gradiente principal: `#667eea` para `#764ba2`
- Cor de destaque: `#e74c3c` (vermelho para like)

### Conteúdo
- Edite o arquivo `index.php` para modificar textos e informações
- Adicione mais cards editando a seção `.cards-container`
- Personalize as seções "Quem Somos", "O Que Fazemos" e "Contato"

### Imagem de Fundo
A imagem de fundo está configurada via URL do Unsplash. Para usar uma imagem local:
1. Adicione sua imagem na pasta do projeto
2. Atualize o caminho no arquivo `styles.css` na classe `.background-image`

## 🔧 Tecnologias Utilizadas

- **HTML5**: Estrutura da página
- **CSS3**: Estilização e animações
- **JavaScript**: Interatividade e funcionalidades
- **PHP**: Processamento do lado do servidor
- **Font Awesome**: Ícones
- **Google Fonts**: Tipografia

## 📞 Suporte

Para dúvidas ou sugestões, entre em contato através das informações disponíveis na seção "Contato" da página.

---

Desenvolvido com ❤️ para facilitar a busca de emprego de forma moderna e interativa. 