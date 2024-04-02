<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Responsive Site</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <div class="logo">Logo</div>
    <div class="nav-right">
        <input type="search" id="searchBar" placeholder="Search...">
        <button id="menuToggle"><i class="fas fa-bars"></i></button>
        <i class="fas fa-bell" style="margin-right: 15px;" ></i>
        <i class="fas fa-user"></i>
    </div>
</header>

<aside id="sidebar">
    <nav>
        <a href="#" id="home" style="color: black;"><i class="fas fa-home"></i>&nbsp; Home</a>
        <a href="#"><i class="fas fa-compass"></i>&nbsp; Explore</a>
        <a href="#"><i class="fas fa-book"></i>&nbsp; Library</a>
        <a href="#"><i class="fas fa-history"></i>&nbsp; History</a>
    </nav>
</aside>

<main>
    <section class="categories">
        <button class="category-btn active" data-category="all">All</button>
        <button class="category-btn" data-category="gaming">Gaming</button>
        <button class="category-btn" data-category="music">Music</button>
        <button class="category-btn" data-category="tech">Tech</button>
    </section>
    <div class="video-container">    

        <?php

            $json = file_get_contents('https://ypapi.formz.in/api/public/videos');
            $data = json_decode($json, true);

           
            foreach ($data as $video) 
            {
                $title = $video['title'];
                $thumbnail = $video['thumbnail'];
                $channelPicture = $video['channelPicture'];
                $channelName = $video['channelName'];
                $category = $video['category'];
                $duration = $video['duration'];
                $views = $video['views'];
                $uploadedDateTime = $video['uploadedDateTime'];

                
                $views = number_format(intval(str_replace(',', '', $views)));

                
                $uploadedDateTime = date('M j, Y', strtotime($uploadedDateTime));

                
                echo '<div class="video" data-category="' . $category . '">';
                echo '<div class="thumbnail">';
                echo '<img src="' . $thumbnail . '" style="border-radius: 2vmin;" width="300px" alt="Thumbnail">';
                echo '<span class="duration">' . $duration . '</span>';
                echo '</div>';
                echo '<div class="title">' . $title . '</div>';
                echo '<div class="video-info">';
                echo '<br>';
                echo '<img src="' . $channelPicture . '" alt="Channel">';
                echo '<div>';
                echo '<div class="channel-name">' . $channelName . '</div>';
                echo '<div class="views">' . $views . ' views</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        ?>
        
    </div>
</main>

<script src="script.js"></script>
</body>
</html>
