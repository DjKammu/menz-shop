 <!-- Main Header Area -->
    <nav class="navbar navbar-expand-lg menz-header">
      <div class="menz-header-wrap">
            <div class="menz-logo-container">
               <a class="menz-brand" href="{{ url('/') }}">
                  <img src="{{ asset('public/images/logo-white.svg') }}" alt="Menz Logo" class="img-fluid">
               </a>
            </div>
            <div class="d-lg-none ms-auto me-4">
              <a class="menz-nav-item" href="#" id="menz-search-mobile">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="19px" height="19px" viewBox="0 0 19 19" enable-background="new 0 0 19 19" xml:space="preserve">
                            <path fill="#fff" d="M17.632,16.955l-4.761-4.762c1.109-1.188,1.795-2.776,1.795-4.527c0-3.667-2.982-6.649-6.649-6.649
                              c-3.667,0-6.649,2.982-6.649,6.648c0,3.667,2.982,6.647,6.649,6.647c1.391,0,2.682-0.432,3.75-1.164l4.834,4.834L17.632,16.955z
                              M2.824,7.666c0-2.863,2.33-5.192,5.192-5.192c2.864,0,5.192,2.329,5.192,5.192c0,2.861-2.328,5.191-5.192,5.191
                              C5.154,12.855,2.824,10.527,2.824,7.666z"/>
                            </svg>
                </a>
                <div class="headerSearchBar">
                    <div class="searchBox">
                        <div class="input-group customInputGroup animate__animated animate__slideInRight">
                            <span class="input-group-text" id="basic-addon1">
                          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          width="19px" height="19px" viewBox="0 0 19 19" enable-background="new 0 0 19 19" xml:space="preserve">
                          <path fill="#fff" d="M17.632,16.955l-4.761-4.762c1.109-1.188,1.795-2.776,1.795-4.527c0-3.667-2.982-6.649-6.649-6.649
                            c-3.667,0-6.649,2.982-6.649,6.648c0,3.667,2.982,6.647,6.649,6.647c1.391,0,2.682-0.432,3.75-1.164l4.834,4.834L17.632,16.955z
                            M2.824,7.666c0-2.863,2.33-5.192,5.192-5.192c2.864,0,5.192,2.329,5.192,5.192c0,2.861-2.328,5.191-5.192,5.191
                            C5.154,12.855,2.824,10.527,2.824,7.666z"/>
                          </svg>
                        </span>
                            <input type="text" class="form-control developerSearchInput" placeholder="Nach Schlagwörtern suchen" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <span class="animate__animated animate__fadeIn animate__delay-1s" id="hideSearchBox">
                      <span class="menz-close-icon">
                        <span class="menz-close-left"></span>
                        <span class="menz-close-right"></span>
                        </span>
                        </span>
                    </div>
                </div>
            </div>
            <button class="navbar-toggler menz-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse menz-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  @php
                   list($menus,$dMenus) =  \App\Models\Belege::getMenus();
                @endphp

                @foreach($menus as $menu)
                  <li class="nav-item active">
                        <a class="nav-link menz-nav-item" href="{{ route('belege',Str::lower($menu))}}">
                    {{ $menu}}
                  </a>
                    </li>
                @endforeach

               @if(count($dMenus) > 0)
                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle menz-nav-item" href="javascript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Mehr
                        </a>

                        <div class="dropdown-menu menz-dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                           @foreach($dMenus as $menu)
                    
                            <a class="dropdown-item menz-nav-item" href="{{ route('belege',Str::lower($menu))}}">
                            {{ $menu}}
                            </a>

                           @endforeach

                        </div>
                </li>


                @foreach($dMenus as $menu)
                    
                   <li class="nav-item mobile-more">
                        <a class="nav-link menz-nav-item" href="{{ route('belege',Str::lower($menu))}}">
                    {{ $menu}}
                  </a>
                    </li>

                 @endforeach


               @endif     

                    <li class="nav-item">
                        <a class="nav-link menz-nav-item" href="{{ route('profile') }}">
                        Profil</a>
                    </li>
                </ul>
            </div>
            <div class="d-none d-lg-block">
              <a class="menz-nav-item ms-auto" href="#" id="menz-search-mobile">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="19px" height="19px" viewBox="0 0 19 19" enable-background="new 0 0 19 19" xml:space="preserve">
                            <path fill="#fff" d="M17.632,16.955l-4.761-4.762c1.109-1.188,1.795-2.776,1.795-4.527c0-3.667-2.982-6.649-6.649-6.649
                              c-3.667,0-6.649,2.982-6.649,6.648c0,3.667,2.982,6.647,6.649,6.647c1.391,0,2.682-0.432,3.75-1.164l4.834,4.834L17.632,16.955z
                              M2.824,7.666c0-2.863,2.33-5.192,5.192-5.192c2.864,0,5.192,2.329,5.192,5.192c0,2.861-2.328,5.191-5.192,5.191
                              C5.154,12.855,2.824,10.527,2.824,7.666z"/>
                            </svg>
                </a>
                <div class="headerSearchBar">
                    <div class="searchBox">
                        <div class="input-group customInputGroup animate__animated animate__slideInRight">
                            <span class="input-group-text" id="basic-addon1">
                          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          width="19px" height="19px" viewBox="0 0 19 19" enable-background="new 0 0 19 19" xml:space="preserve">
                          <path fill="#fff" d="M17.632,16.955l-4.761-4.762c1.109-1.188,1.795-2.776,1.795-4.527c0-3.667-2.982-6.649-6.649-6.649
                            c-3.667,0-6.649,2.982-6.649,6.648c0,3.667,2.982,6.647,6.649,6.647c1.391,0,2.682-0.432,3.75-1.164l4.834,4.834L17.632,16.955z
                            M2.824,7.666c0-2.863,2.33-5.192,5.192-5.192c2.864,0,5.192,2.329,5.192,5.192c0,2.861-2.328,5.191-5.192,5.191
                            C5.154,12.855,2.824,10.527,2.824,7.666z"/>
                          </svg>
                        </span>
                            <input type="text" class="form-control developerSearchInput" placeholder="Nach Schlagwörtern suchen" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <span class="animate__animated animate__fadeIn animate__delay-1s" id="hideSearchBox">
                      <span class="menz-close-icon">
                        <span class="menz-close-left"></span>
                        <span class="menz-close-right"></span>
                        </span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </nav>