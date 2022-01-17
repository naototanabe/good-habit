<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Habit;

class HabitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザの習慣の一覧を作成日時の降順で取得
            $habits = $user->habits()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'habits' => $habits,
            ];
        }

        // Welcomeビューでそれらを表示
        return view('welcome', $data);
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $habit = new Habit;
            $user = \Auth::user();
        
        
            //習慣作成ビューを表示
            return view('habits.create', [
                'habit' => $habit,
                'user' => $user,
            ]);
        
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
        ]);
        
        

        // 認証済みユーザ（閲覧者）の習慣として作成（リクエストされた値をもとに作成）
        $request->user()->habits()->create([
            'content' => $request->content,
        ]);

        // 前のURLへリダイレクトさせる
        return redirect('/');
        
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // idの値で習慣を検索して取得
        $habit = \App\Habit::findOrFail($id);
        
        $user = \Auth::user();

        // メッセージ編集ビューでそれを表示
        return view('habits.edit', [
            'habit' => $habit,
            'user' => $user
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // idの値で習慣を検索して取得
        $habit = \App\Habit::findOrFail($id);
        // メッセージを更新
        $habit->content = $request->content;
        $habit->save();

        // トップページへリダイレクトさせる
        return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // idの値で習慣を検索して取得
        $habit = \App\Habit::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその習慣の所有者である場合は、習慣を削除
        if (\Auth::id() === $habit->user_id) {
            $habit->delete();
        }

        // 前のURLへリダイレクトさせる
        return back();

    }
}
