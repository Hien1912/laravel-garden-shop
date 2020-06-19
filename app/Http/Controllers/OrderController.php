<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index($status)
    {
        $list = ["tiep-nhan" => "Tiếp nhận", 'xac-nhan' => "Xác nhận", 'dang-gui' => "Đang gửi", 'huy' => "Đơn Hủy"];
        return view('admin.order')
            ->with('sidebar', ["Đơn hàng", $list["$status"]]);
    }

    public function getByStatus()
    {
    }

    public function getById()
    {
    }

    public function update()
    {
    }
}
