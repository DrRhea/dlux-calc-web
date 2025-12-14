<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    public function vehicleModels(): HasMany
    {
        return $this->hasMany(VehicleModel::class);
    }
}
