<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Jobs\SendUserMessage;
use Illuminate\Console\Command;
class SendBulkMessagesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'messages:send';
    

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send messages to all users in batches';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $messageContent = "this is test message to users"; 
        
        
        User::select('id')->chunk(500, function ($users) use ($messageContent) {
            $userIds = $users->pluck('id')->toArray();
            SendUserMessage::dispatch($userIds, $messageContent);
        });

        $this->info('Bulk messages are being queued!.');
    }
}
