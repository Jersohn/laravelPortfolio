@extends('Admin.admin_master')
 

   @section('admin')
   <br><br>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         Hi <b>{{ Auth::user()->name}} !</b>
         <b style="float: right;">Total Users
          <span class="badge bg-success">{{count($users)}}</span>
         </b>
      </h2>
      <br><br><br>

    <div class="py-12">
        <div class="container">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                 
              
  <table class="table table-striped">
  <thead>
    <tr>
    <th scope="col">SL N°</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @php($i = 1)
    @foreach($users as $user)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{ $user->name}}</td>
      <td>{{ $user->email}}</td>
      <td>{{Carbon\Carbon::parse( $user->created_at)->diffForHumans()}}</td>
      <td><a href="{{url('user/delete/'.$user->id)}}"onclick="return confirm('Are you sur to delete ?')" class="btn btn-outline-danger"><i class="
mdi mdi-close"></i></a></td>
    </tr>
    @endforeach
   
  </tbody>
</table>
</div>
<div class="col-md-2"></div>
</div>
</div>
       
</div>
@endsection
