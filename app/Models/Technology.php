<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//models
use App\models\Project;

class Technology extends Model
{   
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    //RELATIONSHIPS

    public function projects() {

        return $this->belongsToMany(Project::class);
    }
}
