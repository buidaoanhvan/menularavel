<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $fillable = ['name', 'parent_id', 'slug'];
    use HasFactory;

    public function subMenu()
    {
        return $this->hasMany(menu::class, 'parent_id', 'id');
    }
}
