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
		
		// MARCEL EICHNER
		array(
			'name' => 'Marcel Eichner',
			'tests' => array(
				// Twitter
				array(
					'test' => 'Twitter\Followers',
					'config' => array(
						'username' => 'ephigenia',
					),
				),
				array(
					'test' => 'Klout\Score',
					'config' => array(
						'username' => 'ephigenia',
					),
				),
				array(
					'test' => 'GitHub\UserInfo',
					'config' => array(
						'username' => 'ephigenia',
						'key' => 'followers',
					),
				),
				// Vimeo
				array(
					'test' => 'Vimeo\UserInfo',
					'config' => array(
						'username' => 'ephigenia',
						'key' => 'contacts',
					),
				),
			),
		),
		
		// BERLINER GAZETTE
		array(
			'name' => 'Berliner Gazette',
			'tests' => array(
				// Twitter
				array(
					'test' => 'Twitter\Followers',
					'config' => array(
						'username' => 'berlinergazette',
					),
				),
				array(
					'test' => 'Klout\Score',
					'config' => array(
						'username' => 'berlinergazette',
					),
				),
				array(
					'test' => 'Facebook\PageLikes',
					'config' => array(
						'id' => '124267207683497',
					),
				),
				array(
					'test' => 'Soundcloud\UserInfo',
					'config' => array(
						'username' => 'berliner-gazette',
						'key' => 'followers',
					),
				),
				array(
					'test' => 'Vimeo\UserInfo',
					'config' => array(
						'username' => 'berlinergazette',
						'key' => 'contacts',
					),
				),
				array(
					'test'  => 'Feedburner\Metric',
					'config' => array(
						'uri' => 'BerlinerGazette',
						'type' => 'circulation',
					),
				),
				array(
					'test'  => 'Feedburner\Metric',
					'config' => array(
						'uri' => 'BerlinerGazette',
						'type' => 'hits',
					),
				),
				array(
					'test'   => 'Google\Backlinks',
					'config' => array(
						'host' => 'berlinergazette.de',
					),
				),
				array(
					'test'   => 'Google\IndexedPages',
					'config' => array(
						'host' => 'berlinergazette.de',
					),
				),
				array(
					'test' => 'Sistrix\Sichtbarkeitsindex',
					'config' => array(
						'host' => 'berlinergazette.de',
					),
				),
			),
		),
		
		// FOOBUGS
		array(
			'name' => 'foobugs',
			'tests' => array(
				// Twitter
				array(
					'test' => 'Twitter\Followers',
					'config' => array(
						'username' => 'foobugs',
					),
				),
				array(
					'test' => 'Klout\Score',
					'config' => array(
						'username' => 'foobugs',
					),
				),
				// facebook
				array(
					'test' => 'Facebook\PageLikes',
					'config' => array(
						'id' => '170093406411986',
					),
				),
				array(
					'test' => 'Facebook\PageTalkingAbout',
					'config' => array(
						'id' => '170093406411986',
					),
				),
				array(
					'test' => 'Facebook\URLLikes',
					'config' => array(
						'url' => 'http://foobugs.com',
					),
				),
				array(
					'test' => 'Sistrix\Sichtbarkeitsindex',
					'config' => array(
						'host' => 'foobugs.com',
					),
				),
				array(
					'test' => 'GitHub\UserInfo',
					'config' => array(
						'username' => 'foobugs',
						'key' => 'followers',
					),
				),
			),
		),
		
		// Escapio
		array(
			'name' => 'Escapio',
			'tests' => array(
				array(
					'test' => 'Twitter\Followers',
					'config' => array(
						'username' => 'escapio',
					),
				),
				array(
					'test' => 'Klout\Score',
					'config' => array(
						'username' => 'escapio',
					),
				),
				array(
					'test' => 'Facebook\PageLikes',
					'config' => array(
						'id' => 'escapiohotels',
					),
				),
				array(
					'test' => 'Facebook\PageTalkingAbout',
					'config' => array(
						'id' => 'escapiohotels',
					),
				),
				array(
					'test'   => 'Google\Backlinks',
					'config' => array(
						'host' => 'de.escapio.com',
					),
				),
				array(
					'test'   => 'Google\IndexedPages',
					'config' => array(
						'host' => 'de.escapio.com',
					),
				),
				array(
					'test' => 'Sistrix\Sichtbarkeitsindex',
					'config' => array(
						'host' => 'de.escapio.com',
					),
				),
			),
		),
		
		// Franklin Stuff
		array(
			'name' => 'Franklin',
			'tests' => array(
				// GitHub Stuff
				array(
					'test'	=> 'GitHub\RepoInfo',
					'config' => array(
						'username' => 'ephigenia',
						'repository' => 'franklin',
						'key' => 'open_issues',
						'interval' => '24 hours',
					),
				),
				array(
					'test'	=> 'GitHub\RepoInfo',
					'config' => array(
						'username' => 'ephigenia',
						'repository' => 'franklin',
						'key' => 'watchers',
						'interval' => '24 hours',
					),
				),
				array(
					'test'	=> 'GitHub\RepoInfo',
					'config' => array(
						'username' => 'ephigenia',
						'repository' => 'franklin',
						'key' => 'forks',
						'interval' => '24 hours',
					),
				),
				array(
					'test'	=> 'GitHub\RepoInfo',
					'config' => array(
						'username' => 'ephigenia',
						'repository' => 'franklin',
						'key' => 'size',
						'interval' => '24 hours',
					),
				),
				array(
					'test'	=> 'GitHub\RepoInfo',
					'config' => array(
						'username' => 'ephigenia',
						'repository' => 'franklin',
						'key' => 'sloc',
						'interval' => '24 hours',
					),
				),
			),
		),
	),
);