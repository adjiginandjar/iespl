<div class="title-heading">Standing</div>
<div class="panel with-nav-tabs panel-default">
    <div class="panel-heading">
        <div class="swiper-container slider-4 panel with-nav-tabs panel-default">
            <ul class="swiper-wrapper d-flex justify-content-lg-center nav nav-tabs" id="myTab" role="tablist">
              @foreach ($games as $game)
                <li class="swiper-slide tab {{ $loop->index==0?'active':'' }}">
                    <a data-track="ga" track-cat="Home_page" track-action="Standing_Section" track-label="tab_{{$game->nick}}" href="#tab{{$game->nick}}standing" data-toggle="tab">
                        <i class="icon-{{$game->nick}}"></i>
                    </a>
                </li>
              @endforeach
            </ul>
        </div>
    </div>
    <div class="panel-body">
        <div class="tab-content">
            @foreach ($games as $game)
                <div class="tab-pane {{ $loop->index==0?'active':'' }}" id="tab{{ $game->nick  }}standing">
                    @component('components.standingtable',['game'=> $game])
                    @endcomponent
                </div>
            @endforeach
</div>
