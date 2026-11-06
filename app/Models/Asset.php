<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
       protected $fillable = [
        'name',
        'asset_tag',
        'serial_number',
        'category',
    ];
    public function assignments()
    {
        return $this->hasMany(AssetAssignment::class);
    }

    public function currentAssignment()
    {
        return $this->hasOne(AssetAssignment::class)
            ->whereNull('unassigned_at');
    }
}
