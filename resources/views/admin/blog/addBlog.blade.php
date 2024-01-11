@extends('admin/main')

@section('content')
<form method="POST" action="" enctype="multipart/form-data">
    <div class="card-body">

        <div class="row">
            <div class="form-group col">
                <label for="">Tiêu đề</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{old('name')}}"
                    placeholder="Nhập tiêu đề bài viết">
            </div>
        </div>
        <div class="form-group">
            <label for="">Nội dung</label>
            <textarea name="content" id="" value="{{old('content')}}" class="form-control"></textarea>
        </div>



        <div class="form-group img-upload">
            <div>
                <label class="form-label" for="customFile">Ảnh</label>
                <input type="file" accept="image/*" name="thumb" class="form-control" id="blogImg"
                    onchange="preImage(this)" />
            </div>
            <div class="imgBlog">
                <img src="" alt=""
                    id="imgUpload">
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" name="submit" class="btn btn-primary">Đăng</button>
    </div>
    @csrf
</form>

@endsection