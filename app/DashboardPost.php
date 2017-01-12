<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DashboardPost extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dashboard_posts';

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
    protected $fillable = ['dashboard_id', 'user_id', 'title', 'description', 'file_url'];

    
}
