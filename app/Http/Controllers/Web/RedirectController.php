<?php

namespace App\Http\Controllers\Web;

use App\Models\Link;

class RedirectController
{
    public function __invoke(string $slug)
    {
        $link = Link::query()
            ->where('slug', $slug)
            ->where('expires_at', '>', now())
            ->first();

        if (is_null($link)) {
            return redirect()->to(config('links.fallback_url'));
        }

        return redirect()->to($link->url);
    }
}
