<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserPivot extends Pivot
{
    use HasFactory;

    public const CREATED_AT = null;

    public const UPDATED_AT = null;

    /** @var list<string> $fillable */
    protected $fillable = [
        'user_id',
        'item_id',
        'uiud',
        'started_at',
        'finished_at',
        'order',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where($query->qualifyColumn('status'), '=', true);
    }

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'started_at' => 'datetime',
            'finished_at' => 'datetime',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(
            'active',
            static fn (Builder $builder): Builder => $builder->active()
        );
    }
}
