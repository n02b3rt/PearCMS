const content_shortening = () => {
  const tab_text = document.querySelectorAll(".article__contnet");

  tab_text.forEach((e) => {
    const full_text = e.textContent;
    const short_text = full_text.slice(0, 150);
    e.textContent = short_text;
    e.insertAdjacentHTML(
      "beforeend",
      `<button class="show_more">Zobacz więcej...</button>`
    );

    tab_btn = e.querySelector(".show_more");
    tab_btn.addEventListener("click", (el) => {
      // console.log(element);
      e.innerHTML = full_text;
    });
  });
};

content_shortening();
