const nick = document.querySelector('.profile__user__name');
const login = document.querySelector('.profile__user__login').textContent;

document.querySelector('.edit-js').addEventListener('click', (e) => {
  nick.innerHTML = `<form action="scripts/php/change-nick.php" method="post">
  <input type="hidden" name="login" value="${login}">
  <input type="text" name="change__nick" placeholder="Wpisz nick">
  <input type="submit" value="zapisz">
  </form>`;
});
