<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dashboards';

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
    protected $fillable = ['class_id', 'session_id'];

    public function posts()
	{
		return $this->hasMany('App\DashboardPost');
	}

	public function classes()
    {
        return $this->belongsTo(AcademicClass::class, 'class_id');
    }

	public function sessions()
    {
        return $this->belongsTo(AcademicSession::class, 'session_id');
    }

}
