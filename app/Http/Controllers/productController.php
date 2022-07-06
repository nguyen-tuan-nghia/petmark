<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Models\product;
use App\Models\category;
use App\Models\gallery;
use App\Models\star_rating;
use File;
use Carbon\Carbon;

class productController extends Controller
{
    public function all()
    {
        $product = product::get();
        return view('public.product.all')->with(compact('product'));
    }
    public function create()
    {
        $category = category::get();
        return view('admin/product/create')->with(compact('category'));
    }
    public function store(Request $request)
    {
        $message = ([
            'name.required' => 'Bạn chưa điền tên sản phẩm',
            'slug.required' => 'Bạn chưa điền slug',
            'price.required' => 'Bạn chưa điền giá bán',
            'cost_price.required' => 'Bạn chưa điền giá nhập',
            'quantity.required' => 'Bạn chưa điền sô lượng',
            'content.required' => 'Bạn chưa điền mô tả',
            'slug.unique' => 'Slug của bạn đã tồn tại',
            'keywords.required' => 'Bạn chưa nhập từ khóa',
            'status.required' => 'Bạn chưa nhập trạng thái',
            'category_id.required'=>'Bạn chưa nhập danh mục',
            'images.required'=>'Bạn phải nhập ít nhất 1 ảnh làm ảnh bìa'
        ]);
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|unique:product',
            // 'imgFile' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
            'price' => 'required',
            'cost_price' => 'required',
            'quantity' => 'required',
            'content' => 'required',
            'keywords' => 'required',
            'status' => 'required',
            'category_id'=>'required|array',
            'images'=>'required|array'
            // 'category_id.*'=>'required'
        ], $message);
        $imgFile = $request->file('images');
        if($imgFile==null){
            session()->flash('error', 'Bạn phải nhập ít nhất 1 ảnh làm ảnh bìa');
            return redirect()->back();
        }
        if($request->category_id==null){
            // session()->flash('error', 'Bạn phải nhập 1 danh mục');
            return redirect()->back()->with('images',true);
        }
        $product = new product();
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->price = filter_var($request->price, FILTER_SANITIZE_NUMBER_INT);
        $product->cost_price = filter_var($request->cost_price, FILTER_SANITIZE_NUMBER_INT);
        $product->quantity = $request->quantity;
        $product->content = $request->content;
        if($request->sale!=null){
            $sale=filter_var($request->sale, FILTER_SANITIZE_NUMBER_INT);
        }else{
            $sale=$request->sale;
        }
        $product->sale = $sale;
        $product->keywords = $request->keywords;
        $product->category_id = implode(', ',$request->category_id);
        $product->status = $request->status;
        $product->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $product->save();
        if ($imgFile) {
            foreach ($imgFile as $image) {
                $get_name_img = $image->getClientOriginalName();
                $name_img = current(explode('.', $get_name_img));
                $new_image_name = $name_img . time() . '.' . $image->extension();
                $filePath = public_path('product/thumbnails');
                $img = Image::make($image->path());
                $img->resize(450, 450, function ($const) {
                    $const->aspectRatio();
                })->save($filePath . '/' . $new_image_name);

                // $filePath = public_path('product/images');
                // $image->move($filePath, $new_image_name);
                $gallery = new gallery();
                $gallery->image = $new_image_name;
                $gallery->product_id = $product->id;
                $gallery->save();
            }
        }
        session()->flash('success', 'Thành công');
            return redirect()->back();
    }

    public function index()
    {
        $product = product::with('gallery')->orderBy('id', 'desc')->get();
        // return $product;
        return view('admin/product/index')->with(compact('product'));
    }

    public function product_detail($slug)
    {
        $product = product::with('gallery')->where('slug', $slug)->where('status','!=',0)->first();
        $category_id=explode(', ',$product->category_id);
            $category= category::whereIn('id',$category_id)->get();
            $product_all = product::with('gallery')->where('slug','!=',$slug)->where('status','!=',0)->limit(30)->get();

        // $star_all = star_rating::where('product_id',$product->id)->get();
    //     $count=0;
    //     $star=0;
    //     if(count($star_all)>0){
    //     foreach($star_all as $key=>$val){
    //         $count+=$val->star;
    //     }
    //     $star=round($count/count($star_all));
    // }
        return view('public/product/product_detail')->with(compact('product','product_all','category'));
    }
    public function delete($id)
    {
        $product = product::with('gallery')->where('id', $id)->first();
        if ($product) {
            if (count($product->gallery) > 0) {
                foreach ($product->gallery as $gallery) {
                    $path = 'public/product/thumbnails/' . $gallery->image;
                    if (File::exists($path)) {
                        unlink($path);
                    }
                }
            }
            $gallery = gallery::where('product_id', $id)->delete();
            $product->delete();
        }
    }
    public function edit($id)
    {
        $product = product::with('gallery')->where('id', $id)->first();
        $category = category::get();
        return view('admin/product/edit')->with(compact('product', 'category'));
    }
    public function update(Request $request, $id)
    {
        $message = ([
            'name.required' => 'Bạn chưa điền tên sản phẩm',
            'slug.required' => 'Bạn chưa điền slug',
            'price.required' => 'Bạn chưa điền giá bán',
            'cost_price.required' => 'Bạn chưa điền giá nhập',
            'quantity.required' => 'Bạn chưa điền sô lượng',
            'content.required' => 'Bạn chưa điền mô tả',
            'slug.unique' => 'Slug của bạn đã tồn tại',
            'keywords.required' => 'Bạn chưa nhập từ khóa',
            'status.required' => 'Bạn chưa nhập trạng thái',
        ]);
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|unique:product',
            // 'imgFile' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
            'price' => 'required',
            'cost_price' => 'required',
            'quantity' => 'required',
            'content' => 'required',
            'keywords' => 'required',
            'status' => 'required'
        ], $message);
        if($request->category_id==null){
            session()->flash('error', 'Bạn phải nhập 1 danh mục');
            return redirect()->back();
        }
        $imgFile = $request->file('images');
        $product = product::find($id);
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->price = filter_var($request->price, FILTER_SANITIZE_NUMBER_INT);
        $product->cost_price = filter_var($request->cost_price, FILTER_SANITIZE_NUMBER_INT);
        $product->quantity = $request->quantity;
        $product->content = $request->content;
        if($request->sale!=null){
            $sale=filter_var($request->sale, FILTER_SANITIZE_NUMBER_INT);
        }else{
            $sale=$request->sale;
        }
        $product->sale = $sale;
        $product->keywords = $request->keywords;
        $product->category_id = implode(', ',$request->category_id);
        $product->status = $request->status;
        $product->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $product->save();
        if ($imgFile) {
            foreach ($imgFile as $image) {
                $get_name_img = $image->getClientOriginalName();
                $name_img = current(explode('.', $get_name_img));
                $new_image_name = $name_img . time() . '.' . $image->extension();
                $filePath = public_path('product/thumbnails');
                $img = Image::make($image->path());
                $img->resize(450, 450, function ($const) {
                    $const->aspectRatio();
                })->save($filePath . '/' . $new_image_name);

                // $filePath = public_path('product/images');
                // $image->move($filePath, $new_image_name);
                $gallery = new gallery();
                $gallery->image = $new_image_name;
                $gallery->product_id = $product->id;
                $gallery->save();
            }
        }
        session()->flash('success', 'Thành công');
        return redirect()->back();
    }
    public function delete_image($id)
    {
        $gallery = gallery::where('id', $id)->first();
        // dd($gallery->image);
        if ($gallery) {
            $path = 'public/product/thumbnails/' . $gallery->image;
            if (File::exists($path)) {
                unlink($path);
            }
        }
        $gallery->delete();
    }
    public function status($id){
        $product = product::find($id);
        if($product->status==0){
            $product->status=1;
            $product->save();
            echo 1;
        }else{
            $product->status=0;
            $product->save();
            echo 0;
        }
    }
}
