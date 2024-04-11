<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chess Club</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../templates/styles.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Create Forum</h1>
        <form method="post" action="../actions/post_forum_post.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="image">Upload Image:</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
            </div>
            <div class="form-group">
                <label for="caption">Caption:</label>
                <textarea class="form-control" id="caption" name="caption" rows="4" placeholder="Enter your caption..."></textarea>
            </div>
            <button type="submit" name="submit_post" class="btn btn-primary">Submit Post</button>
        </form>
    </div>



</body>
</html>
