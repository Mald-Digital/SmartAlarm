<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Alarm;
use App\Device;

class AlarmController extends Controller
{

    public function index(Request $request)
    {
      $alarms = Alarm::all();
      return view('pages.remote', compact ('alarms'));
    }

    public function update(Request $request, $id)
    {
        $alarm = Alarm::find($id);

        // Toggle the status of the device
        if ($alarm->status === 0) {
            $alarm->status = 1;
        }
        else if ($alarm->status === 1) {
            $alarm->status = 0;
        }

        $alarm->save();
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
