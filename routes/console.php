<?php

use Illuminate\Support\Facades\Schedule;

Schedule::call(function () {
    \App\Models\Link::query()->where('expires_at', '<', now())->delete();
})->daily();
