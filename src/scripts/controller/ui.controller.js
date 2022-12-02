import { ResizeObserver as Polyfill } from '@juggle/resize-observer';
import scrollToElement from "scroll-to-element";
import Swiper from "swiper";
import tick from "../helpers/async";
import { setCSSCustomProperty } from "../helpers/css";
import wait from '../helpers/wait';
const ResizeObserver = window.ResizeObserver || Polyfill;

const isPage = slug => document.body.classList.contains(slug);

export const UIController = {
  init() {
    return new Promise((resolve, reject) => {
      try {
        this.initMeasurementCheckers();
        this.recordNavBarHeight();

        // this.initNavSearchFormControl();
        // this.initContentTabs();
        // this.initLazyVideos();
        // this.initAnchorLinksScroller();

          // this.initPopups();
        // this.checkStoredHash();

        this.initBrochureSlider();

        this.initFAQTriggers();
        // this.initAccordionTriggers();

        //this.initBannerSlider();
        if (isPage('home')) {
          this.initGallerySlider();
        }

        // if (isPage('single') || isPage('page-template-page')) {
        //   this.initPostGridSwiper();
        // }

        // if (isPage('archive-team')) {
          this.initAccreditationsSlider()
        // }

        resolve();
      } catch (error) {
        reject(error);
      }
    })
  },
  recordWpAdminBarHeight() {
    const el = document.getElementById('wpadminbar');
    const height = el ? el.clientHeight : 0;
    setCSSCustomProperty('--wp-admin-bar-height', height + 'px');
    return height;
  },
  recordNavBarHeight() {
    // const el = document.querySelector('.nav');
    const el = document.querySelector('.site-nav');
    // const el = document.querySelector('.section-nav');
    const height = el ? el.clientHeight : 0;
    setCSSCustomProperty('--nav-height', height + 'px');
    return height;
  },
  // recordNavSearchBarHeight() {
  //   const el = document.querySelector('.search-form-wrapper');
  //   const height = el ? el.clientHeight : 0;
  //   setCSSCustomProperty('--nav-search-form-height', height + 'px');
  //   return height;
  // },
  // recordContentTabsHeight() {
  //   const el = document.querySelector('.section-content-tabs');
  //   const height = el ? el.clientHeight : 0;
  //   setCSSCustomProperty('--content-tabs-height', height + 'px');
  //   return height;
  // },
  initMeasurementCheckers() {
    const handleWindowLoad = () => {
      this.recordWpAdminBarHeight();
      this.recordNavBarHeight();
      // this.recordNavSearchBarHeight();
    }
    const handleWindowResize = () => {
      this.recordWpAdminBarHeight();
      this.recordNavBarHeight();
      // this.recordNavSearchBarHeight();
    }
    // const handleScroll = () => {

    // }
    window.addEventListener('load', handleWindowLoad);
    // window.addEventListener('scroll', handleWindowLoad);
    window.addEventListener('resize', handleWindowResize);
  },
  // initAnchorLinksScroller() {
  //   const els = document.querySelectorAll('.section-nav a[href*="#"], .view-main a[href*="#"]');
  //   const handler = e => {
  //     try {
  //       const { target } = e;
  //       const href = target.getAttribute('href');
  //       const match = href.match(/([^#]*)#(.*)/);
  //       if (!match) return;
  //       const pathname = match[1];
  //       // console.log(match, pathname, window.location.pathname, pathname !== window.location.pathname);
  //       if (!!pathname && pathname !== window.location.pathname) return;
  //       // do not do anything if the thing links to a different page
  //       const id = match[2];
  //       if (!id) return;
  //       // only prevent default if an id is found
  //       e.preventDefault();
  //       this.scrollToId(id); 
  //     } catch(e) {
  //       console.error(e);
  //       return;
  //     }
  //   };
  //   Array.from(els).forEach(el => {
  //     el.addEventListener('click', handler);
  //   })
  // },
  // async checkStoredHash() {
  //   if (window.ID_HASH) {
  //     await wait(500);
  //     this.scrollToId(window.ID_HASH);
  //     await wait(618);
  //     window.location.hash = window.ID_HASH;
  //   }
  // },
  // scrollToId(id) {
  //   if (!id) this.scrollToTop();
  //   else {
  //     const offset = -1 * (
  //       this.recordWpAdminBarHeight() + 
  //       this.recordNavBarHeight() +
  //       // this.recordContentTabsHeight()
  //     );
  //     scrollToElement('#' + id, { offset, ease: 'inOutCube', duration: 618 });
  //   }
  // },
  scrollToTop() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth',
    });
  },
  getSiteTitle() {
    return document.body.getAttribute('data-site-title');
  },
  getPageTitle() {
    const titleEl = document.querySelector('.page-header__title') || document.querySelector('h1') || document.querySelector('title');
    const title = titleEl && titleEl.innerText;
    return title || '';
  },
  // initContentTabs() {
  //   const el = document.querySelector('.section-content-tabs');
  //   if (!el) return;
  //   const makeTab = (title, url, active) => `<li><a class="content-tab${active && ' active'}" href="${url}" title="${title}">${title}</a></li>`
  //   const tabSourceEls = Array.from(document.querySelectorAll('[data-content-tab-id]'));
  //   tabSourceEls.forEach(el => el.setAttribute('id', el.getAttribute('data-content-tab-id')))
  //   const tabs = tabSourceEls.map(el => makeTab(
  //     el.getAttribute('data-content-tab-title'),
  //     '#' + el.getAttribute('data-content-tab-id'),
  //   ));
  //   const pageTitle = this.getPageTitle();
  //   const hasHashOnLoad = !!window.location.hash;
  //   tabs.unshift(makeTab(pageTitle, '#', !hasHashOnLoad));
  //   el.querySelector('ul').innerHTML = tabs.join('');
  //   const anchors = Array.from(el.querySelectorAll('a'));
  //   const setActive = e => {
  //     anchors.forEach(a => a.classList.remove('active'));
  //     const { target } = e;
  //     target.classList.add('active');
  //   }
  //   anchors.forEach(a => a.addEventListener('click', setActive));
  // },
  initPostGridSwiper() {

    const grid = document.querySelector('.post-grid');
    if (!grid) return;
    const postItems = grid.querySelectorAll('.post-item');

    const container = document.createElement('div');
    container.classList.add('post-grid-swiper');
    container.classList.add('swiper-container');

    const wrapper = document.createElement('div');
    wrapper.classList.add('swiper-wrapper');

    const slides = Array.from(postItems).map(postItem => {
      const slideContainer = document.createElement('div');
      slideContainer.classList.add('swiper-slide');
      slideContainer.append(postItem);
      return slideContainer;
    });

    wrapper.append(...slides);
    container.append(wrapper);
    grid.replaceWith(container);

    // new Swiper(container, {
    //   slidesPerView: 1.5,
    //   centeredSlides: true,
    //   loop: true,
    //   slideToClickedSlide: true,
    //   autoplay: {
    //     delay: 4000,
    //   },
    //   // breakpoints: {
    //   //   768: {
    //   //     slidesPerView: 3,
    //   //   }
    //   // }
    // });

  },
  detectRatio(el) {
    if (!el) return;
    const w = el.clientWidth;
    const h = el.clientHeight;
    const ratio = w / h;
    const orientation = ratio >= 1 ? 'landscape' : 'portrait';
    el.setAttribute('data-element-width', w + 'px');
    el.setAttribute('data-element-height', h + 'px');
    el.setAttribute('data-element-ratio', ratio);
    el.setAttribute('data-element-orientation', orientation);
    setCSSCustomProperty('--element-width', w + 'px', el);
    setCSSCustomProperty('--element-height', h + 'px', el);
    setCSSCustomProperty('--element-ratio', ratio, el);
    setCSSCustomProperty('--element-orientation', orientation, el);
  },
  // initLazyVideos() {

  //   var lazyVideos = [].slice.call(document.querySelectorAll("video.lazy"));

  //   if ("IntersectionObserver" in window) {
  //     var lazyVideoObserver = new IntersectionObserver(function (entries, observer) {
  //       entries.forEach(video => {
  //         if (video.isIntersecting) {
  //           for (var source in video.target.children) {
  //             var videoSource = video.target.children[source];
  //             if (typeof videoSource.tagName === "string" && videoSource.tagName === "SOURCE") {
  //               videoSource.src = videoSource.dataset.src;
  //             }
  //           }

  //           video.target.load();
  //           video.target.classList.remove("lazy");
  //           lazyVideoObserver.unobserve(video.target);
  //         }
  //       });
  //     });

  //     lazyVideos.forEach(function (lazyVideo) {
  //       lazyVideoObserver.observe(lazyVideo);
  //     });
  //   }

  //   this.initRatioWatcher();
  //   this.initVideoCoverer();

  // },
  initRatioWatcher() {
    const els = document.querySelectorAll('[data-watch-ratio]');
    Array.from(els).forEach(el => {
      const handler = () => this.detectRatio(el);
      window.addEventListener('load', handler);
      window.addEventListener('resize', handler);
    });
  },
  initVideoCoverer() {
    const handler = () => {
      const videoSlides = document.querySelectorAll('.section-hero-banner');
      Array.from(videoSlides).forEach(slide => {
        const video = slide.querySelector('video');
        const checkVideoRatio = () => {
          const videoWidth = video.videoWidth;
          const videoHeight = video.videoHeight;
          const videoRatio = videoWidth / videoHeight;
          const containerWidth = slide.clientWidth;
          const containerHeight = slide.clientHeight;
          const containerRatio = containerWidth / containerHeight;
          if (videoRatio >= containerRatio) {
            // video is wider or square; 100% height and auto width.
            video.setAttribute('data-fill-mode', 'fill-height');
          } else {
            video.setAttribute('data-fill-mode', 'fill-width');
          }
        };
        checkVideoRatio();
      })
    }
    window.addEventListener('load', handler);
    window.addEventListener('resize', handler);
  },
  // closeAllPopups() {
  //   const popupWrappers = Array.from(document.getElementsByClassName('popup-wrapper'));
  //   popupWrappers.forEach(popup => popup.classList.remove('open'));
  // },
  // initPopups() {
  //   try {
  //     const popupWrappers = Array.from(document.getElementsByClassName('popup-wrapper'));
  //     popupWrappers.forEach(wrapper => {
  
  //       const backdrop = document.createElement('span');
  //       backdrop.classList.add('popup-backdrop');
  //       backdrop.setAttribute('data-toggle-popup', '');
  //       wrapper.prepend(backdrop);
  
  //       const popup = wrapper.querySelector('.popup');
  
  //       const closeButton = document.createElement('button');
  //       closeButton.classList.add('popup-close-button');
  //       closeButton.setAttribute('data-toggle-popup', '');
  //       closeButton.innerHTML = `<svg width="16" height="16" viewBox="0 0 16 16"><use xlink:href="#icon-close"></use></svg>`;
  
  //       popup.append(closeButton);
        
  //     });
  //   } catch(e) {
  //     console.error(e);
  //   } finally {
  //     this.initPopupToggles();
  //   }
  // },
  // initPopupToggles() {
  //   const toggles = Array.from(document.querySelectorAll('[data-toggle-popup]'));
  //   const handler = event => {
  //     if (!event) return;
  //     event.preventDefault();
  //     const { target } = event;
  //     const popupId = target.getAttribute('data-toggle-popup');
  //     if (!popupId) {
  //       this.closeAllPopups();
  //       return;
  //     }
  //     const popupWrapper = document.getElementById(popupId);
  //     if (!popupWrapper) return;
  //     if (popupWrapper.classList.contains('open')) {
  //       popupWrapper.classList.remove('open');
  //     } else {
  //       popupWrapper.classList.add('open');
  //     }
  //   }
  //   toggles.forEach(toggle => {
  //     toggle.addEventListener('click', handler);
  //   })
  // },

  initBannerSlider() {
    new Swiper('.banner-slider', {
      // Optional parameters
      // direction: 'vertical',
      // modules: [EffectFade],
      speed: 650,
      effect: 'fade',
      fadeEffect: {
        crossFade: true
      },
      loop: true,
      autoplay: {
        // delay: 5000,
        delay: 2500,
        disableOnInteraction: false,
      },
    
      // If we need pagination
      // pagination: {
      //   el: '.swiper-pagination',
      // },
    
      // Navigation arrows
      // navigation: {
      //   nextEl: '.swiper-button-next',
      //   prevEl: '.swiper-button-prev',
      // },
    
      // And if we need scrollbar
      // scrollbar: {
      //   el: '.swiper-scrollbar',
      // },
    });
  },
  initGallerySlider() {
    new Swiper('.gallery-slider', {
      // Optional parameters
      // direction: 'vertical',
      loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      slidesPerView: 2,
      spaceBetween: 8,
      // effect: "fade",
    
      // If we need pagination
      pagination: {
        el: '.swiper-pagination',
        clickable: true
      },
    
      // Navigation arrows
      // navigation: {
      //   nextEl: '.swiper-button-next',
      //   prevEl: '.swiper-button-prev',
      // },
    
      // And if we need scrollbar
      // scrollbar: {
      //   el: '.swiper-scrollbar',
      // },
    });
  },

  initAccreditationsSlider() {
    new Swiper('.accreditations-slider', {
      // Optional parameters
      // direction: 'vertical',
      loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      slidesPerView: 6,
      // spaceBetween: 48,
      spaceBetween: 96,
      // effect: "fade",
    
      // If we need pagination
      pagination: {
        el: '.swiper-pagination',
        clickable: true
      },
    
      // Navigation arrows
      // navigation: {
      //   nextEl: '.swiper-button-next',
      //   prevEl: '.swiper-button-prev',
      // },
    
      // And if we need scrollbar
      // scrollbar: {
      //   el: '.swiper-scrollbar',
      // },
    });
  },

  // initBrandSliders() {
  //   const selectors = [
  //     '.section-brands__slider-container-top',
  //     '.section-brands__slider-container-bottom',
  //   ]
  //   selectors.forEach(selector => {
  //     new Swiper(selector, {
  //       preventClicks: false,

  //       loop: true,
  //       speed: 5000,
  //       // noSwiping: true,
  //       // freeMode: true,
  //       // freeModeMomentumRatio: 1,
  //       slidesPerView: 2.5,
  //       spaceBetween: 10,
  //       // breakpoints: {
  //       //   640: {
  //       //     slidesPerView: 6,
  //       //   }
  //       // }
  //       // slidesPerView: 1,
  //       // spaceBetween: 10,
  //       // // Responsive breakpoints
  //       breakpoints: {
  //         // when window width is >= 320px
  //         // 320: {
  //         //   slidesPerView: 2,
  //         //   spaceBetween: 20
  //         // },
  //         // when window width is >= 480px
  //         // 480: {
  //         //   slidesPerView: 3,
  //         //   spaceBetween: 30
  //         // },
  //         // when window width is >= 640px
  //         640: {
  //           slidesPerView: 5,
  //           // spaceBetween: 20,
  //         },
  //         1024: {
  //           slidesPerView: 8,
  //           // spaceBetween: 20,
  //         },
  //       },
  //       autoplay: {
  //         delay: 0,
  //         disableOnInteraction: false,
  //         reverseDirection: selector.includes('bottom'),
  //       },
  //     })
  //   })
  // },
  initBrochureSlider() {
    new Swiper('.section-brochures__slider-container', {
      preventClicks: false,
      loop: true,
      // loop: true,
        speed: 5000,
      slidesPerView: 2,
      spaceBetween: 10,
      breakpoints: {
        640: {
          slidesPerView: 4,
          // spaceBetween: 20,
        },
        1024: {
          slidesPerView: 6,
          // spaceBetween: 20,
        },
      },
      autoplay: {
        delay: 0,
        disableOnInteraction: false,
        // reverseDirection: selector.includes('bottom'),
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  },

  initFAQTriggers() {
    const els = document.querySelectorAll('.faq__question-content');

    const toggleFaqItem = (e) => {
      e.preventDefault();
      const { parentNode } = e.currentTarget;
      if (parentNode instanceof Element) {
        if (parentNode.classList.contains('open')) {
          parentNode.classList.remove('open');
        } else {
          parentNode.classList.add('open');
        }
      }
    }

    // Makes and array from querySelectorAll
    // For Each element in the array add the Event Listener of type click
    Array.from(els).forEach(el => {
      el.addEventListener('click', toggleFaqItem, { capture: true });
    });

    Array.from(els).forEach(el => {
      el.classList.remove('open');
    });

  },



}