<div class="category-filters-section">
    <h2 class="text-uppercase c-grey">All Category</h2>
    <hr />
{{--    <h3><i class="fa fa-angle-left"></i>--}}
{{--        @if(Request::is('search'))--}}
{{--            <a class="link-filter-opt" data-name="insubgrp" data-value="all">--}}
{{--        @else--}}
{{--            <a href="{{ route('categories') }}">--}}
{{--        @endif--}}
{{--        @lang('theme.all_categories')</a>--}}
{{--    </h3>--}}
    <ul class="cateogry-filters-list">
        @if(Request::is('search'))
            <li>
                @if(Request::has('ingrp'))

                    <h3 class="">{{ $category->name }}</h3>
                    @php
                        $t_categories = $products->pluck('product.categories')->flatten()->unique();
                        $t_categories = $t_categories->pluck('subGroup.slug')->flatten()->unique()->toArray();
                    @endphp
                    <ul>
                        @foreach($category->subGroups as $slug => $category)
                            @if(in_array($category->slug, $t_categories))
                                <li>
                                    <a class="link-filter-opt" data-name="insubgrp" data-value="{{ $category->slug }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>

                @elseif(Request::has('insubgrp') && Request::get('insubgrp') != 'all')

                    @php
                        $t_categories = $products->pluck('product.categories')->flatten()->unique();
                        $t_categories = $t_categories->pluck('slug')->flatten()->unique()->toArray();
                    @endphp

                    <h3>
                        <i class="fa fa-angle-left"></i>
                        <a class="link-filter-opt" data-name="ingrp" data-value="{{ $category->group->slug }}">
                            {{ $category->group->name }}
                        </a>
                    </h3>
                    <h3>
                        <i class="fa fa-angle-left"></i>
                        <a class="link-filter-opt" data-name="ingrp" data-value="{{ $category->slug }}">
                            {{ $category->name }}
                        </a>
                    </h3>

                    <ul>
                        @foreach($category->categories as $category)
                            @if(in_array($category->slug, $t_categories))
                                <li>
                                    <a class="link-filter-opt" data-name="in" data-value="{{ $category->slug }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>

                @elseif(Request::has('in'))

                    <h3>
                        <i class="fa fa-angle-left"></i>
                        <a class="link-filter-opt" data-name="ingrp" data-value="{{ $category->subGroup->group->slug }}">
                            {{ $category->subGroup->group->name }}
                        </a>
                    </h3>
                    <h3>
                        <i class="fa fa-angle-left"></i>
                        <a class="link-filter-opt" data-name="insubgrp" data-value="{{ $category->subGroup->slug }}">
                            {{ $category->subGroup->name }}
                        </a>
                    </h3>

                    <ul>
                        <li>{{ $category->name }}</li>
                    </ul>

                @else

                    @php
                        $t_categories = $products->pluck('product.categories')->flatten()->unique();
                        $t_categories = $t_categories->pluck('subGroup.group')->flatten()->unique();
                    @endphp

                    @foreach($t_categories as $category)
                        <li>
                            <a class="link-filter-opt" data-name="ingrp" data-value="{{ $category->slug }}">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                @endif
            </li>
        @elseif(Request::is('categorygrp/*'))
            <li>
                <h3>{{ $categoryGroup->name }}</h3>
                <ul>
                    @foreach($categoryGroup->subGroups as $slug => $category)
                        @if($category->categories->count())
                            <li><a href="{{ route('categories.browse', $category->slug) }}">{{ $category->name }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </li>
        @elseif(Request::is('categories/*'))
            <li>
                <h3>
                    <i class="fa fa-angle-left"></i>
                    <a href="{{ route('categoryGrp.browse', $categorySubGroup->group->slug) }}">
                        {{ $categorySubGroup->group->name }}
                    </a>
                </h3>
                <h3>{{ $categorySubGroup->name }}</h3>
                <ul>
                    @foreach($categorySubGroup->categories as $slug => $category)
                        <li><a href="{{ route('category.browse', $category->slug) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </li>
        @elseif(Request::is('category/*'))
            <li>
                <h3>
                    <i class="fa fa-angle-left"></i>
                    <a href="{{ route('categoryGrp.browse', $category->subGroup->group->slug) }}">
                        {{ $category->subGroup->group->name }}
                    </a>
                </h3>
                <h3>
                    <i class="fa fa-angle-left"></i>
                    <a href="{{ route('categories.browse', $category->subGroup->slug) }}">
                        {{ $category->subGroup->name }}
                    </a>
                </h3>
                <h3>{{ $category->name }}</h3>
            </li>
        @else
            @foreach($categories as $slug => $category)
                <li>
                    <a href="{{ route('category.browse', $category->slug) }}">{{ $category->name }}
                        {{-- <span class="small">({{ $category->listings_count }})</span> --}}
                    </a>
                </li>
            @endforeach
        @endif
    </ul>
</div>

<style>
    .c-grey {
        color: #707070 !important;
    }

    .cateogry-filters-list li h3 {
        color: #FF0002;
    }

    .category-filters-section h2 {
        font-weight: bold;
    }

    .filter-wrapper {
        margin-top: 20px;
    }

    .selectboxit-list > .selectboxit-focus > .selectboxit-option-anchor {
        background-color: #FF0002;
    }
</style>
