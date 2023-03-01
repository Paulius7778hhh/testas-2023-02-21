@extends('back.app')

@section('content')
    <form class="card card-header col-md-5" style='translateX(-50%); margin:1% 0 0 28%; '
        action="{{ route('backend-update-restaurant', $restaurant) }}" method="post">




        <label for="edit_title">Restaurant name</label>

        <input type="text" name="edit_title" value="">

        <select style="margin-top: 10px" class="form-select" name="edit_city_id" aria-label="Default select example">

            <option selected>select country</option>

            @forelse($cities as $key => $city)
                <option value="{{ $city->id }}">{{ $city->title }}</option>




            @empty
                <option value="">none</option>
            @endforelse
        </select>

        <label for="edit_address">Address</label>
        <input type="text" name="edit_address" value="">
        <label for="edit_work_start">Working begins</label>
        <input type="text" name="edit_work_start" value="">
        <label for="edit_work_end">Working ends</label>

        <input type="text" name="edit_work_end" value="">
        <button type='submit'>Edit Restaurant</button>
        @method('put')
        @csrf
    </form>
@endsection
