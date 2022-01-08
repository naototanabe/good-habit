<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * このユーザが所有する投稿。（ Habitモデルとの関係を定義）
     */
    public function habits()
    {
        return $this->hasMany(Habit::class);
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount('habits');
    }
    
    /**
     * このユーザが習慣達成している習慣。（ Userモデルとの関係を定義）
     */
    public function clears()
    {
        return $this->belongsToMany(Habit::class, 'user_clear', 'user_id', 'habit_id')->withTimestamps();
    }
    
        /**
     * $userIdで指定された習慣を達成する。
     *
     * @param  int  $userId
     * @return bool
     */
    public function clear($habitId)
    {
        // すでにお気に入りしているかの確認
        $exist = $this->is_clears($habitId);

        if ($exist) {
            // すでにお気に入りしていれば何もしない
            return false;
        } else {
            // 未お気に入りであればお気に入りする
            $this->clears()->attach($habitId);
            return true;
        }
    }

    /**
     * $userIdで指定された投稿を達成解除する。
     *
     * @param  int  $userId
     * @return bool
     */
    public function unclear($habitId)
    {
        // すでにお気に入りしているかの確認
        $exist = $this->is_clears($habitId);


        if ($exist) {
            // すでにお気に入りしていればお気に入りを外す
            $this->clears()->detach($habitId);
            return true;
        } else {
            // 未お気に入りであれば何もしない
            return false;
        }
    }
    
      /**
     * 指定された $userIdのユーザをこのユーザがお気に入り中であるか調べる。お気に入り中ならtrueを返す。
     *
     * @param  int  $userId
     * @return bool
     */
    public function is_clears($habitId)
    {
        // 習慣を達成したユーザの中に $habitIdのものが存在するか
        return $this->clears()->where('habit_id', $habitId)->exists();
    }


}
