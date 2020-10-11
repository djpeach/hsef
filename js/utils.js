const debounce = (cb, delay=500) => {
  let timeout;

  return function fn(...args) {
    const later = () => {
      clearTimeout(timeout);
      cb(...args);
    };

    clearTimeout(timeout);
    timeout = setTimeout(later, delay);
  };
};

/**
 * Takes a selected element and returns if it was found or not
 * 
 * @param el
 * @returns {boolean}
 */
const exists = (el) => {
  return el.length !== 0;
}