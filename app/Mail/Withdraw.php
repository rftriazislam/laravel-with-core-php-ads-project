<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;

class Withdraw extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $withdraw = DB::table('withdraw')
            ->where('id', $this->id)
            ->first();
        $user = DB::table('users')
            ->where('id', $withdraw->userid )
            ->first();
        return $this->view('frontEnd.publisher.withdraw.withdrawChekMail', [
            'user'=>$user,
            'withdraw'=>$withdraw
        ]);
    }
}
