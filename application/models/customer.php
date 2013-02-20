<?php

    class Customer extends Eloquent
    {
        public static $timestamps = true;
        public static $validation = '';

        private static $rules = array();

        public static function validate($data)
        {
            // Set the rules for the booking request form
            static::setRules();

            $validation = Validator::make($data, static::$rules);

            if ($validation->fails()) {

                // Remember the data that came with the form
                Input::flash();

                // Set the errors
                self::$validation = $validation->errors;

                // And tell somebody this went horribly wrong
                return false;
            }

            // Whoohoo!
            return true;
        }

        protected static function setRules()
        {
            static::$rules['first_name'] = 'required';
            static::$rules['last_name']  = 'required';
            static::$rules['email']      = 'required|email'; //TODO: check unique email?
        }

        public function bookings()
        {
             return $this->has_many('Booking');
        }


    }
