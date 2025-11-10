function Accordion() {
  const items = document.querySelectorAll(".accordion-item");

  items.forEach(item => {
    const header = item.querySelector(".accordion-header");

    header.addEventListener("click", () => {
      const openItem = document.querySelector(".accordion-item.active");

      if (openItem && openItem !== item) {
        openItem.classList.remove("active");
      }

      item.classList.toggle("active");
    });
  });
}

export default Accordion;
