@extends('base')

@section('title','account activate')

@section('content')
    <div class="container">
    <div class="col-md-5 mx-auto">
     <h1 class="text-center  text-muted  mb-3 mt-5">Change your mail</h1>
    <form method="post" action="{{ route('app_change_mail',['token' => $token])}}" >
        @csrf
        @if(Session::has('danger'))
        <div role="alert" class="alert alert-success text-center">
            {{Session::get('danger')}}
        </div>
        @endif
        <label for="change_mail" class="form-label">new mail</label>
        <input type="mail"  name="new_mail"  id="change_mail" value="@if(Session::has('emailses')) {{Session::get('emailses')}} @endif" @if(Session::has('danger')) is_invalid @endif class="form-control mb-3 " required autocomplete="change_mail" autofocus>
        
        <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-block ">Activate</button>
        </div>  
    </form>
    </div>
    </div>
@endsection