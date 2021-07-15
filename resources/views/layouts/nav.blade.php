<nav class="menz-header position-relative">
  <div class="menz-header-wrap">
    <div class="menz-logo-container">
       <a class="menz-brand" href="{{ url('/') }}">
          <img src="{{ asset('images/logo-white.svg') }}" alt="Menz Logo" class="img-fluid">
       </a>
    </div>
    <a class="menz-nav-item active" aria-current="page" href="{{ route('rechnung')}}">Rechnung</a>
    <a class="menz-nav-item" aria-current="page" href="">Lieferschein</a>
    <a class="menz-nav-item" aria-current="page" href="{{ route('profile') }}">Profil</a>
    <a class="menz-nav-item" href="#" id="searchDeveloper"><i class="fa fa-search"></i></a>
  </div>
  <div class="headerSearchBar">
        <div class="searchBox">
            <div class="input-group customInputGroup animate__animated animate__slideInRight">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control developerSearchInput search" placeholder="Search Developer" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <span class="animate__animated animate__fadeIn animate__delay-1s" id="hideSearchBox"><i class="fa fa-times"></i></span>
        </div>
    </div>
</nav>   