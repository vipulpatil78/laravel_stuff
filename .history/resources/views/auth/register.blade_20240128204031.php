@extends('layouts.app')
    @section('content')
        <div class="row">
            <div class="col-md-4" ></div>
            <div class="col-md-4 justity-content-center">
                <form action={{ route('user.create') }} method=POST>
                    @csrf
                    <fieldset >
                        @if(Session::has('status'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('status') }}
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="{{ old('firstname') }}">
                            @error('firstname')
                                <div class="error">{{ $message }}</div>
                            @enderror                          
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname') }}">
                            @error('lastname')
                                <div class="error">{{ $message }}</div>
                            @enderror                           
                        </div>
                        <div class="mb-3">
                            <label for="useremail" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="useremail" name="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else. Email-id should be unique.</div>
                            @error('lastname')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="userpassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="userpassword" name="password" aria-describedby="passwordHelp" value="{{ old('password') }}">
                            <div id="passwordHelp" class="form-text">Password should be alphanumeric with atleast 1 number and 1 special charater. It should be atleast 8 characters in length.</div>
                            @error('lastname')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>                        
                        <button type="submit" class="btn btn-primary" style="width:100%">Submit</button>
                    </fieldset>
                </form>
            </div>
        </div>
    @endsection