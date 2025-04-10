# 📇 Contact Management System

A web-based Contact Management System built with **Laravel** and **Bootstrap**, allowing authenticated users to manage their personal contacts efficiently.

## 🚀 Features

### 🔐 User Authentication
- **Registration**: New users can sign up with name, email, and password.
- **Login & Logout**
- **Session-based authentication** to protect routes and restrict unauthorized access.

### 👤 Contact Management (CRUD)
- **Create Contact**: Users can create a new contact with the following fields:
  - Name
  - Email
  - Contact
- **Read/View Contacts**: All can see a list of all contacts.
- **Update Contact**: Only authenticated users can edit existing contacts.
- **Delete Contact**: Only authenticated users can remove contacts permanently.
- **Create Contact**: Only authenticated users can add new contacts.


### 💬 Flash Feedback (Bootstrap Modal)
- After creating and updating a contact, a **Bootstrap modal** is displayed with a success message.
- The modal automatically redirects the user to the contact’s detail page after being closed.


### 📁 File Structure Highlights
- `resources/views/`:
  - `layouts/app.blade.php`: Main layout using Blade components.
  - `contacts/`: All views related to contact management.
- `app/Http/Controllers/ContactController.php`: Logic for CRUD operations.
- `routes/web.php`: Route definitions for authentication and contact operations.

---

## 🛠️ Tech Stack

- **Laravel 10.48.3**
- **PHP 8.1**
- **Bootstrap 5**
- **Blade Templating**

---

## 🙌 Author
Anthonius Miguel Vaz Figueiredo Souza
Developed for Alfa Soft project delivery.
