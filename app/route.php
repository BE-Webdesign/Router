<?php
/**
 * The route class
 *
 * @package BEforever\Routing
 */

namespace BEforever\Routing\App;

/**
 * The route class is meant to be extended into various types of routes.
 *
 * HTTP routes will most likely be the main used type of route.
 */
class Route {

	/**
	 * The input for a route that is supposed to match a resource.
	 *
	 * @var mixed $resource
	 */
	private $resource;

	/**
	 * Callback registered to the route.
	 *
	 * The callback can be provided in $options['callback']. The callback is
	 * fired in the dispatch() method.
	 *
	 * @var callable|string $callback
	 */
	private $callback;

	/**
	 * Each route should map to one resource and can support options.
	 *
	 * The $resource will typically be the path of a URI. $options should be
	 * specified as an array of various configuration settings that are tied to
	 * this particular route.
	 *
	 * @param mixed $resource Resource of the route.
	 * @param array $options  Configuration options for the route.
	 */
	public function __construct( $resource, array $options ) {
		$this->resource = $resource;

		$this->parse_options( $options );
	}

	/**
	 * Dispatches the routes callback.
	 *
	 * Note: The route is flexible in its use. You can map routes to output
	 * callbacks or to fetchable callbacks.
	 *
	 * @throws \BadFunctionCallException If the callback is not valid.
	 */
	public function dispatch() {
		if ( is_callable( $this->callback ) ) {
			return call_user_func( $this->callback );
		} else {
			throw new \BadFunctionCallException( 'The route callback is not a valid callback.' );
		}
	}

	/**
	 * Returns the private variable $resource.
	 */
	public function get_resource() {
		return $this->resource;
	}

	/**
	 * Returns the private variable $callback.
	 */
	public function get_callback() {
		return $this->callback;
	}

	/**
	 * Parse the configuration options into the object.
	 *
	 * @param array $options Options for route configuration. Should contain callback.
	 */
	public function parse_options( array $options ) {
		$this->callback = isset( $options['callback'] ) ? $options['callback'] : null;
	}
}
