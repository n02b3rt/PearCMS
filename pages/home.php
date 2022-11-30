<?php include 'scripts/php/data_base_con.php'; ?>
<!-- content -->
<!-- <main class="home">
    <?php  include 'components/home/header.php'?> 
    <?php include 'components/home/posts.php'?> 

</main>-->
<?php 
    if(isset($_SESSION['login']) && isset($_SESSION['password']) && isset($_SESSION['permission']) && isset($_SESSION['id'])){
        include 'components/home/add-post.php';
    }
    
    ?>
<div class="aticles">

    <?php include 'scripts/php/home_show_entries.php'?>
</div>