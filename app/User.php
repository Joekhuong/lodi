<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin','created_at', 'updated_at', 'region_id'
    ];

    private $followed_idols = null;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function beforeCreate()
    {
        $this->created_at = date("Y-m-d H:i:s");
        $this->updated_at = date("Y-m-d H:i:s");
    }

    public function beforeUpdate()
    {
        $this->updated_at = date("Y-m-d H:i:s");
    }

    public function getFollowedIdols()
    {
        return Follow::where(['user_id' => $this->id])
                ->join('idols', 'follower.idol_id', '=', 'idols.id')
                ->join('pages', 'idols.page_id', '=', 'pages.id')
                ->get()->toArray();
    }

    public function hasFollow($idol_id)
    {
        return Follow::where(['user_id' => $this->id, 'idol_id' => $idol_id])->first() == null ? false : true;
    }
}
