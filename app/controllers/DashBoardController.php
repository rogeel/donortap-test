<?php

class DashBoardController extends BaseController {

	protected $layout = "layouts.maindashboard";

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth', array('only'=>array('getLeads','getDonor', 'getDonormatch', 'getDonor', 'getContributionsbydonor')));
	}


	public function getLeads()
	{
		$id = Auth::user()->id;
		$currentuser = User::find($id);
		$donors = Donor::leads($id);
		foreach ($donors as $key => $donor) {
			$donor->average = Contribution::Lastcontributions($donor->donor_id)->avg('amount');
        	$last =  Contribution::Lastcontributions($donor->donor_id)->first(); 
        	$lastAmount = $last ? $last->amount : 0;
        	$donor->ask = round(($donor->average + $lastAmount)/2);
        	$donor->id = $donor->donor_id;
		}
		$this->layout->content = View::make('dashboard/content', array('user' => $currentuser, 'donors'=>$donors));
	}


	public function getPledges()
	{
		//$this->layout = false;
		$id = Auth::user()->id;
		$currentuser = User::find($id);
		$candidateId = $currentuser->candidate->id;
		$donors = Donor::pledges($candidateId);
        foreach ($donors as $key => $donor) {
        	$donor->ask = $donor->amount;
        	$donor->id = $donor->donor_id;
		}   
		$this->layout->content = View::make('dashboard/content', array('user' => $currentuser, 'donors'=>$donors));
	}

	public function getDonormatch()
	{
		$id = Auth::user()->id;
		$currentuser = User::find($id);
		$profile = $currentuser->profile;
		$donors = Donor::donormatch($id, $profile->location_id, $profile->profession_id, $profile->politicalparty_id);
		foreach ($donors as $key => $donor) {
        	$donor->average = Contribution::Lastcontributions($donor->donor_id)->avg('amount');
        	$last =  Contribution::Lastcontributions($donor->donor_id)->first(); 
        	$lastAmount = $last ? $last->amount : 0;
        	$donor->ask = round(($donor->average + $lastAmount)/2);
        	$donor->id = $donor->donor_id;
		} 
		$this->layout->content = View::make('dashboard/content', array('user' => $currentuser, 'donors'=>$donors));
	}

	public function getContributionsbydonor($id)
	{
		$this->layout = null;
		$contributions = Contribution::Contributionsbydonor($id);
		$donor = Donor::find($id);
		//print_r($contributions);
		return View::make('dashboard/contributionsbydonor', array('donor'=>$donor, 'contributions'=>$contributions));
	}

	public function getDonor($id)
	{
		
		    //
		    $donor = Donor::find($id);
        	$donor->average = round($donor->contributions()->avg('amount'));
        	$donor->max = $donor->contributions()->max('amount');
        	$last = $donor->contributions()->orderBy('date', 'DESC')->first(); 
        	$lastAmount = $last ? $last->amount : 0;
        	$donor->ask = round(($donor->average + $lastAmount)/2);
        	$contributions = Contribution::Lastcontributions($id)->take(3)->get();
        	$donor->profile->location->location;
        	$donor->profile->profession->profession;
        	$donor->profile->politicalparty->politicalparty;
		    return Response::json(array('donor'=>$donor, 'contributions'=>$contributions));
		
	}

}