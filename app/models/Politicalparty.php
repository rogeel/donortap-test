<?php 
class Politicalparty extends Eloquent  {
 
    protected $table = 'politicalpartys';
    protected $fillable = array('id', 'politicalparty');
 
   public function Profile() {
        return $this->hasMany('Profile', 'politicalparty_id');
    }

    
}