@foreach($matches as $match)
<div class="swiper-slide thumb d-lg-inline-block">
    <div class="match-info d-flex flex-column">
        <div class="match-head d-flex justify-content-between">
            <div class="cat">
                <span>M{{ $loop->index+1 }}</span>  {{ $match->game->name }}
            </div>
            <span class="stat-watch">10 Aug</span>
        </div>
        <div class="match-body d-flex  justify-content-between align-self-center">
            <div class="club-logo align-self-center">
                <img class="" src="{{ $match->homeTeam->image }}">
                <br>
                <span>{{ $match->homeTeam->nick }}</span>
            </div>
            <div class="match-date align-self-center">
              18:30
            </div>
            <div class="club-logo align-self-center">
                <img class="" src="{{ $match->awayTeam->image }}"><br>
                <span>{{ $match->awayTeam->nick }}</span>
            </div>
        </div>
    </div>
</div>
@endforeach
