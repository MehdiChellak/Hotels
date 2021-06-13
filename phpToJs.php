<?php
     $phpArray = [
        ['Sefrou',33.829262, -4.839340,3],
        ['Barcelo', 45.75, 4.85, 2],
        ['Rpyal Mirage', 43.3, 5.40, 1],
      ];
?>

<script type="text/javascript">

    var jArray = <?php echo json_encode($phpArray); ?>;

    for(var i=0; i<jArray.length; i++){
        alert(jArray[i][0]);
    }

 </script>