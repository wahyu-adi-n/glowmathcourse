<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tentor extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kode_tentor','mapel', 'alamat','nohp', 'photo'
    ];

    protected $with = ['users'];

    public function users()
    {
        return $this->hasOne(User::class, 'kode');
    }
}
