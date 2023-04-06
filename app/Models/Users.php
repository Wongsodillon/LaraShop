<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $primaryKey = 'UserID';

    protected $fillable = [
        'UserName',
        'UserEmail',
        'UserPassword',
        'UserBalance'
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
