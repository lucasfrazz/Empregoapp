# 🚀 Guia de Instalação - App de Emprego

## 📋 Pré-requisitos

- PHP 7.4 ou superior
- Servidor web (Apache, Nginx, etc.)
- Função `mail()` do PHP habilitada (ou configuração SMTP)

## 🔧 Instalação Passo a Passo

### 1. Download e Configuração

1. **Clone ou baixe o projeto:**
   ```bash
   git clone https://github.com/lucasfrazz/Empregoapp.git
   cd Empregoapp
   ```

2. **Configure as permissões:**
   ```bash
   chmod 755 logs/
   chmod 644 *.php
   ```

### 2. Configuração de Email

1. **Copie o arquivo de configuração:**
   ```bash
   cp config.example.php config.php
   ```

2. **Edite o arquivo `config.php` com suas informações:**
   ```php
   // Configure seu email
   define('EMAIL_DESTINATARIO', 'seu-email@exemplo.com');
   
   // Configure informações de contato
   define('CONTATO_EMAIL', 'seu-email@exemplo.com');
   define('CONTATO_TELEFONE', '(XX) XXXXX-XXXX');
   define('CONTATO_ENDERECO', 'Sua Cidade, UF - Brasil');
   ```

### 3. Configuração do Servidor Web

#### Para Apache (.htaccess)
Crie um arquivo `.htaccess` na raiz do projeto:

```apache
# Proteger arquivos sensíveis
<Files "config.php">
    Order Allow,Deny
    Deny from all
</Files>

<Files "*.log">
    Order Allow,Deny
    Deny from all
</Files>

# Proteger diretório de logs
<Directory "logs">
    Order Allow,Deny
    Deny from all
</Directory>

# Configurações de segurança
Header always set X-Content-Type-Options nosniff
Header always set X-Frame-Options DENY
Header always set X-XSS-Protection "1; mode=block"
```

#### Para Nginx
Adicione ao seu arquivo de configuração:

```nginx
location ~ /(config\.php|\.log|logs/) {
    deny all;
    return 404;
}
```

### 4. Configuração PHP

Edite seu `php.ini`:

```ini
# Configurações de segurança
expose_php = Off
display_errors = Off
log_errors = On
session.cookie_httponly = 1
session.cookie_secure = 1
session.use_strict_mode = 1

# Configurações de email
sendmail_path = /usr/sbin/sendmail -t -i
```

### 5. Teste da Instalação

1. **Acesse o site:**
   ```
   http://seu-dominio.com/
   ```

2. **Teste o formulário de contato:**
   - Preencha todos os campos
   - Envie uma mensagem de teste
   - Verifique se recebeu o email

3. **Verifique os logs:**
   - Acesse `ver-mensagens.php` (recomendado implementar autenticação)
   - Verifique se as mensagens estão sendo salvas

### 6. Configuração de Email (Opcional)

Se a função `mail()` não funcionar, configure SMTP:

```php
// No arquivo config.php
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'seu-email@gmail.com');
define('SMTP_PASSWORD', 'sua-senha-app');
define('SMTP_ENCRYPTION', 'tls');
```

### 7. Autenticação para Mensagens (Recomendado)

Para proteger `ver-mensagens.php`, crie um sistema de login simples:

1. **Crie `login.php`:**
   ```php
   <?php
   session_start();
   
   if ($_POST['username'] === 'admin' && $_POST['password'] === 'sua-senha') {
       $_SESSION['authenticated'] = true;
       header('Location: ver-mensagens.php');
   } else {
       echo "Credenciais inválidas";
   }
   ?>
   ```

2. **Modifique `ver-mensagens.php`:**
   ```php
   <?php
   session_start();
   
   if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
       header('Location: login.php');
       exit();
   }
   // ... resto do código
   ?>
   ```

## 🔒 Segurança

### Checklist de Segurança

- [ ] Configurar `config.php` com suas informações
- [ ] Testar envio de emails
- [ ] Verificar proteção CSRF
- [ ] Configurar `.htaccess` ou equivalente
- [ ] Configurar logs de erro do PHP
- [ ] Testar validação de formulários
- [ ] Verificar permissões de arquivos
- [ ] Implementar autenticação para `ver-mensagens.php`
- [ ] Configurar backup dos logs

### Arquivos Importantes

- `config.php` - **NUNCA** faça commit deste arquivo
- `logs/` - Diretório com mensagens de contato
- `.gitignore` - Protege arquivos sensíveis
- `SEGURANCA.md` - Guia completo de segurança

## 🚀 Deploy em Produção

### 1. Preparação

1. **Configure o domínio**
2. **Configure SSL/HTTPS**
3. **Configure backup automático**
4. **Configure monitoramento**

### 2. Configurações de Produção

```php
// config.php - Configurações de produção
define('DEBUG_MODE', false);
define('LOG_ERRORS', true);
define('RATE_LIMIT_ENABLED', true);
```

### 3. Monitoramento

- Monitore logs de erro
- Verifique emails enviados
- Monitore tentativas de acesso
- Faça backup regular dos logs

## 📞 Suporte

Para dúvidas sobre instalação:

1. Consulte `SEGURANCA.md` para questões de segurança
2. Verifique logs de erro do PHP
3. Teste em ambiente de desenvolvimento primeiro
4. Consulte documentação do PHP para configurações específicas

---

## ✅ Verificação Final

Após a instalação, verifique:

- [ ] Site carrega corretamente
- [ ] Formulário de contato funciona
- [ ] Emails são enviados
- [ ] Logs são criados
- [ ] Proteções de segurança ativas
- [ ] Arquivos sensíveis protegidos

**🎉 Parabéns! Seu App de Emprego está pronto para uso!**
