<?php
  class Test
  {
    public function __construct()
    {
        echo "<br /> Welcome to Test class Constructor";
    }

      public function CodeTesting()
      {
          echo "<br /> Welcome to code testing <br />";
          $this->GetDownloadedData('http://www.google.com');
      }

      private function GetDownloadedData($URL)
      {
          echo "<br />Downloading Data from {$URL}<br/>";
          $result = "";
          $ch = curl_init();
          $timeout = 3600;
          curl_setopt($ch, CURLOPT_URL, $URL);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
          curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36');
          $data = curl_exec($ch);

          if(curl_errno($ch))
          {
              echo 'error:' . curl_error($ch);
          }
          else
          {
              $result = str_get_html($data);
          }

          curl_close($ch);

          echo "<br /> Curl Result: ".$result;

          return $result;
      }

  }

$obj = new Test();
$obj->CodeTesting();

?>