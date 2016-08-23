<?php
/**
 * Tests the functionality of the Route class.
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
	 * Name of class that is being tested.
	 */
	private $class_name = 'BEforever\Routing\App\Route';

	/**
	 * Test whether the Route class exists.
	 */
	public function test_class_exists() {
		$this->assertTrue( class_exists( $this->class_name ) );
	}

	/**
	 * Test whether the various properties exist.
	 */
	public function test_class_properties_exist() {
		$this->assertTrue( property_exists( $this->class_name, 'resource' ) );
		$this->assertTrue( property_exists( $this->class_name, 'callback' ) );
	}

	/**
	 * Test whether the various methods exist.
	 */
	public function test_class_methods_exist() {
		$this->assertTrue( method_exists( $this->class_name, 'dispatch' ) );
		$this->assertTrue( method_exists( $this->class_name, 'get_resource' ) );
		$this->assertTrue( method_exists( $this->class_name, 'get_callback' ) );
		$this->assertTrue( method_exists( $this->class_name, 'parse_options' ) );
	}

	/**
	 * Verify that object constructor method works as intended.
	 */
	public function test_route_constructor() {
		$route = new Routing\Route( '/example-route', array() );

		$this->assertEquals( '/example-route', $route->get_resource() );
	}

	/**
	 * Tests the parsing of route options.
	 */
	public function test_route_parse_options() {
		$options = array(
			'callback' => 'example_function',
		);

		$route = new Routing\Route( '/', $options );

		$this->assertEquals( 'example_function', $route->get_callback() );
	}

	/**
	 * Test a successful route dispatch.
	 */
	public function test_route_dispatch_success() {
		$this->expectOutputString( 'Test Succeeded' );

		$callback = array( $this, 'example_dispatch' );

		$options = array(
			'callback' => $callback,
		);

		$route = new Routing\Route( '/', $options );
		$route->dispatch();
	}

	/**
	 * Test route dispatch failure.
	 */
	public function test_route_dispatch_failure() {
		$this->expectException( \BadFunctionCallException::class );

		// No callback specified.
		$route = new Routing\Route( '/', array() );
		$route->dispatch();
	}

	/**
	 * A helper function for testing route dispatching.
	 */
	public static function example_dispatch() {
		echo 'Test Succeeded';
	}
}
