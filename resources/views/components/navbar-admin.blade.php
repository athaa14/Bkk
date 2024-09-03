<nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-menu"></span>
      </button>
      <div class="navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="index.html"><img src="{{asset('images/11_1_-removebg-preview.png')}}" width="45px" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/" alt="logo" /></a>
      </div>
      @if(Auth::check())
        <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">Welcome back, {{ Auth::user()->role }}.</h4>
      @else
        <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">Welcome back, Guest.</h4>
      @endif
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item">
          <h4 class="mb-0 font-weight-bold d-none d-xl-block" id="currentDate"></h4>
        </li>
        <!-- Remaining code for messages and notifications -->
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
    <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
      <ul class="navbar-nav mr-lg-2">
        <li class="nav-item nav-search d-none d-lg-block">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search Here..." aria-label="search" aria-describedby="search">
          </div>
        </li>
      </ul>
      <ul class="navbar-nav navbar-nav-right">
        @if(Auth::check())
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="{{asset('images/faces/face5.jpg')}}" alt="profile" />
              <span class="nav-profile-name">{{ Auth::user()->role }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a href="#" class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
              <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        @endif
      </ul>
    </div>
  </nav>
  
  <script>
    function updateDateRange() {
      const startDate = new Date();
      const endDate = new Date();
      
      // Adjust the dates as needed
      const startDateFormatted = startDate.toLocaleDateString();
      const endDateFormatted = endDate.toLocaleDateString();
      
      const currentDateElement = document.getElementById('currentDate');
      if (currentDateElement) {
        currentDateElement.textContent = `${startDateFormatted} - ${endDateFormatted}`;
      }
    }
  
    window.onload = updateDateRange;
  </script>
  