@echo off
REM chcp 65001 > nul
echo ========================================
echo    ATUALIZADOR DO APP DE EMPREGO
echo ========================================
echo.
echo Configurando repositorio remoto...
git remote remove origin 2>nul
git remote add origin https://github.com/spacepenapp/Empregoapp.git
echo.
echo Verificando status do repositorio...
git status
echo.
echo Adicionando arquivos...
git add .
echo.
echo Fazendo commit...
git commit -m "atualizacao automatica: %date% %time%"
echo.
echo Enviando para GitHub...
git push -u origin main --force
if %errorlevel% neq 0 (
    echo Tentando com branch master...
    git push -u origin master --force
)
echo.
echo ========================================
echo    ATUALIZACAO CONCLUIDA!
echo ========================================
echo.
echo [SUCESSO] Projeto atualizado no GitHub!

pause
