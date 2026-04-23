<?php

namespace Bangjhon\LaravelProStarter\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'bangjhon_activity_logs';

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'meta' => 'array',
        ];
    }
}
