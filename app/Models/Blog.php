<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public static function slugify($text)
    {
        // Replace non-letter or digits with hyphen
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // Transliterate characters to ASCII
        $text = iconv('utf-8', 'us-ascii//TRANSLIT//IGNORE', $text);

        // Remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // Trim hyphens from the start and end
        $text = trim($text, '-');

        // Convert to lowercase
        return strtolower($text);
    }
}
