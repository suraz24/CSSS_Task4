<!DOCTYPE html>
<html>
<head>
     <title>Show User</title>
     <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
  <div class="container">
      <nav class="navbar navbar-inverse">
         <div class="navbar-header">
           <a class="navbar-brand" href="{{URL::to('users') }}">User Alert</a>
         </div>
         <ul class="nav navbar-nav">
           <li><a href="{{ URL::to('users') }}">View All Users</a></li>
           <li><a href="{{ URL::to('users/create')}}">Create a User</a></li>
         </ul>
      </nav>
      <h1>Showing {{ $user->id }}</h1>
      <div class="jumbotron text-center">
         <p>User ID: {{$user->id }}</p>
         <p>User Name: {{$user->name }}</p>
         <p>Email: {{ $user->email }}</p>
         <p>Password: {{ $user->password }}</p>
         <p>Created At: {{ $user->created_at}}</p>
         <p>Updated At: {{ $user->updated_at}}</p>
         <p>Country Id: {{ $user->country_id}}</p>
      </div>
  </div>
</body>
</html>
