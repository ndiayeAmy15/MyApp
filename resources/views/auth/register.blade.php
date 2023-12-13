@extends('base')

@section('title','register')
@section('content')
<div class="container">

  
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h1 class="text-center  text-muted  mb-3 mt-5">Register</h1>
            <p class="text-center  text-muted  mb-5">Create a account if you don't have one</p>
            <form action="{{route('register')}}" method="post" id="form-register" class="row g-3">
            @csrf
            <div class="col-md-6 ">
                <label for="firstname" class="form-label">firstname</label>
                <input type="text"  class="form-control " id="firstname" name="firstname" value="{{ old('firstname')}}" required autocomplete="firstname" autofocus >
                <small class="text-danger fw-bold" id="error-register-firstname"></small>
            </div>
            <div class="col-md-6 ">
                <label for="lastname" class="form-label">last Name</label>
                <input type="text"   class="form-control " id="lastname" name="lastname" value="{{ old('lastname')}}" required autocomplete="lastname" autofocus >
                <small class="text-danger" id="error-register-lastname"></small>
            </div>
            <div class="col-md-12 ">
                <label for="email" class="form-label">Email</label>
                <input type="email"  class="form-control " id="email" name="email" value="{{ old('email')}}"  required autocomplete="email" autofocus>
                <small id="error-register-email" class="text-danger"></small>
            </div>
           
            <div class="col-md-6 ">
                <label for="password" class="form-label">password</label>
                <input type="password"  class="form-control " id="password" name="password" value="{{ old('password')}}"  required autocomplete="password" autofocus>
                <small id="error-register-password" class="text-danger"></small>
            </div>
            <div class="col-md-6 ">
                <label for="confirm-password" class="form-label">Confirme password</label>
                <input type="password"  class="form-control " id="confirm-password" name="confirm-password">
                <small id="error-register-confirm_password" class="text-danger"></small>
            </div>
            <div class="col-md-6 ">
                <div class="form-check">
                <input type="checkbox" class="form-check-input" id="agree-terms"  name="agree-terms" role="switch">
                <label for="" class="form-check-label">agree terms</label>
                <small id="error-register-agree-terms" class="text-danger"></small>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="button" class="btn btn-primary " id="register-user">Register</button>
            </div>  
            <p class="text-center  text-muted  mb-5">already have an  account ? <a href="{{route('login')}}">Login</a></p>
            </form>
        </div>
    </div>
</div> 
@endsection   