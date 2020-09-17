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