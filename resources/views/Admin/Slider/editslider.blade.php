@extends('Admin.admin_master')
 

   @section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
          <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card">
                   
                       @if(session('success'))
                     <div class="alert alert-dismissible fade show alert-success" role="alert">
												{{session('success')}}
				 								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
				 							</div>
                       @endif
                    <div class="card-header text-info">Update Slider</div>
                    <div class="card-body">
                        <form action="{{ url('slider/update/'.$sliders->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="old_image" value="{{$sliders->image}}">
                              <div class="mb-3">
                               <label for="brandName" class="form-label">Title</label>
                               <input type="text"name="title" value="{{$sliders->title}}" class="form-control">
                               @error('title')
                               <span class="text-danger">{{$message}}</span>
                               @enderror
  
                               </div>
                              <div class="mb-3">
                               <label for="brandName" class="form-label">Description</label>
                               <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$sliders->description}}</textarea>
                              
                               @error('description')
                               <span class="text-danger">{{$message}}</span>
                               @enderror
  
                               </div>
                              <div class="mb-3">
                                <span style="float: right;"></span>
                               <label for="brandImage" class="form-label"> Image</label>
                               <input type="file"name="image" class="form-control">
                               @error('image')
                               <span class="text-danger">{{$message}}</span>
                               @enderror
  
                               </div>
                               <div class="mb-3">
                               <p>Existing image</p>
                               <div><img src="{{asset($sliders->image)}}" width="400px" height="300px"></div> 

                               </div>
 
 
                             <button type="submit" class="btn btn-info text-white">Update</button>
                            <a style="float: right;" href="{{route('all.sliders')}}" type="submit" class="btn btn-outline-secondary"><i class="mdi mdi-arrow-left"></i>Back To Brands</a>
                        </form>

                    </div>
                </div>

              </div>
               <div class="col-md-2"></div>
            </div>
        </div>

    </div>
@endsection 