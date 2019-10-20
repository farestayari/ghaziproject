@extends('layouts.app')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ip</th>
            <th scope="col">nom de la machine</th>
            <th scope="col">etat</th>
            <th scope="col">info</th>

        </tr>
        </thead>
        <tbody>
        @foreach($machine  as $machine)
            <tr>
                <td>{{$machine->machine_ip}}</td>
                <td>{{$machine->machine_name}}</td>
                @if($machine->machine_status == 0)
                <td><img style="width: 10px" ; height="10px" src="{{asset('/images/red.png')}}" alt=""></td>
                @else
                    <td><img style="width: 10px" ; height="10px" src="{{asset('/images/green.jpg')}}" alt=""></td>
                @endif
                <td><a class="btn btn-primary" href="{{route('info',$machine->id)}}">info</a></td>
             
            </tr>
        @endforeach
        </tbody>
    </table>

    <a class="btn btn-primary" href="{{route('create')}}">Ajouter une machine</a>

@endsection