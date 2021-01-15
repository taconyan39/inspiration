<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomResetPassword;

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


    //　日本語化のために追加
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPassword($token));
    }

    public function ideas(){
        return $this->hasMany('App\Idea');
    }

    public function reviews(){
        return $this->hasManyThrough('App\Review', 'App\Idea');
    }

    public function interestIdeas(){
        return $this->belongsToMany('App\Idea', 'interests', 'user_id', 'idea_id')->withTimestamps();
    }

    public function buyIdeas(){
        return $this->belongsToMany('App\Idea', 'buy_ideas', 'user_id', 'idea_id')->withTimestamps();
    }
    /**
* $idea_idで指定されたideaをお気に入り登録する。
*
* @param int $userId
* @return bool
*/
    public function interest($userId){
        // すでにお気に入りしているかの確認
        // $exist = $this->is_interest($ideaId);
        // 相手が自分自身かどうかの確認
        // $its_me = $this_id == $ideaId;

        // return $userId;
        }
}
