<div class="section-left">
    <div class="slider-2">
        <div class="title-heading d-flex justify-content-between">
            <div class="">
              <b class="text-blue">Match 1</b>  <span>10 Aug 2018</span>
            </div>
            <a data-track="ga" track-cat="Home_page" track-action="Match_Thumb_Section" track-label="See All" href="/match">See All</a>
        </div>
        <div class="swiper-container slider-2">
          <div class="swiper-wrapper d-lg-block d-xs-flex justify-content-xs-center">
              @component('components.matchcard' ,['matches' => $matches])
              @endcomponent
          </div>
        </div>
    </div>
</div>
