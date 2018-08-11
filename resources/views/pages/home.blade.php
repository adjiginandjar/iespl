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
            <div class="section slider-1">
                @component('components.gameimage',['games'=>$games])
                @endcomponent
            </div>
            <div class="section section-2 d-lg-flex justify-content-between">
                @component('components.listmatch',['matches'=>$matches])
                @endcomponent
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
                    @component('components.gamestanding',['games'=>$games])
                    @endcomponent
                    @include('components.standing')
                </div>
            </div>
      </div>
  </div>
</div>

@endsection
