<?php
function fervor_is_latest_post( $post_id, $query_args = array() ){
    static $latest_post_id = false;
    $post_id = empty( $post_id  ) ? get_the_ID() : $post_id ;

    if( !$latest_post_id ){
        $query_args['numberposts'] = 1;
        $query_args['post_status'] = 'publish';
        $last = wp_get_recent_posts( $query_args );
        $latest_post_id = $last['0']['ID'];
    }

    return $latest_post_id == $post_id;
}