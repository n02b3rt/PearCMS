<div class="posts">
    <?php 
//    
    if((!isset($_GET['profil']) && isset($_SESSION['login'])) || (isset($_SESSION['login']) && $_SESSION['login']==$_GET['profil'])){
        include 'components/profile/add-post.php';
    }
    ?>
    <?php include 'scripts/php/profil_show_entries.php' ?>
</div>