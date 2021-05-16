<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Settings extends BaseConfig
{
    public $title = "iVenden"; // this title your website
	public $description = "iVenden merupakan tempat konsultasi kebutuhan desain dan website anda yang tepat.";
	public $keywords = "ivenden,ivenden.id,ivenden.co,project,freelance,programmer,web,design,logo,kaos,baju,web design,web programmer,web developer,codeigniter,php native,skripsi,sekolah,perusahaan"; // this keyword your website
	public $author = "Denny Septian Panggabean";
	/* Meta Tag Config */
	public $google = "-aEi2vbBOMhSakw1f8_Kd2opa9bnJMNKCMOEsX4lROw";
	public $alexa = "X_XYKdWXrp0DhuyeL9ORhHijmCs";
	public $fbpagesid = "";
	public $fbid = "";
	// Twitter
	public $twsiteid = "";
	public $twtid = "";

	/*
	* Projectd Account Social Media
	*/
	public $facebook = 'https://www.facebook.com/h3xagon.id';
	public $twitter = 'https://www.twitter.com/';
	public $instagram = 'https://www.instagram.com/ivenden.id';
	public $linkedin = 'https://www.linkedin.com/in/denny-septian-panggabean-b921b4182/';
    public $email = 'ivenden.co@gmail.com';

    /*
    * Recaptha Google
    *
    * See link below for setup and get key
    * http://www.google.com/recaptcha/admin
    */
    public $recaptcha_site_key = '6Lflkd0ZAAAAAMudbWnNG316M1uLbzSDLsT-oXfN';
    public $recaptcha_secret_key = '6Lflkd0ZAAAAAIWWPH9YA__1r3lmQDNLPSJLremv';
    public $recaptcha_lang = 'id';
}