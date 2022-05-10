<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Student;
use App\Mail\StudentDailyUpdate;
use Mail;
class StudentUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'student:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends Updates or News to every Student Daily';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $student=Student::all();
        foreach($student as $st){
            $dailyupdate=new StudentDailyUpdate();
            Mail::to($st->email)->send($dailyupdate);
        }
    }
}
