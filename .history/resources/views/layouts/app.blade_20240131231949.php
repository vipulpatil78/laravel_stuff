<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel 9 CRUD Tutorial Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .error {
            color:red;
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div style="text-align:center;color:green;">
                <h2>Products Information Management</h2>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('categories.index') }}">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('categories.create') }}">Add Category</a>
                        </li>
                        @auth                            
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                            </li>
                            <li class="nav-item active">
                                <p>{{ Auth::user()->name }}</p>
                            </li>
                        @endauth                        
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    @yield('content')
</body>
