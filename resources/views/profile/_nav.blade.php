<div class="card"   >
        <div class="card-header py-2 bg-primary">
          <h4 class="p-0 m-0"><i class="fa fa-user"></i> {{ str_limit($user->name, 20) }}</h2>
        </div>
        <nav class="nav flex-column">
            <a class="nav-link border-bottom bg-light {{ $menu == 'profile' ? '' : 'bg-white'}}" href="{{ url('profile') }}">
              <i class="fa fa-info-circle"> </i> 
              <span class="ml-2">Account Information</span>
            </a>
            <a class="nav-link bg-light border-bottom {{ $menu == 'booking' ? '' : 'bg-white'}}" href="{{ url('profile/my-bookings') }}"> 
              <i class="fa fa-list-ul"> </i>  
              <span class="ml-2">My Bookings</span>
            </a>
            <a class="nav-link bg-light {{ $menu == 'password' ? '' : 'bg-white'}}" href="{{ url('profile/change-password') }}"> 
              <i class="fa fa-key"> </i>  
              <span class="ml-2">Change Passward</span>
            </a>
        </nav>
    </div>