<?php
    $uriSegments = explode('/', $_SERVER['REQUEST_URI']);
    $forumUri = 'forum';

    if(in_array($forumUri, $uriSegments)) {
        if(SP()->forum->view->this_topic()) {

            $forumId = SP()->forum->view->this_topic()->forum_id;
            $topicId = SP()->forum->view->this_topic()->topic_id;

            global $wpdb;

            $noIndex = $wpdb->get_results( "SELECT * FROM `wp_sftopics_noindex` WHERE forum_id = $forumId AND topic_id = $topicId", OBJECT );

            if($noIndex) {
                echo '<meta name="robots" content="noindex">';
            }

            echo '<script> console.log("Forum topic page") </script>';
        } else {
            echo '<script> console.log("Not a forum topic page") </script>';
        }
    } else {
        echo '<script> console.log("Not a forum page") </script>';
    }
?>