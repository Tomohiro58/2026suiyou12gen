<!DOCUTYPE html>

<html>
<h1>現在の日時</h1>
<body>
<?php
date_default_timezone_set('Asia/Tokyo');

$date = new DateTime();

echo $date->format('Y-m-d H:i:s');
?>

<br>

  <svg width="1000" height="1000">
       <circle cx="300" cy="300" r ="200" fill="none" 
               stroke="black" stroke-width="10" />
        
       <?php
       for($i = 0; $i < 60; $i++){
         
         $angle = deg2rad($i * 6 - 90);

         $x = 300 + 180 * cos($angle);
         $y = 300 + 180 * sin($angle);

         if($i % 5 == 0){
             $r = 5;
           }else{
             $r = 2;
           }
          echo "<circle cx='$x' cy='$y' r='$r' fill='black' />";
          }
          ?>


        <g stroke="black">
            <line x1="300" y1="100"
                  x2="300" y2="300" stroke-width="3"/>
                    </g>

        <g stroke="black">
            <line x1="430" y1="400"
                  x2="300" y2="300" stroke-width="5"/>
                    </g>

         <g stroke="black">
            <line x1="400" y1="300"
                  x2="300" y2="300" stroke-width="7"/>
                    </g>
          
  </svg>
</body>
</html>

