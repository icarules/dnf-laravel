<?php

    class Booking extends Eloquent
    {
        public static $timestamps = true;
        public static $validation = '';

        private static $rules = array();

        public static function validateRequest($data)
        {
            // Set the rules for the booking request form
            static::setRequestRules();

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

        public static function validateConfirmation()
        {
            static::setConfirmationRules();
        }

        private static function setRequestRules(){

            static::$rules['remark'] = 'required';
        }
    }
