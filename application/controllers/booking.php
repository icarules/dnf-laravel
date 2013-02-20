<?php

class Booking_Controller extends Base_Controller {

	/*
	|--------------------------------------------------------------------------
	| The Booking Controller
	|--------------------------------------------------------------------------
	|
	| Instead of using RESTful routes and anonymous functions, you might wish
	| to use controllers to organize your application API. You'll love them.
	|
	| This controller responds to URIs beginning with "home", and it also
	| serves as the default controller for the application, meaning it
	| handles requests to the root of the application.
	|
	| You can respond to GET requests to "/home/profile" like so:
	|
	|		public function action_profile()
	|		{
	|			return "This is your profile!";
	|		}
	|
	| Any extra segments are passed to the method as parameters:
	|
	|		public function action_profile($id)
	|		{
	|			return "This is the profile for user {$id}.";
	|		}
	|
	*/

    public $restful = true;

    public $layout = 'layout.default';

    public function __construct()
    {
        parent::__construct();

        // Get the original dnf style menu include file
        $this->layout->menu =  file_get_contents(URL::base() . '/../menu.html');
    }

    public function get_request()
    {
        $view = View::make('booking.form');

        $this->layout->content = $view;
    }

    public function post_request()
    {
        $errors = null;

        // Validate the user part of the form
        if (!Customer::validate(Input::all())) {
            $errors = Customer::$validation;
        }

        // Validate the booking request part of the form
        if (!Booking::validateRequest(Input::all())) {

            if (is_null($errors)) {
                $errors = Booking::$validation;
            } else {
                $errors->messages += Booking::$validation->messages;
            }
        }

        if (!is_null($errors)) {

            // Houston....
            return Redirect::to('/')->with('errors', $errors);
        }
        else {

            // The eagle has landed
            $this->saveRequest();
        }

        $this->layout->content = 'Thanx!';
    }

    private function saveRequest()
    {
        $customer = new Customer;

        $honorific = Input::get('honorific');
        $customer->honorific = $honorific[0];
        $customer->first_name = Input::get('first_name');
        $customer->last_name = Input::get('last_name');
        $customer->email = Input::get('email');
        $customer->phone = Input::get('phone');
        $customer->address = Input::get('address');
        $customer->house_number = Input::get('house_number');
        $customer->city = Input::get('city');
        $customer->country = Input::get('country');

        $customer->save();

        $booking = new Booking;

        $booking->customer_remarks = Input::get('remark');

        $customer->bookings()->save($booking);
    }

}