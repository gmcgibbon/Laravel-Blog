## Blog

Blogging web app built with the [Laravel PHP framework](http://laravel.com/) v4.2.11


### Setup

1. Update: `composer update`
2. Migrate: `php artisan migrate`
3. Seed: `php artisan db:seed`
4. Serve: `php artisan serve`


### Notes

Environment: set your local environment hostname in `bootstrap/start.php`

Database: setups exist for mysql and sqlite, define your database configuration in `app/config/database.php`

Validation: invalid parameters and routes are handled with a 404 page that is not enabled in debug mode. Set debug to false in `app/config/local/app.php` for proper validations.

### Helpful Resources

http://laravel.com/docs/4.2/quick#installation

http://laravel.com/docs/4.2

http://laravel.com/api/4.2/

http://fideloper.com/laravel-4-uber-quick-start-with-auth-guide

http://www.edzynda.com/using-faker-to-populate-your-laravel-projects-during-development/

https://github.com/fzaninotto/Faker

http://culttt.com/2013/11/04/add-asset-pipeline-laravel-4/

https://github.com/CodeSleeve/asset-pipeline

http://culttt.com/2013/11/04/add-asset-pipeline-laravel-4/

http://culttt.com/2013/08/19/creating-forms-in-laravel-4/

http://culttt.com/2013/08/26/routing-laravel-4/

