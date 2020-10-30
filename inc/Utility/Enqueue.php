<?php

namespace WPEssential\Plugins\Icons\Utility;

final class Enqueue
{

	public static function constructor ()
	{
		add_filter( 'wpe/frontend/css', [ __CLASS__, 'frontend_enqueue' ], 20 );
	}

	public static function frontend_enqueue ( $list )
	{
		return wp_parse_args(
			[
				'elementor-icons',
				'wpessential-icons-captian',
				'wpessential-icons-ion',
				'wpessential-icons-typ'
			],
			$list
		);
	}
}
