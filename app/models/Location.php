<?php 
class Location extends Eloquent  {
 
    protected $table = 'locations';
    protected $fillable = array('id', 'location');
 
   public function Profile() {
        return $this->hasMany('Profile', 'location_id');
    }
}