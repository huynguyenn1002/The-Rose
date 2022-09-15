@extends('Admin.admin-layout')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container-xxl position-relative bg-white d-flex p-0">
    <div class="content">
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="{{ route('admin.dashboard.get') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>The Rose</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle"
                            src="{{ isset($admin->avatar) ? url('storage/avatar/'.$admin->avatar) : asset('/images/default.jpeg') }}"
                            alt="" style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ isset($admin) ? $admin->firstname.' '.$admin->lastname : '' }}</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('admin.dashboard.get') }}" class="nav-item nav-link"><i
                            class="fa fa-tachometer-alt me-2"></i>Quản lý</a>
                    <div class="nav-item dropdown">
                        <a href="{{ route('admin.category.list') }}" class="nav-link active"><i
                                class="fa fa-laptop me-2"></i>Danh mục Hoa</a>
                    </div>
                    <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
                    <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
                    <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        @include('Admin.admin-header')

        <!-- Category Start -->

        <div class="container">
            <div class="row flex-row">
                <div class="col-sm-8">
                    <h2 class="my-2">Danh mục các loại Hoa</h2>

                </div>
                <div class="col-sm-4 d-flex justify-content-end">
                    <div class="d-flex align-items-center">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal"
                            onclick="viewItem()">
                            <i class="fa-solid fa-plus"></i>Thêm danh mục
                        </button>
                    </div>
                </div>

                <!-- The Modal Register -->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title" id="modalTitle">Thêm mới danh mục hoa</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <!-- Modal body -->
                            <form action="{{ route('admin.category.add') }}" method="post" id="category-data">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" id="category_id" name="category_id" value="">
                                    <div class="mb-3">
                                        <label for="category_name">
                                            <h6>Tên danh mục</h6>
                                        </label>
                                        <input type="text" required class="form-control"
                                            placeholder="Nhập vào tên danh mục..." id="category_name"
                                            name="category_name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description">
                                            <h6>Mô tả danh mục</h6>
                                        </label>
                                        <textarea class="form-control" required placeholder="Mô tả..." id="description"
                                            style="height: 10rem" name="description"></textarea>
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary btn-confirm" id="submit">Thêm</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td><a href="">{{ $category->name }}</a></td>
                        <td style="width: 60%">{{ $category->description }}</td>
                        <td style="width: 20%">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal"
                                    data-bs-target="#myModal" id="btnEdit" onclick="viewItem({{ $category->id }})">Chỉnh
                                    sửa</button>
                                <button type="submit" class="btn btn-danger" onclick="deleteItem({{ $category->id }})"
                                    id="Reco">
                                    Xoá</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <!-- Category End -->
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
$(document).ready(function() {
    $('#myModal').on('shown.bs.modal', function() {
        $('#category_name').trigger('focus')
    })
});
</script>

<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

function deleteItem(id) {
    $.ajax({
        type: "POST",
        url: "{{url('admin/category/delete')}}/" + id,
        data: {
            id: id
        },
        success: function(result) {
            location.reload();
        }
    });
}

function viewItem(id) {
    if (id) {
        $("#modalTitle").text("Chỉnh sửa thông tin danh mục");
        $(".btn-confirm").text("Xác nhận");
        $.get('/admin' + '/category' + '/edit/' + id, function(data) {
            $('#category_name').val(data.data.name);
            $('#description').val(data.data.description);
        })

        $("#submit").click(function(event) {
            event.preventDefault()
            var name = $("#category_name").val();
            var description = $("#description").val();

            $.ajax({
                url: '/admin' + '/category' + '/edit/' + id,
                type: "POST",
                data: {
                    name: name,
                    description: description,
                },
                dataType: 'json',
                success: function(data) {
                    $('#category-data').trigger("reset");
                    window.location.reload(true);
                }
            });
        });
    } else {
        $('#category-data').trigger("reset");
    }
}
</script>