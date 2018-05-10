<!DOCTYPE html>
<html>
<head>
   <title>Create Category</title>
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
    <h1>Create a Category</h1>
    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}
    {{ Form::open(array('url' => 'categories')) }}
     <div class="form-group">
         {{ Form::label('name', 'Category Name') }}
         {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
     </div>
     {{ Form::submit('Create the category!', array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}
  </div>
</body>
</html>
