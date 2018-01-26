<?php

namespace App\Jobs;

use App\WebHook;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendWebHook implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $webHook;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($webHook)
    {
        $this->webHook = $webHook;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // WebHook::create([ 'webHook'  => json_encode(['redis' => 'andato']) ]);

        $httpClient = new Client();

        $res = $httpClient->request('POST', 'http://localhost:8000/web-hook/save', [
            'form_params' => [
                'webHook'  => json_encode(['redis' => 'andato'])
            ]
        ]);

        $statusCode = $res->getStatusCode();
        Log::info('Status Code' . $statusCode);
        if ($statusCode != 200) {
            
        };

    }
}
