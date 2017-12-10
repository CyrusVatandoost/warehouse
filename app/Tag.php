<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
   public $primaryKey = 'tag_id';

   public function tag(){
   		return $this->belongsTo(Project::class,'project_id');
   }


}
