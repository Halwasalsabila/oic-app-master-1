<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kendaraan extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "kendaraans";
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'inventory_card', 'project', 'price', 'residu_value', 'economic_value', 'depreciation_value', 'location', 'condition', 'loan_date', 'buy_date', 'description', 'user'
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
