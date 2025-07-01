# Laravel To-Do List

Welcome to my Laravel To-Do List — a simple task manager built with Laravel, TailwindCSS, and SQLite.

## 🚀 Installation & Setup

Follow these steps to set up the project locally:

### 1. Clone the repository

```bash
git clone https://github.com/NoAnswerss/to-do-list.git
````

### 2. Install backend & frontend dependencies

```bash
composer install
npm install
```

### 3. Copy and configure the environment file

```bash
cp .env.example .env
```

> Make sure to update the `.env` database section to use SQLite (see below).

### 4. Create the SQLite database file

```bash
touch database/database.sqlite
```

Or manually create a file named `database.sqlite` inside the `database/` folder if you're using Windows.

### 5. Update the `.env` file to use SQLite

Replace the database section in `.env` with the following:

```env
DB_CONNECTION=sqlite
DB_DATABASE=${PROJECT_PATH}/database/database.sqlite
```

> Replace `${PROJECT_PATH}` with the **absolute path** to your project folder. For example:

```env
DB_DATABASE=C:/Users/YourUsername/Herd/to-do-list/database/database.sqlite
```

> ⚠️ Important: Use forward slashes (`/`), not backslashes (`\`) on Windows.

### 6. Generate the application key

```bash
php artisan key:generate
```

### 7. Run the database migrations

```bash
php artisan migrate
```

This will create the necessary tables in the SQLite database.

---

## 💻 Usage

### Start the Laravel development server

```bash
php artisan serve
```

Then visit:

[http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## ⚙️ Build Frontend Assets

To compile your CSS/JS using Laravel Mix:

```bash
npm run dev
```

For production:

```bash
npm run build
```

---

## 🧠 Tech Stack

* Laravel 10
* PHP 8.x
* TailwindCSS
* SQLite
* Laravel Mix (Vite if migrated)

---

## ✅ Features

* Add, complete, and delete tasks
* Persist tasks in a lightweight SQLite database
* Clean UI using TailwindCSS
* Fully local setup — no MySQL required

---

## 🤝 Contributions

Feel free to fork, clone, and improve!
If you found this useful, drop a ⭐️ on the repo.

---
