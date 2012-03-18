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
		
		// Marcel Eichner
		array(
			'name' => 'Marcel Eichner',
			'host' => 'www.marceleichner.de',
			'tests'	=> array(
				array(
					'test' => 'GitHub\UserInfo',
					'config' => array(
						'username' => 'ephigenia',
						'key' => 'followers',
						'interval' => '24 hours',
					),
				),
				array(
					'test'	=> 'Vimeo\UserInfo',
					'config' => array(
						'username' => 'ephigenia',
						'key' => 'contacts',
						'interval' => '24 hours',
					),
				),
			),
		),
		
		
		
		
	),
);