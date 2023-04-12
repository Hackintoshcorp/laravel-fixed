<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Mail\MovieScheduleEmail;

class SendDailyMovieSchedule extends Command
{
    protected $signature = 'send:daily-movie-schedule';
    protected $description = 'Send daily scheduled movies list to users.';

    public function handle()
    {
        // Retrieve the list of movies scheduled for the current day
        $movies = Movie::whereDate('watch_soon', Carbon::today())->get();

        // Retrieve the list of users
        $users = User::all();

        // Loop through each user and send an email containing the list of movies scheduled for the day
        foreach ($users as $user) {
            $email = $user->email;
            Mail::to($email)->send(new MovieScheduleEmail($movies));
        }
    }
}
