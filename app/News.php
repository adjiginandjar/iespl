<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'sone_esports_news';

    public function partner()
    {
        return $this->belongsTo('App\NewsPartner');
    }
}
