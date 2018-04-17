<!DOCTYPE html>
<html>
<head>
   <title>Categories (Index)</title>
   <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
  <div class="container">
      <nav class="navbar navbar-inverse">
         <div class="navbar-header">
           <a class="navbar-brand" href="{{URL::to('categories') }}">Category Alert</a>
         </div>
         <ul class="nav navbar-nav">
           <li><a href="{{ URL::to('categories') }}">View All Categories</a></li>
           <li><a href="{{ URL::to('categories/create')}}">Create a Category</a></li>
         </ul
      </nav>
      <div>

      <h1>All the Categories</h1>
      <!-- will be used to show any messages -->
      @if (Session::has('message'))
       <div class="alert alert-info">{{Session::get('message') }}</div>
      @endif
      <table class="table table-striped table-bordered">
         <thead>
           <tr>
               <th>Category ID</th>
               <th>Category Name</th>
               <th>Created At</th>
               <th>Updated at</th>
           </tr>
         </thead>
         @foreach($categories as $key => $value)
           <tr>
             <!-- <td><a href="{{ URL::to('orderwithdetails/' . $value->orderid)}}">{{ $value->regno }}</a></td> -->
             <td>{{ $value->id }}</td>
             <td>{{ $value->name }}</td>
             <td>{{ $value->created_at }}</td>
             <td>{{ $value->updated_at }}</td>
           <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- delete the order (uses the destroy method DESTROY /categories/{id} -->
                 <!-- we will add this later since its a little more complicated than the other two buttons -->
                 <!-- Show the order (uses the show method found at GET /categories/{id} -->
               <a class="btn btn-small btn-success" href="{{ URL::to('categories/' . $value->id) }}">Show this category</a>
           <!-- Edit this order (uses the edit method found at GET /categories/{id}/edit -->
               <a class="btn btn-small btn-info" href="{{ URL::to('categories/' . $value->id . '/edit')}}">Edit this category</a>
               {{ Form::open(array('url' => 'categories/' . $value->id, 'class' => 'pull-right')) }}
               {{ Form::hidden('_method', 'DELETE') }}
               {{ Form::submit('Delete this Category', array('class' => 'btn btn-warning'))}}
               {{ Form::close() }}
           </td>
         </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>
