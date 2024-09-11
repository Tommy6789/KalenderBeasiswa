<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kbeasiswa',
    ];

    /**
     * Get the kalenderBeasiswa associated with the wishlist item.
     */
    public function kalenderBeasiswa()
    {
        return $this->belongsTo(kalenderBeasiswa::class, 'id_kbeasiswa');
    }
}
