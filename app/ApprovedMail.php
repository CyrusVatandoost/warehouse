<?php
/**
 * This file is part of Jrean\UserVerification package.
 *
 * (c) Jean Ragouin <go@askjong.com> <www.askjong.com>
 */
namespace App;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApprovedMail extends Mailable
{
    use SerializesModels;

    /**
     * Email to be sent.
     *
     * @var \Illuminate\Contracts\Auth\Authenticatable
     */
    public $email;

    /**
     * Create a new message instance.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  string|null  $subject
     * @param  string|null  $from_address
     * @param  string|null  $from_name
     * @return void
     */
    public function __construct(
    )
    {

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $this->view('approve.email');
      $this->subject('Account Approved');

      return $this;
    }
}
