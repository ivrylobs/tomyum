@unless(empty($recently_viewed_items))
	<section class="">
	  <div class="container">
	    <div class="section-title">
{{--	      <h4 class="small">Recently</h4>--}}
	    </div>
	    <div class="section-content">

	      @include('sliders.carousel_thumbs_small_custom', ['products' => $recently_viewed_items])

	    </div>
	  </div><!-- /.container -->
	</section>
@endunless