<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Mail\RegisterMail;
use Mail;
class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $user;
    public function __construct($u)
    {
        $this->user=$u;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mail=new RegisterMail($this->user);
        Mail::to($this->user->email)->send($mail);
    }
}
