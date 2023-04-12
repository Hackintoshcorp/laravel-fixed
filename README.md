<h3>Setup:</h3>

<h4>You will have to create a folder public at:</h4>
<p>itsolutions/storage/app/</p>

<h4>Get necessary files:</h4>
<p>composer install && npm ci</p>

<h4>Database creation and seeding:</h4>
<p>php artisan migrate && php artisan db:seed --class=UsersTableSeeder && php artisan db:seed --class=MoviesTableSeeder</p>

<h4>Default login:</h4>

<p>user: admin@admin.com</br>
password: password</p>

<h4>Run VITE:</h4>
<p>npm run dev</p>

<h4>Movie and schedule CRUD testing</h4>

<p>php artisan test</p>

<h3>A few MAIN things can be found at:</h3>

<h4>JS was added an implemented in:</h4>
<p>itsolutions/resources/views/layouts/app.blade.php</br></p>

<h4>JS itself is located at folder:</h4>
<p>itsolutions/resources/js</br></p>

<h4>HTML code can be found:</h4>
<p>itsolutions/resources/views/dashboard.blade.php</br></p>

<h4>Routes can be changed at:</h4>
<p>itsolutions/routes/web.php</br></p>

<h4>Demo pictures located at:</h4>
<p>itsolutions/demo_images/</br></p>

<h4>Pictures are stored at:</h4>
<p>itsolutions/storage/app/public</br></p>

<h4>DB settings and other settings can be found at:</h4>
<p>itsolutions/.env</br></p>

<h4>Notification send STUFF to email:</h4>
<p>
itsolutions/app/Mail/MovieScheduleEmail.php</br>
itsolutions/app/Console/Commands/SendDailyMovieSchedule.php</br>
itsolutions/resources/views/emails/movie-list.blade.php</br>
itsolutions/app/Console/Kernel.php</br>
</p>
