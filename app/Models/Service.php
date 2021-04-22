<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    use HasFactory;
    protected $guarded = [];
    public function serviceImage()
    {
        // folder inside the public path for default image
        $imagePath = ($this->image) ? $this->image : 'no-image.png';
        return 'storage/service/' . $imagePath;
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
    public function favorited()
    {
        return $this->belongsToMany(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class)->orderBy('created_at', 'DESC');
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
