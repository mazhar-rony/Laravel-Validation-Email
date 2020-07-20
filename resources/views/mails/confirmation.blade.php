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
        <h3>Send Email</h3>
        <hr>

        <form action="/sendmail" method="POST">

        @csrf

        <div class="row">

            <div class="col-md-6 offset-md-3">

                
                <div class="form-group">
                    <label for="email_to">Email To</label>
                    <input type="email" id="email_to" name="email_to" value="{{ old('email_to') }}" 
                    placeholder="Receiver Email" class="form-control {{ $errors->has('email_to') ? 'is-invalid' : '' }}">
                    
                    @if ($errors->has('email_to'))
                        <span class="invalid-feedback", role="alert">
                            <strong>{{ $errors->first('email_to') }}</strong>
                        </span>
                    @endif                
                </div>
                
                <div class="form-group">
                    <label for="email_body">Body</label>
                    <textarea id="email_body" name="email_body" placeholder="Your Message..." 
                    class="form-control {{ $errors->has('email_body') ? 'is-invalid' : '' }}" 
                    cols="30" rows="10">{{ old('email_body') }}</textarea>
                    
                    @if ($errors->has('email_body'))
                        <span class="invalid-feedback", role="alert">
                            <strong>{{ $errors->first('email_body') }}</strong>
                        </span>
                    @endif                
                </div>

                

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Send</button>
                    <a href="{{ asset('/sendmail')}}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </div>
        </form>
    </div>
</body>
</html>