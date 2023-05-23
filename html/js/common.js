function redirect(url, http){
  if (http){
    window.location.href='http://'+url;
  }
  else{
    window.location.href='https://'+url;
  }
}