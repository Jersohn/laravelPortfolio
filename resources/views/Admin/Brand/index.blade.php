 @extends('Admin.admin_master')


   @section('admin')
  <br><br>

    <div class="py-12">
        <div class="container">
            <div class="row">
             <div class="col-md-8">
                <div class="card">
                     <div class="card-header text-info">All Brand</div>
                    <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">SL N°</th>
                            <th scope="col">Brand_name</th>
                            <th scope="col">Brand_image</th>
                            <th scope="col">Author</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Actions</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                     @php($i=1)
                       @foreach($brands as $brand)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{ $brand->brand_name}}</td>
                            <td> <img src="{{asset($brand->brand_image)}}" width="70px" height="40px"></td>
                            <td>{{ $brand->user->name}}</td>
                            <td>{{ $brand->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{Url('brand/edit/'.$brand->id)}} " class="btn btn-outline-info" ><i class="mdi mdi-pencil"></i></a>
                                <a href="{{Url('brand/delete/'.$brand->id)}}" onclick="return confirm('Are you sur to delete ?')" class="btn btn-outline-danger"><i class="mdi mdi-close"></i></a>
                            </td>
                        </tr>
                        @endforeach
                      

                    </tbody>
                </table>

            </div>
         
           
        </div>
    </div>
              <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-info"><i class="mdi mdi-plus"></i>Add New Brand</div>
                    <div class="card-body">
                        <form action="{{route('addBrandHandler')}}" method="post"enctype="multipart/form-data">
                            @csrf
                              <div class="mb-3">
                               <label for="brandName" class="form-label">Brand name</label>
                               <input type="text"name="brand_name" class="form-control">
                               @error('brand_name')
                               <span class="text-danger">{{$message}}</span>
                               @enderror
                            
                               </div>
                              <div class="mb-3">
                                <label for="brandImage" class="form-label">Brand Image</label>
                               <input type="file"name="brand_image" class="form-control">
                               @error('brand_image')
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