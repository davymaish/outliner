# Outliner with Local and Cloud Server Data Sync

This is a sample application built with Laravel 8 that implements an outliner with local and cloud server data synchronization. It allows users to create and organize items in an outline-like structure, and synchronize their data between their local storage and a cloud server.

## Features

- Create, view, edit and delete outline items
- Organize outline items into a hierarchical structure
- Sync data between a local server and a cloud server

## Getting Started

### Prerequisites

- PHP 7.3 or higher
- Composer
- MySQL 5.7 or higher
- Git

### Installing

1. Clone the repository to your local machine using `git clone https://github.com/davymaish/outliner.git`
2. Install the required dependencies by running `composer install`.
3. Create a new MySQL database and update the `DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD` values in the `.env` file with your database information.
4. Run the migrations and seeders using `php artisan migrate --seed`.
5. Generate an application key using `php artisan key:generate`.
6. Start the development server using `php artisan serve`.

### Cloud Server Data Sync

The application is designed to sync data between a local server and a cloud server. To configure the cloud server data sync, create a new database connection and update the `DB_CLOUD_SERVER_CONNECTION=pgsql` with the name of the connectio you have created.
- Note:: Your local server should not share the same database connection with your cloud server.

## Usage

Create a new account or log in with an existing one.

To add a new item, follow these steps:

1. Open your web browser and navigate to the application URL.
2. Click the "Create New Item" button to create a new outline item.
3. Fill in the title and description fields, and optionally select a parent item to nest it under
4. Save the item by clicking on the "Save" button


To manage outliner items, follow these steps:

1. Open your web browser and navigate to the application URL.
2. Click the "View Outliner Items" to view outliner items.
3. Click on an item to expand or collapse its child items.
4. Click the "Edit" button to edit an item next to them.
5. Changes made on the local server will be automatically synced to the cloud server.

To auto sync both cloud and local Server, you can simply run the following command: `php artisan sync:outliner-items`.

## Contributing

If you would like to contribute to this project, you can:

- Fork the repository
- Create a new branch: `git checkout -b feature/my-new-feature`
- Make your changes and commit them: `git commit -m "Add some feature"`
- Push your changes to your fork: `git push origin feature/my-new-feature`
- Submit a pull request

## License

This project is licensed under the MIT License. See the `LICENSE` file for details.
