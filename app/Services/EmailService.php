<?php

namespace App\Services;
use PHPMailer\PHPMailer\PHPMailer;

class EmailService{
    protected $app_name;
    protected $password;
    protected $username;
    protected $port;
    protected $host;

    function EmailService(){}

    function __construct()
    {
        $this->app_name = config('app.name');   
        $this->username= config('app.mail_username');
        $this->password = config('app.mail_password');
        $this->port =config('app.mail_port');
        $this->host = config('app.mail_host');
    }
    function viewSendMail($name,$active_code,$active_token){
        return view('mail.Confirmarion_account')->with([
            'name' => $name,
            'active_code'=> $active_code,
            'active_token' => $active_token,
            ]);
    }

    function sendMail($subject,$emailuser,$nameUser,$is_html,$active_code,$active_token){
        $email= new PHPMailer;
        $email->isSMTP();
        $email->SMTPDebug=0;
        $email->Host = $this->host;
        $email->Port = $this->port;
        $email->Username=$this->username;
        $email->Password =$this->password;
        $email->SMTPAuth=true;
        $email->Subject=$subject;
        $email->setFrom($this->app_name,$this->app_name);
        $email->addReplyTo($this->app_name,$this->app_name);
        $email->addAddress($emailuser,$nameUser);
        $email->isHTML($is_html);
       
        $email->Body= $this->viewSendMail($nameUser,$active_code,$active_token);
        $email->send();

    }
    

}
