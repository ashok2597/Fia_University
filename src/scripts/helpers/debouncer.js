export const debounce = (callback = () => {}, delay = 200) => {
  let timer = null;
  return () => {
    timer && clearTimeout(timer);
    timer = setTimeout(callback, delay);
  }
}
export default debounce;