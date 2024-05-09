# News Site Project

This is a PHP-based news site project.

## Description

This project is a simple news site developed using PHP. It allows users to view news articles, browse by category, search by name or description, view author post.

## Requirements

- PHP 8.1.2
- MySQL 
- Web server (Apache, Nginx)

## Installation

1. Clone the repository to your local machine:

    ```bash
    git clone "https://github.com/manchuriqbal/news_project_raw_file.git"
    ```

2. Import the database:

    - Navigate to the `database` directory.
    - [Download the `news_site.sql` file](https://raw.githubusercontent.com/manchuriqbal/news_project_raw_file/manchur/database/news_site.sql) from GitHub.
    - Import the downloaded `news_site.sql` file into your MySQL/MariaDB database.

3. Configure the database connection:

    - Open the `admin/config.php` file.
    - Update the database connection details (hostname, username, password, database name) accordingly.

## Usage

1. Start your web server.

2. Open a web browser and navigate to the project directory.

3. You should see the homepage of the news site.
