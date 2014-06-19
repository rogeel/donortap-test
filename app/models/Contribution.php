<?php 
class Contribution extends Eloquent  {
 
    protected $table = 'contributions';
    protected $fillable = array('amount', 'donor_id', 'candidate_id', 'state', 'date');
 
   public function Donor() {
        return $this->belongsTo('Donor');
    }

    public function Candidate() {
        return $this->belongsTo('Candidate');
    }

    public static function Lastcontributions($donorId){

    	return Contribution::with('candidate')->where('donor_id',$donorId)->where('state',2)->orderBy('date', 'DESC');
    }

    public static function Contributionsbymonth($firstday,$lastday){

        return Contribution::where('date','>=',$firstday)->where('date','<=',$lastday)->orderBy('date', 'DESC')->get();
    }

    public static function Contributionsbypoliticalp(){

       $contributions = DB::table('contributions')
            ->select(DB::raw('count(contributions.id) as total, politicalparty'))
            ->join('donors', 'donors.id', '=', 'contributions.donor_id')
            ->join('user-profile', 'user-profile.userable_id', '=', 'contributions.donor_id')
            ->join('politicalpartys', 'politicalpartys.id', '=', 'user-profile.politicalparty_id')
            ->where('contributions.state',2)
            ->where('userable_type','Donor')
            ->groupBy('user-profile.politicalparty_id')
            ->get();

            return $contributions;
    }

    public static function Totalbystate($state){

       $contributions = Contribution::where('state',$state)->sum('amount');

            return $contributions;
    }

    public static function Contributionsbydonor($donorId){

    	 $contributionsbydonor = DB::table('contributions')
            ->join('candidates', 'candidates.id', '=', 'contributions.candidate_id')
            ->join('user-profile', 'user-profile.userable_id', '=', 'contributions.candidate_id')
            ->join('locations', 'locations.id', '=', 'user-profile.location_id')
            ->join('politicalpartys', 'politicalpartys.id', '=', 'user-profile.politicalparty_id')
            ->join('professions', 'professions.id', '=', 'user-profile.profession_id')
            ->where('contributions.donor_id',$donorId)
            ->where('contributions.state',2)
            ->where('userable_type','Candidate')
            ->groupBy('contributions.id')
            ->orderBy('contributions.date', 'DESC')
            ->paginate(5);

            return $contributionsbydonor;
    }
}