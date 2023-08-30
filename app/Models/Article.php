<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'title', 'slug', 'content', 'articel_category_id', 'user_id'];

    public function articel_category(): BelongsTo
    {
        return $this->belongsTo(ArticelCategory::class);

    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include Filter
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query, $params)
    {
        if (@$params['search']) {
            $query->where('title', 'like', '%'.$params['search'].'%');
        }

        if (@$params['articel_categories']) {
            $query->whereRelation('article_categories', 'slug', $params['articel_categories']);
        }
    }
}
