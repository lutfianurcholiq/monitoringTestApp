<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function testScenarios()
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
