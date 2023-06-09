<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    protected $table = 'inputs';
    protected $primaryKey = 'ip_id';
    protected $fillable = ['ip_bill', 'ip_vat', 'ip_dateinput', 'ip_datacreate', 'sp_id'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function input_detail()
    {
        return $this->hasMany(Input_detail::class);
    }
    use HasFactory;
}
