<?php

#function used to convert bytes into kb or mb or gb. To be used later, you can make your own if you want, or even take it out, but you'll need to modify the php later on to remove the function call.
function bytesize($bytes = array()){

   if (!is_array($bytes)){
   
      $bytes = array($bytes);
      
   }
   
   foreach($bytes as $byte){
   
   $size = $byte / 1024;
   switch($size){
   
      case ($size < 1024):
            $new_size = number_format($size, 2);
            $new_size .= ' KB';
      break;
      
      case ($size / 1024 < 1024):
         $new_size = number_format($size / 1024, 2);
         $new_size .= ' MB';
      break;
      
      case ($size / 1024 / 1024 < 1024):
         $new_size = number_format($size / 1024 / 1024, 2);
         $new_size = ' GB';
      break;
   
   }
   $sizes[] = $new_size;
   
   }
   
   return $sizes;

}

/*
* @param String $sort_order Has 13 options: (Default is s'ticky_recent_desc')
* Options:
1. 'recent_asc' Gives oldest to newest topics
2. 'recent_desc' Vice versa
3. 'sticky_recent_desc' Gives newest to oldest topics, however it retains announcements and stickies on top
4. 'active_asc' Gives the early replied to recently replied 
5. 'active_desc' Vice versa
6. 'subject_asc' Gives it in alphabetical order
7. 'subject_desc' Vice versa
8. 'author_asc' Gives authors in alphabetical order
9. 'author_desc' Vice versa
10. 'views_asc' Gives the least views to most views
11. 'views_desc' Vice versa
12. 'replies_asc' Gives the least replies to the most replies
13. 'replies_desc' Vice versa
* @return String $sort_order_query The mysql coding to be used in the get_news function
*/
function sort_order_query($sort_order){

   #switches for sort_order
   switch ($sort_order){
      
      case 'recent_asc':
         $sort_order_query = 't.topic_time ASC';
         break;
      case 'recent_desc':
         $sort_order_query = 't.topic_time DESC';
         break;
        case 'sticky_recent_desc':
            $sort_order_query = 't.topic_type DESC, t.topic_time DESC';
            break;
      case 'active_asc':
         $sort_order_query = 't.topic_last_post_id ASC';
         break;
      case 'active_desc':
         $sort_order_query = 't.topic_last_post_id DESC';
         break;
      case 'subject_asc':
         $sort_order_query = 't.topic_title ASC';
         break;
      case 'subject_desc':
         $sort_order_query = 't.topic_title DESC';
         break;
      case 'author_asc':
         $sort_order_query = 't.topic_first_poster_name ASC';
         break;
      case 'author_desc':
         $sort_order_query = 't.topic_first_poster_name DESC';
         break;
      case 'views_asc':
         $sort_order_query = 't.topic_views ASC';
         break;
      case 'views_desc':
         $sort_order_query = 't.topic_views DESC';
         break;
      case 'replies_asc':
         $sort_order_query = 't.topic_replies_real ASC';
         break;
      case 'replies_desc':
         $sort_order_query = 't.topic_replies_real DESC';
         break;
      default:
         $sort_order_query = 't.topic_type DESC, t.topic_time DESC';
      
   }
   
   return($sort_order_query);

}

/*
* Retrieve the first post of each topic in a given forum
*
* @param Array $forum_ids  An array containing all the forum ids of the forums that must be included
* @param Array $parent_only_ids An array containg the forum ids that will only give you the topics inside that forum, and not any children. It is used to mix up with $forum_ids. However if $include_children is false, this will do nothing. If you do not want to use it, declare false on it when calling the function 
* @param Integer $limit The maximum number of topics to be returned
* @param Boolean $include_children This variable specifies whether we should include the "child forums" of the given $forum_ids in the results
* @param Integer $offset Set this variable if you don't want the result set begin on the first entry
* @param String $sort_order It is mysql coding of the query order. This is given by the sort_order_query function (Default is t.topic_time DESC)
* @param Boolean $allow_attachments (Default is true) Displays attachments (NOT INLINE IT WILL SHOW ALL ATTACHMENTS BUT INLINE WILL NOT BE PROCESSED)
* @param Boolean $allow_ranks (Default is true) Display ranks
* @param Boolean $allow_sigs (Default is true) Display signatures
* @param Boolean $allow_avatar (Default is true) Display avatars
* @return Array $posts An array holding all the posts and their data
* NOTES: If you want forum posts + children (subforum) posts. Check include_children as true and check false for $parent_only_ids.
* If you want forum posts + children (subforum) posts + forum posts not including children posts. Check include_children as true, and input values for $forum_ids and $parent_only_ids
* If you only want forum posts, DO NOT check $forum_ids as false and use $parent_only_ids. You must check $include_children as false, and simply input values for $forum_ids, and check $parent_only_ids as false.
* Remember that $parent_only_ids only work when $forum_ids are working regardless of $include_children. So $forum_ids is always the first one you have to use.
* The function will not output topics which are not approved.
*/
function get_news($forum_ids = array(), $parent_only_ids = array(), $limit = 10, $offset = 0, $include_children = false, $sort_order = 't.topic_type DESC, t.topic_time DESC', $allow_attachments = true, $allow_ranks = true, $allow_sigs = true, $allow_avatar = true){
   
   #defining global variables
   global $db, $phpbb_root_path, $phpEx;
   
   if (!is_array($forum_ids)){
   
      $forum_ids = array($forum_ids);
      
   }
   if (!is_array($parent_only_ids)){
   
      $parent_only_ids = array($parent_only_ids);   
      
   }
   
   #If required merge the children into the $forum_ids
   if ($include_children){
   
      #This can get very heavy when specifing a big array $forum_ids
      $child_forums = array();
      foreach ($forum_ids as $parent){
      
         $children = get_forum_branch($parent, 'children');
         foreach ($children as $child){
         
            $child_forums[] = $child['forum_id'];
            
         }
         
      }
      #Merge
      $forum_ids = array_merge($forum_ids, $child_forums, $parent_only_ids);
      
   }

   #Remove duplicates and filter out negatives
   $forum_ids = array_unique($forum_ids);
   
   $post_query = 'p.post_id, p.post_time, p.post_text, p.bbcode_bitfield, p.bbcode_uid, p.enable_bbcode, p.enable_smilies, p.enable_magic_url, p.post_attachment, t.topic_id, t.forum_id, t.topic_title, t.topic_views, t.topic_replies_real, t.topic_status, t.topic_type, t.topic_first_poster_name, t.topic_first_post_id, t.topic_last_post_time, t.poll_start, u.user_id, u.user_colour';
   if($allow_ranks){
   
      $post_query .= ',u.user_rank, u.user_posts';
   
   }
   if($allow_sigs){
   
      $post_query .= ',u.user_sig, u.user_sig_bbcode_uid, u.user_sig_bbcode_bitfield';
   
   }
   if($allow_avatar){
   
      $post_query .= ',u.user_avatar, u.user_avatar_type, u.user_avatar_width, u.user_avatar_height';
   
   }

   #Now select the post data
   $post_sql_ary = array(
      'SELECT'   => $post_query,
      'FROM'      => array(
         POSTS_TABLE      => 'p',
         TOPICS_TABLE   => 't',
      ),
      'LEFT_JOIN'    => array(
         array(
            'FROM'    => array(USERS_TABLE => 'u'),
            'ON'    => 'u.user_id = p.poster_id',
         ),
      ),
      'WHERE'        => '(' . $db->sql_in_set('t.forum_id', $forum_ids) . ' AND p.post_id = t.topic_first_post_id AND t.topic_approved = 1 AND t.topic_status != 2)',
      'ORDER_BY'    => $sort_order,
   );
   $sql   = $db->sql_build_query('SELECT', $post_sql_ary);
   $result   = $db->sql_query_limit($sql, $limit, $offset);
   
   #Set an array with the posts
   $posts   = array();
   while ($post = $db->sql_fetchrow($result)){
      
      #Getting the Attachments
      if($allow_attachments && $post['post_attachment']){
         
         unset($attachment_urls, $attachment_ids, $attachment_names,$attachment_downloads, $attachment_comments, $attachment_filesize, $num_of_attachment_ids);
         
         $attachments_sql_ary = array(
            'SELECT'   => 'a.attach_id, a.real_filename, a.download_count, a.attach_comment, a.filesize',
            'FROM'      => array(
               ATTACHMENTS_TABLE      => 'a',
            ),
            'WHERE'        => '(a.post_msg_id = ' . $post['post_id'] . ' AND a.in_message = 0)',
            'ORDER_BY'    => 'a.attach_id DESC',
         );
         $attachments_sql   = $db->sql_build_query('SELECT', $attachments_sql_ary);
         $attachments_result = $db->sql_query($attachments_sql);
         
         while ($row = $db->sql_fetchrow($attachments_result)){
         
               $attachment_ids[] = $row['attach_id'];
               $attachment_names[] = $row['real_filename'];
               $attachment_downloads[] = $row['download_count'];
               $attachment_comments[] = $row['attach_comment'];
               $attachment_filesize[] = $row['filesize'];
               
         }
         $db->sql_freeresult($attachments_result);
         
         $num_of_attachment_ids = count($attachment_ids);
         for($i=key($attachment_ids);$i<$num_of_attachment_ids;$i++){
         
            $attachment_urls[$i] = $phpbb_root_path . 'download/file.' . $phpEx . '?id=' . $attachment_ids[$i];
         
         }
         
      }else{
      
         $attachment_urls = false;
         $attachment_names = false;
         $attachment_downloads = false;
         $attachment_comments = false;
         $attachment_filesize = false;
         $num_of_attachment_ids = false;
      
      }
      
      #Getting the Breadcrumbs
      if($post['forum_id'] > 0){
      
         unset($breadcrumb_ids);
         
         $breadcrumb_ids_sql_ary = array(
            'SELECT'   => 'f.forum_id, f.forum_name',
            'FROM'      => array(
               FORUMS_TABLE      => 'f',
            ),
            'WHERE'    => '(f.left_id <= (SELECT left_id FROM ' . FORUMS_TABLE . ' WHERE forum_id = ' . $post['forum_id'] . ') AND f.right_id >= (SELECT right_id FROM ' . FORUMS_TABLE . ' WHERE forum_id = ' . $post['forum_id'] . '))',
         );
         $bread_crumb_ids_sql   = $db->sql_build_query('SELECT', $breadcrumb_ids_sql_ary);
         $bread_crumb_ids_result = $db->sql_query($bread_crumb_ids_sql);
         while ($row = $db->sql_fetchrow($bread_crumb_ids_result)){
         
               $breadcrumb_ids[$row['forum_name']] = $row['forum_id'];
               
         }
         $db->sql_freeresult($bread_crumb_ids_result);
      
      }else{
      
         $breadcrumb_ids = false;
      
      }
      
      $posts[] = array(
         # FOR POSTS
         'forum_id'            => $post['forum_id'],
         'post_id'            => $post['post_id'],
         'post_time'            => $post['post_time'],
         'post_text'            => $post['post_text'],
            #PARSING
         'bbcode_bitfield'      => $post['bbcode_bitfield'],
         'bbcode_uid'         => $post['bbcode_uid'],
         'enable_bbcode'         => $post['enable_bbcode'],
         'enable_smilies'      => $post['enable_smilies'],
         'enable_magic_url'      => $post['enable_magic_url'],
            #TOPIC DETAILS
         'topic_id'            => $post['topic_id'],
         'topic_title'         => $post['topic_title'],
         'topic_views'         => $post['topic_views'],
         'topic_replies_real'   => $post['topic_replies_real'],
         'topic_status'         => $post['topic_status'],
         'topic_type'            => $post['topic_type'],
         'topic_first_post_id'    => $post['topic_first_post_id'],
         'topic_last_post_time'    => $post['topic_last_post_time'],
         'poll_start'         => $post['poll_start'],
            #ATTACHMENTS
         'allow_attachments'      => $allow_attachments,
         'is_there_attachments'   => $post['post_attachment'],
         'attachments'          => $attachment_urls,
         'attachment_names'       => $attachment_names,
         'attachment_downloads'    => $attachment_downloads,
         'attachment_comments'    => $attachment_comments,
         'attachment_filesize'    => $attachment_filesize,
         'num_of_attachments'    => $num_of_attachment_ids,
            #BREADCRUMBS
         'breadcrumb_ids'       => $breadcrumb_ids,
         
         #FOR USER
         'user_id'            => $post['user_id'],
         'topic_first_poster_name'   => $post['topic_first_poster_name'],
         'user_colour'         => $post['user_colour'],
            #AVATAR
         'allow_avatar'          => $allow_avatar,
         'user_avatar'         => $post['user_avatar'],
         'user_avatar_type'      => $post['user_avatar_type'],
         'user_avatar_width'      => $post['user_avatar_width'],
         'user_avatar_height'   => $post['user_avatar_height'],
            #RANKS
         'allow_ranks'          => $allow_ranks,
         'user_rank_id'          => $post['user_rank'],
         'user_posts'          => $post['user_posts'],
            #SIGNATURES
         'allow_sigs'         => $allow_sigs,
         'user_sig'             => $post['user_sig'],
         'user_sig_bbcode_uid'    => $post['user_sig_bbcode_uid'],
         'user_sig_bbcode_bitfield'    => $post['user_sig_bbcode_bitfield'],
         
         #FOR PAGINATION
         'total_forum_ids'      => $forum_ids,
      );
      
   }
   
   $db->sql_freeresult($result);
   
   // Return it
   return $posts;
   
}

/**
* Retrieve the total number of items for use in pagination
*
* @param Array $total_forum_ids An array holding all the forum ids that were used in get_news function 
* @return Int $num_rows A number of all the rows that matter in all the forum_ids
*/
function get_total_items($total_forum_ids){

   global $db;

   $post_sql_ary = array(
      'SELECT'   => 'COUNT(*) AS num_articles',
      'FROM'      => array(
         POSTS_TABLE      => 'p',
         TOPICS_TABLE   => 't',
      ),
      'WHERE'        => '(' . $db->sql_in_set('t.forum_id', $total_forum_ids) . ' AND p.post_id = t.topic_first_post_id AND t.topic_approved = 1 AND t.topic_status != 2)',
   );
   $sql   = $db->sql_build_query('SELECT', $post_sql_ary);
   $result   = $db->sql_query($sql);
   $num_rows = (int) $db->sql_fetchfield('num_articles', false, $result);
   
   return $num_rows;
   
}

?>