export const onDocumentLoad = function(func) {
  const arr = window.ON_DOCUMENT_LOAD = window.ON_DOCUMENT_LOAD || [];
  if (func) arr.push(func);
  document.addEventListener("DOMContentLoaded", event => {
    while (arr.length > 0) {
      const f = arr.shift();
      try {
        f();
      } catch (e) {
        console.error(e);
      }
    }
  });
}

export default onDocumentLoad;