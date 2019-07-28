<?php

namespace MIDASHI;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = array('post_id');

    public function category() {
        return $this->belongsTo('MIDASHI\Category');
    }

}
