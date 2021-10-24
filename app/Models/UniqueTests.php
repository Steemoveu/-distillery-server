<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniqueTests extends Model
{
    use HasFactory;

    protected $table = 'unique_tests';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'owner_id',
        'test_id',
        'hash',
        'is_completed'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [

    ];

    public function owner()
    {
        return $this->hasMany(\App\Models\User::class, 'owner_id', 'id');
    }

    public function test()
    {
        return $this->hasMany(\App\Models\Vacancy::class, 'test_id', 'id');
    }

    public function results()
    {
        return $this->hasMany(\App\Models\UniqueTestsResults::class, 'unique_test_id', 'id');
    }
}