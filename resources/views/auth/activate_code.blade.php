@extends('base')

@section('title','account activate')

@section('content')
    <div class="container">
    <div class="col-md-5 mx-auto">
     <h1 class="text-center  text-muted  mb-3 mt-5">Activate account</h1>
    <form method="post" action="{{ route('app_activate_account',['token' => $token])}}" >
        @csrf
        @if(Session::has('warning'))
        <div role="alert" class="alert alert-warning text-center">
        {{ Session::get('warning') }}
        </div>
        @endif
        @if(Session::has('danger'))
        <div role="alert" class="alert alert-danger text-center">
        {{Session::get('danger')}}
        </div>
        @endif
        @if(Session::has('resend'))
        <div role="alert" class="alert alert-danger text-center">
        {{ Session::get('resend') }}
        @endif
        @if(Session::has('change'))
        <div role="alert" class="alert alert-warning text-center">
        @endif
        
        <label for="activation_code" class="form-label">Activation code</label>
        <input type="text"  name="activation_code" id="activation_code" class="form-control mb-3 @if(Session::has('danger')) is-invalid @endif " required autocomplete="activation_code" autofocus>
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="{{ route('app_change_mail',['token' => $token]) }}">change your email address </a>
            </div>
            <div class="col-md-6">
            <a href="{{ route('app_resend_activation_code',['token' =>$token] )}}">Resend your activation code  </a>
            </div>
        </div>
        <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-block ">Activate</button>
        </div>  
    </form>
    </div>
    </div>
@endsection