<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tests extends Model
{
    use HasFactory;

    protected $table = 'tests';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'text',
        'vacancy_id'
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

    public function questions()
    {
        return $this->hasMany(\App\Models\Questions::class, 'test_id', 'id');
    }
    public function unique_tests()
    {
        return $this->hasMany(\App\Models\UniqueTests::class, 'test_id', 'id');
    }
}