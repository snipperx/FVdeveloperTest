<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $table = 'companies';

    protected $fillable = ['name', 'description', 'email', 'logo', 'website_url', 'asset_id', 'status'];

    public function assets()
    {
        return $this->hasMany(Assets::class, 'company_id');
    }
}
