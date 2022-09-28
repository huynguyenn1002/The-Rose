@extends('Admin.admin-layout')
@section("header_section")
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
<link href="{{ asset('css/product/flower-detail.css') }}" rel="stylesheet">
@endsection
@section("content")
<div class=my-2>
    <a href="javascript:history.back()"><i class="fa-solid fa-arrow-left mx-2"></i>Trở lại Danh sách sản phẩm</a>
</div>
<form action="{{ route('admin.product.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <div class="row">
        <div>
            <h1 class="my-2">{{ $product->product_name }}</h1>
            @if (session('success'))
            <p> {{ session('success') }}</p>
            @endif
        </div>
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                @if (isset($productImage['path']))
                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                    <div class="swiper-wrapper">
                        @foreach(json_decode($productImage['path']) as $path)
                        <div class="swiper-slide">
                            <img src="{{ url('storage/FlowerImage/'.$path) }}" />
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

                <div thumbsSlider="" class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach(json_decode($productImage['path']) as $path)
                        <div class="swiper-slide">
                            <img src="{{ url('storage/FlowerImage/'.$path) }}" />
                        </div>
                        @endforeach
                    </div>
                </div>

                @else
                <img width="350px"
                    src="{{ isset($product->image) ? url('storage/FlowerImage/'.$product->image) : asset('/images/therose.png') }}">
                @endif
            </div>
            <input type="file" name="product_image[]" id="product_image" multiple disabled>
        </div>
        <div class="col-md-8 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="text-right">Thông tin sản phẩm</h2>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12 my-2"><label class="labels h5">Tên loại hoa</label><input type="text"
                            name="product_name" class="form-control" placeholder="Nhập vào tên loại hoa" readonly
                            value="{{ $product->product_name}}">
                    </div>
                    <div class="col-md-12 my-2"><label class="labels h5">Kiểu hoa</label>
                        <select name="type" class="form-control bg-white" id="type" disabled>
                            <option value="">Chọn kiểu hoa</option>
                            @foreach($typeFlower as $type)
                            <option value="{{ $type->id }}" @if($product->type == $type->id) selected = "selected"
                                @endif>
                                {{ $type->type_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 my-2"><label class="labels h5">Giá (VNĐ)</label><input type="text"
                            name="price" id="price" class="form-control" placeholder="Nhập giá" readonly
                            value="{{ $product->price}}"></div>
                    <div class="col-md-12 my-2"><label class="labels h5">Chiết khấu (%)</label><input type="text"
                            name="discount" class="form-control" pattern="[0-9]{1,5}" minlength="0" maxlength="3" readonly
                            placeholder="Nhập % chiết khấu" value="{{ $product->discount}}"></div>
                    <div class="col-md-12 my-2"><label class="labels h5">Ghi chú</label><input type="text" readonly
                            name="description" class="form-control" placeholder="Nhập ghi chú"
                            value="{{ $product->description}}"></div>
                    <div class="col-md-12 my-2">
                        <label for="html">Nếu muốn thay đổi thông tin về sản phẩm, vui lòng click vào đây</label>
                        <input type="checkbox" id="check-change-info" name="fav_language" value="HTML">
                    </div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" id="btn-submit-info" style="display: none" type="submit">Lưu thay
                        đổi</button></div>
            </div>
        </div>
    </div>
</form>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/imask"></script>

<!-- Initialize Swiper -->
<script>
$('div#menu-nav a').removeClass('active');
$('div#menu-nav a#menu-category').addClass('active');

$("input[name=discount]")[0].oninvalid = function() {
    this.setCustomValidity("Vui lòng nhập ký tự là chữ số");
};

$("input[name=discount]")[0].oninput = function() {
    this.setCustomValidity("");
};

$("#check-change-info").click(function() {
    if ($(this).is(":checked")) {
        $("input[name='product_name']").attr("readonly", false);
        $("input[name='price']").attr("readonly", false);
        $("input[name='discount']").attr("readonly", false);
        $("input[name='description']").attr("readonly", false);
        $('#product_image').attr("disabled", false);
        $('#type').attr("disabled", false);
        $('#btn-submit-info').show();
    } else {
        $("input[name='product_name']").attr("readonly", true);
        $("input[name='price']").attr("readonly", true);
        $("input[name='discount']").attr("readonly", true);
        $("input[name='description']").attr("readonly", true);
        $('#product_image').attr("disabled", true);
        $('#type').attr("disabled", true);
        $('#btn-submit-info').hide();
    }
});
var swiper = new Swiper(".mySwiper", {
    loop: true,
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
});

var swiper2 = new Swiper(".mySwiper2", {
    loop: true,
    spaceBetween: 10,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    thumbs: {
        swiper: swiper,
    },
});

var currencyMask = IMask(
    document.getElementById('price'), {
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