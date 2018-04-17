<!DOCTYPE html>
<html>
<head>
   <title>Edit Category</title>
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
      <h1>Edit {{ $category->id }}</h1>
      <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}
        {{ Form::model($category, array('route' => array('categories.update', $category->id),'method' => 'PUT')) }}
    <div class="form-group">
        {{ Form::label('id', 'Category ID') }}
        {{ Form::text('id', Input::old('id'), array('class' => 'form-control')) }}
    </div>
     <div class="form-group">
         {{ Form::label('name', 'Category Name') }}
         {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
     </div>
     {{ Form::submit('Update the category!', array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}
  </div>
</body>
</html>
