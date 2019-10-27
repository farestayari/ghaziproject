<?php

namespace App\Http\Controllers;

use App\Mail\Mailing;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Machine;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class MachineController extends Controller
{
    public function index()
    {
        $machines = Machine::all();
        //dump());
        foreach ($machines as $machine){
            if ($machine->machine_end_date < date('Y-m-d ')){
                $machine->machine_status = 0;
                $machine->save();
//                $details = [
//                    'title' => 'Mail from ItSolutionStuff.com',
//                    'body' => 'This is for testing email using smtp'
//                ];
//
//                Mail::to('fares.tayari@outlook.com')->send(new Mailing($details));
            }elseif($machine->machine_end_date > date('Y-m-d ')) {
                $machine->machine_status = 1;
                $machine->save();
            }
        }
        return view('machine.index',['machine'=>$machines]);
    }

    public function create()
    {
        return view('machine.create');
    }

    public function store(Request $request)
    {
//        dd($request);
        Machine::create($request->all());

        return redirect('/vm-dashboard');

    }

    public function info(Request $request ,$id)
    {
        $id = $request->id;


        $machine = Machine::find($id);

//
        return view ('machine.info',[
            'machine'=>$machine
        ]);
    }

    public function edit(Request $request , $id)
    {
        $id = $request->id;
        $machine = Machine::find($id);
        return view ('machine.edit',[
            'machine'=>$machine
        ]);
    }

    public function updateMachine(Request $request , $id)
    {
        $id = $request->id;
        $machine = Machine::find($id);

//        dump($machine);
        $machine->machine_creation_date = $request->date_creation;
        $machine->machine_end_date = $request->date_fin;
        $machine->machine_comment = $request->comment;
        if ($request->status == 0){
            $machine->machine_status = 0;
        }else{
            $machine->machine_status = 1;
        }
        $machine->save();

       return redirect()->route('info',[
           'id'=>$machine->id
           ]);
    }

    public function showEditMachineInfo(Request $request , $id)
    {
        $id = $request->id;
        $machine = Machine::find($id);
        return view('machine.edit-machine',[
            'machine'=>$machine
        ]);
    }

    public function StoreEditMachineInfo(Request $request , $id)
    {
        $id = $request->id;
        $machine = Machine::find($id);

        $machine->machine_name = $request->machine_name;
        $machine->machine_ip = $request->ip;
        $machine->vendor_name = $request->vendor_name;

        $machine->save();

        return redirect()->route('updateMachine',[
            'id'=>$machine->id
        ]);
    }

    public function deleteMachine(Request $request , $id)
    {
        $id = $request->id;
        $machine = Machine::find($id);
        $machine->status = 0;
        $machine->save();
        $machines = Machine::all();

        return redirect()->route('dashboard',[
            'id' => $machine->id
        ]);
    }

    public function showDeletedMachine()
    {
        $machines=  Machine::all();
        return view('machine.log',[
            'machines' => $machines
        ]);
    }

    public function restoreMachine(Request $request , $id)
    {
        $id = $request->id;
        $machine = Machine::find($id);
        $machine->status = 1;
//        dd($machine);
        $machine->save();
        $machines = Machine::all();

        return redirect()->route('dashboard',[
            'id' => $machine->id
        ]);
    }


}
