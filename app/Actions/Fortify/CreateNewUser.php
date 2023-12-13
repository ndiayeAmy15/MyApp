<?php

namespace App\Actions\Fortify;

use App\Http\Controllers\AuthController;
use App\Models\User;
use App\Services\EmailService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
       /*Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();*/
       $email = $input['email'];
       $user_exist=User::where('email' , $email)->first();
      
       //generer le code d'activation des comptes
       $active_token=md5(uniqid()). $email .sha1($email);

        //generer le token d'activation des comptes
       $active_code="";
       for($i=0;$i<5;$i++){
          $active_code.=mt_rand(0,9);
       }
      
       $name=$input['firstname']. ' ' .$input['lastname'];
       
       $ES=new EmailService;
       $subject="Active your account !";
        
        
        $ES->sendMail($subject,$email,$name,true,$active_code,$active_token);
       return User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($input['password']),
            'activate_code' =>$active_code,
            'activate_token' =>$active_token,
        ]);
    }
}
?>
