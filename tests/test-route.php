<?php
/**
 * Main test case.
 *
 * @package Route\tests
 */

use PHPUnit\Framework\TestCase;

/**
 * Test Case for the route entity.
 */
class RouteTest extends PHPUnit_Framework_TestCase {
	/**
	 * Test whether the Route class exists.
	 */
	public function test_route_exists() {
		$this->assertTrue( class_exists( 'Route' ) );
	}
}
