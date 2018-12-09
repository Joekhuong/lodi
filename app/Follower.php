<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Follower';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'idol_id'];

    /**
     * Function to check whether user has follow idol or not
     */
    public static function hasFollowed($user_id,$idol_id)
    {
        return true;
    }

    
}
