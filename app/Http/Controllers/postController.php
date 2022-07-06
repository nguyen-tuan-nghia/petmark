<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category_post;
use App\Models\post;
use Carbon\Carbon;
use Image;
use File;

class postController extends Controller
{
    public function detail($slug){
        $post=post::where('slug',$slug)->first();
        return view('public/post/detail')->with(compact('post'));
    }
    public function create(){
        $category=category_post::get();
        return view('admin/post/the_post/create')->with(compact('category'));
    }
    public function index(){
        $post=post::get();
        return view('admin/post/the_post/index')->with(compact('post'));
    }
    public function edit($id){
        $post=post::find($id);
        $category=category_post::get();
        return view('admin/post/the_post/edit')->with(compact('post','category'));
    }
    public function store(Request $request)
    {
        $message = ([
            'name.required' => 'Bạn chưa điền tiêu đề',
            'slug.required' => 'Bạn chưa điền slug',
            'slug.unique' => 'Slug của bạn đã tồn tại',
            'keywords.required' => 'Bạn chưa nhập từ khóa',
            'category_post_id.required' => 'Bạn chưa nhập danh mục cha',
            'status.required' => 'Bạn chưa nhập trạng thái',
            'content.required'=>'Bạn chưa nhập nội dung',
            'auth.required'=>'Bạn chưa nhập tên tác giả'
        ]);
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|unique:category',
            'keywords' => 'required',
            'category_post_id' => 'required',
            'status' => 'required',
            'content'=>'required',
            'auth'=>'required'
        ], $message);
        $post = new post();
        $post->name = $request->name;
        $post->keywords = $request->keywords;
        $post->slug = $request->slug;
        $post->category_post_id = $request->category_post_id;
        $post->status = $request->status;
        $post->content = $request->content;
        $post->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $post->auth_name=$request->auth;
        $imgFile = $request->file('logo');
        if(!$imgFile){
            session()->flash('error', 'Bạn phải nhập ít nhất 1 ảnh làm ảnh bìa');
            return redirect()->back();
        }
        if ($imgFile) {
            $get_name_img = $imgFile->getClientOriginalName();
            $name_img = current(explode('.', $get_name_img));
            $new_image_name = $name_img . time() . '.' . $imgFile->extension();
            $filePath = public_path('post');
            $img = Image::make($imgFile->path());
            $img->resize(250, 250, function ($const) {
                $const->aspectRatio();
            })->save($filePath . '/' . $new_image_name);
            $post->image = $new_image_name;
        }
        $post->save();
        session()->flash('success', 'Thành công');
        return redirect()->back();
    }
    public function status($id)
    {
        $post = post::find($id);
        if ($post->status == 0) {
            $post->status = 1;
            $post->save();
            echo 1;
        } else {
            $post->status = 0;
            $post->save();
            echo 0;
        }
    }
    public function delete($id)
    {
        $post = post::where('id', $id)->first();
        $path = 'public/post/' . $post->image;
        if (File::exists($path)) {
            unlink($path);
        }
            $post->delete();
        }
        public function update(Request $request,$id)
        {
            $message = ([
                'name.required' => 'Bạn chưa điền tiêu đề',
                'slug.required' => 'Bạn chưa điền slug',
                'slug.unique' => 'Slug của bạn đã tồn tại',
                'keywords.required' => 'Bạn chưa nhập từ khóa',
                'category_post_id.required' => 'Bạn chưa nhập danh mục cha',
                'status.required' => 'Bạn chưa nhập trạng thái',
                'content.required'=>'Bạn chưa nhập nội dung',
                'auth.required'=>'Bạn chưa nhập tên tác giả'
            ]);
            $this->validate($request, [
                'name' => 'required',
                'slug' => 'required|unique:category',
                'keywords' => 'required',
                'category_post_id' => 'required',
                'status' => 'required',
                'content'=>'required',
                'auth'=>'required'
            ], $message);
            $post = post::find($id);
            $post->name = $request->name;
            $post->keywords = $request->keywords;
            $post->slug = $request->slug;
            $post->category_post_id = $request->category_post_id;
            $post->status = $request->status;
            $post->content = $request->content;
            $post->created_at = Carbon::now('Asia/Ho_Chi_Minh');
            $post->auth_name=$request->auth;
            $imgFile = $request->file('logo');
            if ($imgFile) {
                $path = 'public/post/' . $post->image;
                if (File::exists($path)) {
                    unlink($path);
                }
                $get_name_img = $imgFile->getClientOriginalName();
                $name_img = current(explode('.', $get_name_img));
                $new_image_name = $name_img . time() . '.' . $imgFile->extension();
                $filePath = public_path('post');
                $img = Image::make($imgFile->path());
                $img->resize(250, 250, function ($const) {
                    $const->aspectRatio();
                })->save($filePath . '/' . $new_image_name);
                $post->image = $new_image_name;
            }
            $post->save();
            session()->flash('success', 'Thành công');
            return redirect()->back();
        }
}
