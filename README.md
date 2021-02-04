# Simple Blog Web 
Build with Laravel 8.26.1, tailwind.


### Authorization
This blog web consist of 3 level of authorization
1. Guest user
guest user is unauthenticated user. This user can still read the blog in the web
2. Authenticated user (common user)
Common user can post a blog in the web and perform edit & delete on his/her own blog.
3. Admin user
Admin user has the authorization same as common user but admin user can delete anybody's blog if the blog content is illegal.

### How to run
1. input your db credentials in the .env files.
2. run "php artisan migrate" to create the database schema
3. type command "php artisan serve" to open it in local host

### View the route list
Type command: php artisan route: list
+--------+----------+-------------------+---------------+-----------------------------------------------+------------+
| Domain | Method   | URI               | Name          | Action                                        | Middleware |
+--------+----------+-------------------+---------------+-----------------------------------------------+------------+
|        | GET|HEAD | /                 | home          | Closure                                       | web        |
|        | GET|HEAD | api/user          |               | Closure                                       | api        |
|        |          |                   |               |                                               | auth:api   |
|        | GET|HEAD | blogs             | blogs         | App\Http\Controllers\BlogController@index     | web        |
|        | POST     | blogs             |               | App\Http\Controllers\BlogController@store     | web        |
|        |          |                   |               |                                               | auth       |
|        | DELETE   | blogs/{blog}      | blogs.destroy | App\Http\Controllers\BlogController@destroy   | web        |
|        |          |                   |               |                                               | auth       |
|        | PUT      | blogs/{blog}      | blogs.update  | App\Http\Controllers\BlogController@update    | web        |
|        |          |                   |               |                                               | auth       |
|        | GET|HEAD | blogs/{blog}/edit | blogs.edit    | App\Http\Controllers\BlogController@edit      | web        |
|        |          |                   |               |                                               | auth       |
|        | GET|HEAD | blogs/{blog}/show | blogs.show    | App\Http\Controllers\BlogController@show      | web        |
|        | GET|HEAD | login             | login         | App\Http\Controllers\LoginController@index    | web        |
|        | POST     | login             |               | App\Http\Controllers\LoginController@login    | web        |
|        | POST     | logout            | logout        | App\Http\Controllers\LogoutController@logout  | web        |
|        | GET|HEAD | register          | register      | App\Http\Controllers\RegisterController@index | web        |
|        | POST     | register          |               | App\Http\Controllers\RegisterController@store | web        |
+--------+----------+-------------------+---------------+-----------------------------------------------+------------+