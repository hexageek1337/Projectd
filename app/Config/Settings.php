<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Settings extends BaseConfig
{
    public $title = "MyProject"; // this title your website
	public $description = "Projectd is landing page portofolio from Denny Septian Panggabean with Codeigniter 4 and Bootstrap 4";
	public $keywords = "projectd,project,myproject,freelance,programmer,web,web design,web programmer,web developer,codeigniter,php native,skripsi,sekolah,perusahaan"; // this keyword your website
	public $author = "Denny Septian Panggabean";
	/* Meta Tag Config */
	public $google = "-aEi2vbBOMhSakw1f8_Kd2opa9bnJMNKCMOEsX4lROw";
	public $alexa = "X_XYKdWXrp0DhuyeL9ORhHijmCs";
	public $fbpagesid = "1867255716844226";
	public $fbid = "100006853846227";
	// Twitter
	public $twsiteid = "3167728602";
	public $twtid = "@mrdixec";

	/*
	* Projectd Account Social Media
	*/
	public $facebook = 'https://www.facebook.com/h3xagon.id';
	public $twitter = 'https://www.twitter.com/mrdixec';
	public $instagram = 'https://www.instagram.com/flx1on';
	public $linkedin = 'https://www.linkedin.com/in/denny-septian-panggabean-b921b4182/';
    public $email = 'sealgeek@gmail.com';

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