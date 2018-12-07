<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alarm;
use App\Device;

use App\Events\MotionDetected;
use App\Events\DoorOpendDetected;
use App\Events\DoorClosedDetected;

class DeviceController extends Controller
{

    public function index(Request $request)
    {
        $devices = Device::all();
        return view('pages.remote', compact ('devices'));
    }

    public function update(Request $request, $id)
    {
        $device = Device::find($id);

        // Toggle the status of the device
        if ($device->status === 0) {
            $device->status = 1;

            if($device->type == 'contact') {
              event(new DoorOpendDetected($id));
            }
        }
        else if ($device->status === 1) {
            $device->status = 0;

            if($device->type == 'contact') {
              event(new DoorClosedDetected($id));
            }
        }

        $device->save();

        return redirect()->back();
    }



    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
