var swiper = new Swiper(".at-how-Itworks_carousel", {
    slidesPerView: 5,
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    }, breakpoints: {
          0: {
          slidesPerView: 1,
          spaceBetween: 20,
          },
          640: {
          slidesPerView: 2,
          spaceBetween: 20,
          },
          768: {
          slidesPerView: 4,
          spaceBetween: 40,
          },
          999: {
          slidesPerView: 5,
          spaceBetween: 50,
          },
      },
  });