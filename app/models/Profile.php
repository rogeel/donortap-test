<?php 
class Profile extends Eloquent  {
 
    protected $table = 'user-profile';
    protected $fillable = array('profesion_id', 'location_id', 'politicalparty_id');
 
    

    public function Politicalparty() {
        return $this->belongsTo('Politicalparty');
    }

    public function Location() {
        return $this->belongsTo('Location');
    }

    public function Profession() {
        return $this->belongsTo('Profession');
    }

     public function userable()
    {
        return $this->morphTo();
    }

    
}