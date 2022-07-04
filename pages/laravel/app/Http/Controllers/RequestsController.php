<?php

namespace App\Http\Controllers;

use App\Models\Request;
use Illuminate\Http\Request as Req;

class RequestsController extends Controller
{
    public function index(Req $req) {
        $months = $req->input('months');

        if (!$months) $months = 6;

        $requests = Request::selectRaw('domain, count(*) as requests, sum(content_length) as traffic')
        ->whereRaw('datetime >= DATEADD(month, -' . $months . ', GETDATE())')
        ->groupBy('domain')->orderByDesc('traffic')->get();

        return view('requests.list', [
            'requests' => $requests,
            'months' => $months
        ]);
    }

    public function extended(Req $req) {
        $months = $req->input('months');

        if (!$months) $months = 6;

        $requests = Request::selectRaw("method, scheme + '://' + domain + path as url, content_type, body, count(*) as requests, sum(content_length) as traffic")
        ->whereRaw('datetime >= DATEADD(month, -' . $months . ', GETDATE())')
        ->groupBy('method', 'scheme', 'domain', 'path', 'body', 'content_type')
        ->orderByDesc('traffic')->get();

        return view('requests.extended', [
            'requests' => $requests,
            'months' => $months
        ]);
    }
}
