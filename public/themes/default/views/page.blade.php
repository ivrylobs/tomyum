@extends('layouts.main')

@section('content')
    <!-- PAGE COVER IMAGE -->
    @include('banners.page_cover')


    <style>
        .staticcover p:first-child {
            font-size: 36px;
            font-weight: bold;
            /*margin-top: 50px;*/
            color: #ff0002;
            text-align: center;
        }

        @media (min-width: 992px) {
            #content-wrapper {
                margin-top: 0px;
            }
        }
    </style>

    <!-- CONTENT SECTION -->
    <div class="clearfix space20"></div>
    <section>
        <div class="container" id="page-container">
            <div class="row">
                <div class="col-md-12">
                    {!! $page->content !!}
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>


    <!-- For contact page only -->
    @if(\App\Page::PAGE_CONTACT_US == $page->slug)
        @include('layouts.contact_us')
    @endif


    @if($page->slug == 'about-us' || $page->slug == 'help-center' || $page->slug == 'policy-and-rules')
        <style>
            @media screen and (min-width: 768px) {
                #page-container {
                    margin-top: 100px !important;
                }
            }
        </style>
    @endif

	@if($page->slug == 'help-center' )
		<style>
			@media screen and (min-width: 768px) {
				#page-container {
					margin-top: 70px !important;
				}
			}
		</style>
	@endif

    <!-- BROWSING ITEMS -->
    {{--    @include('sliders.browsing_items')--}}
@endsection