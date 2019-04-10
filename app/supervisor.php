<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supervisor extends Model
{
    protected $fillable = [
        'employee_id', 'project_id',
    ];

    public function employee()
    {
    	return $this->belongsTo(employee::class);
    }
}
