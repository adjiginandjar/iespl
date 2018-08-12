<div class="d-lg-flex flex-lg-row section-body">
    @foreach($news as $item)
        @if ( $loop->index == 0)
            <div class="section-left">
                <div class="media thumb">
                    <a data-track="ga" track-cat="Home_page" track-action="News_Thumb_Section" track-label="IMG_{{ $item->title }}" class="media-img rounded" href="{{ $item->link }}" target="_blank">
                        <img class="img-fluid" src="{{ $item->image}}">
                        <div class="overlay abs-center"></div>
                    </a>
                    <div class="media-body">
                        <h2><a data-track="ga" track-cat="Home_page" track-action="News_Thumb_Section" track-label="TITLE_{{ $item->title }}" href="{{ $item->link }}" target="_blank">{{ $item->title }}</a></h2>
                    </div>
                </div>
            </div>
            <div class="section-right">
        @else
            <div class="media thumb">
                <a data-track="ga" track-cat="Home_page" track-action="News_Section_imgThumb" track-label="{{ $item->title }}" class="media-img rounded" href="{{ $item->link }}" target="_blank">
                    <img class="img-fluid" src="{{ $item->image }}">
                    <div class="overlay abs-center"></div>
                </a>
                <div class="media-body align-self-center">
                    <h3><a data-track="ga" track-cat="Home_page" track-action="News_Section_Title" track-label="{{ $item->title }}" href="{{ $item->link }}" target="_blank">{{ $item->title }}</a></h3>
                    <span>via {{ $item->partner->name }}</span>
                </div>
            </div>
        @endif
    @endforeach
    </div>
</div>
