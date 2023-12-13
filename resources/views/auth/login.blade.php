@extends('base')

@section('title','login')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <h1 class="text-center  text-muted  mb-3 mt-5">Please sign in</h1>
            <p class="text-center text-muted mb-5">Your article are waiting you </p>
            <form method="post" action="{{ route('login')}}">
                @csrf
                @if(Session::has('success'))
                <div role="alert" class="alert alert-success text-center">
                    {{Session::get('success')}}
                </div>
                @endif
                @if(Session::has('danger'))
                <div class="alert alert-success text-center">
                    {{Session::get('daanger')}}
                </div>
                @endif
                @error('email')
                <div role="alert" class="alert alert-danger text-center">
                   {{ $message }}
                </div>
                @enderror
                @error('password')
                <div role="alert" class="alert alert-danger text-center">
                   {{ $message }}
                </div>
                @enderror
                <label for="email">Email</label>
                <input type="email" name="email" id="" class="form-control mb-3 @error('email') is-invalid @enderror " value="{{ old('email')}} "  required autocomplete="email" autofocus>
                <label for="text">password</label>
                <input type="password" name="password" id=""  class="form-control mb-3  @error('password') is-invalid @enderror" value="{{ old('password')}}" required autocomplete="current-password" autofocus>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" role="switch" id="flexSwithCheckDefault" name="remember" {{old("remember")}} ? "cheched" : "">
                        <label class="form-check-label" for="flexSwithCheckDefault">Remember me</label>
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                    <a href="">Forget password ?</a>
                    </div>
                </div>
                <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-block ">Sign in</button>
                </div>  
                <p class="text-center text-muted mt-5">Not enregistered yet ?<a href="{{route('register')}}">create an account</a></p>
            </form>
        </div>
    </div>
</div>
@endsection