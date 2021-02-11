<?php

class Setting_params extends CApplicationComponent {
    public function get_contact_email() {
        $contact_email = '';
        $settings = Settings::model()->findByAttributes(array('param_name'=>'Contact Email' ));
        if ($settings) {
            $contact_email = $settings->param_value;
        }
        return $contact_email;
    }
    public function get_contact_number() {
        $contact_number = '';
        $settings = Settings::model()->findByAttributes(array('param_name'=>'Contact Number' ));
        if ($settings) {
            $contact_number = $settings->param_value;
        }
        return $contact_number;
    }
    public function get_contact_address() {
        $contact_address = '';
        $settings = Settings::model()->findByAttributes(array('param_name'=>'Contact Address' ));
        if ($settings) {
            $contact_address = $settings->param_value;
        }
        return $contact_address;
    }
    public function get_fax_number() {
        $fax = '';
        $settings = Settings::model()->findByAttributes(array('param_name'=>'Fax Number' ));
        if ($settings) {
            $fax = $settings->param_value;
        }
        return $fax;
    }
    public function get_app_email() {
        $email = '';
        $settings = Settings::model()->findByAttributes(array('param_name'=>'Application Notified Email' ));
        if ($settings) {
            $email = $settings->param_value;
        }
        return $email;
    }
     public function get_facebook_link() {
        $facebook_link = '';
        $settings = Settings::model()->findByAttributes(array('param_name'=>'Facebook link' ));
        if ($settings) {
            $facebook_link = $settings->param_value;
        }
        return $facebook_link;
    }
     public function get_twitter_link() {
        $twitter_link = '';
        $settings = Settings::model()->findByAttributes(array('param_name'=>'Twitter link' ));
        if ($settings) {
            $twitter_link = $settings->param_value;
        }
        return $twitter_link;
    }
     public function get_vimeo_link() {
        $vimeo_link = '';
        $settings = Settings::model()->findByAttributes(array('param_name'=>'Vimeo link' ));
        if ($settings) {
            $vimeo_link = $settings->param_value;
        }
        return $vimeo_link;
    }
    public function get_pinterest_link() {
        $pinterest_link = '';
        $settings = Settings::model()->findByAttributes(array('param_name'=>'Pinterest link' ));
        if ($settings) {
            $pinterest_link = $settings->param_value;
        }
        return $pinterest_link;
    }
    public function get_linkedin_link() {
        $linkedin_link = '';
        $settings = Settings::model()->findByAttributes(array('param_name'=>'Linkedin Link' ));
        if ($settings) {
            $linkedin_link = $settings->param_value;
        }
        return $linkedin_link;
    }   
     public function get_youtubelink_link() {
        $youtubelink = '';
        $settings = Settings::model()->findByAttributes(array('param_name'=>'Youtube vidio link' ));
        if ($settings) {
            $youtubelink = $settings->param_value;
        }
        return $youtubelink;
    }   
}