<?php

namespace App\Http\Middleware;

use App\Models\PageView;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($this->shouldTrack($request)) {
            PageView::create([
                'ip_address' => $request->ip(),
                'url' => $request->fullUrl(),
                'user_agent' => $request->userAgent(),
                'visited_at' => now(),
            ]);
        }

        return $response;
    }

    private function shouldTrack(Request $request): bool
    {
        $path = $request->path();

        $exclude = [
            'admin*',
            'storage/*',
            '_debugbar*',
            'build/*',
            'manifest.json',
            'hot',
            'opencode*',
            '_ignition*',
            'vendor/*',
            'api/*',
            'sanctum/*',
        ];

        foreach ($exclude as $pattern) {
            if (Str::is($pattern, $path)) {
                return false;
            }
        }

        return true;
    }
}
