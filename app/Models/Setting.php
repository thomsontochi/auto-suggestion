<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'display_suggestion_term',
        'display_collection',
        'display_product',
        'max_results',
        'min_characters',
        'search_delay',
        'enable_fuzzy_search',
    ];

    protected $casts = [
        'display_suggestion_term' => 'boolean',
        'display_collection' => 'boolean',
        'display_product' => 'boolean',
        'max_results' => 'integer',
        'min_characters' => 'integer',
        'search_delay' => 'integer',
        'enable_fuzzy_search' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
