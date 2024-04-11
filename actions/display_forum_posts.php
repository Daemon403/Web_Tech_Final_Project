<?php
// Establish database connection
include '../settings/connection.php';


// Handle post likes/upvotes
if (isset($_POST['upvote_post'])) {
    $post_id = $_POST['post_id'];
    handlePostUpvote($post_id);
}

// Add comments to forum posts
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_comment'])) {
    $post_id = $_POST['post_id'];
    $comment_text = mysqli_real_escape_string($conn, $_POST['comment_text']);
    addComment($post_id, $comment_text);
}

// Handle comment replies
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_reply'])) {
    $comment_id = $_POST['comment_id'];
    $reply_text = mysqli_real_escape_string($conn, $_POST['reply_text']);
    addReply($comment_id, $reply_text);
}

// Retrieve and display forum posts
function displayForumPosts() {
    global $conn;
    $query = "SELECT p.post_id, p.author_id, p.post_content, p.image, u.username 
          FROM Forum_Posts p
          JOIN Users u ON p.author_id = u.pid
          ORDER BY p.created_at DESC"; 

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="card mb-3" style="background-color: #343a40;">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title text-light">Author: ' . $row['username'] . '</h5>';
            
            if (!empty($row['image']) && file_exists($row['image'])) {
                echo '<img src="' . $row['image'] . '" class="card-img-top img-fluid" alt="Post Image" style="width: 100%; height: 100px;">';
            } else {

                echo '<img src="../uploads/placeholder.png" class="card-img-top img-fluid" alt="Placeholder Image" style="width: 100%; height: 100px;">';
            }
            echo '<p class="card-text text-light">' . $row['post_content'] . '</p>';
            echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
            echo '<input type="hidden" name="post_id" value="' . $row['post_id'] . '">';
            echo '<button type="submit" name="upvote_post" class="btn btn-primary">Upvote</button>';
            echo '</form>';
            echo '</div>';

            displayComments($row['post_id']);

            echo '<div class="card-footer">';
            echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
            echo '<input type="hidden" name="post_id" value="' . $row['post_id'] . '">';
            echo '<textarea class="form-control mb-2" name="comment_text" placeholder="Add a comment"></textarea>';
            echo '<button type="submit" name="submit_comment" class="btn btn-success">Post Comment</button>';
            echo '</form>';
            echo '</div>'; 
            echo '</div>'; 
        }
    } 
}
function displayComments($post_id) {
    global $conn;

    $query = "SELECT c.comment_id, c.comment_text, u.username 
              FROM Forum_Comments c
              JOIN Users u ON c.commenter_id = u.pid
              WHERE c.post_id = $post_id
              ORDER BY c.created_at DESC"; 

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>";
            echo "<p>Comment by: " . $row['username'] . "</p>";
            echo "<p>" . $row['comment_text'] . "</p>";

            echo "<form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
            echo "<input type='hidden' name='comment_id' value='" . $row['comment_id'] . "'>";
            echo "<textarea name='reply_text' placeholder='Add a reply'></textarea>";
            echo "<button type='submit' name='submit_reply'>Reply</button>";
            echo "</form>";

            displayReplies($row['comment_id']);

            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "No comments found.";
    }
}

function displayReplies($comment_id) {
    global $conn;

    $query = "SELECT r.reply_id, r.reply_text, u.username 
              FROM Comment_Replies r
              JOIN Users u ON r.replier_id = u.pid
              WHERE r.comment_id = $comment_id
              ORDER BY r.created_at DESC"; 

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>";
            echo "<p>Reply by: " . $row['username'] . "</p>";
            echo "<p>" . $row['reply_text'] . "</p>";
            echo "</li>";
        }
        echo "</ul>";
    } 
}


function handlePostUpvote($post_id) {
    global $conn;

    $update_query = "UPDATE Forum_Posts SET upvotes = upvotes + 1 WHERE post_id = $post_id";
    mysqli_query($conn, $update_query);
}

function addComment($post_id, $comment_text) {
    global $conn;

    
    //$commenter_id = $_SESSION['user_id'];
    $commenter_id =1;

    $insert_query = "INSERT INTO Forum_Comments (post_id, commenter_id, comment_text) VALUES ('$post_id', '$commenter_id', '$comment_text')";
    mysqli_query($conn, $insert_query);
}

function addReply($comment_id, $reply_text) {
    global $conn;

    //$replier_id = $_SESSION['user_id'];
    $replier_id =1;

    
    $insert_query = "INSERT INTO Comment_Replies (comment_id, replier_id, reply_text) VALUES ('$comment_id', '$replier_id', '$reply_text')";
    mysqli_query($conn, $insert_query);
}

displayForumPosts();
?>