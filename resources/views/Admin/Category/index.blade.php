@extends('Admin.admin_master')
 

   @section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
             <div class="col-md-8">
                <div class="card">
                    
                    <div class="card-header text-info">All Categories</div>
                    <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">SL N°</th>
                            <th scope="col">category_name</th>
                            <th scope="col">Author</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Actions</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                     
                       @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                            <td>{{ $category->category_name}}</td>
                            <td>{{ $category->user->name}}</td>
                            <td>{{ $category->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{Url('category/edit/'.$category->id)}} " class="btn btn-outline-info" style="border: none;"><i class="fa-regular fa-edit"></i></a>
                                <a href="{{Url('softdelete/category/'.$category->id)}}" class="btn btn-outline-danger"style="border: none;"><i class="fa-regular fa-trash-can"></i></a>
                            </td>
                        </tr>
                        @endforeach
                      

                    </tbody>
                </table>
                {{ $categories->links()}}
            </div>
        </div>
    </div>
              <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-info"><i class="mdi mdi-plus"></i>Add New Category</div>
                    <div class="card-body">
                        <form action="{{route('addCategoryHandler')}}" method="post">
                            @csrf
                              <div class="mb-3">
                               <label for="categoryName" class="form-label">category name</label>
                               <input type="text"name="category_name" class="form-control">
                               @error('category_name')
                               <span class="text-danger">{{$message}}</span>
                               @enderror
  
                               </div>
 
 
                                 <button type="submit" class="btn btn-info text-white"><i class="fa-regular fa-plus">add</i></button>
                        </form>

                    </div>
                </div>

              </div>
            </div>




            <!-- Trash part -->
            <br><hr><br>

             <div class="row">
             <div class="col-md-8">
                <div class="card">
                   
                    <div class="card-header text-info">All Trash</div>
                    <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">SL N°</th>
                            <th scope="col">category_name</th>
                            <th scope="col">Author</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Actions</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                     
                       @foreach($trashCat as $category)
                        <tr>
                            <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                            <td>{{ $category->category_name}}</td>
                            <td>{{ $category->user->name}}</td>
                            <td>{{ $category->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{Url('category/restore/'.$category->id)}} " class="btn btn-outline-info" style="border: none;"><i class="fa-solid fa-arrow-rotate-left"></i></a>
                                <a href="{{Url('forceDelete/category/'.$category->id)}}" class="btn btn-outline-danger"style="border: none;"><i class="fa-regular fa-trash-can"></i></a>
                            </td>
                        </tr>
                        @endforeach
                      

                    </tbody>
                </table>
                {{ $trashCat->links()}}
            </div>
        </div>
    </div>
              <div class="col-md-4">
               

              </div>
            </div>
        </div>

    </div>
@endsection