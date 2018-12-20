<?php

namespace App\Jobs;

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
                'key'    => 'x',
                'secret' => 'x',
            ],
        ));

        $result = $client->receiveMessage(array(
            'QueueUrl' => 'https://sqs.eu-west-1.amazonaws.com/509605125032/smartalarm-events.fifo',
            'MaxNumberOfMessages' => 1
        ));

        if($result->getPath('Messages')) {
            foreach ($result->getPath('Messages') as $message) {
                try {

                    echo $message['Body'].'<br>';
                    /*
                    $client->deleteMessage(array(
                        'QueueUrl' => Yii::$app->params['aws']['sqs']['postQueue'],
                        'ReceiptHandle' => $message['ReceiptHandle'],
                    ));
                    */
                } catch (app\handlers\HandlerException $e){
                    /* $client->deleteMessage(array(
                        'QueueUrl' => Yii::$app->params['aws']['sqs']['postQueue'],
                        'ReceiptHandle' => $message['ReceiptHandle'],
                    ));
                    */
                }
            }
        }
    }
}
