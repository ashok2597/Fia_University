export const wait = function(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

export default wait;