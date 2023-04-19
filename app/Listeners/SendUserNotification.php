<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Jobs\UserCreatedJob;

class SendUserNotification
{
    public function handle(object $event): void
    {
        UserCreatedJob::dispatch($event->email, $event->password);
    }
}
