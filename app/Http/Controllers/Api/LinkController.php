<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\LinkController\CreateRequest;
use App\Models\Link;
use Carbon\Carbon;

class LinkController
{
    public function create(CreateRequest $request)
    {
        $link = new Link();
        $link->slug = $request->slug;
        $link->url = $request->url;
        $link->expires_at = $request->expires_at ? Carbon::parse($request->expires_at) : now()->addDays(30);
        $link->save();

        return response()->json();
    }

    public function list()
    {
        $links = Link::query()->get();

        return response()->json($links->map(fn(Link $l) => [
            'id' => $l->id,
            'slug' => $l->slug,
            'url' => $l->url,
            'expires_at' => $l->expires_at?->toDateTimestring(),
            'created_at' => $l->created_at->toDateTimeString(),
        ])->toArray());
    }
}
