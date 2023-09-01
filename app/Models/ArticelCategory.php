<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ArticelCategory extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['slug', 'name'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function scopeFilter($query, $params)
    {
        if (@$params['search']) {
            $query->where('name', 'like', '%'.$params['search'].'%');
        }


    }
}
