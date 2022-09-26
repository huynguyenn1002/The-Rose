@extends('Admin.admin-layout')
@section("content")

<div class="container">
    <div class="row flex-row">
        <div class="col-sm-8">
            @if (session('success'))
            <p> {{ session('success') }}</p>
            @endif
        </div>
        <div class="col-sm-4 d-flex justify-content-end">
            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal"
                    onclick="viewItem()">
                    <i class="fa-solid fa-plus"></i>Thêm mẫu hoa
                </button>
            </div>
        </div>

        <table class="table" id="product-table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên loại hoa</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Chiết khấu</th>
                    <th scope="col">Số lượt xem</th>
                    <th scope="col">Ghi chú</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/product-list.js') }}"></script>
<script>
    var baseUrl = window.location.href;
    var categoryId = baseUrl.substring(baseUrl.lastIndexOf('/') + 1)
    var listProductUrl = '{!! route("admin.detail.category", ":id") !!}';

    listProductUrl = listProductUrl.replace(':id', categoryId);

</script>
@endsection