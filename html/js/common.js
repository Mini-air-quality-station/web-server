function redirect(url, http){
  if (http){
    window.location.href='http://'+url;
  }
  else{
    window.location.href='https://'+url;
  }
}

function sendUserTime(){
  var userDate = new Date();
  var userTime = userDate.getFullYear() + "-" +
    String(userDate.getMonth()+1) + "-" +
    userDate.getDate() + " " +
    userDate.getHours() + ":" +
    userDate.getMinutes() + ":" +
    userDate.getSeconds();

  var timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone

  var time = document.createElement('input');
  time.type = 'hidden';
  time.name = 'userTime';
  time.value = userTime;

  var timezone = document.createElement('input');
  timezone.type = 'hidden';
  timezone.name = 'userTimezone';
  timezone.value = timeZone;

  var form = document.getElementById('userTimeForm');
  form.appendChild(time);
  form.appendChild(timezone);

  form.submit();
}
