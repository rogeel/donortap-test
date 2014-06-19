<?php 
class Candidate extends Eloquent  {
 
    protected $table = 'candidates';
    protected $fillable = array('firstname', 'lastname', 'email', 'phone');
 
   public function profile() {

		return $this->morphOne('Profile', 'userable');
	
    }

    

     


}