<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category_post;
use App\Models\post;
use Carbon\Carbon;

class category_postController extends Controller
{
    public function create(){
        return view('admin/post/category/create');
    }
    public function detail($slug){
        $cate = category_post::where('slug',$slug)->first();
        $post = post::where('category_post_id',$cate->id)->paginate(9);
        return view('public/post/index')->with(compact('post'));
    }
    public function store(Request $request)
    {
        $message = ([
            'name.required' => 'Bạn chưa điền tên danh mục',
            'slug.required' => 'Bạn chưa điền slug',
            'slug.unique' => 'Slug của bạn đã tồn tại',
            'keywords.required' => 'Bạn chưa nhập từ khóa',
            'status.required' => 'Bạn chưa nhập trạng thái',
        ]);
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|unique:category_post',
            'keywords' => 'required',
            'status' => 'required'
        ], $message);
        $category = new category_post();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->keywords = $request->keywords;
        $category->status = $request->status;
        $category->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $category->save();
        session()->flash('success', 'Thành công');
        return redirect()->back();
    }
    public function index(Request $request)
    {
        $category = category_post::get();
        return view('admin/post/category/index')->with(compact('category'));
    }
    public function delete($id)
    {
        $category = category_post::where('id', $id)->first();
        $post = post::where('category_post_id',$id)->get();
        if (count($post) == 0) {
            if ($category) {
                $category->delete();
                echo 1;
            }
        } else {
            echo 0;
        }
    }
    public function edit($id)
    {
        $cate = category_post::find($id);
        return view('admin/post/category/edit')->with(compact('cate'));
    }
    public function update(Request $request, $id)
    {
        $message = ([
            'name.required' => 'Bạn chưa điền tên danh mục',
            'slug.required' => 'Bạn chưa điền slug',
            'slug.unique' => 'Slug của bạn đã tồn tại',
            'keywords.required' => 'Bạn chưa nhập từ khóa',
            'status.required' => 'Bạn chưa nhập trạng thái',
        ]);
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|unique:category_post',
            'keywords' => 'required',
            'status' => 'required'
        ], $message);
        $category = category_post::find($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->keywords = $request->keywords;
        $category->status = $request->status;
        $category->save();
        session()->flash('success', 'Thành công');
        return redirect()->back();
    }
    public function status($id)
    {
        $category = category_post::find($id);
        if ($category->status == 0) {
            $category->status = 1;
            $category->save();
            echo 1;
        } else {
            $category->status = 0;
            $category->save();
            echo 0;
        }
    }
}
