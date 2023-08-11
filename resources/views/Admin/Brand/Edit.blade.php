@extends('Admin.admin_master')
 

   @section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
          <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card">
                   
                    <div class="card-header text-info">Update Brand</div>
                    <div class="card-body">
                        <form action="{{ url('brand/update/'.$brands->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="old_image" value="{{$brands->brand_image}}">
                              <div class="mb-3">
                               <label for="brandName" class="form-label">Brand name</label>
                               <input type="text"name="brand_name" value="{{$brands->brand_name}}" class="form-control">
                               @error('brand_name')
                               <span class="text-danger">{{$message}}</span>
                               @enderror
  
                               </div>
                              <div class="mb-3">
                                <span style="float: right;"></span>
                               <label for="brandImage" class="form-label">Brand Image</label>
                               <input type="file"name="brand_image" class="form-control">
                               @error('brand_image')
                               <span class="text-danger">{{$message}}</span>
                               @enderror
  
                               </div>
                               <div class="mb-3">
                               <p>Existing image</p>
                               <div><img src="{{asset($brands->brand_image)}}" width="400px" height="300px"></div> 

                               </div>
 
 
                             <button type="submit" class="btn btn-info text-white">Update</button>
                            <a style="float: right;" href="{{route('all.brand')}}" type="submit" class="btn btn-outline-secondary"><i class="mdi mdi-arrow-left"></i>Back To Brands</a>
                        </form>

                    </div>
                </div>

              </div>
               <div class="col-md-2"></div>
            </div>
        </div>

    </div>
@endsection