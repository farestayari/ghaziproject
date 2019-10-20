@extends('layouts.app')

@section('content')

    <form action="{{route('store')}}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Nom de la machine</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="votre machine" name="machine_name">
        </div>
        <div class="form-group">
            <label for="exampleInputIp">@Ip</label>
            <input type="text" class="form-control" id="exampleInputIp" placeholder="ip" name="machine_ip">
        </div>
        {{--<div class="form-group">--}}
            {{--<label for="exampleInputStatus">Status</label>--}}
            {{--<input disabled type="text" class="form-control" id="exampleInputStatus" placeholder="status">--}}
        {{--</div>--}}
        <button type="submit" class="btn btn-primary">Confirmer</button>
    </form>


@endsection