<?php

namespace App\Jobs;

use App\Event;

use Illuminate\Contracts\Queue\Job as LaravelJob;
use Illuminate\Database\Eloquent\Model;

use Aws\Sqs\SqsClient;

// class HandlerJob extends Job
class HandlerJob
{
  protected $data;

  /**
   * @param LaravelJob $job
   * @param array $data
   */
  public function handle(LaravelJob $job, array $data)
  {

    $client = SqsClient::factory(array(
      'key'    => env("SQS_KEY", "my_sqs_key"),
      'secret' => env("SQS_SECRET", "my_sqs_secret"),
      'region'  => env("SQS_REGION", "my_sqs_region")
    ));

    $result = $client->createQueue(array('QueueName' => env("SQS_QUEUE", "my_sqs_queue")));
    $queueUrl = $result->get(env("SQS_PREFIX", "my_queue_prefix"));

    $result = $client->receiveMessage(array(
      'QueueUrl' => $queueUrl,
    ));

    foreach ($result->getPath('Messages/*/Body') as $messageBody) {
        // Do something with the message
        var_dump($messageBody);
    }



    /* ------------------------------------------- */
    /*    Old, working with the plain-sqs libary   *
    /* ------------------------------------------- */

      // This is incoming JSON payload, already decoded to an array
      /*
      if($data['base']['unitId'] == '104912') {
          var_dump($data);
      }
      else {
        $test = "dit is niet mijn device";
        var_dump($test);
      }
      */

      // var_dump($data);

      // var_dump($data);
      // var_dump($job->getRawBody());

      // $myBaseId = "104912";
      // $incomingBaseId = $data['base']['unitId'];
      //
      // if($incomingBaseId == $myBaseId) {
      //   $createEvent = Event::Create(
      //       [
      //           'unit_no' => $data['unitNo'],
      //           'device_type' => $data['device']['type'],
      //           'status' => $data['status'],
      //           'rssi' => $data['state']['rssi'],
      //           'time' => $data['time']
      //       ]);
      // }
      //
      // $doorUnitNo = 1; // unit number from the door sensor
      // $motionUnitNo = 2; // unit number from the motion sensor
      // $timeSpan = 30; // Timespan between door and motion sensor trigger
      //
      // $latestEvents = Event::orderBy('id', 'desc')->take(5)->get();
      // if ($latestEvents[0]->device_type == 'Door/Window Contact' && $latestEvents[0]->unit_no == $doorUnitNo) {
      //
      //   $doorTime = $latestEvents[0]->updated_at; // Time door sensor is triggerd
      //
      //   foreach ($latestEvents as $event) {
      //     // Check if the event is from type motion && if its update time is within $timeSpan from the door update time.
      //     if($event->device_type == 'Motion Detector' && $event->unit_no == $motionUnitNo && $event->updated_at->diffInSeconds($doorTime) < $timeSpan) {
      //       $json = json_decode(file_get_contents('http://api.mijnsmartalarm.nl/API/whatsapp.php?message=Het%20alarm%20staat%20niet%20aan'), true);
      //     }
      //   }
      //
      // }

  }
}
