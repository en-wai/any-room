# Any-ROOM Hotel Booking App

ANY-ROOM is a feature-rich hotel booking application built using the Laravel framework. It allows users to book hotels, manage rooms, and perform various admin-related tasks using an intuitive admin panel powered by Voyager.

## Features

### User-Facing Features
- Browse available hotels and rooms.
- Book rooms based on availability.
- View booking details and status.

### Admin Panel Features
- Powered by Voyager for CRUD functionality.
- Manage hotels, rooms, and bookings.
- Role-based access control (RBAC) for secure administration.
- Custom menu and BREAD (Browse, Read, Edit, Add, Delete) for hotels and bookings.

## Technologies Used

- **Backend**: Laravel (PHP Framework)
- **Frontend**: Blade templates, HTML, CSS
- **Database**: MySQL
- **Admin Panel**: Voyager
- **Local Development Environment**: Laragon
- **Version Control**: Git and GitHub

## Installation

### Prerequisites
- PHP 8.0 or higher
- Laragon
- Composer
- MySQL
- Node.js and npm (for frontend assets)

### Steps
1. **Clone the Repository**:
   ```bash
   git clone git@github.com:en-wai/any-room.git
   cd any-room
2. **Install Dependencies**:
    ```bash
    composer install
    npm install && npm run dev
3.  **Rename env.example to .env**:
    ```bash
    cp .env.example .env # Edit the .env file if you want to use your own details.

    
4.  **Update the .env file with your database credentials if you dont want to use mine**:
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=any-room
    DB_USERNAME=root
    DB_PASSWORD=
5. **Set Up the Example Database**:

* An example database file (example-database.sql) is included in the project. Follow these steps to import it using Laragon:
    - Open Laragon and ensure your MySQL server is running.
    - Create a new database named any_room:
        - Open HeidiSQL or phpMyAdmin (both available in Laragon).
        - Create a database manually or using the SQL command:
        ```sql
        CREATE DATABASE any-room;
6. **Import the example-database.sql file**:
* phpMyAdmin: Use the Import tab and select the file.
* HeidiSQL: Right-click on the any_room database and choose Import SQL File.
7. **Install Voyager**:
   1. Require Voyager via Composer:
      ```bash
      composer require tcg/voyager
      
   2. Run the Voyager install command:
      ```bash
      php artisan voyager:install
8.  Start the Development Server:

    * Start the Laragon server.
        Visit http://localhost or http://127.0.0.1:8000 to access the app.
## Usage

### Admin Panel
- Login at `/admin` with the default credentials:
  - **Email**: `admin@admin.com`
  - **Password**: `password`

### Public Interface
- Explore available hotels and rooms.
- Book a room and manage bookings.

## Folder Structure
- **`app/Models`**: Contains Eloquent models for Hotels, Rooms, and Bookings.
- **`resources/views`**: Blade templates for the frontend and admin panel.
- **`routes/web.php`**: Defines application routes.

## Project Demo
### Video Demo
[Insert Video URL Here]

### Presentation
[Insert Google Slides URL Here]

## Development Report

### Successes
- Fully functional admin panel for hotel and booking management.
- Smooth integration of Voyager for admin tasks.
- Responsive and user-friendly UI.

### Challenges
- Troubleshooting BREAD configuration issues.
- URL routing conflicts during Voyager setup.

### Lessons Learned
- Deepened understanding of Laravel's MVC architecture.
- Learned efficient use of Voyager for rapid admin panel development.

### Next Steps
- Implement room management features.
- Add advanced search and filtering options.
- Integrate analytics and reporting dashboard.

## Contribution
Contributions are welcome! Feel free to fork the repository and submit a pull request.

## Acknowledgements

- This project uses a front-end template from [Colorlib](https://colorlib.com) to accelerate development. The template has been customized to align with the needs of ANY-ROOM.
- Icons are sourced from [FontAwesome](https://fontawesome.com).



## License
This project is open-source and available under the [MIT License](LICENSE).


