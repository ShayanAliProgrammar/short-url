# URL Shortener Project

Welcome to the URL Shortener Project! This project allows you to shorten long URLs and easily manage them. This README will guide you through setting up and using the project.

## Table of Contents
1. [Getting Started](#getting-started)
2. [Prerequisites](#prerequisites)
3. [Installation](#installation)
4. [Usage](#usage)
5. [Contributing](#contributing)
6. [License](#license)

## Getting Started

To get a local copy of this project up and running, follow these simple steps.

## Prerequisites

Before you begin, ensure you have met the following requirements:
- PHP 7.0 or higher
- MySQL or MariaDB server
- A web server (e.g., Apache, Nginx)
- Node js
- Or You can use [Laragon](https://laragon.org/download/index.html) if you are in windows

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/ShayanAliProgrammar/short-url.git
    cd short-url
    ```

2. **Install dependencies:**

    If you are using Composer, you can install the required dependencies by running:

    ```bash
    bun install
    # or
    npm install
    ```

3. **Set up the database:**

    Create a database named `url_shortener` and run the following SQL script to create the required table:

    ```sql
    CREATE DATABASE url_shortener;

    USE url_shortener;

    CREATE TABLE urls (
        id INT AUTO_INCREMENT PRIMARY KEY,
        original_url VARCHAR(255) NOT NULL,
        short_url VARCHAR(255) NOT NULL,
        user_ip VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
    ```

## Usage

1. **Start your web server:**

    Ensure your web server is running and pointing to the project's root directory.

2. **Access the application:**

    Open your web browser and navigate to `http://localhost/short-url/` (or the appropriate URL).

3. **Shorten URLs:**

    Enter a URL into the input field and click "Shorten". The shortened URL will be displayed and can be used for redirection.

### Important Files

- **index.php:** The main file handling URL shortening and redirection.
- **database.php:** Database connection configuration.
- **env.php:** Environment variables for database credentials.
- **helpers.php:** Helper functions for generating short URLs and retrieving user IP addresses.
- **middlewares.php:** Middleware configuration.
- **html_minifier.php:** Middleware for minifying HTML output.

## Contributing

Contributions are welcome! Please follow these steps to contribute:

1. Fork the repository.
2. Create a new branch: `git checkout -b feature/your-feature-name`.
3. Make your changes and commit them: `git commit -m 'Add some feature'`.
4. Push to the branch: `git push origin feature/your-feature-name`.
5. Open a pull request.