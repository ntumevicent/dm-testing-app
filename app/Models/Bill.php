<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    public $table = 'bills';

    public function bill_category()
    {
        return $this->belongsTo(BillCategory::class);
    }
}
