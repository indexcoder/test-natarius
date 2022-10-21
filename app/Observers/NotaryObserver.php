<?php
namespace App\Observers;

use App\Models\Notary;
use App\Mail\SendMessageMail;
use Illuminate\Support\Facades\Mail;

class NotaryObserver {
    public function created(Notary $notary) {
        Mail::to($notary->email)->send(new SendMessageMail($notary));
    }
}
