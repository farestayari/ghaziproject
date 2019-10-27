@extends('layouts.app')

@section('content')

    <form action="{{route('StoreEditMachineInfo',$machine->id)}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">Nom de machine</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="votre machine" name="machine_name" value="{{$machine->machine_name}}">
        </div>
        <div class="form-group">
            <label for="exampleInputIp">IP</label>
            <input type="text" class="form-control" id="exampleInputIp" placeholder="ip" name="ip" value="{{$machine->machine_ip}}">
        </div>
        <div class="form-group">
            <label for="exampleInputIp">Nom de revendeur</label>
            <input type="text" class="form-control" id="exampleInputIp" placeholder="ip" name="vendor_name" value="{{$machine->vendor_name}}">
        </div>


        <button type="submit" class="btn btn-primary">Confirmer</button>
    </form>
@endsection