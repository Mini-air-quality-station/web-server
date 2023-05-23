<?php
function create_list_addresses(){
  $url=parse_url($_SERVER['HTTP_HOST']);
  $ip_addr=array_key_exists('host', $url) ? $url['host'] : $url['path'];
  echo "<li class=\"nav-item\">";
  echo "<a class=\"nav-link\" href=\"javascript:redirect('$ip_addr:3000', 'true');\">Data</a>";
  echo "</li>";
}
?>
