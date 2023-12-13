<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\EmailService;
use DateTimeImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;

class AuthController extends Controller
{
  /*  public function load_login(){
        return view('auth.login');
    }
    public function load_register(){
        return view('auth.register');
    }*/
    protected $request;
    function __construct(Request $request)
    {
        $this->request=$request;
    }
    ///FUNCTION QUI PRMET DE SE DECONNECTER
    public function logoute(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function emailExist($email){
        
        $user=User::where('email',$email)->first();
        $repose="";
        ($user) ? $repose= "exist"  : $repose= "not_exist" ;
        if($repose=='exist'){
            return redirect()->route('register')->with('danger' , 'this email is aready exist');
        }
    }
    /*FUNCTION QUI PERMET D'ACTIVER A L4UTULISATEUR LHORS DE LA CREATION D4ACTIVER SON COMPTE
    AVEC LE CODE ENVOYE DANS PHPMAILER ET DE METTRE IS8VERIFIE  A 1 */
    function activate_account($token){

        $user = User::where('activate_token',$token)->first();
        if(!$user){
            return redirect()->route('login')->with('dager','this token doesn\'t exist ');
        }
        if($this->request->isMethod('post')){
            $code= $user['activate_code'];
            $activate_code=$this->request->input('activation_code');
            if($code != $activate_code){
                return back()->with([
                    'danger'=>'this activation code is invalid',
                    'activate_code'=>$activate_code
                ]);
            }else{
                DB::table('users')
                    ->where('id' , $user->id)
                    ->update([
                    'is_verified' => 1,
                    'activate_code' =>'',
                    'activate_token' =>'',
                    'email_verified_at' => new \DateTimeImmutable,
                    'updated_at' => new \DateTimeImmutable
                ]);
                
                return redirect()->route('login')->with('success','Your email address has been verified');
            }
              
        }else{
            return view('auth.activate_code',['token' => $token]);
        }
        
    }
    /*
        cette function PERMET de verifie si le user qui veut se connecter a activate son account sinon on le redirect
        sur la apge activate_account'
    */
    public function userChecker(){
        $activate_token=Auth::user()->activate_token;
        $is_verified=Auth::user()->is_verified;
        if($is_verified != 1){
            Auth::logout();
            return redirect()->route('app_activate_account',['token' => $activate_token])
            ->with('warning','You account is not  activate yet,please check your mail-box and active your account or resend the confirmation message. ');
        }else{
            return redirect()->route('app_dashboard');
        }  
    }
    /*
    cette founction permet de resend le code d'activation '
    */
    public function resend_activation_code($token){
       
        $user = User::where('activate_token', $token)->first();
        $activate_code=$user->activate_code;

        $resendMail= new EmailService;
        $subject="Active your account !";
        
        $resendMail->sendMail($subject,$user->email,$user->name,true,$activate_code,$token);
        return redirect()->route('app_activate_account',['token' => $token])->with(['resend'=> 'your activation code is resend verif it']);
    }
    /*
        cette function permet de changer le mail de lutilasteur 
    */
    function change_mail($token){
        $user = User::where('activate_token',$token)->first();
        if($this->request->isMethod('post')){
            $new_mail = $this->request->input('new_mail');
            $user_exist= User::where('email' , $new_mail)->first();
            if(!$user_exist){
                DB::table('users')->where('id',$user->id)
                ->update([
                  'email' => $new_mail
                ]);
            $new_maill = new EmailService;
            $subject ='Active your account !';
            
            $new_maill->sendMail($subject,$user_exist->email,$user_exist->name,true,$user_exist->activate_code,$token);
            return redirect()->route('app_activate_account',['token' => $token])->with(['change' => 'your mail change is succefful ! verifie it'] );
            }else{
                return back()->with([
                    'danger' => 'this email is already exist and enter another email',
                    'emailses' =>  $new_mail
                ]);
            }
                       
        }else{
            return view('mail.change_mail',['token' => $token]);
        }
    }
    /*
    cette founction PERMET d'active'
    */
    function activate_account_link($token){
        $user = User::where('activate_token',$token)->first();
        if($user->is_verified !=0 || !$user){
            return redirect()->route('login')->with('dager','this token doesn\'t exist ');
        }
        
        DB::table('users')->where('id',$user->id)->update([
            'is_verified' => 1,
            'activate_code' =>'',
            'activate_token' =>'',
            'email_verified_at' => new \DateTimeImmutable,
            'updated_at' => new \DateTimeImmutable
        ]); 
        return redirect()->route('login')->with('success','Your email address has been verified');
    }

   
}
