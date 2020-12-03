### In order to create a no index solution for a Simple Press Forum please follow the three steps outlined below:

#### Step 1 - Create the database table
Import the file called create_wp_sftopics_index_table.sql into your PhpMyAdmin or similar database management software. This will create a pivot table that will track all topics that require a noindex meta tag. There is the option of adding in the user_id of who made the noindex request as well if desired.

#### Step 2 - Create the ability for users to flag a topic
Using the code within the php tags in spTopicViewDesktop.php, place this in the correct child theme being used by the forum. This file should also be called spTopicViewDesktop.php and will usually reside within wp-content/sp-resources/forum-themes/child-theme-name/templates/desktop/spTopicViewDesktop.php.

#### This code should be placed after the if statement to check if the post is found and will look something like this:

```if (SP()->forum->view->this_topic()):```

You can move this code around the file to your desired location as this will change where it appears on the frontend. However it is vital this is placed within the if statement mentioned above.

#### Step 3 - Prepare the main WordPress header to accept the noindex tag
Inside header.php you will find the code to copy and paste within the main WordPress themes header commonly found within wp-content/themes/theme-name/header.php

It is important this code - including the php tags - be placed within the <head> tags of the themes header.php file.

You will also notice a variable in this file called $forumUri. By default the URI of the forum pages will 'forum', however on some installations this may be customised. If this is the case it is important to change this variable to the correct URI to prevent your site breaking.