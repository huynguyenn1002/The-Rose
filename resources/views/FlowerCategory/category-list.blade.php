@extends('Admin.admin-layout')
@section("content")

<div class="container">
    <div class="row flex-row">
        <div class="col-sm-8">
            <h2 class="my-2">Danh mục các loại Hoa</h2>
            @if (session('success'))
            <p> {{ session('success') }}</p>
            @endif
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
                            <div class="mb-3">
                                <label for="category_name">
                                    <h6>Tên danh mục</h6>
                                </label>
                                <input type="text" required class="form-control" placeholder="Nhập vào tên danh mục..."
                                    id="category_name" name="category_name">
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

    <table class="table" id="category-table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col" style="width: 20%">Tên danh mục</th>
                <th scope="col" style="width: 50%">Mô tả</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
    </table>
</div>
<!-- Category End -->

@endsection
@section('js')
<script src="{{ asset('js/category-list.js') }}"></script>
<script>
var listCategoryUrl = '{!! route("admin.category.list") !!}';

$(document).ready(function() {
    $('#myModal').on('shown.bs.modal', function() {
        $('#category_name').trigger('focus')
    })
    $('div#menu-nav a').removeClass('active');
    $('div#menu-nav a#menu-category').addClass('active');

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
        $("#submit").off();
        $("#modalTitle").text("Thêm mới danh mục");
        $(".btn-confirm").text("Thêm");
        $('#category-data').trigger("reset");
    }
}
</script>
@endsection