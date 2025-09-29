<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class SendVerificationEmail implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public int $userId;

    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    public function handle()
    {
        $user = User::find($this->userId);
        if (! $user) return;
        
        $user->sendEmailVerificationNotification();
    }
}
