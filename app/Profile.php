<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileimage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/ZYiDQVWHmd3KXcBQlubQ0cxy3lgwiBUsnUSmRm9o.png';
        return '/storage/' . $imagePath;
    }

    public function following()
    {
        return $this->belongsToMany(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
