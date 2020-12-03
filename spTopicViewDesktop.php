<?php
	if(is_user_logged_in() && current_user_can('administrator')) {
		$forumId = SP()->forum->view->this_topic()->forum_id;
		$topicId = SP()->forum->view->this_topic()->topic_id;

		global $wpdb;

		if(isset($_GET['customAction'])) {
			if($_GET['customAction'] == 'noIndex') {
				$wpdb->insert('wp_sftopics_noindex', ['forum_id' => $forumId, 'topic_id' => $topicId]);
			} elseif($_GET['customAction'] == 'removeNoIndex') {
				$wpdb->delete('wp_sftopics_noindex', ['forum_id' => $forumId, 'topic_id' => $topicId]);
			}
		}

		$noIndex = $wpdb->get_results( "SELECT * FROM `wp_sftopics_noindex` WHERE forum_id = $forumId AND topic_id = $topicId", OBJECT );

		if($noIndex) {
			echo '
			<meta name="robots" content="noindex">
				<form action="" method="get">
					<input type="hidden" name="customAction" value="removeNoIndex">
					<button type="submit" class="btn btn-primary">Index This Topic (add to search engine results)</button>
				</form>
				';
		} else {
			echo '
				<form action="" method="get">
					<input type="hidden" name="customAction" value="noIndex">
					<button type="submit" class="btn btn-primary">No Index This Topic (remove from search engine results)</button>
				</form>
				';
		}
	}
?>