<?php

namespace App;

use Cmgmyr\Messenger\Traits\Messagable;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;
    use Messagable;

    public $primaryKey = 'user_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'middle_initial', 'last_name', 'gender', 'email', 'password'];

    /**
     * The attributes that should be visible for arrays.
     *
     * @var array
     */
    protected $visible = ['user_id','first_name', 'last_name', 'email'];

    public function projects() {
        return $this->hasMany('App\Project', 'project_id');
    }
    
}