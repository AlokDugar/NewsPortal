<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Advertisement extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'type_id',
        'details',
        'status',
        'url'
    ];
    public function advertisementType():BelongsTo
    {
        return $this->belongsTo(AdvertisementType::class, 'type_id');
    }
}
