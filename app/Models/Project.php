<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function module()
    {
        return $this->hasMany(Module::class);
    }

    public function testScenario()
    {
        return $this->hasMany(TestScenario::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function errorLists()
    {
        return $this->hasMany(ErrorList::class);
    }
}
