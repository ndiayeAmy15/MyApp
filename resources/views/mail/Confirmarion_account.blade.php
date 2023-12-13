<h1>hi <strong>{{ $name }}</strong> please actived your account </h1>
<p>please actived your account for access it by copying
     and pasting the activation code : <br> {{ $active_code }} <br>
     or clicking the folowing  link :
      <br> <a href="{{ route('app_activate_account_link',['token' => $active_token]) }}" target="_blank">confirm your account</a> </p>

<p><h2><marquee > MyApp Team</marquee></h2></p>