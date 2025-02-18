<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendUserMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userIds; 
    protected $messageContent;

    public function __construct(array $userIds, string $messageContent)
    {
        $this->userIds = $userIds;
        $this->messageContent = $messageContent;
    }

    public function handle(): void
    {
        
        User::whereIn('id', $this->userIds)
            ->chunk(100, function ($users) {
                foreach ($users as $user) {
                    Mail::to($user->email)
                        ->send(new \App\Mail\UserMessage($this->messageContent));
                }
            });
    }
}
