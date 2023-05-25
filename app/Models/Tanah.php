<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tanah extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "tanahs";
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'inventory_card', 'project', 'thing', 'price', 'location', 'condition', 'date_buy', 'loan_date', 'user'
    ];
    protected $dates = [
        'date_buy', 'loan_date'
    ];

    public function projects()
    {
        return $this->belongsTo(Project::class, 'project', 'id');
    }
}
