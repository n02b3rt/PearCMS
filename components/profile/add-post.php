<?php
    if($_SESSION['permission'] == 'admin')
    $style = 'background-color:lightblue;'
?>
<div class="wrapper-post">
    <form action="scripts/php/profil_add-post.php?profil=<?php echo $_GET['profil'] ?>" method="post" class="add-post">
        <div class="add-post__profil">
            <svg class="add-post__profil__photo" style="<?php echo $style?>">
                <use xlink:href="img/icons/profile.svg#icon-user">
            </svg>
            <span class="add-post__profil__name">
                <?php echo $_SESSION['login']?>
            </span>
        </div>
        <div class="add-post__grow-wrap">
            <textarea name="content" id="text" onInput="this.parentNode.dataset.replicatedValue = this.value"
                placeholder="Napisz co u ciebie?"></textarea>
        </div>
        <div class="add-post__bottom-bar">
            <!-- value="uncategorized"  -->
            <input type="text" name="category" placeholder="Wpisz #tag" class="add-post__category">
            <input type="submit" value="Post">
        </div>
    </form>
</div>