@extends('layout')

@section('meta')

@endsection

@section('stylesheet')

@endsection

@section('layout-content')

<div class="container">
    <div class="row">
        <div class="bg-header">
             <img class="bg-home" src="http://iespl.id/themes/iespl/assets/images/bg/home/tokped-home.png">
        </div>
        <div class="tokped-iespl-logo">
             <img src="http://iespl.id/themes/iespl/assets/images/bg/home/tbof-logo-big.png">
        </div>
        <div class="content">
              {{ $games }}
             @include('components.sliderimages')
            <div class="section section-2 d-lg-flex justify-content-between">
                <div class="section-left">
                    <div class="slider-2">
                        <div class="title-heading d-flex justify-content-between">
                            <div class="">
                              <b class="text-blue">Match 1</b>  <span>10 Aug 2018</span>
                            </div>
                            <a data-track="ga" track-cat="Home_page" track-action="Match_Thumb_Section" track-label="See All" href="/match">See All</a>
                        </div>
                        <div class="swiper-container slider-2">
                            @include('components.schedulecard')
                        </div>
                    </div>
                </div>
                @include('components.bannerads')
            </div>
            <div class="section section-3">
                <div class="title-heading">NEWS UPDATE</div>
                @include('components.homenews')
                <div class="btn-wrapper button-more">
                    <a data-track="ga" track-cat="Home_page" track-action="News_Section_Button" track-label="Lihat Semua" class="btn btn-more" target="_blank" href="https://www.kincir.com/tag/iespl">Lihat Semua</a>
                </div>
            </div>
            <div class="section section-5">
                <div class="title-heading">Standing</div>
                <div class="panel with-nav-tabs panel-default">
                    @include('components.gamestanding')
                    @include('components.standing')
                </div>
            </div>
      </div>
  </div>
</div>

@endsection
