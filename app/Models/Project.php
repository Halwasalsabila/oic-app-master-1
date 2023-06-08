<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "projects";
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'slug'
    ];


    public function proyeks()
    {
        return $this->hasMany(Proyek::class, 'project', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($project) {
            $relationMethods = ['proyeks'];

            foreach ($relationMethods as $relationMethod) {
                if ($project->$relationMethod()->count() > 0) {
                    return false;
                }
            }
        });
    }
}
