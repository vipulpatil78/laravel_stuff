@extends('layouts.app')
    @section('content')
        <div class="row">
            <div class="col-md-4" ></div>
            <div class="col-md-4 justity-content-center">
                <form action={{ route('login.auth') }} method=POST>
                    <div class="form-group">
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
                        <button type="submit" class="btn btn-primary" style="width:100%">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection