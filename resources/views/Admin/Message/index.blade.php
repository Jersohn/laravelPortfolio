@extends('Admin.admin_master')
 

  @section('admin')
  
      <br><br><br>

    <div class="py-12">
        <div class="container">
            <div class="row">
           
              <div class=" offset-md-1 col-md-8">
                  
              
  <table class="table table-striped">
  <thead>
    <tr>
    <th scope="col">SL N°</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Subject</th>
      <th scope="col">Message</th>
      <th scope="col">Created_at</th>
      <th scope="col-2">Actions</th>

    </tr>
  </thead>
  <tbody>
    @php($i = 1)
    @foreach($messages as $message)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{ $message->name}}</td>
      <td>{{ $message->email}}</td>
      <td>{{ $message->subject}}</td>
      <td>{{ $message->message}}</td>
      <td>{{$message->created_at->diffForHumans()}}</td>
      <td><a href="{{Url('delete/message/'.$message->id)}}" onclick="return confirm('Are you sur to delete ?')" class="btn btn-outline-danger"><i class="mdi mdi-close"></i></a></td>
      <td><a href="mailto:{{$message->email}}" class="btn btn-outline-info"><i class="mdi mdi-message"></i></a></td>
    </tr>
    @endforeach
   
  </tbody>
</table>
</div>

 </div>
  </div>
 </div>
    
 


@endsection
