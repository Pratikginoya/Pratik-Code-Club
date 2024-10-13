<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Technology;

class CodeDetails extends Model
{
    use HasFactory;
    protected $table = 'cp_code_details';
    protected $primeryKey = 'id';
    protected $guarded = [];

    public function technology()
    {
        return $this->belongsTo(Technology::class, 'tech_id', 'id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
