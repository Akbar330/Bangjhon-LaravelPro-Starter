<?php

namespace Kaizen\LaravelProStarter\Support;

use Illuminate\Database\Eloquent\Model;

class UserModel
{
    public static function className(): string
    {
        /** @var class-string<Model> $model */
        $model = config('auth.providers.users.model', \App\Models\User::class);

        return $model;
    }

    public static function tableName(): string
    {
        return (new (static::className()))->getTable();
    }
}
