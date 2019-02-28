

 <div id="slideshow" class="carousel slide" data-ride="carousel">
          <ul class="carousel-indicators">
            @foreach($slides as $key => $value)
              <li data-target="#slideshow" data-slide-to="{{ $key }}" @if($key == 0) class="active" @endif></li>
            @endforeach
          </ul>
          <div class="carousel-inner">
          @foreach($slides as $key => $value)
            <div class="carousel-item @if($key == 0) active @endif">
              <img src="/slide/{{ $value["img"] }}" alt="" width="1100" height="400">
              <div class="carousel-caption">
                <h3>{{ $value["titolo"] }}</h3>
                <p>{{ $value["descrizione"] }}</p>
              </div>   
            </div>
          @endforeach
          </div>
          <a class="carousel-control-prev" href="#slideshow" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#slideshow" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
    </div>