<?php
$lists = [];
$parent = null;

$key = 0;

foreach ($all_categories as $catGroup) {

    if ($catGroup->subGroups->count()) {
        if ($catGroup->id == 5) {
            $parent = $catGroup;
            foreach ($catGroup->subGroups as $subGroup) {
                if($key < 6) {
                    array_push($lists, $subGroup);
                    $key++;
                }
            }
        }

    }
}

$lists = collect($lists);

?>
<div class="row">
    <div class="space20"></div>
    <div class="col-md-12 bg-white">
        <div class="section-title">
            <div class="row">
                <div class="col-xs-8">
                    <h3 class="text-left text-uppercase section-heading grey-text">Mom and Baby</h3>
                </div>
                <div class="col-xs-4 text-right show-more">
                    <a href="{{ url('categorygrp/mom-and-baby') }}">
                        <h5>Show more</h5>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="border-heading-red"></div>
                </div>
            </div>
            <div class="space10"></div>
        </div>
        <div class="row row-box">
            <div class="col-md-4 nopadding-left">
                <a href="{{ url('categorygrp/mom-and-baby') }}">
                    @if(isset($parent))
                        <img src="{{ get_storage_file_url($parent->image->path, 'full') }}" alt="img" class="img-responsive">
                        <div class="detail-inner">
                            <h6>Source Now</h6>
                        </div>
                    @endif
                </a>
            </div>
            <div class="col-md-8 nopadding-left">
                @if(count($lists))
                    @foreach($lists->chunk(3) as $key => $chunk)
                        <div class="row" @if($key > 0) style="margin-top: 20px" @endif>
                            @foreach($chunk as $item)
                                @php
                                    $cat = \App\CategorySubGroup::with('images')->where('id', $item->id)->orderby('id', 'desc')->first();
                                @endphp
                                <div class="col-md-4 nopadding-right">
                                    <a href="{{  url('categories/'. $cat->slug) }}">
                                        @if($cat->featuredImage()->first())
                                            <img src="{{ get_storage_file_url($cat->image->path, 'full') }}" alt="img" class="img-responsive">
                                            <div class="detail-category-name">{{ $item->name }}</div>
                                        @else
                                            <img src="https://placehold.it/300x200/eee?text={{ $item->name }}" class="" alt="LOGO" title="LOGO"/>
                                        @endif
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="space10"></div>
    </div>
</div>