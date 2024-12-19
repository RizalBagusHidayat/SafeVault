<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    // Menjaga properti tertentu agar tidak dapat diisi langsung
    protected $guarded = ['id'];

    /**
     * Relasi: Platform -> Account
     * Satu platform memiliki banyak account.
     */
    public function accounts()
    {
        return $this->hasMany(Account::class, 'platform_id', 'id'); // platform_id foreign key, id primary key
    }

    public function scopeWithAccounts($query, $userId)
    {
        return $query->whereHas('accounts', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        });
        
    }
}
