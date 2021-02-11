<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>' Palito ',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.YiiMailer.YiiMailer',
	),

'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'amcodr@123',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'Setting_params' => array(
            'class' => 'application.components.Setting_params',
        ),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'noreply@amcodr.co',
		'adminTwillioNumber'=>'+1 702 718 6134',
		'sliderImagePath'=>'uploads/sliders/',
		'albumImagePath'=>'uploads/albums/',
		'ImagePath'=>'uploads/images/',
		'testing_email'=>'mahavirsinh.amcodr@gmail.com',
		'stripe' => array( 		
			// for live 			
			// "secret_key"      => "sk_test_f5UXRxNWXMv6OQNF4FPb3JD800Hwv91L99",//mendparasukunj27@gmail.com
	// 		"publishable_key" => "pk_test_KakTac8KKTo3BYDueCFRJKp50023Nrwdke",//mendparasukunj27@gmail.com

			// learn to arcade	for test.				

			"secret_key"      => "sk_test_bVDQEeKxR0qxhurOiTJUUThH00gEGGuyzt",// this key is mendparasukunj27@gmail.com account
			"publishable_key" => "pk_test_s0dN2EsNG62WQZpcMNZ8IPL900Ptyv2jCC",// this key is mendparasukunj27@gmail.com  account

			// // for test	   						
			// "secret_key"      => "sk_test_ihiosDyPGSavUS7xYH6CIaBt000t7pbPU3",// this key is radheshyamgohel.gr@gmail.com account
			// "publishable_key" => "pk_test_96z26ymaIt7wOZj1ExVpKpca00jYKZw35m",// this key is radheshyamgohel.gr@gmail.com account

			
			// // "CLIENT_ID" => "ca_32D88BD1qLklliziD7gYQvctJIhWBSQ7",
			// // "CLIENT_ID" => "ca_FLHyuckeRZdVh3yLHdIePccLeWYDi2uz",
			// // "CLIENT_ID" => "ca_G1KRVNAOVieUJwEBogE96tubnRwhyu79",// this key is radheshyamgohel.gr@gmail.com account
			// "CLIENT_ID" => "ca_G1wwvlNYJhnd0FjQFNAtnkxFpkqXM2yE",	   						
			// "AUTHORIZE_URI" => "https://dashboard.stripe.com/oauth/authorize",
			// "TOKEN_URI" => "https://connect.stripe.com/oauth/token"
		),
                
	),
);
