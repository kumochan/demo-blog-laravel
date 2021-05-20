<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public $categories = [
        [
            "id" => 1,
            "name" => "Lập trình cơ bản",
            "total_post" => 10,
            "slug" => "lap-trinh-co-ban"
        ],
        [
            "id" => 2,
            "name" => "Ebooks",
            "total_post" => 500,
            "slug" => "ebooks"
        ],
    ];

    public function index()
    {
        $totals = 2;
        $categories = $this->categories;
        return view('backend.category.index', compact('categories', 'totals'));
    }

    /**
     * Hafm nay la ham de edit danh muc
     */
    public function showEdit(Request $request)
    {

        $id = ($request->id) - 1;
        $cate = $this->categories[$id];
        $categories = $this->categories;
        return view('backend.category.edit', compact('cate', 'categories'));
    }

    public function edit(Request $request)
    {
        $id = ($request->input('id')) - 1;
        $cate = $this->categories[$id];

        $cate['name'] = $request->name;
        $cate['slug'] = $request->slug;

        $categories = $this->categories;
        $categories[$id] = $cate;

        return view('backend.category.edit', compact('cate', 'categories'))->with('msg_sucess', 'Cập nhật dữ liệu thành công!');
        //->withInput(Input::all())->with('message', 'Some message');
    }
}
