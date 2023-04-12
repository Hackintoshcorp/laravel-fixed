<h3>Setup:</h3></br>

<strong>Get necessary files: </strong></br>
<p>composer install && npm ci</p></br>

<strong>Database creation and seeding:</strong></br>
<p>php artisan migrate && php artisan db:seed --class=UsersTableSeeder && php artisan db:seed --class=MoviesTableSeeder</p></br>

<strong>Default login:</strong></br>

<p>user: admin@admin.com</br>
password: password</p></br>

Movie and schedule CRUD testing 

<p>php artisan test</p></br>

<strong>A few MAIN things can be found at:</strong>
<p>
JS was added an implemented in :</br>
itsolutions/resources/views/layouts/app.blade.php</br>

JS itself is located at folder:</br>
itsolutions/resources/js</br>

HTML code can be found:</br>
itsolutions/resources/views/components/main.blade.php </br> 

Routes can be changed at </br>
itsolutions/routes/web.php</br>

Demo pictures located at:</br>
itsolutions/demo_images/</br>

Pictures are stored at:</br>
itsolutions/storage/app/public</br>

DB settings and other settings can be found at:</br>
itsolutions/.env</br>

Notification send STUFF to email:</br>
itsolutions/app/Mail/MovieScheduleEmail.php</br>
itsolutions/app/Console/Commands/SendDailyMovieSchedule.php</br>
itsolutions/resources/views/emails/movie-list.blade.php</br>
itsolutions/app/Console/Kernel.php</br>
</p>
