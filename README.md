# 🛒 Simple Inventory & Financial Reporting System — Laravel 12

A lightweight Inventory & Financial Reporting System built with **Laravel 12**, supporting product management, sales, payments, journal entries, and reports with clean, clean MVC + Service-based architecture

---

## Live Demo Link

- 🌐 URL: http://inventory-system.deshicreative.com/


---


## 🔐 Admin Panel Access (Demo)

- 📧 Email: gmzesan7767@gmail.com
- 🔑 Password: 12345678aA


---


## 🚀 Features

- Product management (CRUD)
- Sales with dynamic item entry
- Payment tracking (auto entry on sale)
- Journal entries for financial tracking
- VAT, discount, due handling
- Stock management in real-time
- Sales & Financial Reports
- DataTables with server-side processing
- Clean MVC + Service-based architecture

---

## 🔧 Installation Guide

### 1️⃣ Clone the Repository

```bash
git clone https://github.com/your-username/inventory-system.git
cd inventory-system
```

### 2️⃣ Install Dependencies

```bash
composer install
npm install
npm run build
```

### 3️⃣ Configure Environment

Copy `.env.example` to `.env`:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Update `.env` with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventory_system
DB_USERNAME=root
DB_PASSWORD=
```

### 4️⃣ Run Migrations & Seeders

Run database migrations:

```bash
php artisan migrate
```

(Optional) Seed sample data:

```bash
php artisan db:seed
```

### 5️⃣ Run the Project

```bash
php artisan serve
```

Visit your app:

```
http://127.0.0.1:8000
```

---

## 🔐 Default Credentials (if seed data)

| Email                 | Password   |
| --------------------- | ---------- |
| gmzesan7767@gmail.com | 12345678aA |

*(Change in Seeder if provided)*

---



## 👨‍💻 Author

- **Developer:** G.M. Zesan
- **GitHub:** [https://github.com/gm-zesan](https://github.com/gm-zesan)
- **Email:** gmzesan7767@gmail.com

---

