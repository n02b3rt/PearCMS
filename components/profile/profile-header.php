<div class="profile__home">
    <?php  include 'components/home/header.php'; ?>
    <div class="profile__user">
        <svg class='add-post__profil__photo'>
            <use xlink:href='img/icons/profile.svg#icon-user'>
        </svg>
        <div class="profile__user__wapper">
            <span class="profile__user__name"><?php echo $row['nick']?></span>
            <span class="profile__user__login"><?php echo $row['login']?></span>
        </div>
        <?php
            if(isset($_SESSION['login']) && $_GET['profil'] == $_SESSION['login']){
                echo "<button class='btn-profile edit-js'>edit profile</button>";
            }
        ?>

    </div>
</div>