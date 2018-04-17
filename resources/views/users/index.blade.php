<!DOCTYPE html>
<html>
<head>
   <title>Users (Index)</title>
   <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
  <div class="container">
      <nav class="navbar navbar-inverse">
         <div class="navbar-header">
           <a class="navbar-brand" href="{{URL::to('Users') }}">Users Alert</a>
         </div>
         <ul class="nav navbar-nav">
           <li><a href="{{ URL::to('users') }}">View All Users</a></li>
           <li><a href="{{ URL::to('users/create')}}">Create a User</a></li>
         </ul
      </nav>
      <div>

      <h1>All the Users</h1>
      <!-- will be used to show any messages -->
      @if (Session::has('message'))
       <div class="alert alert-info">{{Session::get('message') }}</div>
      @endif
      <table class="table table-striped table-bordered">
         <thead>
           <tr>
               <th>User ID</th>
               <th>User Name</th>
               <th>Email</th>
               <th>Password</th>
               <th>Created At</th>
               <th>Updated at</th>
               <th>Country ID</th>
           </tr>
         </thead>
         @foreach($users as $key => $value)
           <tr>
             <!-- <td><a href="{{ URL::to('orderwithdetails/' . $value->orderid)}}">{{ $value->regno }}</a></td> -->
             <td>{{ $value->id }}</td>
             <td>{{ $value->name }}</td>
             <td>{{ $value->email }}</td>
             <td>{{ $value->password }}</td>
             <td>{{ $value->created_at }}</td>
             <td>{{ $value->updated_at }}</td>
             <td>{{ $value->country_id }}</td>
           <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- delete the order (uses the destroy method DESTROY /categories/{id} -->
                 <!-- we will add this later since its a little more complicated than the other two buttons -->
                 <!-- Show the order (uses the show method found at GET /categories/{id} -->
               <a class="btn btn-small btn-success" href="{{ URL::to('users/' . $value->id) }}">Show this User</a>
           <!-- Edit this order (uses the edit method found at GET /categories/{id}/edit -->
               <a class="btn btn-small btn-info" href="{{ URL::to('users/' . $value->id . '/edit')}}">Edit this User</a>
               {{ Form::open(array('url' => 'users/' . $value->id, 'class' => 'pull-right')) }}
               {{ Form::hidden('_method', 'DELETE') }}
               {{ Form::submit('Delete this User', array('class' => 'btn btn-warning'))}}
               {{ Form::close() }}
           </td>
         </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>
