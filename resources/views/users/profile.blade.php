<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud Application - User Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    
    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">CRUD APPLICATION</a>
            {{--  <a href="{{ asset('/users')}}" class="btn btn-primary"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Show Users</a>  --}}
        </div>
    </div>
    
    <div class="container" style="padding-top: 10px;">
        
        <div class="row">
            <div class="col-md-6"><h3>User Profile</h3></div>
            <div class="col-md-6">
                <a href="{{ asset('/users')}}" class="btn btn-success pull-right"><i class="fa fa-user" aria-hidden="true"></i> Show User List</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Profile Id</th>
                        <th>Owner Id</th>
                        <th>Owner Name</th>
                        <th>profile Pic</th>
                        <th>Bio</th>
                        <th>Address</th>
                        <th>Created On</th>
                        <th>Updated On</th>  
                        <th>Action</th>                      
                    </tr>                     
                   
                    <tr>
                        <td>{{ $user->profile->id }}</td>
                        <td>{{ $user->profile->owner_id }}</td>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->profile->profile_pic }}</td>
                        <td>{{ $user->profile->bio }}</td>
                        <td>{{ $user->profile->address }}</td>
                        <td>{{ $user->profile->created_at->format('d-m-Y') }}</td>
                        <td>{{ $user->profile->updated_at->diffForHumans() }}</td>
                        <td><a href="/profiles/{{$user->profile->id}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a></td>                                                               
                    </tr>
                         
                </table>
            </div>
        </div>
        
    </div>

</body>
</html>