<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    protected $fillable = [
        'name',
        'parent'
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function parent()
    {
        return $this->belongsTo(Role::class, 'parent', 'id');
    }
    
    public function children()
    {
        return $this->hasMany(Role::class, 'parent', 'id');
    }
}
