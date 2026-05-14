<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class NewsItem extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'image',
        'published_at',
        'is_published',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'is_published' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query
            ->where('is_published', true)
            ->where(function (Builder $q): void {
                $q->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            });
    }

    protected static function booted(): void
    {
        static::saving(function (NewsItem $item): void {
            if (blank($item->slug) && filled($item->title)) {
                $item->slug = Str::slug($item->title);
            }
            $item->slug = Str::slug((string) $item->slug);
            if ($item->slug === '') {
                $item->slug = 'news-'.Str::random(8);
            }
            $base = $item->slug;
            $n = 1;
            while (static::query()
                ->where('slug', $item->slug)
                ->when($item->getKey() !== null, fn (Builder $q) => $q->where('id', '!=', $item->getKey()))
                ->exists()) {
                $item->slug = $base.'-'.$n++;
            }
        });
    }

    public function isVisible(): bool
    {
        if (! $this->is_published) {
            return false;
        }

        return $this->published_at === null || $this->published_at->isPast();
    }
}
