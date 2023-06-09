<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale_detail extends Model
{
    protected $table = 'sale_details';
    protected $primaryKey = 'sld_id';
    protected $fillable = ['sdt_quantity', 'sdt_prdprice', 'sdt_totalprice', 'sdt_lotnumber', 'sdt_expiry', 'sl_id', 'prd_id'];

    public function customer()
    {
        return $this->hasMany(Customer::class);
    }
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    use HasFactory;
}
