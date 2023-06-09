<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventories';
    protected $primaryKey = 'iv_id';
    protected $fillable = ['iv_sold', 'iv_upd', 'sld_id', 'prd_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
    use HasFactory;
}
