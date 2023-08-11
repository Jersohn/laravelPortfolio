 @extends('Admin.admin_master')


   @section('admin')
  

    <div class="py-12">
        <div class="container">
            <div>
                <h1>Manage about</h1>
            <a style="float: right;" href="{{route('add.about')}}" class="btn btn-outline-info"><i class="mdi mdi-plus"></i>Add New about</a>
            <br><br><br>
            </div>
            <div class="row">
             <div class="col-md-12">
                <div class="card">
                   
                    <div class="card-header text-info">All about$about</div>
                    <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"width="5%">SL N°</th>
                            <th scope="col"width="15%"> Title</th>
                            <th scope="col"width="25%"> Description</th>
                            <th scope="col"width="25%"> Long Description</th>
                           
                            <th scope="col"width="15%">Actions</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                     @php($i=1)
                       @foreach($abouts as $about)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{ $about->title}}</td>
                            <td>{{ $about->description}}</td>
                            <td>{{ $about->long_desc}}</td>
                                       
                            <td>
                                <a href="{{Url('about/edit/'.$about->id)}} "
                                 class="btn btn-outline-info"><i class="mdi mdi-pencil"></i>
                                </a>
                                <a href="{{Url('about/delete/'.$about->id)}}"
                                 onclick="return confirm('Are you sur to delete ?')"
                                  class="btn btn-outline-danger"><i class="mdi mdi-close"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                      

                    </tbody>
                </table>

            </div>
          
           
        </div>
    </div>
            
            </div>         
        </div>

    </div>
@endsection