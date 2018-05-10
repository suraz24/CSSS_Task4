<!DOCTYPE html>
<html>
<head>
   <title>Comments (Index)</title>
   <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
  <div class="container">
      <nav class="navbar navbar-inverse">
         <div class="navbar-header">
           <a class="navbar-brand" href="{{URL::to('Comments') }}">Comments Alert</a>
         </div>
         <ul class="nav navbar-nav">
           <li><a href="{{ URL::to('comments') }}">View All Comments</a></li>
           <li><a href="{{ URL::to('comments/create')}}">Create a Comment</a></li>
         </ul
      </nav>
      <div>

      <h1>All the Comments</h1>
      <!-- will be used to show any messages -->
      @if (Session::has('message'))
       <div class="alert alert-info">{{Session::get('message') }}</div>
      @endif
      <table class="table table-striped table-bordered">
         <thead>
           <tr>
               <th>Comment ID</th>
               <th>Content</th>
               <th>Created At</th>
               <th>Updated at</th>
               <th>Post ID</th>
               <th>User ID</th>
           </tr>
         </thead>
         @foreach($comments as $key => $value)
           <tr>
             <!-- <td><a href="{{ URL::to('orderwithdetails/' . $value->orderid)}}">{{ $value->regno }}</a></td> -->
             <td>{{ $value->id }}</td>
             <td>{{ $value->content }}</td>
             <td>{{ $value->created_at }}</td>
             <td>{{ $value->updated_at }}</td>
             <td>{{ $value->post_id }}</td>
             <td>{{ $value->user_id }}</td>
           <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- delete the order (uses the destroy method DESTROY /categories/{id} -->
                 <!-- we will add this later since its a little more complicated than the other two buttons -->
                 <!-- Show the order (uses the show method found at GET /categories/{id} -->
               <a class="btn btn-small btn-success" href="{{ URL::to('comments/' . $value->id) }}">Show this Comment</a>
           <!-- Edit this order (uses the edit method found at GET /categories/{id}/edit -->
               <a class="btn btn-small btn-info" href="{{ URL::to('comments/' . $value->id . '/edit')}}">Edit this Comment</a>
               {{ Form::open(array('url' => 'comments/' . $value->id, 'class' => 'pull-right')) }}
               {{ Form::hidden('_method', 'DELETE') }}
               {{ Form::submit('Delete this Comment', array('class' => 'btn btn-warning'))}}
               {{ Form::close() }}
           </td>
         </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>
