### Requirements

- PHP 8.2+
- [Composer 2.5+](https://getcomposer.org/)
- Any SQL database (MySQL, MariaDB, PostgreSQL, SQLite, etc.)

### Major Packages

- [Laravel](https://laravel.com/docs/10.x/)
- [Backpack for Laravel](https://backpackforlaravel.com/docs)

### Development (! DON'T FORK THE REPO !)

1. Clone this repository
2. Run `composer install` to install PHP dependencies, or run `composer update`
5. Copy `.env.example` to `.env` and fill in the required values
6. Run `php artisan key:generate` to generate an application key
7. Go to `config -> database.php -> inside connection -> mysql` (line 60). Change `'engine' => 'InnoDB'`
8. Go to `database -> migrations -> remove create_permission_table`
9. Run in the command `php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"`
10. Run `php artisan migrate:fresh --seed` to migrate the database
13. Run `php artisan serve` to start the development server
14. Open `http://127.0.0.1:8000` in your browser
15. Login with the following credentials:
    - **Email:** `mazen@mazen.com`
    - **Password:** `1`



### to push the codes
1. Make new branch for any update you did `git checkout -b name-of-the-branch`
2. Create `Pull request` from the branch to main
3. And that's it!
