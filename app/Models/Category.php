<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ["title", "slug"];
//pour changer recherche au id en slug
    public function getRouteKeyName()
    {
        return "slug";
    }
// relation entre category ou produit
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
