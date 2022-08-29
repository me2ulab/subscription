<?php

namespace App\Jobs;

use App\Models\Subscription;
use log;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

use function PHPUnit\Framework\throwException;

class SendSubscriptionEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $data;
    public function __construct($data)
    {
        $this->data= $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $subscribers = Subscription::where('website_id', $this->data['website_id'])->get();
        foreach($subscribers as $subscriber)
        {
            try {
                Mail::to($this->user->email)
                    ->send(new \App\Mail\SubscriptionEmail($this->$subscriber->user()->first_name, $this->data['message'] )); 
            } catch (\Exception $exception) {
                throwException($exception);
            }
        }
        
    }
}
