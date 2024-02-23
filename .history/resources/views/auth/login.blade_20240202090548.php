@extends('layouts.app')
    @section('content')
        <div class="row">
            <div class="col-md-4" ></div>
            <div class="col-md-4 justity-content-center">
                <form action={{ route('login.auth') }} method=POST>
                    @if(Session::has('status'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('status') }}
                        </div>
                    @endif
                    @if(Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="username" class="form-control" id="username" name="username" value="{{ old('username') }}">
                        @error('username')
                            <div class="error">{{ $message }}</div>
                        @enderror                    
                    </div>
                    <div class="mb-3">
                        <label for="userpassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="userpassword" name="password" value="{{ old('password') }}">
                        @error('password')
                            <div class="error">{{ $message }}</div>
                        @enderror                        
                    </div>                        
                    <button type="submit" class="btn btn-primary" style="width:100%">Submit</button>
                </form>
            </div>
        </div>
    @endsection