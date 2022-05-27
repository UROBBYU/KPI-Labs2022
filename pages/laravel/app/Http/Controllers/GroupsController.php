<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    public function index(Request $req) {
        $state = $req->input('state');

        $model_groups = new Groups();

        $groups = $model_groups->getGroups($state);

        return view('groups.list', [
            'groups' => $groups,
            'state' => $state,
        ]);
    }

    public function group(Request $req, $id) {
        $model_groups = new Groups();
        $group = $model_groups->getGroupByID($id);

        return view('groups.group', [
            'group' => $group
        ]);
    }
}
