<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud Application - Create User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="/users" class="navbar-brand">CRUD APPLICATION</a>
        </div>
    </div>
    
    <div class="container" style="padding-top: 10px;">
        <h3>Create User</h3>
        <hr>

        <form action="/users/create" method="POST">

        @csrf

        <div class="row">

            <div class="col-md-6 offset-md-3">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" value="{{ old('firstname') }}" placeholder="" class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}">
                    
                    @if ($errors->has('firstname'))
                        <span class="invalid-feedback", role="alert">
                            <strong>{{ $errors->first('firstname') }}</strong>
                        </span>
                    @endif                
                </div>

                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" value="{{ old('lastname') }}" placeholder="" class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}">
                    
                    @if ($errors->has('lastname'))
                        <span class="invalid-feedback", role="alert">
                            <strong>{{ $errors->first('lastname') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
                
                    @if ($errors->has('email'))
                        <span class="invalid-feedback", role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}">
                
                    @if ($errors->has('phone'))
                        <span class="invalid-feedback", role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="exam_score">Exam Score</label>
                    <input type="number" id="exam_score" name="exam_score" value="{{ old('exam_score') }}" placeholder="" class="form-control {{ $errors->has('exam_score') ? 'is-invalid' : '' }}">
                
                    @if ($errors->has('exam_score'))
                        <span class="invalid-feedback", role="alert">
                            <strong>{{ $errors->first('exam_score') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" placeholder="" class="form-control {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}">
                
                    @if ($errors->has('date_of_birth'))
                        <span class="invalid-feedback", role="alert">
                            <strong>{{ $errors->first('date_of_birth') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="user_name">User Name</label>
                    <input type="text" id="user_name" name="user_name" value="{{ old('user_name') }}" placeholder="" class="form-control {{ $errors->has('user_name') ? 'is-invalid' : '' }}">
                
                    @if ($errors->has('user_name'))
                        <span class="invalid-feedback", role="alert">
                            <strong>{{ $errors->first('user_name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" value="" placeholder="" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
                
                    @if ($errors->has('password'))
                        <span class="invalid-feedback", role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" value="" placeholder="" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}">
                
                    @if ($errors->has('password_confirmation'))
                        <span class="invalid-feedback", role="alert">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create User</button>
                    <a href="{{ asset('/users')}}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </div>
        </form>
    </div>
</body>
</html>