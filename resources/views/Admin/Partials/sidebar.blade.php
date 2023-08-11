<aside class="left-sidebar bg-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
                <a href="#">
                <svg
                  class="brand-icon"
                    xmlns="http://www.w3.org/2000/svg"
                  preserveAspectRatio="xMidYMid"
                  width="30"
                    height="33"
                  viewBox="0 0 30 33"
                >
                    <g fill="none" fill-rule="evenodd">
                    <path
                      class="logo-fill-blue"
                        fill="#7DBCFF"
                      d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
                    />
                      <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                  </g>
                </svg>
                  <span class="brand-name">JersDigit Dashboard</span>
              </a>
            </div>
              <!-- begin sidebar scrollbar -->
            <div class="sidebar-scrollbar">

                <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">
                
  
                
                  <li  class="has-sub active expand" >
                      <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
                      aria-expanded="false" aria-controls="dashboard">
                      <i class="mdi mdi-home-variant"></i>
             

                        <span class="nav-text">Home</span> <b class="caret"></b>
                           </a>
                    <ul  class="collapse show"  id="dashboard"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="{{route('all.sliders')}}">
                                <span class="nav-text">Slider</span>
                                
                              </a>
                            </li>
                          
                                       
                            <li >
                              <a class="sidenav-item-link" href="{{route('all.about')}}">
                                <span class="nav-text">Home About</span>
                                
                                
                            
                                
                              </a>
                            </li>
                            <li >
                              <a class="sidenav-item-link" href="{{route('multipics')}}">
                                <span class="nav-text">Home Portfolio</span>                    
                              </a>
                            </li>
                            <li >
                              <a class="sidenav-item-link" href="{{route('all.brand')}}">
                                <span class="nav-text">Home Brand</span>
                                
                            
                                
                              </a>
                            </li>
                          
                        

                        
                      </div>
                    </ul>
                  </li>
                
                  <li  class="has-sub active expand" >
                      <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard1"
                      aria-expanded="false" aria-controls="dashboard">
                      <i class="mdi mdi-view-dashboard-outline"></i>
             

                        <span class="nav-text">Admin</span> <b class="caret"></b>
                           </a>
                    <ul  class="collapse show"  id="dashboard1"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="{{route('dashboard')}}">
                                 <i class="mdi mdi-cookie"></i>
                                <span class="nav-text">Dashboard</span>
                                
                              </a>
                            </li>
                            <li >
                              <a class="sidenav-item-link" href="{{route('all.users')}}">
                                 <i class="mdi mdi-account-multiple"></i>
                                <span class="nav-text">Users</span>
                                
                              </a>
                            </li>
                          
                                       
                            <li >
                              <a class="sidenav-item-link" href="{{route('All.message')}}">
                                 <i class="mdi mdi-gmail"></i>
                                <span class="nav-text">Messages</span>
                                
                            
                                
                              </a>
                            </li>
                           
                           
                          
                        

                        
                      </div>
                    </ul>
                  </li>

                         
              </ul>

            </div>

            <hr class="separator" />

             
          </div>
        </aside>