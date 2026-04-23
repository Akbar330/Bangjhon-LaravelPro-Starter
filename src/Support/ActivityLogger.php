<?php

namespace Bangjhon\LaravelProStarter\Support;

use Bangjhon\LaravelProStarter\Models\Activity;

class ActivityLogger
{
    public static function log(string $type, string $description, ?int $userId = null, array $meta = []): void
    {
        Activity::query()->create([
            'user_id' => $userId,
            'type' => $type,
            'description' => $description,
            'meta' => $meta,
        ]);
    }
}
