<?php declare(strict_types=1);

namespace JoshuaBehrens\NetworkCapacityLogger\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use JoshuaBehrens\NetworkCapacityLogger\External\Speedtest\Database\Request;

class Statistics extends Controller
{
    public function speed()
    {
        /** @var Request[]|Collection $speedData */
        $speedData = Request::query()
            ->whereDate('created_at', '>=', strtotime('-24 hours'))
            ->get();

        return view('welcome', [
            'downspeeds' => $speedData->map(function (Request $request) { return ($request->download_bps / 1024.) / 1024.; })->toArray(),
            'downspeedlabels' => $speedData->map(function (Request $request) { return $request->created_at->format('l. H:i'); })->toArray(),
        ]);
    }
}
