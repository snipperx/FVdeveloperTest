<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assets extends Model
{
    protected $table = 'assets';

    protected $fillable = ['name','description','model','amount','image','status','company_id'];

    public function company() {
        return $this->belongsTo(Companies::class, 'company_id');
    }
}
