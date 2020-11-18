<div class="row">
    <div class="space20"></div>
    <div class="col-md-12">
        <div class="section-title">
            <div class="row">
                <div class="col-xs-8">
                    <h3 class="text-left text-uppercase section-heading grey-text">Tomyum VDO</h3>
                </div>
                <div class="col-xs-4 text-right show-more">
                    <a href="{{ url('blog').'#video-section' }}">
                        <h5>Show more</h5>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="border-heading-yellow"></div>
                </div>
            </div>
            <div class="space20"></div>
        </div>
        <div class="row">
            @if(count($videos))
                @foreach($videos as $vdo)
                    <div class="col-md-4 vdo">
                        <a href="{{ url('/blog/'. $vdo->slug) }}">
                            <img src="{{ get_storage_file_url($vdo->images[0]->path, 'full') }}" alt="img" class="img-responsive">
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="space10"></div>
    </div>
</div>
<style>
    .vdo img {
        border-radius: 0;
    }
</style>