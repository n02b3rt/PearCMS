const content_shortening = () => {
  const tab_text = document.querySelectorAll('.article__content');

  console.table(tab_text);
  const dlugosc = 100;

  tab_text.forEach((e) => {
    if (e.textContent.length > dlugosc) {
      console.log(e.textContent.length);
      const full_text = e.textContent;
      const short_text = full_text.slice(0, dlugosc);
      e.textContent = short_text;
      e.insertAdjacentHTML(
        'beforeend',
        `<button class="show_more">Zobacz więcej...</button>`
      );

      tab_btn = e.querySelector('.show_more');
      tab_btn.addEventListener('click', (el) => {
        // console.log(element);
        e.innerHTML = full_text;
      });
    }
  });
};

content_shortening();
