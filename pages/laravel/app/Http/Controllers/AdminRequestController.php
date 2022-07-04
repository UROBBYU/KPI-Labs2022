<?php

namespace App\Http\Controllers;

use App\Models\MimeType;
use App\Models\Request;
use App\Models\RequestMethod;
use Illuminate\Http\Request as Req;

class AdminRequestController extends Controller
{
    public function index() {
        return redirect('laravel/admin/requests/0?search=&size=50');
    }

    public function show(Req $req, $id) {
        $str = $req->input('search');
        $page_size = $req->input('size') ?: 50;

        $method = null;
        $scheme = null;
        $domain = null;
        $path = null;

        $arr = explode(' ', $str, 2);
        if (count($arr) > 1) $method = array_shift($arr);

        $arr = explode('://', $arr[0], 2);
        if (count($arr) > 1) $scheme = array_shift($arr);

        $arr = explode('/', $arr[0], 2);
        $domain = array_shift($arr);

        if (count($arr) > 0) $path = '/' . $arr[0];

        $table = Request::select('*');

        if ($method) $table = $table->where('method', 'like', $method . '%');
        if ($scheme) $table = $table->where('scheme', 'like', $scheme . '%');
        if ($domain) $table = $table->where('domain', 'like', $domain . '%');
        if ($path) $table = $table->where('path', 'like', $path . '%');

        $count = $table->count();
        $page = $id;
        $page_max = ceil($count / $page_size) - 1;

        if ($page > $page_max) $page = $page_max;
        if ($page < 0) $page = 0;

        return view('admin.request.show', [
            'search' => $str,
            'page_max' => $page_max,
            'page_size' => $page_size,
            'page' => $page,
            'table' => $table->skip($page_size * $page)
            ->take($page_size)->get()
        ]);
    }

    public function create(Req $req) {
        return view('admin.request.add', [
            'methods' => RequestMethod::get(),
            'types' => MimeType::get(),
            'ip' => $req->ip() ?: ''
        ]);
    }

    public function store(Req $req) {
        $request = new Request();

        $url = parse_url($req->input('url'));

        $request->scheme = (isset($url['scheme']) ? $url['scheme'] : 'https');
        $request->domain = $url['host'] . (isset($url['port']) ? ':' . $url['port'] : '');
        $request->path = (isset($url['path']) ? $url['path'] : '/');
        $request->query = (isset($url['query']) ? $url['query'] : '');
        $request->method = $req->input('method');
        $request->body = $req->input('body') ?: null;
        $request->content_type = $req->input('content_type');
        $request->content_length = $req->input('content_length');
        $request->referrer = $req->input('referrer');
        $request->country = $req->input('country');
        $request->datetime = $req->input('date') . ' ' . $req->input('time');

        $request->save();

        return redirect('laravel/admin/requests/0?search=&size=50');
    }

    public function edit(Req $req, $id) {
        return view('admin.request.edit', [
            'methods' => RequestMethod::get(),
            'types' => MimeType::get(),
            'request' => Request::find($id)
        ]);
    }

    public function update(Req $req, $id) {
        $request = Request::find($id);

        $url = parse_url($req->input('url'));

        $request->scheme = (isset($url['scheme']) ? $url['scheme'] : 'https');
        $request->domain = $url['host'] . (isset($url['port']) ? ':' . $url['port'] : '');
        $request->path = (isset($url['path']) ? $url['path'] : '/');
        $request->query = (isset($url['query']) ? $url['query'] : '');
        $request->method = $req->input('method');
        $request->body = $req->input('body') ?: null;
        $request->content_type = $req->input('content_type');
        $request->content_length = $req->input('content_length');
        $request->referrer = $req->input('referrer');
        $request->country = $req->input('country');
        $request->datetime = $req->input('date') . ' ' . $req->input('time');

        $request->save();

        return redirect('laravel/admin/requests/0?search=&size=50');
    }

    public function destroy(Req $req, $id) {
        Request::destroy($id);

        $page = $req->input('page');
        $search = $req->input('search');
        $size = $req->input('size');

        return redirect('laravel/admin/requests/' . $page . '?search=' . $search . '&size=' . $size);
    }
}
