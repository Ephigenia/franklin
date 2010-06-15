<?php

/**
 * 	Example Configuration file for Franklin
 * 	
 * 	@since 2009-05-19
 * 	@author Marcel Eichner
 * 	@package franklin
 */
$config = array(

	'timezone' => 'Europe/Berlin',

	'groups' => array(
		
		// Marcel Eichner
		array(
			'name'	=> 'Marcel Eichner',
			'host'	=> 'www.marceleichner.de',
			// tests in this group
			'tests'	=> array(
				array(
					// Please not that you will have to turn on awareness api
					// in your feedburner account to use FeedburnerReaders test!
					'test'	=> 'FeedburnerReaders',
					'config' => array(
						'name' 	=> 'Feedburner Readers',
						'uri'	=> 'ephigenia',
						'interval' => '12 hours',
					),
				),
				array(
					'test'	=> 'FeedburnerHits',
					'config' => array(
						'name' 	=> 'Feedburner Hits',
						'uri'	=> 'ephigenia',
						'interval' => '12 hours',
					),
				),
				array(
					'test'	 => 'GoogleResultsCount',
					'config' => array('search' => 'site:%host%', 'name'	 => 'indexed pages', 'interval' => '12 hours'),
				),
				array(
					'test'	 => 'GoogleResultsCount',
					'config' => array('search' => 'link:%host%', 'name' => 'inbound links', 'interval' => '12 hours'),
				),
			),
		),

		// Horrorblog.org
		array(
			'name'	=> 'Horrorblog',
			'host'	=> 'www.horrorblog.org',
			// tests in this group
			'tests'	=> array(
				array(
					'test'	=> 'FeedburnerReaders',
					'config' => array(
						'name' 	=> 'Feedburner Readers',
						'uri'	=> 'HorrorblogOrg',
						'interval' => '12 hours', 
					),
				),
				array(
					'test'	=> 'FeedburnerHits',
					'config' => array(
						'name' 	=> 'Feedburner Hits',
						'uri'	=> 'HorrorblogOrg',
						'interval' => '12 hours',
					),
				),
				array(
					'test' => 'LeserchartsDe',
					'config' => array(
						'search' => 'Horrorblog.org',
						'interval' => '1 day',
						'name' => 'Lesercharts.de',
					),
				),
				array(
					'test' => 'TwitterFollowers',
					'config' => array(
						'username' => 'horrorblogorg',
						'interval' => '1 day',
					),
				),
				array(
					'test' => 'AlexaTrafficRank',
					'name' => 'Alexa Rank (de)',
					'config' => array(
						'interval' => '1 day',
						'countryCode' => 'de',
					),
				),
				array(
					'test' => 'AlexaTrafficRank',
					'name' => 'Alexa Rank (all)',
					'config' => array(
						'interval' => '1 day', 
					),
				),
				array(
					'test'	 => 'GoogleResultsCount',
					'config' => array('search' => 'site:%host%', 'name'	 => 'indexed pages', 'interval' => '12 hours'),
				),
				array(
					'test'	 => 'GoogleResultsCount',
					'config' => array('search' => 'link:%host%', 'name' => 'inbound links', 'interval' => '12 hours'),
				),
			),
		),
		
		// Lotterliebe.de
		array(
			'name'	=> 'Lotterliebe',
			'host'	=> 'www.lotterliebe.de',
			// tests in this group
			'tests'	=> array(
				array(
					'test'	=> 'FeedburnerReaders',
					'config' => array(
						'name' 	=> 'Feedburner Readers',
						'uri'	=> 'Lotterliebe',
						'interval' => '12 hours',
					),
				),
				array(
					'test'	=> 'FeedburnerHits',
					'config' => array(
						'name' 	=> 'Feedburner Hits',
						'uri'	=> 'Lotterliebe',
						'interval' => '12 hours',
					),
				),
				array(
					'test' => 'TwitterFollowers',
					'config' => array(
						'username' => 'lotterliebe',
						'interval' => '12 hours',
					),
				),
				array(
					'test'	 => 'GoogleResultsCount',
					'config' => array('search' => 'site:%host%', 'name'	 => 'indexed pages', 'interval' => '12 hours'),
				),
				array(
					'test'	 => 'GoogleResultsCount',
					'config' => array('search' => 'link:%host%', 'name' => 'inbound links', 'interval' => '12 hours'),
				),
			),
		),
		
		// Berliner Gazette
		array(
			'name'	=> 'Berliner Gazette',
			'host'	=> 'www.berlinergazette.de',
			'tests'	=> array(
				array(
					'test'	=> 'FeedburnerReaders',
					'config' => array(
						'name' 	=> 'Feedburner Readers',
						'uri'	=> 'BerlinerGazette',
						'interval' => '12 hours',
					),
				),
				array(
					'test'	=> 'FeedburnerHits',
					'config' => array(
						'name' 	=> 'Feedburner Hits',
						'uri'	=> 'BerlinerGazette',
						'interval' => '12 hours',
					),
				),
				array(
					'test' => 'TwitterFollowers',
					'config' => array(
						'username' => 'berlinergazette',
						'interval' => '12 hours',
					),
				),
				array(
					'test'	 => 'GoogleResultsCount',
					'config' => array('search' => 'site:%host%', 'name'	 => 'indexed pages', 'interval' => '12 hours'),
				),
				array(
					'test'	 => 'GoogleResultsCount',
					'config' => array('search' => 'link:%host%', 'name' => 'inbound links', 'interval' => '12 hours'),
				),
			),
		),
		
		// WeSC
		array(
			'name'	=> 'WeSC',
			'host'	=> 'www.wesc.com',
			// tests in this group
			'tests'	=> array(
				array(
					'test'	 => 'GoogleResultsCount',
					'config' => array('search' => 'site:%host%', 'name'	 => 'indexed pages', 'interval' => '12 hours'),
				),
				array(
					'test'	 => 'GoogleResultsCount',
					'config' => array('search' => 'link:%host%', 'name' => 'inbound links', 'interval' => '12 hours'),
				),
			), 
		),
		
		// Ikko
		array(
			'name' => 'Ikko',
			'host' => 'www.ikkko.com',
			'tests' => array(
				array(
					'test' => 'GoogleResultsCount',
					'config' => array('search' => 'link:%host%', 'name' => 'inbound links', 'interval' => '12 hours'),
				),
				array(
					'test' => 'GoogleResultsCount',
					'config' => array('search' => 'site:%host%', 'name' => 'indexed pages', 'interval' => '12 hours'),
				),
			),
		),
		
		// TripsByTips
		array(
			'name' => 'Tripsbytips',
			'host' => 'www.tripsbytips.de',
			'tests' => array(
				array(
					'test' => 'GoogleResultsCount',
					'config' => array('search' => 'link:%host%', 'name' => 'inbound links', 'interval' => '12 hours'),
				),
				array(
					'test' => 'GoogleResultsCount',
					'config' => array('search' => 'site:%host%', 'name' => 'indexed pages', 'interval' => '12 hours'),
				),
			),
		),
		
		// Escapio
		array(
			'name' => 'Escapio',
			'host' => 'de.escapio.com',
			'tests' => array(
				array(
					'test' => 'GoogleResultsCount',
					'config' => array('search' => 'link:%host%', 'name' => 'inbound links', 'interval' => '12 hours'),
				),
				array(
					'test' => 'GoogleResultsCount',
					'config' => array('search' => 'site:%host%', 'name' => 'indexed pages', 'interval' => '12 hours'),
				),
			),
		),
		
		// Mongrelnation
		array(
			'name'	=> 'Mongrelnation (Maiko Gubler)',
			'host'	=> 'www.mongrelnation.com',
			'tests'	=> array(
				array(
					'test'	 => 'GoogleResultsCount',
					'config' => array('search' => 'link:%host%', 'name' => 'inbound links', 'interval' => '12 hours'),
				),
				array(
					'test'	 => 'GoogleResultsCount',
					'config' => array('search' => 'site:%host%', 'name'	 => 'indexed pages', 'interval' => '12 hours'),
				),
			),
		),
		
	), // groups
);