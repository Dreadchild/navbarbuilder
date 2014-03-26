<?php
  class NavCurl
  {
    public function slurp($url) {
      $ch = curl_init();  // Initialising cURL
      curl_setopt($ch, CURLOPT_URL, $url);
      // curl_setopt($ch, CURLOPT_STDERR, fopen("curl_error.log","w"));
      // curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); // Setting cURL's option to return the webpage data
      $data = curl_exec($ch); // Executing the cURL request and assigning the returned data to the $data variable
      curl_close($ch);    // Closing cURL
      return $data;   // Returning the data from the function
    }
  }
?>
