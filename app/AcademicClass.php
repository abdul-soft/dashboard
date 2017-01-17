<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicClass extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'classes';

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
    protected $fillable = ['name', 'session_id'];

    public function sessions()
    {
        return $this->belongsTo(AcademicSession::class, 'session_id');
    }
    
}
