@extends('layouts.banner')

@section('banner-body')
    <div class="row ">
        <div class="offset-md-1 col-md-3 bg-white">
            <div class="filter">
                @include('hotels.search._filter')
            </div>
        </div>
        <div class="col-md-6 offset-md-1">
            <div class="banner-message text-center">
                    <p class="subtitle letter-spacing-4 mb-2 banner-text">The best holiday experience</p>
                <h1 class="banner-title text-white">Stay like a local</h1>
            </div>
        </div>
    </div>
@endsection
@section('banner-footer')

<section class="mt-4 pt-4 bg-gray-100">
        <div class="container">
          <div class="text-center pb-lg-4">
            <p class="subtitle text-secondary">One-of-a-kind vacation rentals </p>
            <h2 class="mb-5">Booking with us is easy</h2>
          </div>
          <div class="row">
            <div class="col-lg-4 mb-3 mb-lg-0 text-center">
              <div class="px-0 px-lg-3">
                <div class="icon-rounded bg-primary-light mb-3">
                        <i class="fa fa-search fa-3x"></i>
                    </div>
                <h3 class="h5">Find the perfect rental</h3>
                <p class="text-muted">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed in</p>
              </div>
            </div>
            <div class="col-lg-4 mb-3 mb-lg-0 text-center">
              <div class="px-0 px-lg-3">
                <div class="icon-rounded bg-primary-light mb-3">
                    <i class="fa fa-address-card fa-3x"></i>
                </div>
                <h3 class="h5">Book with confidence</h3>
                <p class="text-muted">The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pit</p>
              </div>
            </div>
            <div class="col-lg-4 mb-3 mb-lg-0 text-center">
              <div class="px-0 px-lg-3">
                <div class="icon-rounded bg-primary-light mb-3">
                        <i class="fa fa-heart fa-3x"></i>
                  
                </div>
                <h3 class="h5">Enjoy your vacation</h3>
                <p class="text-muted">His room, a proper human room although a little too small, lay peacefully between its four familiar </p>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection