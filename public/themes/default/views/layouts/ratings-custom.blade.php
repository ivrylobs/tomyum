
	<div class="product-info-rating">
		<div class="space10"></div>
		@if($ratings)
			@for($i = 0; $i < 5; $i++)
				@if( ($ratings - $i) >= 1 )
					<span class="rated"><i class="fa fa-star fa-fw"></i></span>
				@elseif( ($ratings - $i) < 1 && ($ratings - $i) > 0 )
					<span class="rated"><i class="fa fa-star-half-o fa-fw"></i></span>
				@else
					<span class="unrated"><i class="fa fa-star-o fa-fw"></i></span>
				@endif
			@endfor
			<span class="count-review-text">(1 Review)</span>
		@endif

		@if(isset($count) && $count)
			@if(isset($shop) && $shop)
				<a href="javascript:void(0)" data-toggle="modal" data-target="#shopReviewsModal" data-tab="#shop_reviews_tab" class="rating-count shop-rating-count">
					({{ get_formated_decimal($ratings,true,1) }}) {{ trans_choice('theme.reviews', $count, ['count' => $count]) }}
				</a>
			@elseif(isset($item))
				<a href="{{ route('show.product', $item->slug) . '#reviews_tab' }}" class="rating-count product-rating-count">
					({{ get_formated_decimal($ratings,true,1) }}) {{ trans_choice('theme.reviews', $count, ['count' => $count]) }}
				</a>
			@endif
		@endif
	</div>

<style>
	.rated, .unrated {
		font-size: 12px;
	}
	.count-review-text {
		font-size: 14px;
	}
</style>