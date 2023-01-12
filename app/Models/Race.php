<?php

namespace App\Models;

use App\Models\Traits\UsingSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

class Race extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasRichText;
    use UsingSlug;

    protected $fillable = [
        'name',
        'slug',
        'race_date',
        'description',
        'user_id',
    ];

    protected $casts = [
        'race_date' => 'datetime',
    ];


    protected array $richTextFields = [
        'description',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
