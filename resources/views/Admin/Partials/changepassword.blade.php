 @extends('Admin.admin_master')
   @section('admin')

<br><br>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
    <div class="card">
        
        <div class="card-header text-info"><i class="mdi mdi-pencil"></i>Change Password</div>
                <div class="card-body">
                    <form action="{{route('password.update')}}" method="post">
                            @csrf
             
                        <div class="mb-3">
                               <label for="currentPassword" class="form-label">Current password</label>
                               <input type="password" id="current_password" name="cur_password" class="form-control">
                            
                               @error('cur_password')
                               <span class="text-danger">{{$message}}</span>
                               @enderror
  
                        </div>
                        <div class="mb-3">
                               <label for="newPassword" class="form-label">New password</label>
                               <input type="password" id="password" name="new_password" class="form-control">
                            
                               @error('new_password')
                               <span class="text-danger">{{$message}}</span>
                               @enderror
  
                        </div>
                        <div class="mb-3">
                               <label for="conformedPassword" class="form-label">Confirm password</label>
                               <input type="password" id="password_confirmation" name="new_password_confirmation" class="form-control">
                            
                               @error('conf_password')
                               <span class="text-danger">{{$message}}</span>
                   
                               @enderror
  
                        </div>
 
 
                         <button type="submit" class="btn btn-info text-white"><i class="fa-regular fa-plus">add</i></button>
                     </form>

                </div>
            </div>
        </div>
    <div class="col-md-2"></div>
 </div>



   @endsection