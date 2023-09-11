<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
</head>
<body>
<?php
require_once "db/db.php"; 
?>
<div class="container">
<h1 class="text-center mt-3">MY BLOG</h1>
    <ul class=" nav bg-dark justify-content-center">
        <li class="nav-item-item text-white li2">Home</li>
        <li class="nav-item text-white li2">Blog</li>
        <li class="nav-item text-white li2">Contact</li>
        <li class="nav-group-item text-white li2">About</li>
    </ul>
<div class="row">         
<div class="col-md-7">

<?php 

if(!empty($_GET['id']))
{
    $id = $_GET['id'];
    $fetch = "SELECT * FROM `crud` WHERE `id` = $id";
    $fetch = $con->query($fetch);

    $fetch = $fetch->fetch_assoc();
?>
<div class="card mt-4 shadow-sm bg-white rounded-0">
                    <h3 class="text-center p-2"><?php echo $fetch['heading']; ?></h3>
                    <img src="admin/upload/<?php echo $fetch['image'];?>" alt="" class="card-img-top img1 rounded-0">
            <div class="card-body">
                <p class="card-text"><?php echo  $fetch['description']; ?></p>
                                <!-- <p class="card-text">A paragraph is a section of text that pertains to a single theme and is designated by an indent or a line break.
                                Paragraphs are at least one sentence long and are usually one part of a larger whole.</p>
                                <p class="card-text">A paragraph is a section of text that pertains to a single theme and is designated by an indent or a line break.
                                Paragraphs are at least one sentence long and are usually one part of a larger whole.
                                </p>
                                <p class="card-text">A paragraph is a section of text that pertains to a single theme and is designated by an indent or a line break.
                                Paragraphs are at least one sentence long and are usually one part of a larger whole.
                                </p>
                                <p class="card-text">A paragraph is a section of text that pertains to a single theme and is designated by an indent or a line break.
                                Paragraphs are at least one sentence long and are usually one part of a larger whole.
                                </p> -->

                    <div class="row">
                      <div class="col-sm-6"></div>
                      <div class="col-sm-6"><p class="p1 m-4">Comments<span class="bg-dark text-white m-1 p-1">0</span></p></div>                    
                    </div>
            </div>   
        </div>
   

<?php
}


?>
   
        

        <div class="card mt-4 shadow-sm rounded-0 justify-content-center text-center">
                  <form action="" method="post" class="form">
                    <h3>Contact Form</h3>
                    <input type="text" class="w-75 mt-2" placeholder="First Name">
                    <input type="text" class="w-75 mt-2" placeholder="Last Name">
                    <input type="email" class="w-75 mt-2" placeholder="Email">
                    <textarea name="" id="" cols="30" rows="5" placeholder="Message" class="w-75 mt-2"></textarea><br>
                    <button type="submit" class=" btn-default submit mb-2">Submit</button>
                  </form>
        </div>
    </div>

    <div class="col-md-5">
        <div class="card mt-4 shadow-sm rounded-0">
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
                    $fetchp = "SELECT * FROM `crud` ORDER BY `id` DESC LIMIT 5";
                    $fetchp = $con->query($fetchp);
                    while($row = $fetchp->fetch_assoc())
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
<div class="footer  bg-secondary font-small text-white p-2 pb-5 mt-5">
           <button type="submit" class="btn-outline-dark text-secondary p-1 mt-2 btn1">Previous</button>
           <button type="submit" class="bg-dark btn-outline-dark text-white p-1 mt-2 btn1">Next>></button>
        </div>
</div>
       
</body>
</html>


