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
if exist .env.example (
    copy .env.example .env
    echo Environment file copied.
) else (
    echo .env.example not found. Skipping this step.
)

echo Running migrations and seeding database...
call php artisan migrate --seed --force

echo Generating application key...
call php artisan key:generate

echo Setup complete!
