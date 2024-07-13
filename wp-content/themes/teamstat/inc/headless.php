<?php

// revalidate on save game
if (!function_exists('headless_update_post')) {

	function headless_update_post(int|WP_Post $post_ID, mixed $post_after, mixed $post_before): void
	{
		$post = get_post($post_ID);
		if ($post !== null && $post->post_type === 'game') {
			
			wp_remote_post('https://oldboys.vercel.app/api/revalidate?tag=get-games', [
				'method' => 'GET',
			]);
		}
	}

	add_action('save_post', 'headless_update_post', 10, 3);
}