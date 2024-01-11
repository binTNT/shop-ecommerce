<?php

namespace App\Http\Services\Blog;
use App\Models\Blog;
class BlogServices{
    
    const LIMIT = 16;
    public function insert($request, $url){
        try{
            Blog::create([
                'title' => (string)$request->input('name'),
                'imgurl' => (string)$url,
                'date' => (string) date("Y-m-d"),
                'actor' => 'Admin',
                'content' => (string)$request->input('content'),
                'tags' => 'winter',
            ]);
            return redirect()->back()->with('success',"Đăng thành công");
        } catch(Exception){
            return redirect()->back()->with('error',"Đăng không thành công");
            return false;
        }

        return true;
    }

    public function get($page = null){
        return Blog::orderbyDesc('id')
        ->when($page != null, function($query) use ($page){
            $query->offset($page * self::LIMIT);
        })
        ->limit(self::LIMIT)
        ->get();
    }

    public function update($request, $blog, $url){
        $blog->title = (string) $request->input('name');
        $blog->content = (string) $request->input('content');
        $blog->imgurl = (string) $url;
        $blog->save();

        return redirect()->back()->with('success','Sửa thông tin thành công');
        
        return true;
    }


    public function getBlog($id){
        return Blog::where('id',$id)->get();
    }

    public function destroy($request){
        $id = (int)$request->input('id');
        $blog = Blog::where('id',$id)->first();
        if($blog){
            return Blog::where('id', $id)->delete();
        }
        return false;
    }
}