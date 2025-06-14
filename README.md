Tutorial: How to Run Laravel Project from GitHub
Project: mechaFly-plane-maintenance
Repository: https://github.com/MasFatt/mechaFly-plane-maintenance.git
Tools: Laravel 12, Tailwind CSS, Telegram Bot (optional)

1. Clone the Repository
git clone https://github.com/MasFatt/mechaFly-plane-maintenance.git
cd mechaFly-plane-maintenance
2. Install Dependencies
composer install

# Optional for Tailwind
npm install && npm run dev
3. Copy .env and Generate App Key
cp .env.example .env
php artisan key:generate
4. Set Up Database
Create a new database in MySQL (e.g., mechafly_db).
Edit the .env file:

DB_DATABASE=mechafly_db
DB_USERNAME=root
DB_PASSWORD=your_password
5. Run Migration
php artisan migrate
6. Run Laravel Server
php artisan serve

Then access in browser:
http://localhost:8000
7. (Optional) Run Tailwind CSS
npm run dev
# For auto-reload
npm run watch
8. (Optional) Configure Telegram Bot
1. Create a bot on https://t.me/BotFather
2. Get BOT_TOKEN and CHAT_ID
3. Set in your .env:

TELEGRAM_BOT_TOKEN=your_bot_token
TELEGRAM_CHAT_ID=your_chat_id
Tips Tambahan
Useful artisan commands:
Run server again: php artisan serve
Reset database: php artisan migrate:fresh --seed
List routes: php artisan route:list
Clear logs: php artisan log:clear or check storage/logs
