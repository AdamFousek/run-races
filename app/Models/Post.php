<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasRichText;

    public const STATE_DRAFT = 'draft';
    public const STATE_PUBLISH = 'publish';
    public const STATES = [
        self::STATE_DRAFT => 'Draft',
        self::STATE_PUBLISH => 'Publish',
    ];

    protected $fillable = [
        'title',
        'slug',
        'perex',
        'content',
        'published_at',
        'state',
        'user_id',
    ];

    protected $richTextFields = [
        'content',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isPublished()
    {
        return $this->state === self::STATE_PUBLISH;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
