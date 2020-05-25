<?php
namespace Elementor\Tests\Phpunit\Elementor\Data\Base\Mock\Template;

class Controller extends \Elementor\Data\Base\Controller {

	use BaseTrait;

	public function get_type() {
		return 'controller';
	}

	public function register_endpoints() {
		// TODO: Implement register_endpoints() method.
	}

	public function get_permission_callback( $request ) {
		return true; // Bypass.
	}

	protected function register() {
		// Can be part of BaseTrait.
		if ( ! $this->bypass_register_status ) {
			parent::register();
		}
	}

	public function do_register_internal_endpoints() {
		$this->bypass_original_register();

		add_action( 'rest_api_init', function () {
			$this->register_internal_endpoints();
		} );
	}

	public function do_register_endpoint( $endpoint_class ) {
		return $this->register_endpoint( $endpoint_class );
	}

	public function do_register_processor( $processor_class ) {
		return $this->register_processor( $processor_class );
	}
}
