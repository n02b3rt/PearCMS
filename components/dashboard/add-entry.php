<!-- TODO ogarnąć formularz + walidacja go -->
<?php
$msg = "";
$target = "img/".basename($_FILES['image']['name']);

$db = mysqli_connect('localhost','root','','cms');

$image = $_FILES['image']['name'];
$sql = "INSERT INTO `test`(`test`) VALUES ('$image')";
mysqli_query($db,$sql);

if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
    $msg = "GIT";
}
else {
    $msg = "NIEGIT";
}
?>
<div class="add-entry__container">
    <form action="dashboard.php?add-entries" method="post">
        <span class="caption">Add-entry</span>
        <input type="text" name="title" id=title placeholder="Wpisz tytuł wpisu">
        <div class="side-bar">
            <div class="photo__preview"></div>
             <input class="form-control" type="file" name="image" value="" />
            <!-- <input type="file" name="photo" class="photo" accept=".jpg, .jpeg, .png, .webp"> -->
            <select name="categories" id="categories">
                <option value="Politics">Politics</option>
                <option value="World">World</option>
                <option value="Beer">Beer</option>
            </select>
        </div>
        <textarea name="content" cols="30" rows="10" id="input_content"></textarea>

        <input type="submit" value="wyślij">
    </form>
    <script src="../scripts/javascript/add-entry-img-preview.js"></script>
</div>