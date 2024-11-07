<?php

namespace App\Http\Controllers;

use App\Models\Watch;
use App\Http\Requests\StoreWatchRequest;
use App\Http\Requests\UpdateWatchRequest;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public static function index()
    {
        // eager loading with pagination
        $watches = Watch::select('id', 'name', 'discount', 'price', 'storage', 'slug', 'description', 'gender', 'img1', 'img2', 'img3', 'brand_id', 'category_id')
        ->with(['brand', 'category'])
        ->get();
        return $watches;
    }

    public function collectionIndex(Request $request) {
        $brand = BrandController::index();
        $category = CategoryController::index();
        $watches = $request->has('cate') ? Watch::where('category_id', $request->cate) : new Watch();
        $watches = $request->has('brand') ? $watches->where('brand_id', $request->brand) : $watches;
        $watches = $request->has('gender') ? $watches->where('gender', $request->gender) : $watches;

        return view('collection', ['watches' => $watches->get(),'brand' => $brand, 'category' => $category]);
    }

    public function indexCategory(Request $request)
    {
        return Watch::where('category_id', $request->id)->select('id', 'name', 'discount', 'storage', 'slug', 'description', 'gender', 'img1', 'img2', 'img3', 'brand_id', 'category_id')->with(['brand', 'category'])->paginate('15');
    }

    public function indexBrand(Request $request)
    {
        return Watch::where('brand_id', $request->id)->select('id', 'name', 'discount', 'storage', 'slug', 'description', 'gender', 'img1', 'img2', 'img3', 'brand_id', 'category_id')->with(['brand', 'category'])->paginate('15');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWatchRequest $request)
    {
        //
        try {
            $img1 = $request->file('img1')->store('watch', 'public');
            // Kiểm tra có img2 không
            if ($request->hasFile('img2')) {
                $img2 = '/storage' . "/" . $request->file('img2')->store('watch', 'public');
            } else 
            {
                $img2 = null;
            }
            //kiểm tra có img3 không
            if ($request->hasFile('img3')) {
                $img3 = '/storage' . "/" . $request->file('img3')->store('watch', 'public');
            } else 
            {
                $img3 = null;
            }
            $slug = Str::slug($request->name, '-');
            // $watches = 
            Watch::create([
                'name' => $request->name,
                'price' => $request->price,
                'storage' => $request->storage,
                'discount' => ($request->has('discount') ? $request->discount : 0),
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'description' => $request->description,
                'gender' => $request->gender,
                'slug' => $slug,
                'img1' => '/storage' . "/" . $img1,
                'img2' => $img2,
                'img3' => $img3
            ]);
            // dd($img1);
            // dd($watches);
            return back()->withInput(['message' => 'Successfully created']);
        } catch (\Exception $e) { 
            echo("error");
            return $e->getMessage();
        }
        
    }

    // Search product
    public function typeSearch(Request $request) {
        // q là query 
        return Watch::search($request->q)->simplePaginate(10);
    }

    // render ra trang tìm kiếm sản phẩm query
    public function search(Request $request) {
        // dd($request->query('q'));
        $brand = BrandController::index();
        $category = CategoryController::index();
        return view('collection', ['watches' => Watch::search($request->q)->get(), 'brand' => $brand, 'category' => $category]);
    }

    /**
     * Display the specified resource.
     */
    public function show($watch_slug)
    {
        // return view('products.watch');
        $watch = Watch::where('slug', $watch_slug)->first();
        $post = Post::where('watch_id', $watch->id)->with('user')->get();
        // Lấy sản phẩm
        $brand = BrandController::index();
        $category = CategoryController::index();
        return view('products.watch', 
        ['watch' => $watch,
         'watches' => Watch::where('brand_id', Watch::where('slug', $watch_slug)->first()->brand_id)->take(3)->get(),
         'brand' => $brand, 'category' => $category,
         'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Watch $watch)
    {
        //
        return view('product.edit', ['watch' => $watch]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWatchRequest $request, Watch $watch)
    {
        //
        try {
            if ($request->hasFile('img1')) {
                $img1 = '/storage' . "/" . $request->file('img1')->store('watch', 'public');
            } else 
            {
                $img1 = null;
            }
            // Kiểm tra có img2 không
            if ($request->hasFile('img2')) {
                $img2 = '/storage' . "/" . $request->file('img2')->store('watch', 'public');
            } else 
            {
                $img2 = null;
            }
            //kiểm tra có img3 không
            if ($request->hasFile('img3')) {
                $img3 = '/storage' . "/" . $request->file('img3')->store('watch', 'public');
            } else 
            {
                $img3 = null;
            }

            $watch->fill([
                'name' => $request->has('name') ? $request->name : $watch->name,
                'price' => $request->price ? $request->price : $watch->price,
                'storage' => $request->storage ? $request->storage : $watch->storage,
                'discount' => ($request->discount ? $request->discount : 0),
                'description' => $request->description ? $request->description : $watch->description,
                'gender' => $request->gender ? $request->gender : $watch->gender,
                'img1' => $img1 != null ? $img1 : $watch->img1,
                'img2' => $img2 != null ? $img2 : $watch->img2,
                'img3' => $img3 != null ? $img3 : $watch->img3
            ])->save();

            return back()->withInput(['message' => 'successfully updated']);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Watch $watch)
    {
        //
        try {
            $watch->delete();
            return back()->withInput(['message' => 'Xóa thành công']);
        } catch (\Exception $e) { 
            return $e->getMessage();
        }
    }

    // Show all deleted watch
    public function destroyed() {
        return Watch::withTrashed()->get();
    }

    // restore deleted watch
    public function restore($watch) {
        try {
            Watch::withTrashed()->find($watch)->restore();
            return back()->withInput(['message' => 'Xóa thành công']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    //test
    public function add_img(Request $request) {
        $img = $request->file('img1')->store('watch', 'public');

        dd($img);
    }
}
