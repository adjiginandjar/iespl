
<div class="swiper-container slider-1">
    <div class="swiper-wrapper d-flex justify-content-sm-center">
        @foreach ($games as $game)
            <a data-track="ga" track-cat="Home_page" track-action="League_Thumb_Section" track-label="Dota 2" class="swiper-slide thumb" href="/league/{{ $game->nick }}">
                <img class="rounded" src="{{ $game->image}}">
            </a>
        @endforeach
    </div>
      <!-- Add Pagination -->
    ``<div class="swiper-pagination"></div>
</div>
