<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillCategory extends Model
{
    use HasFactory;

    public $table = 'bill_categories';

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}
