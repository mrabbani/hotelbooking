<div class="card"   >
        <div class="card-header py-2">
          <h4 class="p-0 m-0">My Account</h2>
        </div>
        <nav class="nav flex-column">
            <a class="nav-link bg-light {{ $menu == 'profile' ? '' : 'bg-white'}}" href="{{ url('profile') }}">Account Information</a>
            <a class="nav-link bg-light {{ $menu == 'booking' ? '' : 'bg-white'}}" href="{{ url('profile/my-bookings') }}">My Bookings</a>
            <a class="nav-link bg-light {{ $menu == 'password' ? '' : 'bg-white'}}" href="{{ url('profile/change-password') }}">Change Passward</a>
        </nav>
    </div>