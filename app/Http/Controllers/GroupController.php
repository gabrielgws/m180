<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return view('pages.groups.index', compact('groups'));
    }

    public function create()
    {
        return view('pages.groups.create');
    }

    public function show(Group $grupo)
    {
        return view('groups.show', compact('grupo'));
    }
}
