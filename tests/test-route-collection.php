<?php
/**
 * Tests the functionality of the Router Collection class.
 *
 * @package BEforever\Routing\Tests
 */

use \PHPUnit\Framework as PHPUnit;
use \BEforever\Routing\App as Routing;

/**
 * Test Case for the route entity.
 */
class RouteCollectionTest extends PHPUnit_Framework_TestCase {
	/**
	 * Test whether the Route class exists.
	 */
	public function test_class_exists() {
		$this->assertTrue( class_exists( 'BEforever\Routing\App\RouteCollection' ) );
	}
}
