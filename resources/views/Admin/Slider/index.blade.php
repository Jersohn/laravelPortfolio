 @extends('Admin.admin_master')


   @section('admin')
  

    <div class="py-12">
        <div class="container">
            <div>
                <h1>Manage Slider</h1>
            <a style="float: right;" href="{{route('add.slider')}}" class="btn btn-outline-info"><i class="mdi mdi-plus"></i>Add New Slider</a>
            <br><br><br>
            </div>
            <div class="row">
             <div class="col-md-12">
                <div class="card">
                    @if(session('success'))
                     <div class="alert alert-dismissible fade show alert-success" role="alert">
					{{session('success')}}
				  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				  	</div>  
                    @endif
                    <div class="card-header text-info">All Slider</div>
                    <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"width="5%">SL N°</th>
                            <th scope="col"width="15%">Slider Title</th>
                            <th scope="col"width="25%">Slider Description</th>
                            <th scope="col"width="25%">Slider Image</th>
                            <th scope="col"width="10%">Created At</th>
                            <th scope="col"width="15%">Actions</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                     @php($i=1)
                       @foreach($sliders as $slider)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{ $slider->title}}</td>
                            <td>{{ $slider->description}}</td>
                            <td> <img src="{{asset($slider->image)}}" width="150px" height="100px"></td>
                            
                            <td>{{ $slider->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{Url('slider/edit/'.$slider->id)}} " class="btn btn-outline-info"><i class="
mdi mdi-pencil"></i></a>
                                <a href="{{Url('slider/delete/'.$slider->id)}}" onclick="return confirm('Are you sur to delete ?')" class="btn btn-outline-danger"><i class="
mdi mdi-close"></i></a>
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