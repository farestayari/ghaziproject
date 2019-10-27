@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Machines</div>
            <div class="card-body">
    <table class="table" id="table">
        <thead>
        <tr>
            <th scope="col">date de creation</th>
            <th scope="col">date de fin</th>
            <th scope="col">comment</th>
            <th scope="col">status</th>
            <th scope="col">edit</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$machine->machine_creation_date}}</td>
            <td>{{$machine->machine_end_date}}</td>
            <td>{{$machine->machine_comment}}</td>
            @if($machine->machine_status == 1)
                <td>up</td>
                @else
                <td>down</td>
                @endif
            <td><a class="btn btn-primary" href="{{route('edit',$machine->id)}}">edit</a></td>
        </tr>
        </tbody>
    </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready( function () {
            $('#table').DataTable();
        } );
    </script>
@endsection