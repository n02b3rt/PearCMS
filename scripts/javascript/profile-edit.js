const edit_id = document.querySelectorAll('.edit_id');
const content = document.querySelectorAll('.article__content');
const profil = document.querySelector('.article__login').textContent;
// console.log(content);
let content_value = new Array();
content.forEach((e) => {
  content_value.push(e.textContent);
});

console.log(content);
// console.log(profil);

const edit = (id, nr_z_kolei) => {
  console.log(id, content[nr_z_kolei]);
  text = '';
  if (
    content[nr_z_kolei].textContent.substring(
      content[nr_z_kolei].textContent.length - 16
    ) == 'Zobacz więcej...'
  ) {
    text = content[nr_z_kolei].textContent.substring(
      0,
      content[nr_z_kolei].textContent.length - 16
    );
  } else text = content[nr_z_kolei].textContent;

  content[
    nr_z_kolei
  ].innerHTML = `<form action="scripts/php/edit.php" method="get" class='edit__form'>
  <input type="hidden" name="postid" value="${id}">
  <input type="hidden" name="profil" value="${profil}">
  <textarea name='content' class='edit__textarea'>${text}</textarea>
      <input type="submit" value="zapisz">
  </form>`;
};
