@extends('layouts.app')

@section('content')

    <form action="{{route('updateMachine',$machine->id)}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">date de creation</label>
            <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="votre machine" name="date_creation" value="{{$machine->machine_creation_date}}">
        </div>
        <div class="form-group">
            <label for="exampleInputIp">date de fin</label>
            <input type="date" class="form-control" id="exampleInputIp" placeholder="ip" name="date_fin" value="{{$machine->machine_end_date}}">
        </div>
        <div class="form-group">
            <label for="exampleInputStatus">Status</label>
            <select class="custom-select" name="status">
                <option value="0" selected>Down</option>
                <option value="1">up</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputIp">Commentaire</label>
            <input type="text" class="form-control" id="exampleInputIp" placeholder="commentaire" name="comment" value="{{$machine->machine_comment}}">
        </div>
        <button type="submit" class="btn btn-primary">Confirmer</button>
    </form>


@endsection