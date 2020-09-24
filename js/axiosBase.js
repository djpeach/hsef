$(document).ready(function() {
  axios.interceptors.request.use(config => {
    // console.log('Axios Request:');
    // console.log(config);
    return config;
  }, err => {
    console.log('Axios Request Error');
    return Promise.reject(err);
  });

  axios.interceptors.response.use(response => {
    return response;
  }, err => {
    console.log('Axios Response Error');
    return Promise.reject(err);
  });

  axios.defaults.baseURL = 'http://corsair.cs.iupui.edu:24631/hsef/api/';
});