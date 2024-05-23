<?php

namespace App\Listeners;

use App\Events\PasswordChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordChangedNotification;

class SendPasswordChangedEmail
{
    /**
     * Handle the event.
     *
     * @param  PasswordChanged  $event
     * @return void
     */
    public function handle(PasswordChanged $event)
    {
        Mail::to($event->user->email)->send(new PasswordChangedNotification($event->user));
    }
}
