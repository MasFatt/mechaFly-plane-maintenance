<span># 🚀 How to Run Laravel Project from GitHub</span>  
<span>🛠️ Project: mechaFly-plane-maintenance</span>  
<span>📦 Repository: https://github.com/MasFatt/mechaFly-plane-maintenance.git</span>  
<span>⚙️ Tools: Laravel 12, Tailwind CSS, Telegram Bot (optional)</span>  

<span>## 📁 1. Clone the Repository</span>  
<span>git clone https://github.com/MasFatt/mechaFly-plane-maintenance.git</span>  
<span>cd mechaFly-plane-maintenance</span>  

<span>## 📦 2. Install Dependencies</span>  
<span>composer install</span>  
<span># Optional for Tailwind</span>  
<span>npm install && npm run dev</span>  

<span>## ⚙️ 3. Setup Environment</span>  
<span>cp .env.example .env</span>  
<span>php artisan key:generate</span>  

<span>## 🗄️ 4. Configure Database</span>  
<span>Create a new database in MySQL (e.g., db_dhita).</span>  
<span>Edit the .env file as follows:</span>  
<span>DB_DATABASE=db_dhita</span>  
<span>DB_USERNAME=root</span>  
<span>DB_PASSWORD=</span>  

<span>## 🧱 5. Run Migrations</span>  
<span>php artisan migrate</span>  

<span>## 🌐 6. Start Laravel Development Server</span>  
<span>php artisan serve</span>  
<span>Then access the project via browser:</span>  
<span>http://localhost:8000</span>  

<span>## 🎨 7. (Optional) Tailwind CSS Watch Mode</span>  
<span>npm run dev</span>  
<span># For auto-reload on changes:</span>  
<span>npm run watch</span>  

<span>## 💡 Additional Tips</span>  
<span>Useful Artisan Commands:</span>  
<span>Run server again: php artisan serve</span>  
<span>Reset database: php artisan migrate:fresh --seed</span>  
<span>List routes: php artisan route:list</span>  
<span>Clear logs: php artisan log:clear</span>  
<span>Or manually delete log files in: storage/logs</span>  

<span>✅ You're all set to run the project!</span>
