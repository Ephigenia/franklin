<?php

/**
 * Example Configuration file for Franklin
 * 	
 * @since 2009-05-19
 * @author Marcel Eichner
 * @package franklin
 */
$config = array(

	'timezone' => 'Europe/Berlin',
	'theme' => 'amber',

	'groups' => array(
		
		// Marcel Eichner
		array(
			'name'	=> 'Marcel Eichner',
			'host'	=> 'www.marceleichner.de',
			'tests'	=> array(
				array(
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
					'test' => 'WikioScore',
					'config' => array(
						'name' => 'Wikio Score',
						'uri' => 'www.horrorblog.org-aeK1',
						'interval' => '24 hours',
					),
				),
				array(
					'test' => 'GoogleAnalyticsAPI',
					'config' => array(
						'name' => 'GA visits',
						'email' => 'ephigeniade@googlemail.com',
						'password' => 'blackjackp8zqm3',
						'profile_id' => 19282102,
						'metric' => 'visits',
						'interval' => '24 hours',
						'time' => '1 day',
					),
				),
				array(
					'test' => 'GoogleAnalyticsAPI',
					'config' => array(
						'name' => 'GA page views',
						'email' => 'ephigeniade@googlemail.com',
						'password' => 'blackjackp8zqm3',
						'profile_id' => 19282102,
						'metric' => 'pageViews',
						'interval' => '24 hours',
						'time' => '1 day',
					),
				),
				array(
					'test'	=> 'TwitterSearchApiResultsCount',
					'config' => array(
						'name' 	=> 'Twitter Mentions (1 day)',
						'q' => '@horrorblogorg',
						'interval' => '24 hours',
						'since' => '-1 days',
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
					'test' => 'FacebookGroupFansCount',
					'config' => array(
						'name' => 'Facebook Fans',
						'groupId' => '115046791864216',
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
				array(
					'test'	=> 'GoogleSERP',
					'config' => array(
						'language' => 'de',
						'search' => 'Horror Blog',
						'interval' => '1 day', 
					),
				),
				array(
					'test'	=> 'GoogleSERP',
					'config' => array(
						'language' => 'de',
						'search' => 'Horror',
						'interval' => '1 day', 
					),
				),
				array(
					'test'	=> 'GoogleSERP',
					'config' => array(
						'language' => 'de',
						'search' => 'Horror Trailer',
						'interval' => '1 day', 
					),
				),
				array(
					'test'	=> 'GoogleSERP',
					'config' => array(
						'language' => 'de',
						'search' => 'Horror Film',
						'interval' => '1 day', 
					),
				),
				array(
					'test' => 'VimeoVideo',
					'config' => array(
						'name' => 'Rodrigo Cortés Interview',
						'interval' => '24 hours',
						'videoID' => 16511706,
						'property' => 'stats_number_of_plays',
					),
				),
			),
		),
		
		// Lotterliebe.de
		array(
			'name'	=> 'Lotterliebe',
			'host'	=> 'www.lotterliebe.de',
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
					'config' => array('search' => 'site:berlinergazette.de', 'name'	 => 'indexed pages', 'interval' => '12 hours'),
				),
				array(
					'test'	 => 'GoogleResultsCount',
					'config' => array('search' => 'link:berlinergazette.de', 'name' => 'inbound links', 'interval' => '12 hours'),
				),
			),
		),
		
		// WeSC
		array(
			'name'	=> 'WeSC',
			'host'	=> 'www.wesc.com',
			'tests'	=> array(
				array(
					'test' => 'FacebookGroupFansCount',
					'config' => array(
						'name' => 'Facebook Fans',
						'groupId' => '10439299892',
						'interval' => '1 day',
					),
				),
				array(
					'test'	 => 'GoogleResultsCount',
					'config' => array('search' => 'site:wesc.com', 'name'	 => 'indexed pages', 'interval' => '12 hours'),
				),
				array(
					'test'	 => 'GoogleResultsCount',
					'config' => array('search' => 'link:wesc.com', 'name' => 'inbound links', 'interval' => '12 hours'),
				),
			), 
		),
		
		// Ikko
		array(
			'name' => 'Ikko',
			'host' => 'www.ikkko.com',
			'tests' => array(
				array(
					'test' => 'FacebookGroupFansCount',
					'config' => array(
						'name' => 'Facebook Fans',
						'groupId' => '72592731587',
						'interval' => '1 day',
					),
				),
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
					'test' => 'FacebookGroupFansCount',
					'config' => array(
						'name' => 'Facebook Fans',
						'groupId' => '9013501177',
						'interval' => '1 day',
					),
				),
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
					'test' => 'FacebookGroupFansCount',
					'config' => array(
						'name' => 'Facebook Fans',
						'groupId' => 'escapiohotels',
						'interval' => '1 day',
					),
				),
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
		
	), // groups
);