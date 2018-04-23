<!DOCTYPE html>
<html>
<head>
     <title>Show Country</title>
     <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
  <div class="container">
      <nav class="navbar navbar-inverse">
         <div class="navbar-header">
           <a class="navbar-brand" href="{{URL::to('countries') }}">Country Alert</a>
         </div>
         <ul class="nav navbar-nav">
           <li><a href="{{ URL::to('countries') }}">View All Countries</a></li>
           <li><a href="{{ URL::to('countries/create')}}">Create a Country</a></li>
         </ul>
      </nav>
      <h1>Showing {{ $country->id }}</h1>
      <div class="jumbotron text-center">
         <p>Country ID: {{$country->id }}</p>
         <p>Country Name: {{$country->name }}</p>
         <p>Created At: {{$country->created_at}}</p>
         <p>Updated At: {{$country->updated_at}}</p>
      </div>
  </div>
</body>
</html>
