export function getCSSCustomProperty(name, element = document.documentElement) {      // const styles = window.getComputedStyle(document.documentElement);
  const styles = window.getComputedStyle(element);
  return styles.getPropertyValue(name);
}
export function setCSSCustomProperty(name, value, element = document.documentElement) {
  element.style.setProperty(name, value);
}
export function removeCSSCustomProperty(name, element = document.documentElement) {
  element.style.removeProperty(name);
}
