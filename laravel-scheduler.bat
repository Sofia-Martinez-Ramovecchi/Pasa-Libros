@echo off
cd C:\xampp\htdocs\Pasa-Libros
echo Ejecutando php artisan schedule:run...
php artisan schedule:run >> scheduler.log 2>&1
echo Comando ejecutado.
pause