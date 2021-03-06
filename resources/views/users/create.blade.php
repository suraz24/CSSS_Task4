<!DOCTYPE html>
<html>
<head>
   <title>Create User</title>
   <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="container">
      <nav class="navbar navbar-inverse">
         <div class="navbar-header">
             <a class="navbar-brand" href="{{ URL::to('users') }}">User Alert</a>
         </div>
         <ul class="nav navbar-nav">
             <li><a href="{{ URL::to('users') }}">View All Users</a></li>
             <li><a href="{{ URL::to('users/create') }}">Create a User</a>
         </ul>
      </nav>
    <h1>Create a User</h1>
    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}
    {{ Form::open(array('url' => 'users')) }}
    <div class="form-group">
        {{ Form::label('id', 'User ID') }}
        {{ Form::text('id', Input::old('id'), array('class' => 'form-control')) }}
    </div>
     <div class="form-group">
         {{ Form::label('name', 'User Name') }}
         {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
     </div>
     <div class="form-group">
         {{ Form::label('email', 'Email') }}
         {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
     </div>
     <div class="form-group">
         {{ Form::label('password', 'Password') }}
         {{ Form::text('password', Input::old('password'), array('class' => 'form-control')) }}
     </div>
     <div class="form-group">
         {{ Form::label('country_id', 'Country Id') }}
         {{ Form::text('country_id', Input::old('country_id'), array('class' => 'form-control')) }}
     </div>
     {{ Form::submit('Create the User!', array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}
  </div>
</body>
</html>
