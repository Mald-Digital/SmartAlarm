<?php

namespace App\Jobs;

use App\Device;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ChangeStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $device_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->device_id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $device = Device::find($this->device_id);

      if ($device->status === 'closed') {
          $device->status = 'open';
      }
      else if($device->status == 'open') {
          $device->status = 'closed';
      }
      
      $device->save();
    }
}
