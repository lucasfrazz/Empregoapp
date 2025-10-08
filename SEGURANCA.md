# 🔒 Guia de Segurança - App de Emprego

## ⚠️ IMPORTANTE: Configurações de Segurança

### 1. Configuração Inicial

**ANTES de usar o projeto em produção:**

1. **Copie o arquivo de configuração:**
   ```bash
   cp config.example.php config.php
   ```

2. **Configure suas informações pessoais no `config.php`:**
   - Email de destino
   - Informações de contato
   - Configurações de SMTP (se necessário)

3. **NUNCA faça commit do arquivo `config.php` para o Git!**

### 2. Medidas de Segurança Implementadas

#### ✅ Proteção contra XSS (Cross-Site Scripting)
- Sanitização de todos os inputs com `strip_tags()`
- Escape de output com `htmlspecialchars()`
- Validação de caracteres permitidos

#### ✅ Proteção contra CSRF (Cross-Site Request Forgery)
- Tokens CSRF únicos por sessão
- Verificação de token em formulários
- Regeneração automática de tokens

#### ✅ Validação e Sanitização de Dados
- Validação de email com `filter_var()`
- Limitação de tamanho dos campos
- Validação de caracteres permitidos no nome
- Sanitização de email com `FILTER_SANITIZE_EMAIL`

#### ✅ Proteção de Arquivos Sensíveis
- Arquivo `.gitignore` configurado
- Logs não versionados
- Configurações sensíveis protegidas

### 3. Configurações Recomendadas

#### Configuração do Servidor Web

```apache
# .htaccess (Apache)
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
```

#### Configuração PHP

```ini
# php.ini
expose_php = Off
display_errors = Off
log_errors = On
error_log = /path/to/error.log
session.cookie_httponly = 1
session.cookie_secure = 1
session.use_strict_mode = 1
```

### 4. Monitoramento e Logs

#### Logs de Segurança
- Todas as mensagens de contato são logadas
- IPs dos remetentes são registrados
- Timestamps precisos para auditoria

#### Limpeza de Logs
- Configure limpeza automática de logs antigos
- Mantenha apenas logs necessários
- Use rotação de logs

### 5. Checklist de Segurança

- [ ] Configurar `config.php` com suas informações
- [ ] Testar envio de emails
- [ ] Verificar proteção CSRF
- [ ] Configurar `.htaccess` (Apache) ou equivalente
- [ ] Configurar logs de erro do PHP
- [ ] Testar validação de formulários
- [ ] Verificar permissões de arquivos
- [ ] Configurar backup dos logs
- [ ] Implementar autenticação para `ver-mensagens.php` (recomendado)

### 6. Autenticação Adicional (Recomendado)

Para maior segurança, implemente autenticação para acessar `ver-mensagens.php`:

```php
// Adicione no início de ver-mensagens.php
session_start();

// Verificação de autenticação simples
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // Redirecionar para página de login ou mostrar erro
    header('Location: login.php');
    exit();
}
```

### 7. Backup e Recuperação

- Faça backup regular dos logs
- Mantenha cópias de segurança do `config.php`
- Documente suas configurações

### 8. Atualizações de Segurança

- Mantenha o PHP atualizado
- Monitore logs de erro
- Revise configurações periodicamente
- Teste funcionalidades após atualizações

---

## 🚨 Avisos Importantes

1. **NUNCA** compartilhe o arquivo `config.php`
2. **SEMPRE** teste em ambiente de desenvolvimento primeiro
3. **MONITORE** logs regularmente
4. **MANTENHA** o sistema atualizado
5. **CONFIGURE** autenticação para áreas administrativas

---

## 📞 Suporte

Em caso de dúvidas sobre segurança, consulte:
- Documentação oficial do PHP
- Guias de segurança web
- Especialistas em segurança

**Lembre-se: Segurança é responsabilidade de todos!**
