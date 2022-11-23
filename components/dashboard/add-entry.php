<!-- TODO ogarnąć formularz + walidacja go -->
<div class="add-entry__container">
    <form action="#" method="post">
        <span class="caption">Add-entry</span>
        <input type="text" name="title" id=title placeholder="Wpisz tytuł wpisu">
        <div class="side-bar">
            <div class="photo__preview"></div>
            <input type="file" name="photo" class="photo" accept=".jpg, .jpeg, .png, .webp">
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