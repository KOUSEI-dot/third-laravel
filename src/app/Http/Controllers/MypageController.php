<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function mypage()
    {
        $user = Auth::user();
        $listedProducts = $user->products()->latest()->get(); // 多対多の関係から取得

        return view('mypage', compact('listedProducts'));
    }
}
