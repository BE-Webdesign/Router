<?php
/**
 * Main test case.
 *
 * @package BEforever\Routing\Tests
 */

use \PHPUnit\Framework as PHPUnit;
use \BEforever\Routing\App as Routing;

/**
 * Test Case for the route entity.
 */
class RouteTest extends PHPUnit_Framework_TestCase {
	/**
	 * Test whether the Route class exists.
	 */
	public function test_route_exists() {
		$this->assertTrue( class_exists( 'BEforever\Routing\App\Route' ) );
	}
}
