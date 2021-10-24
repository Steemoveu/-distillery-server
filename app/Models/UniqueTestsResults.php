<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniqueTestsResults extends Model
{
    use HasFactory;

    protected $table = 'unique_tests_results';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'unique_test_id',
        'score',
        'data',
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
        'data' => 'array'
    ];

    public function test()
    {
        return $this->hasMany(\App\Models\Tests::class, 'unique_test_id', 'id');
    }
}