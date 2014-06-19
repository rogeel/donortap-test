<?php 
class Profession extends Eloquent  {
 
    protected $table = 'professions';
    protected $fillable = array('id', 'profession');
 
   public function Profile() {
        return $this->hasMany('Profile', 'profession_id');
    }
}