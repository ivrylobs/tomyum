<!-- CONTENT SECTION -->
<div class="clearfix space20"></div>

<section class="blog-section">
    <div class="container-fluid" style="background-color: #fff">
        <div class="space50"></div>
        <h1 class="category-title text-center text-uppercase">Blog & Videos</h1>
        <div class="space50"></div>
    </div>
	<div class="container">
        <div class="row row-col-border" data-gutter="60">
            <div class="col-md-9">
                <h3 class="text-uppercase red-underline">Blog</h3>
                @forelse($blogs->chunk(2) as $items)
                    <div class="row">
                        @foreach($items as $blog)
                            <div class="col-md-6">
                                <article class="blog-post">
                                    @if($blog->image)
                                        <a href="{{ route('blog.show', $blog->slug) }}">
                                            <img class="full-width" src="{{ get_storage_file_url(optional($blog->image)->path, '') }}" alt="{{ $blog->title }}" title="{{ $blog->title }}" />
                                        </a>
                                    @endif

                                    <h4 class="blog-post-title"><a href="{{ route('blog.show', $blog->slug) }}">{!! $blog->title !!}</a></h4>
                                    <p class="blog-post-excerpt">
                                        {!! \Illuminate\Support\Str::limit($blog->excerpt, 250) !!}
                                        <a class="pull-right btn btn-link" href="{{ route('blog.show', $blog->slug) }}">{{ trans('theme.button.read_more') }}</a>
                                    </p>

                                    <ul class="blog-post-meta">
                                        <li>{{ trans('theme.published_at') . ' ' . $blog->published_at->diffForHumans() }}</li>
                                        <li>by <a href="{{ route('blog.author', $blog->user_id) }}">{!! $blog->author->getName() !!}</a>
                                        </li>
                                    </ul>
                                </article>

                                <div class="clearfix space50"></div>
                            </div>

                        @endforeach
                    </div>

                @empty
                    <div class="clearfix space50"></div>
                    <h3 class="text-center text-muted">{{ trans('theme.notify.nothing_found') }}</h3>
				@endforelse

                <div class="text-center">
                    {{ $blogs->appends(['vdo' => $vdo->currentPage(), 'blog' => $blogs->currentPage()])->links('layouts.pagination') }}
                </div>
            </div> <!-- /.col-md-9 -->

            <div class="col-md-3">
                @include('partials._blog_sidebar')
            </div> <!-- /.col-md-3 -->
        </div>

		<div id="video-section" class="clearfix space50" style="height: 100px"></div>

        <div  class="row row-col-border" data-gutter="60">
            <div class="col-md-9">
                <h3 class="text-uppercase red-underline">Videos</h3>
                @forelse($vdo->chunk(2) as $items)
                    <div class="row">
                        @foreach($items as $blog)
                            <div class="col-md-6">
                                <article class="blog-post">
                                    @if($blog->image)
                                        <a href="{{ route('blog.show', $blog->slug) }}">
                                            <img class="full-width" src="{{ get_storage_file_url(optional($blog->image)->path, '') }}" alt="{{ $blog->title }}" title="{{ $blog->title }}" />
                                        </a>
                                    @endif

                                    <h4 class="blog-post-title"><a href="{{ route('blog.show', $blog->slug) }}">{!! $blog->title !!}</a></h4>
                                    <p class="blog-post-excerpt">
                                        {!! \Illuminate\Support\Str::limit($blog->excerpt, 250) !!}
                                        <a class="pull-right btn btn-link" href="{{ route('blog.show', $blog->slug) }}">{{ trans('theme.button.read_more') }}</a>
                                    </p>

                                    <ul class="blog-post-meta">
                                        <li>{{ trans('theme.published_at') . ' ' . $blog->published_at->diffForHumans() }}</li>
                                        <li>by <a href="{{ route('blog.author', $blog->user_id) }}">{!! $blog->author->getName() !!}</a>
                                        </li>
                                    </ul>
                                </article>

                                <div class="clearfix space50"></div>
                            </div>

                        @endforeach
                    </div>

                @empty
                    <div class="clearfix space50"></div>
                    <h3 class="text-center text-muted">{{ trans('theme.notify.nothing_found') }}</h3>
                @endforelse

                <div class="text-center">
{{--                    {{ $vdo->links('layouts.pagination') }}--}}
                    {{ $vdo->appends(['blog' => $blogs->currentPage(),'id'=> 'video-section', 'vdo' => $vdo->currentPage()])->links('layouts.pagination')}}
                </div>
            </div> <!-- /.col-md-9 -->

            <div class="col-md-3">
                @include('partials._blog_sidebar2')
            </div> <!-- /.col-md-3 -->
        </div>
        <div class="clearfix space50"></div>


  	</div><!-- /.container -->
</section>

<script>
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }

    const urlParams = new URLSearchParams(window.location.search);
    const myParam = urlParams.get('id');


    if(myParam !== undefined) {
        console.log('ssmyParam', myParam)
        document.getElementById(myParam).scrollIntoView();
    }


</script>