<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsPartner extends Model
{
    protected $table = 'sone_esports_news_partner';

    public function news()
    {
        return $this->hasMany('App\News','partner_id');
    }
}
