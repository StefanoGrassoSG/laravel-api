<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//models
use App\models\Technology;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'start_date',
        'end_date',
        'project_status',
        'languages',
        'project_link',
        'type_id'
    ];

     //RELATIONSHIPS

    public function type() {

        return $this->belongsTo(Type::class);
    }

    public function technologies() {

        return $this->belongsToMany(Technology::class);
    }
}
