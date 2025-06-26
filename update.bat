@echo off
REM chcp 65001 > nul
echo ========================================
echo    ATUALIZADOR DO APP DE EMPREGO
echo ========================================
echo.
echo Atualizando o repositorio...
git add .
git commit -m "atualizacao automatica: %date% %time%"
git pull origin main --allow-unrelated-histories
git push -u origin master
echo.
echo ========================================
echo    ATUALIZACAO CONCLUIDA!
echo ========================================
echo.
