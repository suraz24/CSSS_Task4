<!DOCTYPE html>
<html>
<head>
     <title>Show Category</title>
     <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="container">
       <nav class="navbar navbar-inverse">
          <div class="navbar-header">
              <a class="navbar-brand" href="{{ URL::to('categories') }}">Category Alert</a>
           </div>
       <ul class="nav navbar-nav">
           <li><a href="{{ URL::to('categories') }}">View All Categories</a></li>
           <li><a href="{{ URL::to('categories/create') }}">Create a Category</a>
       </ul>
      </nav>
      <h1>Showing {{ $category->id }}</h1>
      <div class="jumbotron text-center">
         <p>Category ID: {{ $category->id }}</p>
         <p>Category Name: {{ $category->name }}</p>
         <p>Created At: {{$category->created_at}}</p>
         <p>Updated At: {{$category->updated_at}}</p>
      </div>
    </div>
</body>
</html>
