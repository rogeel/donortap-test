<?php

class AdminController extends BaseController {

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
		$this->beforeFilter('auth', array('only'=>array('getDashboard','getDonors')));
	}

	public function getDashboard(){
		$id = Auth::user()->id;
		$currentuser = User::find($id);
		$firstday = date('Y-m-01');
		$lastday = date('Y-m-t');
		$monthcontributions = Contribution::Contributionsbymonth($firstday,$lastday);
		$politicalpcontributions = Contribution::Contributionsbypoliticalp();
		$totalcontributions = Contribution::Totalbystate(2);
		$totalpledges = Contribution::Totalbystate(1);
		$this->layout->content = View::make('admin/dashboard', array('user' => $currentuser,
			'monthcontributions'=>$monthcontributions,
			'politicalpcontributions'=>$politicalpcontributions, 
			'totalcontributions'=>$totalcontributions,
			'totalpledges'=>$totalpledges));
	}

	public function getDonors(){
		$donors = Donor::paginate(10);
		$id = Auth::user()->id;
		$currentuser = User::find($id);
		$this->layout->content = View::make('admin/donors', array('user' => $currentuser,
			'donors'=>$donors));
	}

	public function getNewdonor() {
		$this->layout= null;
		$locations = Location::all()->lists('location','id');
		$politicalparties = Politicalparty::all()->lists('politicalparty','id');
		$professions = Profession::all()->lists('profession','id');
		return View::make('admin/newdonor', array('locations' => $locations,
			'politicalparties' => $politicalparties,
			'professions' => $professions));
	}

	public function postCreatedonor() {
		$validator = Validator::make(Input::all(), Donor::$rules);

		if ($validator->passes()) {
			$donor = new Donor;
			$donor->firstname = Input::get('firstname');
			$donor->lastname = Input::get('lastname');
			$donor->email = Input::get('email');
			$donor->phone= Input::get('phone');
			$donor->save();

			
			$donor->id;


			$profile = new Profile;

			$profile->location_id =  Input::get('location');
			$profile->profession_id =  Input::get('profession');
			$profile->politicalparty_id =  Input::get('politicalparty');

			$donor->profile()->save($profile);

			return Redirect::to('admin/newdonor')->with('message', 'New donor created');
		} else {
			return Redirect::to('admin/newdonor')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	}


	

}