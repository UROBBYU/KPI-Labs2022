<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Groups extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'group_id';

    public function getGroups($state) {
        $query = DB::table('groups');

        $query->select('*')->orderBy('title');

        if ($state) {
            $query->where('state', $state);
        }

        return $query->get();
    }

    public function getGroupByID($id) {
        if (!$id) return null;

        return DB::table('groups')->select('*')->where('group_id', $id)->get()->first();
    }
}
