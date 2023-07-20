# User Management System

This project is a User Management System built with Laravel, utilizing object-oriented programming (OOP) principles, design patterns, and repositories. It provides CRUD operations for managing users, departments, and user-department associations. The system allows the admin to create, edit, delete, and view user profiles. Additionally, the admin can create departments, attach/detach users to/from departments, and search for specific users. The system includes a login interface and provides an API for login functionality.

## Features

- User CRUD operations (create, read, update, delete)
- Department management (create, list)
- User-Department association (attach, detach)
- User profile data (firstname, lastname, image, gender, email, password)
- Search functionality for users (by email, firstname, lastname)
- Proper layout and theme with a login interface
- API for login feature
- MySQL database
- Object-oriented programming (OOP) implementation
- Design patterns integration
- Repository pattern for data access

## Instructions to Run the Application

To run the User Management System, please follow the instructions below:

### Prerequisites

- PHP installed on your machine (version 7.4 or higher)
- Composer installed on your machine (https://getcomposer.org)
- MySQL database server installed (or use an alternative supported by Laravel)

### Installation Steps

1. Clone the project repository to your local machine:

2. Navigate to the project directory:

3. Install the project dependencies using Composer:

4. Create a new MySQL database for the application.

5. Rename the `.env.example` file to `.env` and update the database configuration variables with your MySQL database credentials.

6. Run the database migrations to create the necessary tables:

This command will create the required tables and seed the database with initial data, including users and departments.

7. Start the Laravel development server:

The application should now be running on http://localhost:8000.

8. Open your web browser and visit http://localhost:8000 to access the User Management System.

### Repository Classes

This project utilizes the repository pattern for data access. The repository classes can be found in the `App\Repositories` directory. These classes encapsulate the logic for interacting with the database and provide an interface for fetching and manipulating user and department data. You can find the implementation of various system functions within these repository classes.

### User Image and Relationship

The project includes a table for user images and establishes a relationship between the `users` table and `images` table. This allows users to have associated images in the system. The relationship logic can be found in the respective model classes (`User` and `Image`).

Please note that when creating or updating user profiles, you may need to handle image uploads and associate the uploaded image with the respective user.
