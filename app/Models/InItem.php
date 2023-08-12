<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OutItem;

class InItem extends Model
{
    public function customer() {
        return $this->belongsTo(Customer::class);
    }
    public function outItems() {
        return $this->hasMany(OutItem::class);
    }
}