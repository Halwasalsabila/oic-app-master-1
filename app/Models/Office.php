<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Office extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "offices";
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'inventory_card', 'project', 'price', 'amount', 'unit', 'total', 'location', 'condition', 'loan_date', 'buy_date', 'description', 'user'
    ];
    protected $dates = [
        'loan_date',
        'buy_date'
    ];

    public function projects()
    {
        return $this->belongsTo(Project::class, 'project', 'id');
    }
}
