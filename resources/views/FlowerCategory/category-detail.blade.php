@extends('Admin.admin-layout')
@section("content")

<div class="container">
    <div class="row flex-row">
        <div class="col-sm-8">
            <h2 class="my-2">{{ $categoryDetail->name }}</h2>
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

        <table class="table" id="category-table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" style="width: 10%">STT</th>
                    <th scope="col" style="width: 30%">Tên loại hoa</th>
                    <th scope="col" style="width: 30%">Ảnh</th>
                    <th scope="col">Ghi chú</th>
                </tr>
            </thead>
        </table>
    </div>

</div>
@endsection