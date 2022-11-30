const menu = document.querySelector('.menu');
let open = false;
document.querySelector('.mobile-Menu').addEventListener('click', () => {
  if (!open) {
    menu.style = 'display: grid; z-index: 1000000;';
    open = true;
  } else {
    menu.style = 'display: none; z-index: 1000000;';
    open = false;
  }
});
