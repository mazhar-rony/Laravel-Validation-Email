<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud Application - Update Profile</title>
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
        <h3>Update Profile</h3>
        <hr>
        <form action="/profiles/{{ $profile->id }}/edit" method="POST">

        @csrf
        @method('patch')

        <div class="row">
            <div class="col-md-6 offset-md-3">
                
                <div class="form-group">
                    <label for="name">Profile Picture</label>
                    <input type="text" id="profile_pic" name="profile_pic" value="{{ $profile->profile_pic }}" placeholder="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">User&#39;s Bio</label>
                    <input type="text" id="bio" name="bio" value="{{ $profile->bio }}" placeholder="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Address</label>
                    <input type="text" id="address" name="address" value="{{ $profile->address }}" placeholder="" class="form-control">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update User</button>
                    <a href="/users/{{ $profile->owner_id }}/show" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </div>
        </form>
    </div>
</body>
</html>