<?php

/**
 * An implementation of iJetpack_Sync_Replicastore which returns data stored in a WordPress.org DB.
 * This is useful to compare values in the local WP DB to values in the synced replica store
 */
class Jetpack_Sync_WP_Replicastore implements iJetpack_Sync_Replicastore {
	public function post_count( $status = null ) {
		return count( $this->get_posts( $status ) );
	}

	public function get_posts( $status = null ) {
		$args = array( 'orderby' => 'ID' );

		if ( $status ) {
			$args['post_status'] = $status;
		} else {
			$args['post_status'] = 'any';
		}

		return get_posts( $args );
	}

	public function get_post( $id ) {
		return get_post( $id );
	}

	public function upsert_post( $post ) {
		wp_update_post( $post );
	}

	public function delete_post( $post_id ) {
		wp_delete_post( $post_id, true );
	}

	public function comment_count( $status = null ) {
		return count( $this->get_comments() );
	}

	public function get_comments( $status = null ) {
		$args = array( 'orderby' => 'ID', 'status' => 'all' );

		if ( $status ) {
			$args['status'] = $status;
		}

		return get_comments( $args );
	}

	public function get_comment( $id ) {
		return get_comment( $id );
	}

	public function upsert_comment( $comment ) {
		wp_update_comment( (array) $comment );
	}

	public function trash_comment( $comment_id ) {
		wp_delete_comment( $comment_id );
	}

	public function delete_comment( $comment_id ) {
		wp_delete_comment( $comment_id, true );
	}

	public function spam_comment( $comment_id ) {
		wp_spam_comment( $comment_id );
	}

	public function update_option( $option, $value ) {
		return update_option( $option, $value );
	}

	public function get_option( $option ) {
		return get_option( $option );
	}

	public function delete_option( $option ) {
		return delete_option( $option );
	}

	public function set_theme_support( $theme_support ) {
		// noop
	}

	public function current_theme_supports( $feature ) {
		return current_theme_supports( $feature );
	}


	// meta
	public function get_metadata( $meta_type, $object_id, $key, $single = false ) {
		return get_metadata( $meta_type, $object_id, $key, $single );
	}
	public function add_metadata( $meta_type, $object_id, $key, $value, $unique = false ) {
		add_metadata( $meta_type, $object_id, $key, $value, $unique );
	}
	public function update_metadata( $type, $object_id, $meta_key, $meta_value, $meta_id ) {
		// TODO: SQL update
		// update_metadata( $meta_type, $object_id, $key, $value, $prev_value );
	}
	public function delete_metadata( $meta_ids ) {
		// TODO: SQL delete
		// delete_metadata( $meta_type, $object_id, $meta_key, $meta_value, $delete_all );
	}

	// constants
	public function get_constant( $constant ) {
		// TODO: Implement get_constant() method.
	}
	public function set_constants( $constants ) {
		// TODO: Implement get_constant() method.
	}

	public function get_updates( $type ) {
		// TODO: Implement get_updates() method.
	}

	public function set_updates( $type, $updates ) {
		// TODO: Implement set_updates() method.
	}

	// functions
	public function get_callable( $constant ) {
		// TODO: Implement get_constant() method.
	}
	public function set_callables( $constants ) {
		// TODO: Implement get_constant() method.
	}
}
