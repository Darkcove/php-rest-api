<?php 

// headers
header('Access-Control-Allow-Origins');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Posts.php';

// instantiate n connect
$database = new Database();
$db = $database->connect();

// instantiate blog post
$post = new Post($db);

// query
$result = $post->read();

// row count
$num = $result->rowCount();

// check for posts
if($num > 0) {
    // init array
    $posts_arr = array();
    $posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $post_item = array(
            'id' => $id,
            'title' => $title,
            'body' => html_entity_decode($body),
            'author' => $author,
            'category_id' => $category_id,
            'category_name' => $catagory_name
        );
        // push to data
        array_push($posts_arr['data'], $post_item);
    }
    // turn to json
    echo json_encode($posts_arr);


} else {
    echo json_encode(
        array('message' => 'no posts found')
    );
}
