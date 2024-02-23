@extends('layouts.app')
    @section('content')
        <div class="row">
            <div class="col-md-4" ></div>
            <div class="col-md-4 justity-content-center">
                <form action={{ route('user.create') }} method=POST>
                    @csrf
                    <div class="mb-3">
                        <label for="useremail" class="form-label">Email address</label>
                        <input type="username" class="form-control" id="useremail" name="email" value="{{ old('email') }}">                        
                    </div>
                    <div class="mb-3">
                        <label for="userpassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="userpassword" name="password" value="{{ old('password') }}">                        
                    </div>                        
                    <button type="submit" class="btn btn-primary" style="width:100%">Submit</button>
                </form>
            </div>
        </div>
    @endsection