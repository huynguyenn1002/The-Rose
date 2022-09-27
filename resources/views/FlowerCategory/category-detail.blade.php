@extends('Admin.admin-layout')
@section("content")
<div class="container">
    <div class="row flex-row">
        <div class="col-sm-8">
            <h2 class="my-2">{{ $categoryInfo->name }}</h2>
            @if (session('success'))
                <p> {{ session('success') }}</p>
            @endif
        </div>
        <div class="col-sm-4 d-flex justify-content-end">
            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                    <i class="fa-solid fa-plus"></i>Thêm mẫu hoa
                </button>
            </div>
        </div>

        <!-- The Modal Register -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalTitle">Thêm mới mẫu hoa</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <!-- Modal body -->
                    <form action="{{ route('admin.product.add') }}" method="post" name="product-data" id="product-data"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="category_id" value="{{ $categoryInfo->id }}">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="product_name">
                                    <h6>Tên loại hoa</h6>
                                </label>
                                <input type="text" required class="form-control" placeholder="Nhập vào tên loại hoa..."
                                    id="product_name" name="product_name">
                            </div>
                            <div class="mb-3">
                                <label for="product-image">
                                    <h6>Ảnh đại diện</h6>
                                </label>
                                <br>
                                <input type="file" name="product_image" id="product_image">
                            </div>
                            <div class="mb-3">
                                <label for="product_price">
                                    <h6>Giá (VNĐ)</h6>
                                </label>
                                <input type="text" required class="form-control" placeholder="Nhập giá tiền..."
                                    id="product_price" name="product_price">
                            </div>
                            <div class="mb-3">
                                <label for="discount">
                                    <h6>Chiết khấu (%)</h6>
                                </label>
                                <input type="text" required class="form-control" placeholder="Nhập % chiết khấu..."
                                    id="discount" name="discount" pattern="[0-9]{1,5}" minlength="0" maxlength="3">
                            </div>
                            <div class="mb-3">
                                <label for="product_description">
                                    <h6>Mô tả về loại hoa</h6>
                                </label>
                                <textarea class="form-control" required placeholder="Mô tả..." id="product_description"
                                    style="height: 10rem" name="product_description"></textarea>
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
                    <th scope="col"></th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/product-list.js') }}"></script>
<script src="https://unpkg.com/imask"></script>
<script>
var baseUrl = window.location.href;
var categoryId = baseUrl.substring(baseUrl.lastIndexOf('/') + 1)
var listProductUrl = '{!! route("admin.detail.category", ":id") !!}';

listProductUrl = listProductUrl.replace(':id', categoryId);
</script>

<script>
$(document).ready(function() {
    $('#myModal').on('shown.bs.modal', function() {
        $('#category_name').trigger('focus')
    })
    $('div#menu-nav a').removeClass('active');
    $('div#menu-nav a#menu-category').addClass('active');

    $("input[name=discount]")[0].oninvalid = function() {
        this.setCustomValidity("Vui lòng nhập ký tự là chữ số");
    };

    $("input[name=discount]")[0].oninput= function () {
        this.setCustomValidity("");
    };

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    
});

function deleteItem(id) {
    $.ajax({
        type: "POST",
        url: "{{url('admin/product/delete')}}/" + id,
        data: {
            id: id
        },
        success: function(result) {
            alert("Bạn có chắc chắn muốn xoá sản phẩm này?")
            location.reload();
        }
    });
}

var currencyMask = IMask(
    document.getElementById('product_price'), {
        mask: 'num',
        blocks: {
            num: {
                mask: Number,
                thousandsSeparator: ','
            }
        }
    });

</script>
@endsection