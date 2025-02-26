<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmployeesNewCreateMail extends Mailable{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user){
        $this->user = $user;
    }

    public function build(){
        return $this->markdown('emails.employees_new_create')->subject(config('app.name') . ', Employees New Create');
    }
}
?>
