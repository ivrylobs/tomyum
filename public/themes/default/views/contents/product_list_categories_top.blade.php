<div class="category-filters ">
    <div class="category-filters-section">
        <div class="">
{{--            {{ dd($category->hasImages()) }}--}}
            <img src="{{ get_storage_file_url($category->images[0]->path, 'full') }}" alt="" style="width:100%" class="img-responsive">
        </div>
        <div class="space20"></div>

        <div class="cateogry-filters-inner" style="padding: 10px 40px">
            <div class="space10"></div>
            <ul class="cateogry-filters-list cat-list">
                @php $k = 0; @endphp
                @foreach($category->subGroups as $slug => $category)
                @php
                  $cat = \App\CategorySubGroup::with('images')->where('id', $category->id)->first();
                @endphp
                    <li class="text-center" style="width:calc(100%/7)">
                        @if($cat->featuredImage()->first())
                            <a class="b-text" href="{{ route('categories.browse', $category->slug) }}">
                                <img src="{{ get_storage_file_url($cat->featuredImage()->first()->path, 'small') }}" alt="cat-img" class="img-circle brand-logo" style="width: 100px;height: 100px">
                            </a>
                        @else
                            <a class="b-text" href="{{ route('categories.browse', $category->slug) }}">
                                <img src="https://placehold.it/100x100/eee?text={{ $category->name }}" class="img-circle brand-logo" alt="LOGO" title="LOGO"/>
                            </a>
                        @endif

                        <h6 class=""><a class="b-text" href="{{ route('categories.browse', $category->slug) }}">{{ $category->name }}</a></h6>
                    </li>
                @endforeach
                <div class="space20"></div>
            </ul>
        </div>
        <div class="space10"></div>
    </div>
</div>

<style>
    .img-responsive {
        border-radius: 0;
    }

    .cat-list {
        display: flex;
        justify-content: center;
    }
    .cat-list li:not(:last-child) {
        border-right: 1px solid #ddd;
    }

    .cateogry-filters-inner {
        background-color: #fff;
        height: 160px;
    }

    .b-text {
        color: #0d0d0d;
    }
    #content-wrapper {
        /*min-height: 380px;*/
        /*background: rgb(237,48,36);*/
        background: linear-gradient(to bottom,
        rgba(237, 48, 36, 1) 3%,
        rgba(244, 117, 36, 1) 13%,
        rgba(249,164,36,1) 21%,
        rgba(249,170,51,1) 29%,
        /*rgba(251,191,102,1) 38%,*/
        /*#F7D121 40%,*/
        #f0f0f0 40%);
    }
</style>