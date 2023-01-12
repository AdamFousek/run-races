<?php

declare(strict_types=1);


namespace App\Models\Traits;

use Illuminate\Support\Str;

trait UsingSlug
{
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
