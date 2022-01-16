<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; //追加

use App\Habit;

class UsersController extends Controller
{
    public function show($id)
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザの投稿の一覧を作成日時の降順で取得
            // （後のChapterで他ユーザの投稿も取得するように変更しますが、現時点ではこのユーザの投稿のみ取得します）
            $habits = $user->habits()->orderBy('created_at', 'desc')->paginate(10);
            
            // 関係するモデルの件数をロード
            $user->loadRelationshipCounts();

            // ユーザのフォロー一覧を取得
            $clears = $user->clears()->paginate(10);
            
            
            $data = [
                'user' => $user,
                'habits' => $habits,
                'clears' => $clears,
            ];
        }
            
        // ユーザ詳細ビューでそれを表示
        return view('users.show', $data);
    }
    
    
}
