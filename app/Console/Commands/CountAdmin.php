<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
class CountAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'count:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'count number of admins';

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
        echo "No of Admins are: ".User::count();
    }
}
