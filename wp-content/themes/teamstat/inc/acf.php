<?php
if (function_exists('get_field')) {
	add_filter('acf/settings/save_json', 'ts_save_acf_json');

	function ts_save_acf_json(string $path): string
	{
		// update path
		$path = get_stylesheet_directory() . '/acf';
		// return
		return $path;
	}

	add_filter('acf/settings/load_json', 'tebra_load_acf_json');

	function tebra_load_acf_json(array $paths): array
	{
		// remove original path (optional)
		unset($paths[0]);

		// append path
		$paths[] = get_stylesheet_directory() . '/acf';

		// return
		return $paths;
	}

}
 
?>