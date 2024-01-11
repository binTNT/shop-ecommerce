<?php

namespace App\Http\Controllers\Admin;


use App\Http\Services\Product\UploadService;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Http\Services\Blog\BlogServices;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $upload, $blogSevices;

    public function __construct(UploadService $upload,BlogServices $blogSevices)
    {
        $this->upload = $upload;
        $this->blogSevices = $blogSevices;
    }
    public function index()
    {
        return view('admin/blog/listBlog',[
            'title' => 'Danh sách blog',
            'blogs' => $this->blogSevices->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/blog/addBlog', [
            'title' => 'Thêm Blog'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'content' =>'required',
            'submitsubmit' => 'required'
        ]);
        $url = $this->upload->store($request);
        $this->blogSevices->insert($request,$url);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin/blog/editBlog',[
            'title' => 'Sửa Blog',
            'blog' => $this->blogSevices->getBlog($id)[0],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        // $this->validate($request,[
        //     'name' => 'required',
        //     'content' =>'required',
        //     'submitsubmit' => 'required'
        // ]);

        $url = $this->upload->store($request);
        $re = $this->blogSevices->update($request, $blog, $url);
        // if($re == true){
        //     redirect()->to('/admin/blog/list');
        // }
        return redirect('admin/blog/list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): JsonResponse
    {
        $result = $this->blogSevices->destroy($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công'
            ]);
        }
        return response()->json([
            'error' => true,
        ]);
    }


    public function u_index(){
        return view('blog',[
            'blogs' => $this->blogSevices->get(),
        ]);
    }

    public function detail($id){
        return view('blogDetail',[
            'blog' => $this->blogSevices->getBlog($id)[0],
        ]);
    }
}
