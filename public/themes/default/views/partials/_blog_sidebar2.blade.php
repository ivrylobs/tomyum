<aside>
{{--    <section class="blog-sidebar-section">--}}
{{--        <h3 class="widget-title-sm">{{ trans('theme.search') }}</h3>--}}
{{--        <div class="row">--}}
{{--            <div class="col-xs-12">--}}
{{--                {!! Form::open(['route' => ['blog.search'], 'method' => 'GET', 'id' => 'form', 'class' => 'form-inline', 'role' => 'form', 'data-toggle' => 'validator']) !!}--}}
{{--                  <div class="input-group full-width">--}}
{{--                    {!! Form::text('q', Null, ['class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.search'), 'required']) !!}--}}
{{--                    <div class="input-group-btn">--}}
{{--                      <button class="btn btn-primary flat" type="submit">--}}
{{--                        <span class="fa fa-search"></span>--}}
{{--                      </button>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                {!! Form::close() !!}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <section class="blog-sidebar-section">
{{--        <h3 class="widget-title-sm">{{ trans('theme.recent_posts') }}</h3>--}}
        <h3 class="text-uppercase red-underline">Recent Videos</h3>
        <ul class="blog-sidebar-posts">
            <div class="space20"></div>
            @foreach(\App\Helpers\ListHelper::recentBlogs() as $key => $blog)
                <li>
                    <div class="row">
                        <div class="col-md-4">
                            @if($blog->image)
                                <a href="{{ route('blog.show', $blog->slug) }}">
                                    <img class="full-width" src="{{ get_storage_file_url(optional($blog->image)->path, 'blog') }}" alt="{{ $blog->title }}" title="{{ $blog->title }}" />
                                </a>
                            @endif
                        </div>
                        <div class="col-md-8 recent-blog-head">
                            <h6 class=""><a href="{{ route('blog.show', $blog->slug) }}">{!! $blog->title !!}</a></h6>
                            <p class="blog-post-excerpt">
                                {!! \Illuminate\Support\Str::limit($blog->excerpt, 70) !!}
                                <a class="pull-right btn btn-link" href="{{ route('blog.show', $blog->slug) }}">{{ trans('theme.button.read_more') }}</a>
                            </p>
                            <h6 class="red-color">{!! $blog->description !!}</h6>
                            {{--                    <small class="text-muted">{{ $blog->published_at->diffForHumans() }}</small>--}}
                        </div>
                    </div>
                </li>
                <div class="space10"></div>
            @endforeach
        </ul>
    </section>
    <section class="blog-sidebar-section">
        <div class="space50"></div>
        <h3 class="text-uppercase red-underline">Popular Videos</h3>
        <div class="space30"></div>
        <ul class="blog-sidebar-posts">
            <div class="space20"></div>
            @foreach(\App\Helpers\ListHelper::popularBlogs() as $key => $blog)
                <li>
                    <div class="row">
                        <div class="col-md-4">
                            @if($blog->image)
                                <a href="{{ route('blog.show', $blog->slug) }}">
                                    <img class="full-width" src="{{ get_storage_file_url(optional($blog->image)->path, 'blog') }}" alt="{{ $blog->title }}" title="{{ $blog->title }}" />
                                </a>
                            @endif
                        </div>
                        <div class="col-md-8 recent-blog-head">
                            <h6 class=""><a href="{{ route('blog.show', $blog->slug) }}">{!! $blog->title !!}</a></h6>
                            <p class="blog-post-excerpt">
                                {!! \Illuminate\Support\Str::limit($blog->excerpt, 70) !!}
                                <a class="pull-right btn btn-link" href="{{ route('blog.show', $blog->slug) }}">{{ trans('theme.button.read_more') }}</a>
                            </p>
                            <h6 class="red-color">{!! $blog->description !!}</h6>
                            {{--                    <small class="text-muted">{{ $blog->published_at->diffForHumans() }}</small>--}}
                        </div>
                    </div>
                </li>
                <div class="space10"></div>
            @endforeach
        </ul>
    </section>

{{--    @if(isset($tags) && $tags)--}}
{{--        <section class="blog-sidebar-section">--}}
{{--            <h3 class="widget-title-sm">{{ trans('theme.tags') }}</h3>--}}
{{--            <ul class="blog-sidebar-tags">--}}
{{--                @foreach($tags as $tag)--}}
{{--                    <li><a href="{{ route('blog.tag', $tag['name']) }}">{{ $tag['name'] }}</a></li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </section>--}}
{{--    @endif--}}
</aside>