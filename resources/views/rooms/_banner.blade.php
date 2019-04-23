<div class="bd-example">
        <div id="room-banner" class="carousel slide" data-ride="carousel">
         
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{ asset($room->banner) }}" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
              <h5>{{ $room->hotel_name }}</h5>
                <p>{{ $room->title }}.</p>
                @if(count($room->images ?? []))
                  <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target=".room-images"> Show Images</button>
                @endif
              </div>
            </div>
          </div>
          
        </div>
      </div>