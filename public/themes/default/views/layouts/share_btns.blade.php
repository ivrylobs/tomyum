<div class="share">
	<span >Share &nbsp;&nbsp;&nbsp;&nbsp;
		<a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" class="social-share-btn" target="_blank" data-toggle="tooltip" data-placement="top" title="@lang('theme.share_on',['name' => 'facebook'])" ><i class="fa fa-facebook"></i></a>

		<a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}" class="social-share-btn" target="_blank" data-toggle="tooltip" data-placement="top" title="@lang('theme.share_on',['name' => 'twitter'])" ><i class="fa fa-twitter"></i></a>

		<a href="https://pinterest.com/pin/create/button/?{{http_build_query([
            'url' => Request::fullUrl(),
            'media' => get_product_img_src($item, 'medium'),
            'description' => $item->title
        ])}}" class="social-share-btn" target="_blank" data-toggle="tooltip" data-placement="top" title="@lang('theme.share_on',['name' => 'pinterest'])" ><i class="fa fa-pinterest"></i></a>

		<a href="whatsapp://send?text={{rawurlencode($item->title ." | ". Request::fullUrl())}}" data-toggle="tooltip" data-placement="top" title="@lang('theme.share_on',['name' => 'WhatsApp'])"><i class="fa fa-whatsapp"></i></a>

		<a href="mailto:?subject={{ $item->title }}&amp;body={{ Request::fullUrl() }}" data-toggle="tooltip" data-placement="top" title="@lang('theme.share_on',['name' => 'email'])"><i class="fa fa-envelope-o"></i></a>
	</span>
	<div class="addthis_native_toolbox"></div>

</div>

<style>
	.share a {
		background: #ff0000;
		color: #fff;
	}
	.share span {
		color: #ff0000;
	}
</style>