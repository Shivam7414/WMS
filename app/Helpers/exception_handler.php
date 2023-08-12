<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Throwable;

class ExceptionHandler
{
    public static function handle($callback)
    {
        $request = app(Request::class);
        try {
            return $callback($request);
        } catch (Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
?>
