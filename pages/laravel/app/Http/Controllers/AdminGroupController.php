<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class AdminGroupController extends Controller
{
    public function index(Request $req) {
        return view('admin.group.list', [
            'groups' => Groups::get()
        ]);
    }

    public function create(Request $req) {
        return view('admin.group.add');
    }

    public function store(Request $req) {
        $group = new Groups();

        $group->title = $req->input('title');
        $group->state = $req->input('state');

        $group->save();

        return Redirect::to('/laravel/admin/groups');
    }

    public function edit(Request $req, $id) {
        return view('admin.group.edit', [
            'group' => Groups::where('group_id', $id)->first(),
            'groups_states' => ['Бюджет', 'Контракт']
        ]);
    }

    public function update(Request $req, $id) {
        $group = Groups::where('group_id', $id)->first();

        $group->title = $req->input('title');
        $group->state = $req->input('state');

        $group->save();

        return Redirect::to('/laravel/admin/groups');
    }

    public function destroy(Request $req, $id) {
        Groups::destroy($id);

        return Redirect::to('/laravel/admin/groups');
    }
}
