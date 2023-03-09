<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class EmailTamu extends Mailable
{
    use Queueable, SerializesModels;
    public $demo;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($demo,$judulEmail)
    {
        $this->demo = $demo;
        $this->subject = $judulEmail;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
      return $this->from('polbangtangowa@gmail.com')
                  ->view('tampilan-email')
                  //->text('tampilan-email-plan')
                  ->with(
                    [
                          'testVarOne' => '1',
                          'testVarTwo' => '2',
                    ]);
                    // ->attach(public_path('/img').'/footer_.jpg', [
                    //         'as' => 'footer_.jpg',
                    //         'mime' => 'image/jpeg',
                    // ]);
  }
}
