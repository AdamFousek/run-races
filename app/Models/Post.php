<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasRichText;

    protected $fillable = [
        'title',
        'slug',
        'perex',
        'content',
        'published_at',
        'tag_id',
        'user_id',
    ];

    protected array $richTextFields = [
        'content',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('published_at', '<', new Carbon());
    }

    public function scopeNewest(Builder $query): Builder
    {
        return $query->orderBy('published_at', 'desc');
    }

    public function isPublished()
    {
        return $this->published_at < new Carbon();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function generateSlug(string $value): string
    {
        $i = 0;
        $original = Str::slug($value);
        $slug = $original;
        while(self::query()->where('slug', $slug)->exists()) {
            $i++;
            $slug = $original . ' '.$i;
            $slug = Str::slug($slug);
        }

        return $slug;
    }
}
