# content

this package is the core of content management system based on laravel.

This package required laravel auth. 

#### Step by step to use :

1. run `php artisan make:auth`.
2. run `php artisan migrate`.
3. move the `User.php` name space `App;` into `App\Http\Models;`.
4. create default user as admin with id 1 in users table.
5. run `composer require webappid/content`.
6. run `php artisan migrate` one more time.
7. run `webappid:content:seed` to create default data. This seeder always insert new data only without wipe the old data.

If you have any question about this package, please don't hesitate to drop me an email at dyan.galih@gmail.com

Thanks to everyone to help me build this package. 