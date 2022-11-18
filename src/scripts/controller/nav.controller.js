import { UIController } from "./ui.controller";

export const NavController = {
  init() {
    return new Promise((resolve, reject) => {
      try {
        this.initStickyHeader();
        this.initMobileMenuToggle();
        this.initMobileSubMenus();
        // this.initSubMenuWrapper();
        // this.initAboutMenuToggle();
        resolve();
      } catch (error) {
        reject(error);
      }
    })
  },

  menuIsMobileMode() {
    return window.innerWidth < 1024;
  },  

  initStickyHeader() {
    const handleScroll = () => {
      const scrollY = window.scrollY;
      if(scrollY > 0) {
        document.documentElement.classList.add('scrolled');
      } else {
        document.documentElement.classList.remove('scrolled');
      }
    };
    const handler = handleScroll;
    window.addEventListener('scroll', handler);
    handler();
  },

  // same as toggleMobileMenu() {}
  toggleMobileMenu: () => {
    const html = document.documentElement
    const menuIsOpen = html.classList.contains('menu-open');
    if(menuIsOpen) {
      html.classList.remove('menu-open');
    } else {
      html.classList.add('menu-open');
      UIController.recordNavBarHeight();
    }
  },

  toggleAboutMenu: () => {
    const html = document.documentElement
    const menuIsOpen = html.classList.contains('about-menu-open');
    if(menuIsOpen) {
      html.classList.remove('about-menu-open');
    } else {
      html.classList.add('about-menu-open');
      UIController.recordNavBarHeight();
    }
  },
  

  initAboutMenuToggle() {
    const toggle = document.querySelector('.about-dropdown');
    if (!toggle) return; 
    toggle.addEventListener('click', this.toggleAboutMenu);
  },

  initMobileMenuToggle() {
    const toggle = document.querySelector('.nav-hamburger');
    if (!toggle) return; 
    toggle.addEventListener('click', this.toggleMobileMenu);
  },

  initMobileSubMenus() {
    this.initMobileMenuTriggers();
    this.initMobileMenuParentTriggers();
    this.initMobileSubmenuAutoCollapse();
  },

  // Uncomment to bring back click to set submenu
  initMobileMenuTriggers() {

    const els = document.querySelectorAll('.menu-item-has-children > a');
  
    const toggleMobileMenu = event => {
      // event.preventDefault(); 
      const { target } = event;
      const { parentNode } = target;
      
      if (parentNode.classList.contains('open')) {
        parentNode.classList.remove('open');
      } else {
        parentNode.classList.add('open');
        
      }

      // Array.from(els).forEach(el => {
      //   el.classList.remove('open');
      //   console.log('removed from' + el);
      // });     
      
    }
    
    Array.from(els).forEach(el => {
      el.addEventListener('click', toggleMobileMenu);
      // el.classList.remove('open');
      // console.log('removed from' + el);
    });

    Array.from(els).forEach(el => {
      el.classList.remove('open');
      // console.log('removed from' + el);
    });     

    
  },

  initMobileMenuParentTriggers() {
    const els = document.querySelectorAll('.menu-item-has-children > a');
      
    // const toggleMobileMenu = event => {
    //   event.preventDefault();
    //   const { target } = event;
    //   const { parentNode } = target;
      
    //   if (parentNode.classList.contains('open')) {
    //     parentNode.classList.remove('open');
    //   } else {
    //     parentNode.classList.add('open');
    //     console.log("!");
    //   }
    // }

    // Array.from(els).forEach(el => {
    //   el.addEventListener('click', toggleMobileMenu);
    // });

    // els.addEventListener('click', toggleMobileMenu);

    // console.log("!");
    
  },

  initMobileSubmenuAutoCollapse() {
    const submenuLinks = document.querySelectorAll('.sub-menu a');
    const closeParentMenu = event => {
      // if (!this.menuIsMobileMode()) return;
      const { target } = event;
      let parentEl = target;
      while (parentEl.parentNode) {
        parentEl = parentEl.parentNode;
        if (parentEl.classList && parentEl.classList.contains('open')) {
          break;
        }
      }
      
      parentEl.classList && parentEl.classList.remove('open');
      this.toggleMobileMenu();
    }
    Array.from(submenuLinks).forEach(link => {
      link.addEventListener('click', closeParentMenu);
    })  
  },

}