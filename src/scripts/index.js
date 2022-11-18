import { polyfill } from './helpers/polyfill';
polyfill();

import onDocumentLoad from "./helpers/on-document-load";
import { NavController } from "./controller/nav.controller";
import { UIController } from "./controller/ui.controller";
// import { HomeController } from './controller/homeController';


export const APP = {
  init() {
    return new Promise(async (resolve, reject) => {
      try {
        await UIController.init();
        await NavController.init();
        // await HomeController.init();

        resolve();
      } catch(error) {
        reject(error);
      }
    })
  }
}

onDocumentLoad(APP.init);