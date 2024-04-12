<!DOCTYPE html>
<html>

<head>
    <title>FORUM SECTION</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../templates/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        a:hover,
        a:focus,
        a:hover {
            text-decoration: none;
            color: inherit;
        }

        a:hover,
        .btn {
            outline: none !important;
        }

        .badge {
            font-weight: 600;
            font-size: 13px;
            color: white;
            background-color: #289dcc;
        }

        .linkfeat {
            background: rgba(76, 76, 76, 0);
            background: -moz-linear-gradient(top, rgba(76, 76, 76, 0) 0%, rgba(48, 48, 48, 0) 49%, rgba(19, 19, 19, 1) 100%);
            background: -webkit-linear-gradient(top, rgba(76, 76, 76, 0) 0%, rgba(48, 48, 48, 0) 49%, rgba(19, 19, 19, 1) 100%);
        }
    </style>
</head>

<body>
    <div id="sidebar">
        <h4>Navigation</h4>
        <ul>
            <li><a href="statistics_view.php"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="players.php"><i class="fas fa-users"></i> Players</a></li>
            <li><a href="challenges.php"><i class="fas fa-trophy"></i> Challenges</a></li>
            <li><a href="display_ranks_views.php"><i class="fas fa-home"></i> Rankings</a></li>
            <li><a href="calendar.php"><i class="fas fa-users"></i> Calender</a></li>
            <li><a href="conversations.php"><i class="fas fa-trophy"></i> Forum</a></li>
            <li><a href="create_forum_post_view.php"><i class="fas fa-users"></i>Discuss</a></li>
            <li><a href="players.php"><i class="fas fa-users"></i> Players</a></li>
        </ul>
    </div>
    <div id="container" style="margin-left:22%">
        <h3 class="text-center">FORUM</h3>
        <hr>
        <br>
        <div class="row d-flex justify-content-center">
            <div class="col-sm-15 col-md-8 col-lg-8 py-0 pl-3 pr-1 featcard">
                <div id="featured" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        include '../actions/display_forum_posts.php';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
