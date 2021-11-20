<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ListModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Models\Task;


class TodoController extends Controller
{
    public function get(Request $request)
    {
        $requestQuery = $request->query();
        $taskQuery = DB::table('list');
        $offset = 0;
        $limit = 10;
        if (count($requestQuery) > 0) {
            if (isset($requestQuery["page"])) {
                $page = $requestQuery["page"];
                $pageInt = $page + 0;
                $offset = $pageInt * 10 - 10;
                $limit = $limit + $offset;
            }

            if (isset($requestQuery["filter"])) {
                $filter = $requestQuery["filter"];
                if ($filter != "") {
                    $taskQuery = $taskQuery->where("category", $filter)->page;
                }
            }
        }

        $task = $taskQuery->where("isDeleted", 0)->orderByDesc("created_at")->offset($offset)->limit($limit)->get();
        return view('index', [
            'tasks' => $task
        ]);
    }

    public function someMethod(Request $request)
    {
        $listModel = new ListModel();

        $listModel->title = $request->input('title');
        $listModel->description = $request->input('description');
        $listModel->category = $request->input('category');
        $listModel->end_date = $request->input('end_date');
        $listModel->isDeleted = 0;
        $listModel->save();

        return redirect("/");
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
        $listModel->category = $request->input('category');
        $listModel->end_date = $request->input('end_date');
        $listModel->save();
        echo ("asuu");
    }
}
