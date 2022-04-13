<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class errorList extends Model
{
    use HasFactory;

    protected $guraded = ['id'];
    protected $fillable = ['user_id', 'note', 'image','scenario','status'];

    public function testScenarios()
    {
        return $this->belongsToMany(TestScenario::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
