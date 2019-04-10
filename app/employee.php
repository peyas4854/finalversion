<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
   protected $fillable = [
        'name', 'phone','email',
    ];

    
    public function Department()
    {
    	return $this->belongsTo(Department::class);
    }

    public function supervisor()
    {
    	return $this->hasMany(supervisor::class);
    }



}
