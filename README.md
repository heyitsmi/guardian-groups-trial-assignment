# **Dr. Ed's Community Corps \- Trial Assignment**

Welcome\! This repository contains the completed trial assignment for the Dr. Ed's Community Corps platform. This project demonstrates a robust implementation of a gamified community support system built on the TALL stack, with additional integrations as requested.

## **✨ Key Features Implemented**

This project successfully implements the core requirements of the trial assignment and goes beyond by building a fully dynamic and interactive user experience.

* **Dynamic User Dashboard:** A modern, user-friendly dashboard that serves as the central hub for user activity. It includes real-time updates for:  
  * Points Counter  
  * Team Impact Summary  
  * Earned Badges Display  
  * Available Missions  
  * Guardian Group Information  
* **"I Can Help Right Now" System:**  
  * A **Floating Action Button** with rotating, encouraging labels to drive engagement, exactly as specified in the success criteria.  
  * A **dynamic modal** that fetches and displays available missions from the database.  
* **Gamification Engine:**  
  * **Points System:** Users earn points for completing missions.  
  * **Badges System:** Badges are automatically awarded to users when they reach specific point milestones.  
  * **Missions System:** A backend system for creating and managing missions that users can complete.  
* **Guardian Groups & Search:**  
  * Users can join and view members of multiple Guardian Groups.  
  * A fast, modern **search modal** powered by **Laravel Scout and Meilisearch** allows users to find and join groups instantly.  
* **Full User Lifecycle:**  
  * Custom-styled pages for **Login** and **Registration**.  
  * A comprehensive **User Profile** page where users can update their name, email, password, and upload a profile photo with a live preview.  
* **Reusable Components:** The project is built with clean, reusable Blade components for UI elements like form inputs and navigation links, demonstrating best practices for maintainability.

## **🛠️ Tech Stack**

This project is built with a modern and efficient tech stack:

* **Backend:** Laravel 12 
* **Frontend:** Tailwind CSS v4, Alpine.js  
* **Full-Stack Interactivity:** Livewire 3  
* **Admin Panel:** Filament 3  
* **Search:** Laravel Scout \+ Meilisearch  
* **Debugging:** Laravel Debugbar

## **🚀 Local Setup Instructions**

Please follow these steps to get the project running on your local machine.

### **Prerequisites**

* PHP 8.2 or higher  
* Composer  
* Node.js & npm  
* A running instance of **Meilisearch**. (You can download it from the [official website](https://www.google.com/search?q=https://www.meilisearch.com/docs/learn/getting_started/installation) or use Docker).  
* A database (e.g., MySQL, PostgreSQL).

### **Step-by-Step Installation**

1. **Clone the Repository**  
   git clone https://github.com/heyitsmi/guardian-groups-trial-assignment  
   cd guardian-groups-trial-assignment

2. **Install Dependencies**  
   composer install  
   npm install

3. **Environment Setup**  
   * Copy the example environment file:  
     cp .env.example .env

   * Open the .env file and configure your database connection (DB\_HOST, DB\_PORT, DB\_DATABASE, DB\_USERNAME, DB\_PASSWORD).  
   * Add the Meilisearch configuration:  
     SCOUT\_DRIVER=meilisearch  
     MEILISEARCH\_HOST=http://127.0.0.1:7700  
     MEILISEARCH\_KEY=masterKey

4. **Generate Application Key**  
   php artisan key:generate

5. **Run Meilisearch**  
   * Make sure your Meilisearch instance is running. If you downloaded the executable, run it in a separate terminal window:  
     .\\meilisearch.exe

6. **Run Migrations and Seeders**  
   * This command will set up the database schema and populate it with sample data (users, groups, badges, missions).  
     php artisan migrate:fresh \--seed

7. **Import Data to Meilisearch**  
   * This command will index your GuardianGroup data so it becomes searchable.  
     php artisan scout:import "App\\Models\\GuardianGroup"

8. **Run the Development Servers**  
   * You'll need two terminal windows for this.  
   * In the first terminal, run the Vite server for frontend assets:  
     npm run dev

   * In the second terminal, run the Laravel development server:  
     php artisan serve

The application should now be running at http://127.0.0.1:8000.

## **👤 How to Use**

### **User Credentials**

The database seeder creates 50 random users. You can use the following credentials to log in as a test user:

* **Email:** test@example.com  
* **Password:** password

### **Admin Panel**

The project includes a Filament admin panel to manage resources.

* **URL:** http://127.0.0.1:8000/admin  
* **Admin Email:** admin@example.com  
* **Admin Password:** password

### **Key Features to Test**

1. **Login/Register:** Test the authentication flow.  
2. **Dashboard:** After logging in, explore the dynamic dashboard.  
3. **Floating Help Button:** Click the floating button in the bottom-right corner.  
4. **Complete a Mission:** In the modal, click "Help Now" on a mission. Observe the toast notification and the real-time updates on the **Points**, **Badges**, and **Impact Summary** widgets.  
5. **Search for a Group:** Click the search icon in the header to open the search modal. Type a ZIP code or group name to see instant results from Meilisearch.  
6. **Join a Group:** Join a new group from the search modal and see the "Guardian Group Info" card appear or update on your dashboard.  
7. **Profile Page:** Navigate to your profile from the user dropdown to update your information and profile picture.

Thank you for the opportunity. I look forward to your feedback\!