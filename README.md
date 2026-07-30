<div align="center">

# 🎬 MyTube - YouTube Clone

### A modern video sharing platform built with Yii2 Framework

<p>
    <strong>Watch, upload, manage, and share videos with a clean and responsive user experience inspired by YouTube.</strong>
</p>

<p>

![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php)
![Yii2](https://img.shields.io/badge/Yii2-Framework-40B3D8?style=for-the-badge)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?style=for-the-badge&logo=bootstrap)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

</p>

<p align="center">

<a href="https://utube.infinityfreeapp.com/">
    <img src="https://img.shields.io/badge/Live-Demo-success?style=for-the-badge">
</a>

<a href="https://github.com/PriyanshPh/PHP_MyYouTube">
    <img src="https://img.shields.io/badge/GitHub-Repository-black?style=for-the-badge&logo=github">
</a>

</p>

</div>

---

# 📑 Table of Contents

- Overview
- Why this Project?
- Features
- Technology Stack
- System Architecture
- Business Workflow
- Project Structure
- Installation
- Database Configuration
- Running the Application
- Live Demo
- Future Enhancements
- Contributing
- License
- Author

---

# 📖 Overview

MyTube is a YouTube-inspired video sharing platform developed using the **Yii2 Framework**. The application allows users to upload videos, manage channels, browse content, watch videos, and interact through comments while demonstrating modern web application development practices using the MVC architecture.

---

# 💡 Why this Project?

This project was developed to demonstrate practical software engineering skills using **PHP**, **Yii2**, **MySQL**, and **Bootstrap**. It showcases authentication, video management, media uploads, channel management, responsive UI design, and clean MVC architecture while solving real-world video sharing requirements.

---

# ✨ Features

## Authentication

- User Registration
- Secure Login
- Logout
- Session Management
- Password Security

---

## Video Management

- Upload Videos
- Edit Video Information
- Delete Videos
- Video Details
- Video Thumbnails

---

## Channel Management

- Create Channel
- View Channel
- Channel Profile
- Channel Videos

---

## Video Streaming

- Watch Videos
- Responsive Video Player
- Video Description
- View Count

---

## User Interaction

- Comment on Videos
- Browse Videos
- Search Videos

---

## Media Management

- Thumbnail Upload
- Video Upload
- Storage Management

---

## User Experience

- Responsive UI
- Bootstrap Components
- AJAX Operations
- Clean Navigation
- Search Functionality

---

# 🛠 Technology Stack

| Layer              | Technology                  |
| ------------------ | --------------------------- |
| Backend            | PHP 8                       |
| Framework          | Yii2 Advanced               |
| Database           | MySQL                       |
| Frontend           | HTML5, CSS3, Bootstrap      |
| JavaScript         | JavaScript, jQuery          |
| Authentication     | Yii2 User Authentication    |
| Architecture       | MVC (Model-View-Controller) |
| Dependency Manager | Composer                    |
| Version Control    | Git & GitHub                |
| Web Server         | Apache                      |

---

# 🏗 System Architecture

```text
                        Client
                           │
          ┌────────────────┴────────────────┐
          ▼                                 ▼
     Frontend (User)                  Backend (Admin)
          │                                 │
          └──────────────┬──────────────────┘
                         ▼
                    Common Layer
       (Models, Components, Helpers, Config)
                         │
                         ▼
                     MySQL Database
```

---

# 🔄 Business Workflow

```text
User Login

↓

Browse Videos

↓

Watch Video

↓

Search Videos

↓

View Channel

↓

Upload Video

↓

Manage Videos

↓

Interact through Comments
```

---

# 📂 Project Structure

```text
PHP_MyYouTube/

├── backend/          # Admin Panel
├── common/           # Shared models, components and configurations
├── console/          # Console commands
├── frontend/         # User-facing application
├── vendor/           # Composer dependencies
├── environments/     # Environment initialization
├── admin/            # Production backend entry point
├── assets/
├── composer.json
├── composer.lock
├── init
└── yii
```
---

# ⚙ Installation

## Clone Repository

```bash
git clone https://github.com/PriyanshPh/PHP_MyYouTube.git
```

---

## Install Dependencies

```bash
composer install
```

---

## Configure Database

Update your database configuration in:

```text
config/db.php
```

Example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=mytube',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];
```

---

## Start Server

Using Yii:

```bash
php yii serve
```

or

Using Apache (XAMPP):

```text
http://localhost/PHP_MyYouTube/web
```

---

# 🗄 Database

Main entities:

- Users
- Videos
- Channels
- Comments
- Categories

---

# 🌐 Live Demo

🔗 **Application**

https://utube.infinityfreeapp.com/

https://utube.infinityfreeapp.com/admin/

## 🔑 Demo Credentials

Use the following credentials to explore the application.

| Field | Value |
|-------|-------|
| **Username** | `hi_user` |
| **Password** | `hi_user@gmail.com` |

> **Note:** This is a demo environment intended for evaluation purposes only. Uploaded data may be modified or reset periodically.

---

# 🚀 Future Enhancements

- Video Like & Dislike
- Subscribe to Channels
- Playlist Management
- Watch Later
- Video History
- Trending Videos
- Recommended Videos
- Notifications
- Video Categories
- User Profile Customization
- Dark Mode
- Email Verification
- Social Login
- Video Analytics
- Admin Dashboard
- Video Reporting
- Infinite Scroll
- Video Recommendations

---

# 🤝 Contributing

Contributions are welcome.

1. Fork the repository.

2. Create a feature branch.

```bash
git checkout -b feature/NewFeature
```

3. Commit your changes.

```bash
git commit -m "feat(module): add new feature"
```

4. Push your branch.

```bash
git push origin feature/NewFeature
```

5. Open a Pull Request.

---

# 📄 License

This project is licensed under the MIT License.

---

# 👨‍💻 Author

**Developed by Priyansh**

- GitHub: https://github.com/PriyanshPh

- LinkedIn: https://linkedin.com/in/priyansh-

---

<div align="center">

⭐ If you found this project useful, please consider giving it a star on GitHub!

</div>
