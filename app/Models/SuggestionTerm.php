<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuggestionTerm extends Model
{
    use HasFactory;

    protected $fillable = ['term', 'url'];

    public function collections()
    {
        return $this->belongsToMany(Collection::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
