@extends('Admin.admin_master')
   

   @section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
          <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-info">Update Category</div>
                    <div class="card-body">
                        <form action="{{ url('category/update/'.$categories->id)}}" method="post">
                            @csrf
                              <div class="mb-3">
                               <label for="categoryName" class="form-label">category name</label>
                               <input type="text"name="category_name" value="{{$categories->category_name}}" class="form-control">
                               @error('category_name')
                               <span class="text-danger">{{$message}}</span>
                               @enderror
  
                               </div>
 
 
                                 <button type="submit" class="btn btn-info text-white">Update</button>
                                 <a style="float: right;" href="{{route('all.categories')}}" type="submit" class="btn btn-outline-secondary"><i class="mdi mdi-arrow-left"></i>Back To Categories</a>
                        </form>

                    </div>
                </div>

              </div>
               <div class="col-md-2"></div>
            </div>
        </div>

    </div>
@endsection