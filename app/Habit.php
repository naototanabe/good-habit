<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    protected $fillable = ['content'];

    /**
     * この投稿を所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * この習慣を達成しているユーザ。（ Userモデルとの関係を定義）
     */
    public function clear_user()
    {
        return $this->belongsToMany(Habit::class, 'user_clear', 'habit_id', 'user_id')->withTimestamps();
    }

}
