<form id="postForumPostImageForm" method="post" action="../actions/post_forum_post_image.php" enctype="multipart/form-data">
    <textarea name="postContent" placeholder="Write your post here" required></textarea>
    <input type="file" name="image" accept="image/*" required>
    <button type="submit">Post</button>
</form>
