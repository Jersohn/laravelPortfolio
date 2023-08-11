   @extends('Admin.admin_master')
   @section('admin')
<div class="row">
    <div class="col-md-2"></div>
  <div class="col-md-8">
         <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
             <div class="card text-center widget-profile px-0 border-0">
                 <div class="card-img mx-auto rounded-circle mt-2">
                     <img src="{{asset(Auth::user()->profile_photo_url)}}" alt="user image" width="100%" height="100%">
                 </div>
                 <div class="card-body">
                     <h4 class="py-2 text-dark">{{Auth::user()->name}}</h4>
                    
                 </div>
             </div>
         </div>
  </div>
  <div class="col-md-2"></div>
</div>
            
<hr class="w-100">
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4">
             <div class="contact-info pt-4">
                 <h2 class="text-dark mb-1">Contact Information</h2>
                 <p class="text-dark font-weight-medium pt-4 mb-2">Name</p>
                 <p>{{Auth::user()->name}}</p>
                 <p class="text-dark font-weight-medium pt-4 mb-2">Email address</p>
                 <p>{{Auth::user()->email}}</p>
                 <p class="text-dark font-weight-medium pt-4 mb-2">Joined Date</p>
                 <p>{{Auth::user()->created_at->diffForHumans()}}</p>
                
                
                
             </div>
            </div>
         
            <div class="col-md-4">

            <div class="card">
                
                    <div class="card-header text-info"><i class="mdi mdi-pencil"></i>Update Profile</div>
                    <div class="card-body">
                        <form action="{{route('user.updateProfile')}}" method="post"enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="old_image" value="{{Auth::user()->profile_photo_url}}">
                              <div class="mb-3">
                               <label for="brandName" class="form-label">User name</label>
                               <input type="text"name="name" class="form-control" value="{{Auth::user()->name}}">
                               @error('name')
                               <span class="text-danger">{{$message}}</span>
                               @enderror
                            
                               </div>
                              <div class="mb-3">
                               <label for="brandName" class="form-label">Email</label>
                               <input type="email"name="email" class="form-control" value="{{Auth::user()->email}}">
                               @error('email')
                               <span class="text-danger">{{$message}}</span>
                               @enderror
                            
                               </div>
                              <div class="mb-3">
                                <label for="brandImage" class="form-label">User Image</label>
                               <input type="file"name="image" class="form-control">
                               @error('image')
                               <span class="text-danger">{{$message}}</span>
                               @enderror
                            
                               </div>
 
 
                                 <button type="submit" class="btn btn-info text-white"><i class="fa-regular fa-plus">update</i></button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
 
        </div>
            
  @endsection