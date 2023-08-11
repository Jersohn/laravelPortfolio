  @php
  $userCount = DB::table('users')->count();
  $messageCount = DB::table('messages')->count();
  $brandCount = DB::table('brands')->count();

  @endphp
  @extends('Admin.admin_master')
   


   @section('admin')
   <div class="content">						 
             
     <!-- Top Statistics -->
                  <div class="row">
                   
                   
                    <div class="col-md-6 col-lg-6 col-xl-3">
									   <div class="media widget-media p-4 bg-white border">
										  <div class="icon rounded-circle mr-4 bg-primary">
											<i class="mdi mdi-account-outline text-white font-size-20 "></i>
										  </div>
										  <div class="media-body align-self-center">
											<h4 class="text-primary mb-2">{{$userCount}}</h4>
											<p>New Users</p>
										  </div>
									  </div>
								   </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
									   <div class="media widget-media p-4 bg-white border">
										  <div class="icon rounded-circle mr-4 bg-primary">
											<i class="mdi mdi-shopping text-white font-size-20 "></i>
										  </div>
										  <div class="media-body align-self-center">
											<h4 class="text-primary mb-2">{{$brandCount}}</h4>
											<p>Brands</p>
										  </div>
									  </div>
								   </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
									   <div class="media widget-media p-4 bg-white border">
										  <div class="icon rounded-circle mr-4 bg-primary">
											<i class="mdi mdi-email-outline text-white font-size-20"></i>
										  </div>
										  <div class="media-body align-self-center">
											<h4 class="text-primary mb-2">{{$messageCount}}</h4>
											<p>Messages</p>
										  </div>
									  </div>
								   </div>
                  </div>


					


						

						
                  <!-- New Customers -->
                  
</div>
							
  
@endsection