<?php
namespace App\Jobs;

use App\Event;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Aws\Sqs\SqsClient;
use Aws\Common\Aws;
class ProcessSqs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $client = SqsClient::factory(array(
            'region'  => 'eu-west-1',
            'version' => 'latest',
             'credentials' => [
                'key'    => env("SQS_KEY", "my_sqs_key"),
                'secret' => env("SQS_SECRET", "my_sqs_secret"),
            ],
        ));

        $QueueUrl = 'https://sqs.eu-west-1.amazonaws.com/509605125032/smartalarm-events.fifo';

        $result = $client->receiveMessage([
            'QueueUrl' => $QueueUrl,
            'MaxNumberOfMessages' => 10
        ]);

        /* ****************************************************************************
          Part 1
          1. Get results from Queue
          2. Check if the message is from my base
          3. If it is from my base, save to local db
          4. Delete from queue
        **************************************************************************** */
        if($result->getPath('Messages')) {
            foreach ($result->getPath('Messages') as $message) {
                try {

                    // Get the message id
                    $messageId = $message['MessageId'];
                    // Message body comes as a string we convert it to an array
                    $data = json_decode($message['Body'], true);

                    // Set the id of my base and get the one incoming
                    $myBaseId = "104912";
                    $incomingBaseId = $data['base']['unitId'];

                    // Compare base id's and only save if it is from my device
                    if($incomingBaseId == $myBaseId) {

                      // Check if the messageId is unique
                      $event = Event::where('messageId', '=', $messageId)->first();
                      if ($event === null) {
                        // Create the event in db
                        $createEvent = Event::create([
                                'messageId' => $messageId,
                                'unit_no' => $data['unitNo'],
                                'device_type' => $data['device']['type'],
                                'status' => $data['status'],
                                'rssi' => $data['state']['rssi'],
                                'time' => $data['time']
                            ]);
                      }

                      // Delete message from queue
                      $result = $client->deleteMessage(array(
                          'QueueUrl' => $QueueUrl,
                          'ReceiptHandle' => $message['ReceiptHandle'],
                      ));

                    }

                  } catch (app\handlers\HandlerException $e){
                      /* $client->deleteMessage(array(
                          'QueueUrl' => Yii::$app->params['aws']['sqs']['postQueue'],
                          'ReceiptHandle' => $message['ReceiptHandle'],
                      ));
                      */
                  }
                }

                /* ****************************************************************************
                  Part 2
                  1. Get the latest records from events table from local db
                  2. Check if the latest record is door/window contact
                  3. Check if within timespan there has been motion detected
                  4. Send message
                **************************************************************************** */

                $doorUnitNo = 1; // unit number from the door sensor
                $timeSpan = 10; // Timespan between door and motion sensor trigger

                // Check if door is the latest event
                $latestEvents = Event::orderBy('id', 'desc')->take(10)->get();
                if ($latestEvents[0]->device_type == 'Door/Window Contact' && $latestEvents[0]->unit_no == $doorUnitNo) {

                  // Get the door update time
                  $doorTime = $latestEvents[0]->updated_at; // Time door sensor is triggerd

                  // Get the latest events that occured
                  foreach ($latestEvents as $event) {
                    // Check if event type = motion && within timespan
                    if($event->device_type == 'Motion Detector' && $event->updated_at->diffInSeconds($doorTime) < $timeSpan) {

                      /* Problem
                      Because this is a loop this keeps sending messages
                      possible solutions:
                      1. Give the devices an input field push_send with a default of false and toggle when send
                      2. Check the current time and the doortime and if within x seconds send whatsapp
                      * end problem */

                      // Send whatsapp
                      // $json = json_decode(file_get_contents('http://api.mijnsmartalarm.nl/API/whatsapp.php?message=Het%20alarm%20staat%20niet%20aan'), true);
                    }
                  }
                }


        }
    }
}
