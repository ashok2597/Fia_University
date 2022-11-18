import { presentVideoPlayer } from "../helpers/video-player";
import { shuffleInPlace } from "../helpers/random";

export const HomeController = {
  init() {
    this.initSliders();
    this.initVideoSlideWatchers();
    // this.animateExpertsWall();
  },
  // playVideo: link => e => {
  //   e.preventDefault();
  //   presentVideoPlayer(link);
  // },
  
  initVideoSlideWatchers() {
    const els = document.querySelectorAll('[data-video-link]');
    Array.from(els).forEach(el => {
      const link = el.getAttribute('data-video-link');
      if (link) {
        el.addEventListener('click', this.playVideo(link));
      }
    })
  },

  // animateExpertsWall() {
  //   const list = document.querySelector('.section-experts-list');
  //   const experts = shuffleInPlace([...list.childNodes]);
  //   const clone = document.createElement('ul');
  //   clone.classList.add('section-experts-list');
  //   experts.forEach(e => {
  //     clone.append(e.cloneNode(true));
  //   })
  //   const wall = document.querySelector('.section-experts-wall');
  //   wall.append(clone);
  //   wall.classList.add('animate');
  // },
  initSliders() {
    if (document.getElementById('section-main-slider')) {
      new Swiper('#section-main-slider', {
        loop: true,
        spaceBetween: 10,
        speed: 618,
        autoplay: {
          delay: 15000,
        },
        pagination: {
          el: '.swiper-pagination',
        },
      });
    }
  },
}