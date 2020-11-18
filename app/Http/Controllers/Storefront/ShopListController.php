<?php

namespace App\Http\Controllers\Storefront;

use App\Banner;
use App\Blog;
use App\CategoryGroup;
use App\CategorySubGroup;
use App\Helpers\ListHelper;
use App\Inventory;
use App\Product;
use App\Shop;
use App\Slider;
use App\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopListController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::with('featuredImage:path,imageable_id,imageable_type')->orderBy('order', 'asc')->get()->toArray();
        $shops = Shop::with('images:id,path,imageable_id,imageable_type', 'products.categories')->active()->orderby('name', 'asc')->paginate(20);

        return view('shop-list', compact('shops', 'sliders'));
    }

    public function listView(Request $request, $slug)
    {
        $sliders = Slider::with('featuredImage:path,imageable_id,imageable_type')->orderBy('order', 'asc')->get()->toArray();
        $shops = Shop::with('images:id,path,imageable_id,imageable_type', 'products.categories')->orderby('name', 'asc')->paginate(3);
        $listShops = [];

        $categoryGroup = CategoryGroup::where('slug', $slug)->first();
        $categorySubGroup = CategorySubGroup::where('category_group_id', $categoryGroup->id)->get();

        foreach ($categorySubGroup as $key => $group) {
            $ccc = \DB::table('category_product')->where('category_id', $group->id)->get();

            foreach($ccc as $c) {
                print_r($c->product_id);
                $p = Product::find($c->product_id);
                if(isset($p->shop_id)) {
                    array_push($listShops, $p->shop_id);
                }
            }
        }

        $shops = Shop::whereIn('id', $listShops)->with('images:id,path,imageable_id,imageable_type', 'products.categories')->active()->orderby('name', 'asc')->paginate(3);

        return view('shop-list', compact('shops', 'sliders'));
    }

    public function browseCategoryGroup(Request $request, $slug, $sortby = Null)
    {
        $categoryGroup = CategoryGroup::where('slug', $slug)->with(
            [
                'images:id,path,imageable_id,imageable_type',
                'subGroups' => function ($query) {
                    $query->has('categories')->active();
                }, 'subGroups.categories' => function ($q) {
                $q->select(['categories.id', 'categories.slug', 'categories.category_sub_group_id', 'categories.name'])
                    ->where('categories.active', 1)->whereHas('listings')->withCount('listings');
            }])->active()->firstOrFail();

        $all_products = prepareFilteredListings($request, $categoryGroup);

        // Get brands ans price ranges
        $brands = ListHelper::get_unique_brand_names_from_linstings($all_products);
        $priceRange = ListHelper::get_price_ranges_from_linstings($all_products);

        // Paginate the results
        $products = $all_products->paginate(config('system.view_listing_per_page', 16))->appends($request->except('page'));

        $sliders = Slider::with('featuredImage:path,imageable_id,imageable_type')->orderBy('order', 'asc')->get()->toArray();

        $trending = ListHelper::popular_items(config('system.popular.period.trending', 2), config('system.popular.take.trending', 15));

        return view('category_group', compact('categoryGroup', 'products', 'brands', 'priceRange', 'sliders', 'trending'));
    }


    public function show($id)
    {
        $sliders = Slider::with('featuredImage:path,imageable_id,imageable_type')->orderBy('order', 'asc')->get()->toArray();
        $banners = Banner::with('featuredImage:path,imageable_id,imageable_type', 'images:path,imageable_id,imageable_type')
            ->orderBy('order', 'asc')->get()->groupBy('group_id')->toArray();

        $products = ListHelper::popular_items(config('system.popular.period.trending', 2), config('system.popular.take.trending', 15));
        $weekly_popular = ListHelper::popular_items(config('system.popular.period.weekly', 7), config('system.popular.take.weekly', 5));

        $recent = ListHelper::latest_available_items(10);
        $additional_items = ListHelper::random_items(10);

        return view('shop-list-view', compact('banners', 'sliders', 'products', 'weekly_popular', 'recent', 'additional_items'));

    }

    /**
     * All post by this author
     *
     * @param  Request $request
     * @param  User    $author
     *
     * @return \Illuminate\Http\Response
     */
    public function author(Request $request, $author)
    {
        $blogs = Blog::select(['id','title','slug','excerpt','user_id','published_at','likes','dislikes'])
        ->where('user_id', $author)->with('author:id,name,nice_name')->withCount('comments')->paginate(config('system.view_blog_post_per_page', 4));

        $tags = $this->getTags($blogs);

        return view('blog', compact('blogs','tags'));
    }

    /**
     * Search the specified resource.
     *
     * @param  \App\slug  $slug
     * @return \Illuminate\Http\Response
     */
    // public function search(Request $request, $q = null)
    public function search(Request $request)
    {
        $blogs = Blog::select(['id','title','slug','excerpt','user_id','published_at','likes','dislikes'])
        ->where('title','LIKE','%'.$request->q.'%')->orWhere('content','LIKE','%'.$request->q.'%')
        ->with('author:id,name,nice_name')->withCount('comments')->paginate(config('system.view_blog_post_per_page', 4));

        $tags = $this->getTags($blogs);

        return view('blog', compact('blogs','tags'));
    }

    /**
     * Search the specified resource.
     *
     * @param  \App\slug  $slug
     * @return \Illuminate\Http\Response
     */
    public function tag(Request $request, $tag)
    {
        $blogs = Blog::select(['id','title','slug','excerpt','user_id','published_at','likes','dislikes'])
        ->whereHas('tags', function($query) use ($tag) {
            $query->whereName($tag);
        })
        ->published()->with('author:id,name,nice_name','tags')->withCount('comments')
        ->paginate(config('system.view_blog_post_per_page', 4));

        $tags = $this->getTags($blogs);

        return view('blog', compact('blogs','tags'));

    }

    /**
     * Return flaten array of tags
     *
     * @param  arr $blogs
     *
     * @return arr
     */
    private function getTags($blogs)
    {
        $tags = array_filter($blogs->pluck('tags')->toArray());

        return $tags ? array_merge(...$tags) : [];
    }
}
