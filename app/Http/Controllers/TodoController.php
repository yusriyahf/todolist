<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ListModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;


class TodoController extends Controller
{
    public function get(Request $request): Request
    {
        return $request;
    }

    public function someMethod(Request $request)
    {
        $listModel = new ListModel();

        $listModel->title = $request->input('title');
        $listModel->description = $request->input('description');
        $listModel->end_date = $request->input('end_date');
        $listModel->isDeleted = 0;
        $listModel->save();
        echo("asuu");
    }


    public function insertform()
    {
        return view('stud_create');
    }

    public function insert(Request $request)
    {
        $listModel = new ListModel();

        $listModel->title = $request->input('title');
        $listModel->desciption = $request->input('desciption');
        $listModel->end_date = $request->input('end_date');
        $listModel->save();
        echo("asuu");
//        $title =
//        $desciption = $request->input('description');
//        $start_date = $request->input('start_date');
//        $end_date = $request->input('end_date');
//        $data = array('title' => $title, "description" => $desciption, "start_date" => $start_date, "end_date" => $end_date);
    }
}
