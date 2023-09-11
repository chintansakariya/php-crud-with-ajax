<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
</head>

<body>

<?php

require_once "db/db.php"; 
?>
    <div class="header">
        <h1 class="text-center mt-3 blog">MY BLOG</h1>
        <h3 class="text-center blog">Welcome to the blog of <span class="bg-dark text-white p-1">Chintan</span></h3>
    </div>
    <div class="container">
        <div class="row">

            <div class="col-md-7">
            

            <?php
            $fetch = "";
            if(isset($_GET['tag_id']))
            {
                $tag_id = $_GET['tag_id'];
                $fetch = "SELECT * FROM `crud` WHERE `tag_id` = $tag_id";
            }
            else{
                $fetch = "SELECT * FROM `crud` LIMIT 5";
            }
                    $fetch = $con->query($fetch);

                    while($row = $fetch->fetch_assoc())
                    {
                        ?>
                        <div class="card mt-4 shadow-sm bg-white">
                    <img src="<?php echo 'admin/upload/'.$row['image']; ?>" alt="" class="card-img-top img1 rounded-0">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $row['heading']; ?></h3>
                        <h4 class="card-title"><?php echo $row['sub_heading']; ?>, 
                        
                        <span class="text-secondary">
                        <?php 
                        $date = $row['created_at'];
                        $date = strtotime($date); 
                        $date = date("M d, Y", $date); 
                        echo $date;
                        ?>
                        </span>
                        </h4>
                        <p class="card-text"><?php echo $row['description'];?></p>
                        <div class="row">
                            <div class="col-6">

                                <!-- <button type="submit" class="readmore">READ MORE>></button> -->
                                <a href="post.php?id=<?php echo $row["id"];?>"class="readmore">READ MORE>></a>
                            </div>
                            <div class="col-6">
                                <p class="p1">Comments<span class="bg-dark text-white m-1 p-1">0</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                   <?php
                    }
            ?>
            </div>
            <div class="col-md-5 ">

                <div class="card mt-4 shadow-sm bg-white rounded-0">
                    <img src="assets/photos/nature.jpg" alt="" class="card-img-top img1 rounded-0">
                    <div class="card-body">
                        <h3 class="card-title">My Name</h3>
                        <p class="card-text">A paragraph is a section of text that pertains to a single theme and is designated by an indent or a line break.</p>
                    </div>
                </div>
                <div class="card mt-4">
                    <h4 class="card-title p-2 li1">Popular Posts</h4>
                    <div class="card-body p-2">

                    <?php
                    $fetch = "SELECT * FROM `crud` ORDER BY `id` DESC LIMIT 5";
                    $fetch = $con->query($fetch);
                    while($row = $fetch->fetch_assoc())
                    {
                        ?>
                        <a  class="popular-post" href="post.php?id=<?php echo $row["id"];?>" >
                        <div class=" d-flex flex-wrap border-bottom ">
                        <img src="<?php echo 'admin/upload/'.$row['image']; ?>" alt="" class="smallimage left pt-1">

                        <!-- <p class="right h6">Lorem<br><small>send mathis</small></p> -->
                        <p class="right h6"><?php echo $row['heading'].'<br><small>'.$row['sub_heading'].'</small>' ?></p>
                    </div></a>
                   <?php
                    }
                           
                    ?>
                       
                    </div>
                </div>
                <div class="card mt-4 shadow-sm bg-white rounded">
                    <h4 class="card-title p-2 li1">Tags</h4>

                    <div class="card-body">
                        <ul class="list-group list-group-horizontal list-unstyled d-flex flex-wrap">
                            <!-- <li class="list-item m-1 p-1 li1">Travelling</li> -->
                           </a>
                           <?php
                            $fetch = "SELECT * FROM `tags`";
                            $fetch = $con->query($fetch);
                            while($row = $fetch->fetch_assoc())
                            {?>
                            <a href="index.php?tag_id=<?php echo $row["tag_id"];?>" class="text-decoration-none text-dark">
                            <li class='list-item m-1 p-1 li1'><?php echo $row['name'];?> </li>
                            </a>
                           <?php
                            }
                            ?>
                            
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <footer class="footer font-small bg-secondary text-white p-2 mt-5">
        <div>
            <button type="submit" class="m-2 text-secondary btn-outline-dark btn1">Previous</button>
            <button type="submit" class="text-white bg-dark btn-outline-dark btn1">Next>></button>
        </div>
        <div class="m-2">
            <p>Powered By <a href="" class="text-white">W3.css</a></p>
        </div>
    </footer>
</body>

</html>