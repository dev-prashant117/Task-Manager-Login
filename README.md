# 📝 Task Manager App

A full-stack Task Management web application built with **Laravel** (API backend) and **Vue.js** (frontend). This app allows users to register, log in, and manage tasks with full CRUD functionality.

---

## 🔧 Tech Stack

- **Backend:** Laravel (RESTful API)
- **Authentication:** Laravel Sanctum 
- **Database:** MySQL / SQLite (for dev)
- **Frontend:** Vue.js (SPA)
- **API Format:** JSON

## 🛠️ Setup Instructions

### 🔙 Backend (Laravel API)

1. **Clone the repository**

git clone git@github.com:dev-prashant117/Task-Manager-Backend.git
cd Task-Manager-Backend

2. composer install
3. cp .env.example .env
4. DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_db_name
   DB_USERNAME=your_db_user
   DB_PASSWORD=your_db_password
5. php artisan migrate

