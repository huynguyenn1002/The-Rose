@extends('Admin.admin-layout')

<link rel="stylesheet" href="{{ asset('css/admin/admin-profile.css') }}">
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

<div class="container-xxl position-relative bg-white d-flex p-0">
    <div class="content">
        @include('Admin.admin-header')
        <div class="container rounded bg-white mt-5 mb-5">
            @if (session('success'))
            <p> {{ session('success') }}</p>
            @endif
            <form action="{{ route('admin.update.profile') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ isset($admin) ? $admin->id : '' }}">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                                class="rounded-circle mt-5" width="150px"
                                src="{{ url('storage/avatar/'.$admin->avatar) }}"><span
                                class="font-weight-bold">{{ isset($admin) ? $admin->name : '' }}</span><span
                                class="text-black-50">{{ isset($admin) ? $admin->mail_address : '' }}</span><span>
                            </span></div>
                        <input type="file" name="avatar" id="fileToUpload">
                    </div>
                    <div class="col-md-8 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Chỉnh sửa thông tin cá nhân</h4>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6"><label class="labels">Tên</label><input type="text"
                                        name="firstname" class="form-control" placeholder="Tên"
                                        value="{{ old('firstname') ?? $admin->firstname ?? '' }}"></div>
                                <div class="col-md-6"><label class="labels">Họ</label><input type="text" name="lastname"
                                        class="form-control" value="{{ old('lastname') ?? $admin->lastname ?? '' }}"
                                        placeholder="Họ"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Số điện thoại</label><input type="text"
                                        name="tel" class="form-control" placeholder="Nhập số điện thoại"
                                        value="{{ old('tel') ?? $admin->tel ?? '' }}"></div>
                                <div class="col-md-12 address"><label class="labels">Địa chỉ</label>
                                    <select name="city" id="city" class="form-control" placeholder="Tỉnh/Thành">
                                        <option value="">Tỉnh/Thành</option>
                                        @foreach($citys as $city)
                                        <option value="{{ $city->city_id.'.'.$city->name }}" @if(isset($admin) &&
                                            $admin->city_id == $city->city_id)
                                            selected="selected"
                                            @endif>
                                            {{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 address">
                                    <select name="province" id="province" class="form-control" placeholder="Quận/Huyện">
                                    </select>
                                    <input type="hidden" id="old_value_province" value="{{ old('province_id') }}">
                                </div>
                                <div class="col-md-12 address">
                                    <select name="ward" id="ward" class="form-control" placeholder="Phường/Xã">
                                    </select>
                                    <input type="hidden" id="old_value_ward" value="{{ old('ward') }}">
                                </div>
                                <div class="col-md-12 address"><input name="address" class="form-control"
                                        placeholder="Đường/Số nhà"
                                        value="{{ old('street') ?? $admin->address ?? '' }}" />
                                </div>
                                <div class="col-md-12 address"><label class="labels">Email</label><input type="text"
                                        name="mail_address" class="form-control" placeholder="enter email id"
                                        value="{{ old('mail_address') ?? $admin->mail_address ?? '' }}"></div>
                                <div class="col-md-12 address">
                                    <label for="html">Nếu muốn thay đổi mật khẩu, vui lòng click vào đây</label>
                                    <input type="checkbox" id="check-change-password" name="fav_language" value="HTML">
                                </div>
                                <div class="change-password" id="change-password" style="display: none">
                                    <div class="col-md-12 address"><label class="labels">Mật khẩu mới</label><input
                                            autocomplete="new-password" type="password" name="password"
                                            class="form-control" placeholder="Mật khẩu mới">
                                    </div>
                                    <div class="col-md-12 address"><label class="labels">Nhập lại mật khẩu
                                            mới</label><input autocomplete="new-password" type="password"
                                            name="password_confirm" class="form-control"
                                            placeholder="Nhập lại mật khẩu mới"></div>
                                </div>
                            </div>
                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button"
                                    type="submit">Lưu thay đổi</button></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/get-address-info.js') }}"></script>
<script src="{{ asset('js/test.js') }}"></script>
<script>
    $(function () {
        $("#check-change-password").click(function () {
            if ($(this).is(":checked")) {
                $("#change-password").show();
            } else {
                $("#change-password").hide();
            }
        });
    });
</script>