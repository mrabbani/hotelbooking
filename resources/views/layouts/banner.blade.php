@extends('layouts.master')
@section('styles')
<style>
    #banner-main {
        background-image: ;  
        height: 100vh
    }
    .banner .banner-img {
        z-index: -1;
        /* opacity: .75; */
        height: 100%;
    }
    .banner-body {
        position: absolute;
        top: 15vh;
        /* left: 0vh;/ */
        width: 100%
    }
    .banner-message {
        top: 30vh;
        position: absolute;
        width: 100%;
    }
    h1.banner-title {
        font-size: 72px;
        font-weight: 700;
        color: #e83e8c !important;
    }
    .banner-text {
        color: white;
        text-shadow: 2px 2px 2px rgba(0,0,0,0.1);

        font-weight: bold;
        font-size: 20px;
    }
    .letter-spacing-4 {
        letter-spacing: .4em;
    }
    
</style>
@endsection
@section('main-content')
<section class="banner">
    <div id="banner-main" style="">
    {{-- <div style="background-image: url(&quot;{{asset('img/upload/banner0.jpg')}}&quot;); width: 1280px; transform: translate3d(-2560px, 0px, 0px); transition-duration: 0ms;" >
    sdkfjsakdfjk
    </div> --}}
        <img class="banner-img" src="{{asset('img/upload/banner0.jpg') }}" width="100%"/>
        
        <div class="banner-body">
            @yield('banner-body')
        </div>
        
    </div>
</section>
@yield('banner-footer')
@endsection
