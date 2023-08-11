@extends('Admin.admin_master')
 

   @section('admin')
   <br><br>

    <div class="py-12">
        <div class="container">
            <div class="row">
          <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card">
                  
                    <div class="card-header text-info">Edit About Content</div>
                    <div class="card-body">
                        <form action="{{ url('about/update/'.$abouts->id)}}" method="post">
                            @csrf
                            
                              <div class="mb-3">
                               <label for="brandName" class="form-label">Title</label>
                               <input type="text"name="title" class="form-control" value="{{$abouts->title}}">
                               @error('title')
                               <span class="text-danger">{{$message}}</span>
                               @enderror
  
                               </div>
                              <div class="mb-3">
                               <label for="brandName" class="form-label">Description</label>
                               <textarea name="description" cols="30" rows="10" class="form-control">{{$abouts->description}}</textarea>
                               @error('description')
                               <span class="text-danger">{{$message}}</span>
                               @enderror
  
                               </div>
                              <div class="mb-3">
                               <label for="brandName" class="form-label">Long Description</label>
                               <textarea name="long_desc" cols="30" rows="10" class="form-control">{{$abouts->long_desc}}</textarea>
                               @error('long_desc')
                               <span class="text-danger">{{$message}}</span>
                               @enderror
  
                               </div>
                             
                              
 
 
                             <button type="submit" class="btn btn-info text-white">Update</button>
                            <a style="float: right;" href="{{route('all.about')}}" type="submit" class="btn btn-outline-secondary"><i class="mdi mdi-arrow-left"></i>Back To About</a>
                        </form>

                    </div>
                </div>

              </div>
               <div class="col-md-2"></div>
            </div>
        </div>

    </div>
@endsection