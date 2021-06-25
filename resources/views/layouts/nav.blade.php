<nav class="menz-header">
  <div class="menz-header-wrap">
    <div class="menz-logo-container">
       <a class="menz-brand" href="{{ url('/') }}">
          <img src="{{ asset('images/logo-white.svg') }}" alt="Menz Logo" class="img-fluid">
       </a>
    </div>
    <a class="menz-nav-item active" aria-current="page" href="{{ route('rechnung')}}">Rechnung</a>
    <a class="menz-nav-item" aria-current="page" href="">Lieferschein</a>
    <a class="menz-nav-item" aria-current="page" href="{{ route('profile') }}">Profil</a>
  </div>
</nav>   