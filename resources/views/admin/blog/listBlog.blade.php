@extends('admin/main')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Ngày đăng</th>
                <th>Tác giả</th>
                <th>Tags</th>
                <th>&nbsp;</th>
            </tr>
            
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
            <tr>
                <td>{{$blog->id}}</td>
                <td>{{$blog->title}}</td>
                <td>{{$blog->date}}</td>
                <td>{{$blog->actor}}</td>
                <td>{{$blog->tags}}</td>
                <td>
                     <a href="/admin/blog/edit/{{$blog->id}}" class ="text-warning p-4"> 
                            <i class="fas fa-edit"></i>
                     </a>
                     
                     <a href="" class ="text-danger" onclick="removeRow({{$blog->id}},'/admin/blog/delete')"> 
                            <i class="fas fa-trash"></i>
                     </a>   
                </td>
            </tr>  
            @endforeach
            
        </tbody>
    </table>

    
    {{-- <nav aria-label="...">
        <ul class="pagination">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active">
            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
    </nav> --}}
@endsection