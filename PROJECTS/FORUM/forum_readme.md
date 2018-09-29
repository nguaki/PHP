Demonstration of forum project.

HTML and PHP code are in one file.
This was very confusing.
This is not a good design.
But how do I go about separating HTML and PHP 
completely separately?




Flow diagram

      |----------------------------------------------|
      V                                              |
addtopic.html  ===>  add_a_topic.php  ===> display_topic_list.php  <-------
                                                     |                     |
                                                     |                     |
                                                     |                     |
                                                     V                     |
   topiclist.php <----replytopost.php <-----show_posts_of_a_topic.php  --- |
                            |                        ^
                            |------------------------|
                            
                            
Database

forum_post                                   forum_topics
|-------------------|                      |-------------------|
|topic_id           |                      |topic_id           |
|post_text          |                      |topic_title        |
|post_create_time   |                      |topic_create_time  |
|post_owner         |                      |topic_owner        |
|post_id            |                      |-------------------|
|-------------------|

forum_post
Add a Topic
Your Email Address:
[                   ]

Topic Title:
[                   ]


Post Text:
[                   ]
[                   ]
[                   ]
[                   ]
[                   ]
[                   ]
[                   ]


Add Topic
{  }