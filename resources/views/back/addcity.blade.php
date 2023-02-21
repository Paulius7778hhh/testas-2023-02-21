@extends('back.app')

@section('content')

<form class="card card-header col-md-5" style='translateX(-50%); margin:1% 0 0 28%; ' action="{{route('backend-city-add')}}" method="post">



    <label for="title">City name</label>

    <input type="text" name="title">

    <button type='submit'>Add City</button>
    @csrf</form>


@endsection
