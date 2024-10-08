<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'email_verified_at', 'password', 'remember_token'
    ];

    public function invoices ()
    {
        return $this->hasMany(Invoice::class);
    }

    public function reviews ()
    {
        return $this->hasMany(Review::class);
    }

    public function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => \Carbon\Carbon::parse($value)->translatedFormat('l, d F Y'),
        );
    }
}
