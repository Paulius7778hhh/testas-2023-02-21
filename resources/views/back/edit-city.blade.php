@extends('back.app')

@section('content')
    <form class="card card-header col-md-5" style='translateX(-50%); margin:1% 0 0 28%; '
        action="{{ route('backend-update-city', $city) }}" method="post">



        <label for="edit_title">City name</label>

        <input type="text" name="edit_title" value="{{ old('edit_title', $city->title) }}">

        <button type='submit'>Edit City</button>
        @method('put')
        @csrf
    </form>
@endsection
