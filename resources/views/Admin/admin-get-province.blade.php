<option value="">Quận/Huyện</option>
@foreach($options as $province)
<option value="{{ $province->province_id.'.'.$province->name }}"
@if(isset($admin) && $admin->province_id == $province->province_id)
    selected="selected"
@endif
>{{ $province->name }}</option>
@endforeach
