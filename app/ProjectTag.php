<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTag extends Model
{
    //
    public function tag() {
    	# code...
    	return $this->hasOne(Tag::class,'tag_id','tag_id');
    }

}
