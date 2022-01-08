<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClearsController extends Controller
{
        /**
     * ユーザをフォローするアクション。
     *
     * @param  $id  相手ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        // 認証済みユーザ（閲覧者）が、 idのユーザをフォローする
        \Auth::user()->clear($id);
        // 前のURLへリダイレクトさせる
        return back()->with('flash_message', 'しっかり頑張りましたね！明日も頑張りましょう！');

    }

    /**
     * ユーザをアンフォローするアクション。
     *
     * @param  $id  相手ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 認証済みユーザ（閲覧者）が、 idのユーザをアンフォローする
        \Auth::user()->unclear($id);
        // 前のURLへリダイレクトさせる
        return back();
    }

}
