@extends('master')

@section('title')
Danh sách Category
@endsection

@section('content')
<table class="table">
    <button>Thêm Mới</button>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->name }}</td>
            <td>
              <a href=""><button>Sửa</button></a>
             <a href=""> <button onclick="confirmDelete({{ $row->id }})">Xoá</button>
            
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
    function confirmDelete(categoryId) {
      confirm("Bạn có chắc chắn muốn xóa category này?");
            
   
    }
</script>
@endsection