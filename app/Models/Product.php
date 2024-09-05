<?php

namespace App\Models;

use App\Models\User;
use App\Models\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'collection_id', 'title', 'url', 'brand', 'price', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }
}
