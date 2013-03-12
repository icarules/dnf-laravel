<?php 

class MyAuth_User_Controller extends Base_Controller{

    public $restful = true;

    public $layout = 'layout.default';

    public function __construct()
    {
        parent::__construct();

        // Get the original dnf style menu include file
        $this->layout->menu =  file_get_contents(URL::base() . '/../menu.html');
    }

    public static $rules = array(
        'username' => 'required|unique:users',
        'email'    => 'required|email|unique:users',
        'password' => 'required|confirmed'
    );


    public function get_signup()
    {
        $view = View::make('myauth::signup');

        $this->layout->content = $view;

   	}

    public function post_signup()
    {
        $validation = Validator::make(Input::all(), static::$rules);

        if ($validation->fails()) {
            return Redirect::to('signup')->with_errors($validation->errors);
        }

        $user_data = array(
            'username' => Input::get('username'),
            'email'    => Input::get('email'),
            'password' => Hash::make(Input::get('password'))
        );

        $user = new User($user_data);
        $user->save();

        $redirect_url = Config::get('myauth::config.bundle_route') . '/' . Config::get('myauth::config.login_route');

        return Redirect::to($redirect_url)->with(
            'notification',
            'Your Account has been Successfully Created! Please Login Below.'
        );

    }


    public function get_login()
    {
        $view = View::make('myauth::login');

        $this->layout->content = $view;

   	}

    public function get_logout()
    {
	    // Logout of booking
	    Auth::logout();

	    // Try to logout of bestellen
	    $this->logoutOfBestellen();

	    // Bye bye
	   	return Redirect::to(Config::get('myauth::config.bundle_route') . '/' . Config::get('myauth::config.login_route'));
   	}

	public function post_login()
    {

        // get login POST data
        $userData = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );

        if ( Auth::attempt($userData) ){
	        // we are now logged in, go to dashboard

            // For a bit of convenience sake, try to log this user into the Bestellen Admin
            $this->loginToBestellen($userData);


	        if(Config::get('myauth::config.login_redirect') != ''){
	    		$redirect_url = Config::get('myauth::config.login_redirect');
	    	} else {
	    		$redirect_url = Config::get('myauth::config.bundle_route') . '/dashboard';
	    	}

	        return Redirect::to($redirect_url);
	    } else {
	        // auth failure! redirect to login with errors
	        $redirect_url = Config::get('myauth::config.bundle_route') . '/' . Config::get('myauth::config.login_route');
	        return Redirect::to($redirect_url)->with('notification', 'Incorrect login or password');
	    }

	}


	/**
	 * Try to login to the Bestellen Admin and set some session vars so we don't have to login separately
	 *
	 * @author Richard Arets
	 *
	 * @param array $userData Array(username, password)
	 *
	 * @return void
	 */
	private function loginToBestellen($userData)
    {
	    session_start();

	    // Build some beautiful sql statement
        $sql = 'SELECT *
				FROM admin
				WHERE inlognaam = "'.mysql_real_escape_string($userData['username']).'"
				  AND wachtwoord = "'.mysql_real_escape_string(md5($userData['password'])).'"';

	    $user = DB::query($sql);

	    // Only login if we find exactly 1 user
       	if (count($user) === 1) {
       		//inloggen succes
       		$_SESSION['adminingelogd'] = true;
       		$_SESSION['adminingelogdals'] = $user[0]->voornaam . ' ' . $user[0]->achternaam;
       		$_SESSION['adminuserid'] = $user[0]->id;
       		$_SESSION['adminloginsucces'] = true;
       	} else {
       		//inloggen mislukt
       		$_SESSION['adminingelogd'] = false;
       		$_SESSION['adminingelogdals'] = '';
       		$_SESSION['adminuserid'] = '';
       		$_SESSION['adminaccounttype'] = '';
       		$_SESSION['adminloginsucces'] = false;
       	}
    }

	/**
	 * Logout out of the bestellen admin
	 *
	 * @author Richard Arets
	 *
	 * @return void
	 */
	private function logoutOfBestellen()
	{
		session_start();

		unset($_SESSION['adminingelogd']);
		unset($_SESSION['adminingelogdals']);
		unset($_SESSION['adminuserid']);
		unset($_SESSION['adminloginsucces']);
	}
}