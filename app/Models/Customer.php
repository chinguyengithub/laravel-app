<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'cus_id';
    protected $fillable = ['cus_name', 'cus_phone', 'cus_addr','created_at'];

    public function sale()
    {
        return $this->hasMany(Sale::class);
    }
    use HasFactory;
}
