@extends('layouts.app')
    @section('content')
        <div class="row">
            <div class="col-md-4" ></div>
            <div class="col-md-4 justity-content-center">
                <form action={{ route('forgot.password') }} method=POST>
                    <strong>You will receive the link to your email, you can use that to reset password.</strong>
                    <div class="form-group">
                        @if($errors->any())
                            <div class="mb-3">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach
                            </div>
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
                            <label for="username" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="error">{{ $message }}</div>
                            @enderror                    
                        </div>
                        <div class="mb-3">
                            <label for="Password" class="form-label">Email</label>
                            <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                            @error('email')
                                <div class="error">{{ $message }}</div>
                            @enderror                    
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="error">{{ $message }}</div>
                            @enderror                    
                        </div>                                      
                        <button type="submit" class="btn btn-primary" style="width:100%">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection