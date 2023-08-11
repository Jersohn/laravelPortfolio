@extends('Admin.admin_master')
 

   @section('admin')
   <br><br>

    <div class="py-12">
        <div class="container">
            <div class="row">
          <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card">
                  
                    <div class="card-header text-info"><i class="mdi mdi-plus"></i> Add a New Slider</div>
                    <div class="card-body">
                        <form action="{{ route('store.about')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                              <div class="mb-3">
                               <label for="brandName" class="form-label">Title</label>
                               <input type="text"name="title" class="form-control">
                               @error('title')
                               <span class="text-danger">{{$message}}</span>
                               @enderror
  
                               </div>
                              <div class="mb-3">
                               <label for="brandName" class="form-label">Description</label>
                               <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
                               @error('description')
                               <span class="text-danger">{{$message}}</span>
                               @enderror
  
                               </div>
                              <div class="mb-3">
                               <label for="brandName" class="form-label">Long Description</label>
                               <textarea name="long_desc" cols="30" rows="10" class="form-control"></textarea>
                               @error('long_desc')
                               <span class="text-danger">{{$message}}</span>
                               @enderror
  
                               </div>
                             
                              
 
 
                             <button type="submit" class="btn btn-info text-white">Add</button>
                            <a style="float: right;" href="{{route('all.about')}}" type="submit" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i>Back To About</a>
                        </form>

                    </div>
                </div>

              </div>
               <div class="col-md-2"></div>
            </div>
        </div>

    </div>
@endsection