<?php

namespace App\Listeners;

use App\Events\studentMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\studentRegistrationMail;
use Mail;
class studentMailListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\studentMail  $event
     * @return void
     */
    public function handle(studentMail $event)
    {
        $useremail=$event->email;
        $studentmail=new studentRegistrationMail($useremail);
        Mail::to($useremail)->send($studentmail);
    }
}
