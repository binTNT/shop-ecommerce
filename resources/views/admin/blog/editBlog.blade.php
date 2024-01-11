@extends('admin/main')

@section('content')
<form method="POST" action="" enctype="multipart/form-data">
    <div class="card-body">

      <div class="row">
        <div class="form-group col">
          <label for="">Tên sản phẩm</label>
          <input type="text"  name="name" class="form-control" id="exampleInputEmail1" value="{{$blog->title}}"  placeholder="Nhập tên sản phẩm">
        </div>
      </div>


      <div class="form-group">
        <label for="">Nội dung chi tiết</label>
         <textarea name="content" id="" value="" class="form-control">{{$blog->content}}</textarea>
      </div>



      <div class="form-group">
            <div>
                <label class="form-label" for="customFile">Ảnh</label>
                <input type="file" accept="image/*" name="thumb" class="form-control" id="blogImg"
                    onchange="preImage(this)" />
            </div>
            <div class="imgBlog">
                <img src="{{$blog->imgurl}}" alt=""
                    id="imgUpload">
            </div>
      </div>
    </div>


    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
    @csrf
  </form>


@endsection