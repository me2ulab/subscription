<?php

namespace App\Console\Commands;
use App\Models\User;

use Illuminate\Console\Command;
use App\Jobs\SendSubscriptionEmailJob;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:sendEmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to send email to all the subscribers';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $subscribers = User::All()->take(100);
        foreach($subscribers as $subscriber)
        {
            $this->sendEmail($subscriber);
        }
        return 0;
    }
    public function sendEmail($user)
    {
        SendSubscriptionEmailJob::dispatch($user);
    }
}
