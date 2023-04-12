<h3>Setup:</h3></br>

<strong>Get necessary files: </strong></br>
<p>composer install && npm ci</p></br>

<strong>Database creation and seeding:</strong></br>
<p>php artisan migrate && php artisan db:seed --class=UsersTableSeeder && php artisan db:seed --class=MoviesTableSeeder</p></br>

<strong>Default login:</strong></br>

<p>user: admin@admin.com</br>
password: password</p></br>

<h4>Movie and schedule CRUD testing</h4>

<p>php artisan test</p></br>

<strong>A few MAIN things can be found at:</strong>

<h4>JS was added an implemented in:</h4></br>
<p>itsolutions/resources/views/layouts/app.blade.php</br></p>

<h4>JS itself is located at folder:</h4></br>
<p>itsolutions/resources/js</br></p>

<h4>HTML code can be found:</h4></br>
<p>itsolutions/resources/views/components/main.blade.php</br></p>

<h4>Routes can be changed at:</h4></br>
<p>itsolutions/routes/web.php</br></p>

<h4>Demo pictures located at:</h4></br>
<p>itsolutions/demo_images/</br></p>

<h4>Pictures are stored at:</h4></br>
<p>itsolutions/storage/app/public</br></p>

<h4>DB settings and other settings can be found at:</h4></br>
<p>itsolutions/.env</br></p>

<h4>Notification send STUFF to email:</h4></br>
<p>
itsolutions/app/Mail/MovieScheduleEmail.php</br>
itsolutions/app/Console/Commands/SendDailyMovieSchedule.php</br>
itsolutions/resources/views/emails/movie-list.blade.php</br>
itsolutions/app/Console/Kernel.php</br>
</p>
