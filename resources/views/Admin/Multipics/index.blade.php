@extends('Admin.admin_master')
 

   @section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
             <div class="col-md-8">
                <div class="card-group">
                   
                    @foreach($pictures as $picture)
                    <div class="col-md-6 mt-5">

                    <div class="card">

                    <img src="{{asset($picture->image)}}" width="100%" height="150px">
                    </div>
                    </div>


                    @endforeach
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-info"><i class="mdi mdi-plus"></i>Add New Pictures</div>
                    <div class="card-body">
                        <form action="{{route('addPicturesHandler')}}" method="post"enctype="multipart/form-data">
                            @csrf
                              <div class="mb-3">
                               <label for="brandName" class="form-label">Select Multi pictures</label>
                               <input type="file" name="images[]" class="form-control" multiple="">
                               @error('images')
                               <span class="text-danger">{{$message}}</span>
                               @enderror
                            
                               </div>
                              
 
                                 <button type="submit" class="btn btn-info text-white"><i class="fa-regular fa-plus">add</i></button>
                        </form>

                    </div>
                </div>

              </div>
            </div>         
        </div>

    </div>
@endsection