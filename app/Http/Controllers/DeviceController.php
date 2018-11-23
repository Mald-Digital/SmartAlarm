<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;

class DeviceController extends Controller
{

    public function index(Request $request)
    {
        $devices = Device::all();
        return view('pages.door', compact ('devices'));
    }

    public function update(Request $request, $id)
    {
        $device = Device::find($id);

        // Toggle the status of the device
        if ($device->status === 0) {
            $device->status = 1;
        }
        else if ($device->status === 1) {
            $device->status = 0;
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
