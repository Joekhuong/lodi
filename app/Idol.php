<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Idol extends Model
{
    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'idols';

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
    protected $fillable = ['name', 'img_url', 'dob', 'created_at', 'updated_at'];

    public function beforeCreate()
    {
        $this->created_at = date("Y-m-d H:i:s");
        $this->updated_at = date("Y-m-d H:i:s");
        $this->dob = $this->formatDob('Y-m-d');
    }

    public function beforeUpdate()
    {
        $this->updated_at = date("Y-m-d H:i:s");
        $this->dob = $this->formatDob('Y-m-d');
    }

    public function formatDob($format)
    {        
        return date($format, strtotime ($this->dob));
    }

    /**
     * Get the page record associated with the idol
     */
    public function page()
    {
        return $this->hasOne('App\Page', 'id', 'page_id');
    }

    public static function countTotalFollowers($idol_id)
    {
        return Follow::where(['idol_id' => $idol_id])->count();
    }

    public static function getRankingList($regions = null)
    {
        if($regions == null)
        {
            return Follow::select(\DB::raw('idol_id, count(*) as followers, idols.name as name'))
            ->leftJoin('idols', 'follower.idol_id', '=', 'idols.id')
            ->groupBy('idol_id')->orderBy('followers', 'desc')
            ->limit(10)->get()->toArray();
        }
    }
}
