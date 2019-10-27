@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Machines</div>
            <div class="card-body">


            <table class="table" id="table">
        <thead>
        <tr>
            <th scope="col">ip</th>
            <th scope="col">nom de la machine</th>
            <th scope="col">nom de revendeur</th>
            <th scope="col">etat</th>
            <th scope="col">info</th>

        </tr>
        </thead>
        <tbody>
        @foreach($machines  as $machine)
            @if($machine->status == 0)
            {{--@csrf--}}
            {{--@method('PUT')--}}
            <tr>
                <td>{{$machine->machine_ip}}</td>
                <td>{{$machine->machine_name}}</td>
                <td>{{$machine->vendor_name}}</td>
                @if($machine->machine_status == 0)
                <td><img style="width: 10px" ; height="10px" src="{{asset('/images/red.png')}}" alt=""></td>
                @else
                    <td><img style="width: 10px" ; height="10px" src="{{asset('/images/green.jpg')}}" alt=""></td>
                @endif
                <td>
                    <a class="btn btn-primary" href="{{route('info',$machine->id)}}">Info</a>
                    <a class="btn btn-info" href="{{route('showEdit',$machine->id)}}">Edit</a>
                    <a class="btn btn-dark" href="{{route('restoreMachine',$machine->id)}}">Restorer</a>
                </td>
             
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
            </div>
        </div>
        
    <script>
        $(document).ready( function () {
            $('#table').DataTable();
        } );
    </script>


@endsection