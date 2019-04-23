<div class="bd-example">
<div id="roomImages{{$room->id}}" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        @foreach($room->images ?? [] as $image)
          <li data-target="#roomImages{{$room->id}}" data-slide-to="{{$loop->index}}" class="{{$loop->index == 0 ? 'active' : ''}}"></li>
        @endforeach

      </ol>
      <div class="carousel-inner">
        @foreach($room->images ?? [] as $image)
      <div class="carousel-item {{$loop->index == 0 ? 'active' : ''}}">
            <img src="{{ asset($image->path) }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>{{ $image->caption }}</h5>
            </div>
          </div>
        @endforeach
      </div>
      <a class="carousel-control-prev" href="#roomImages{{$room->id}}" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#roomImages{{$room->id}}" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>