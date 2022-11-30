const input = document.querySelectorAll('input[type=password]');

console.log('dziala');

input.forEach((e) => {
  e.style = 'border-bottom-color: red; ';
});
