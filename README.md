# 🐾 TUP ComPAWnion Website

## 📖 Project Overview

This dynamic, full-stack website was developed by BSIS/BSIT 3rd year students at the Technological University of the Philippines (TUP) for the **Web Development (CC312)** course. The site serves as the official digital platform for **TUP ComPAWnion**, a student association dedicated to the welfare, rescue, and adoption of the feline community within the TUP campus.

The project's primary goal was to create a robust, functional, and organized platform to manage adoption applications, recruit volunteers, and facilitate donations, moving these core organizational processes online.

## ✨ Core Features & Functionality

The site includes advanced client-side and server-side features, demonstrating full-stack integration:

| Feature Area | Technology | Description |
| :--- | :--- | :--- |
| **Smart Adoption Gallery** | JS, PHP, MySQL | Filterable gallery of available cats. The `script.js` handles **smart filtering** (by Age, Status, Gender, Location) and the **Adoption Form Pre-filling** feature, where clicking "Adopt Me" automatically populates the form with the chosen cat's name. |
| **Dynamic Event Calendar** | PHP, MySQL, JS | The **Volunteer Page** features a calendar that dynamically fetches upcoming events from the database (`fetch-events.php`) to keep volunteers updated and facilitate event sign-ups. |
| **Secure Donation Portal** | PHP (PDO)  | Offers two dedicated forms (Monetary and In-Kind Donations) with server-side validation and database storage, ensuring secure record-keeping. |
| **Dark Mode Toggle** | Vanilla JS | A user-friendly toggle that allows users to switch between light and dark themes, improving accessibility and reducing eye strain. |
| **Fully Responsive Design** | CSS3 | Implemented a **mobile-first approach** to ensure all elements (navigation, forms, and cat grids) scale appropriately on mobile, tablet, and desktop devices. |

## 🛠️ Technology Stack

| Category | Technology | Files Involved | Notes |
| :--- | :--- | :--- | :--- |
| **Frontend** | HTML5, CSS3, **Vanilla JavaScript** | `index.php`, `style.css`, `script.js` | Emphasized modular JavaScript for complex features like filtering and form submission via Fetch API. |
| **Backend** | **PHP** (Server-Side) | `process-*.php` scripts | Handles data validation, sanitization, and redirect/JSON responses for form submissions. |
| **Database** | **MySQL** (via PDO) | `config/database.php` | Used **PDO Prepared Statements** in all processing scripts for security against SQL injection. |
| **Deployment** | **InfinityFree Hosting** | `config/database.php` | Chosen for its free tier that provides the necessary PHP and MySQL environment. |
| **Tools** | Git & GitHub, VS Code | | Used for version control and development. |

## 📁 Site Architecture & File Structure

The project utilizes a clear separation between front-end display files and back-end configuration/processing logic.



/ # Project Root
├── index.php # Homepage
├── our-cats.php # Cat Gallery & Adoption Form
├── volunteer.php # Volunteer Page with Event Calendar
├── donate.php # Dual Donation Forms
├── blog.php # Blog Posts & Pagination
├── about.php # Mission, Vision, Team, Contact
├── script.js # All Client-side Logic (Filtering, Dark Mode, Forms)
├── style.css # Global Styles & Responsive Media Queries
├── logo.jpg # TUP ComPAWnion Logo
└── config/ # Backend Configuration & Processing Scripts
│	├── database.php # MySQL PDO Connection setup and credentials
│	├── fetch-events.php # Queries events table for calendar data (JSON output)
│	├── process-adoption.php # Validates and saves Adoption Applications
│	├── process-donation.php # Validates and saves Monetary/In-Kind Donations
│	└── process-volunteer.php # Validates and saves Volunteer Applications & event sign-ups
└── README.md

## 🎨 Design Concept

* **Color Scheme**: Rooted in TUP identity and animal welfare themes.
    * **Maroon (`#7A1C1C`)**: Primary organizational color.
    * **Soft Orange (`#F7A13B`)**: Used for all Calls-to-Action (CTAs) and primary buttons.
    * **Warm Yellow (`#FDD65B`)**: Used for accents and success indicators.
* **Typography**: Headings use **Poppins** (bold and modern) and body text uses **Open Sans** (clean and highly readable).
* **Layout**: Highly consistent header and footer across all six pages, featuring card-based layouts (`.cat-profile`, `.blog-post`) for clear content separation.

## 🧑‍💻 Team Members & Roles

| Member | Role |
| :--- | :--- |
| **Fronda, Anne Janelle** | Project Manager / Developer |
| **Llanillo, Zaila Mae** | Designer & Documentation Specialist |
| **Vengua, Krishna Coleen** | Developer & Researcher |

## 🚀 Deployment

* **Hosting Platform**: **InfinityFree Hosting**
* **[GitHub Repository]([https://github.com/krishnacoleen/TUP-ComPAWnion-Website](https://github.com/krishnacoleen/TUP-ComPAWnion-Website))** *(Replace with actual link)*
* **[Live Site Demo]([https://tupcompawnion.rf.gd/](https://tupcompawnion.rf.gd/))**

## ⏱️ Project Timeline

| Phase | Task | Date (Proposal Estimate) |
| :--- | :--- | :--- |
| **Proposal** | Planning, Requirements Gathering & Proposal Submission | [cite_start]October 20, 2025 [cite: 1-376] |
| **Development** | Full-Stack Coding, Integration (Forms, DB, JS Features) | Mid-November to Early December 2025 |
| **Deployment** | InfinityFree Setup & Project Launch | Mid-December 2025 |
| **Submission**| Final Documentation & Project Submission | December 2025 |

## 💡 Lessons Learned

* **Security Implementation:** Mastery of using PHP's **PDO** library for parameterized queries to securely handle user input and prevent common web vulnerabilities like SQL injection.
* **API Integration:** Successfully built and consumed an internal JSON API (`fetch-events.php`) to render dynamic content (the calendar) on the front end (`volunteer.php`).
* **Responsive Complexity:** Gained experience in managing multiple CSS breakpoints and designing complex components (like the smart filter system) to remain intuitive on mobile devices.



