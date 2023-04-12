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
<h6>JS was added an implemented in:</h6></br>
itsolutions/resources/views/layouts/app.blade.php</br>

<h6>JS itself is located at folder:</h6></br>
itsolutions/resources/js</br>

<h6>HTML code can be found:</h6></br>
itsolutions/resources/views/components/main.blade.php </br> 

<h6>Routes can be changed at:</h6></br>
itsolutions/routes/web.php</br>

<h6>Demo pictures located at:</h6></br>
itsolutions/demo_images/</br>

<h6>Pictures are stored at:</h6></br>
itsolutions/storage/app/public</br>

<h6>DB settings and other settings can be found at:</h6></br>
itsolutions/.env</br>

<h6>Notification send STUFF to email:</h6></br>
itsolutions/app/Mail/MovieScheduleEmail.php</br>
itsolutions/app/Console/Commands/SendDailyMovieSchedule.php</br>
itsolutions/resources/views/emails/movie-list.blade.php</br>
itsolutions/app/Console/Kernel.php</br>
</p>
