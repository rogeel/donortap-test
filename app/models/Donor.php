<?php 
class Donor extends Eloquent  {
 
    protected $table = 'donors';
    protected $fillable = array('firstname', 'lastname', 'email', 'phone');

    public static $rules = array(
        'firstname'=>'required|alpha|min:2',
        'lastname'=>'required|alpha|min:2',
        'email'=>'required|email|unique:users'
        
    );
 
   public function profile() {

		return $this->morphOne('Profile', 'userable');
	
    }

    public function contributions(){
        // creamos una relación con el modelo de Producto
        return $this->hasMany('Contribution', 'donor_id')->where('state',2)->orderBy('date', 'DESC')->take(3);
    }

    public static function leads($id){
        // creamos una relación con el modelo de Producto
        $pledges = DB::table('donors')
            ->join('user-profile', 'donors.id', '=', 'user-profile.userable_id')
            ->join('donor_user', 'donors.id', '=', 'donor_user.donor_id')
            ->join('locations', 'locations.id', '=', 'user-profile.location_id')
            ->join('politicalpartys', 'politicalpartys.id', '=', 'user-profile.politicalparty_id')
            ->where('userable_type','Donor')
            ->where('donor_user.user_id',$id)
            ->groupBy('donors.id')
            ->paginate(10);

            return $pledges;
    }

    public static function pledges($id){
        // creamos una relación con el modelo de Producto
        $pledges = DB::table('donors')
            ->join('contributions', 'donors.id', '=', 'contributions.donor_id')
            ->join('user-profile', 'donors.id', '=', 'user-profile.userable_id')
            ->join('locations', 'locations.id', '=', 'user-profile.location_id')
            ->join('politicalpartys', 'politicalpartys.id', '=', 'user-profile.politicalparty_id')
            ->where('contributions.state',1)
            ->where('contributions.candidate_id',$id)
            ->where('userable_type','Donor')
            ->groupBy('contributions.id')
            ->paginate(10);

            return $pledges;
    }

    public static function donormatch($id, $location, $profession, $politicalparty){
        // creamos una relación con el modelo de Producto
        $donormatch = DB::table('donors')
            ->join('contributions', 'donors.id', '=', 'contributions.donor_id')
            ->join('user-profile', 'donors.id', '=', 'user-profile.userable_id')
            ->join('locations', 'locations.id', '=', 'user-profile.location_id')
            ->join('politicalpartys', 'politicalpartys.id', '=', 'user-profile.politicalparty_id')
            ->where('user-profile.location_id',$location)
            ->where('user-profile.profession_id',$profession)
            ->where('user-profile.politicalparty_id',$politicalparty)
            ->where('userable_type','Donor')
            ->where('contributions.state',2)
            ->where('donors.user_id','!=',3)
            ->groupBy('donors.id')
            ->paginate(3);

            return $donormatch;
    }

    


}