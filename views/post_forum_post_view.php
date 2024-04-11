<form id="postForumPostForm" method="post" action="../actions/post_forum_post.php">
    <textarea name="postContent" placeholder="Write your post here" required></textarea>
    <button type="submit">Post</button>
</form>

<form method="post" action="../actions/vote_forum_post.php">
    <input type="hidden" name="postId" value="<?php echo $postId; ?>">
    <button type="submit" name="vote" value="upvote">Upvote</button>
    <button type="submit" name="vote" value="downvote">Downvote</button>
</form>
