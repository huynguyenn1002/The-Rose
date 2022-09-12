<option value="">Phường/Xã</option>
@foreach($options as $ward)
<option value="{{ $ward->ward_id.'.'.$ward->name }}"
@if(isset($admin) && $admin->ward_id == $ward->ward_id)
    selected="selected"
@endif
>{{ $ward->name }}</option>
@endforeach
