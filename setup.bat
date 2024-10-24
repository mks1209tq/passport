@echo off
setlocal enabledelayedexpansion

echo Starting project setup...

set /p "repo_url=Enter the repository URL: "
if "%repo_url%"=="" set "repo_url=https://github.com/mks1209tq/dev_tanseeq.git"

echo Cloning repository...
git clone %repo_url% 

for %%i in (%repo_url%) do set "folder_name=%%~ni"
echo Changing directory to %folder_name%...
cd %folder_name%

echo Installing dependencies...
call composer install

echo Copying environment file...
if exist .env.encrypted (
    call php artisan env:decrypt
    echo Environment file decrypted.
) else (
    echo .env.encrypted not found. Skipping this step.
)

@REM echo Running migrations and seeding database...
@REM call php artisan migrate --seed --force

echo Generating application key...
call php artisan key:generate

echo install blueprint
call composer require -W --dev laravel-shift/blueprint
call composer require --dev jasonmccreary/laravel-test-assertions


echo npm install
call npm install

echo Setup complete, enter directory and run migrations and seeding database!
echo php artisan migrate --seed --force

