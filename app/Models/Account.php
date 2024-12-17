<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    // Menjaga properti tertentu agar tidak dapat diisi langsung
    protected $guarded = ['id'];

    /**
     * Relasi: Account -> Platform
     * Satu account memiliki satu platform.
     */
    public function platform()
    {
        return $this->belongsTo(Platform::class, 'platform_id'); // platform_id adalah kolom foreign key
    }
}
