# 🏫 School Management System

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-Framework-red" alt="Laravel Badge">
  <img src="https://img.shields.io/badge/PHP-8.1%2B-blue" alt="PHP Badge">
  <img src="https://img.shields.io/badge/MySQL-Database-green" alt="MySQL Badge">
</p>

---

## 📖 About the Project

**School Management System** is a Laravel-based web application that simplifies the management of schools.
The system supports managing academic stages, classes, students, fees, exams, and more.
It is designed for **Admins, Teachers, Students, and Parents** to streamline school operations.

---

## 🚀 Features

### 🎓 Academic Management

-   Add / Edit / Delete **School Stages** (e.g., Primary, Secondary).
-   Add / Edit / Delete **Grades / Classes** (e.g., Grade 1, Grade 2).
-   Add / Edit / Delete **Sections** (e.g., Grade 1 - A, Grade 1 - B).

### 👩‍🎓 Student Management

-   Add / Edit / Delete students.
-   View detailed student information.
-   Promote students to higher grades.
-   Manage **Graduated Students** and view alumni records.

### 💰 Accounting & Payments

-   Record tuition fee payments (Cash or Bank Transfer).
-   Generate receipts and transaction history.
-   **Parent Portal** to view their child’s payment history.

### 📝 Exams & Results

-   Teachers can create and manage exams.
-   Students can log in to attempt exams online.
-   Automatic result generation after submission.
-   Parents can view exam results for their children.

### 📚 Library System

-   Teachers can create a **Library per Class**.
-   Upload important documents and study materials.
-   Students can easily download resources.

### 💻 E-Learning

-   Online learning integration via platforms like **Zoom** or **Google Meet**.
-   Remote teaching support for hybrid or fully online classes.

### 📅 Timetable Management

-   Create and manage a **Class Schedule** for lessons.
-   Students and parents can view the timetable online.

---

## 🛠 Requirements

-   PHP 8.1 or higher
-   Composer
-   MySQL / MariaDB
-   Node.js & npm (for assets compilation)

---

## ⚙️ Installation & Setup

1. Clone the repository:

    ```bash
    git clone https://github.com/YourUsername/school-management-system.git
    cd school-management-system
    ```

2. Install dependencies:

    ```bash
    composer install
    npm install && npm run dev
    ```

3. Configure environment:

    - Copy `.env.example` to `.env`
    - Set up database credentials and mail settings

4. Run migrations and seeders:

    ```bash
    php artisan migrate --seed
    ```

    > This will create necessary tables and seed default admin account.

5. Start the development server:

    ```bash
    php artisan serve
    ```

---

## 🔑 Default Admin Access

-   **Email:** [admin@example.com](mailto:admin@example.com)
-   **Password:** password

---

## 👥 Roles & Permissions

| Role        | Permissions                                                                 |
| ----------- | --------------------------------------------------------------------------- |
| **Admin**   | Full access to manage stages, classes, students, accounts, exams, and users |
| **Teacher** | Manage exams, upload resources, manage class library                        |
| **Student** | View timetable, attempt exams, download resources                           |
| **Parent**  | View child’s payments and results                                           |

---

## 📊 Future Improvements

-   Advanced analytics & dashboards.
-   Notifications (SMS/Email).
-   Multi-language support.
-   Mobile app integration.

---

## 📄 License

This project is open-source and available under the [MIT license](https://opensource.org/licenses/MIT).
