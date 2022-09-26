#READ IMAGE FROM DATABASE
<?php
while ($row = $result->fetch_assoc()) {
    //print out the event_name , and date time 
    //event id set as the value
    //$row[columName]
    echo "<a href='detail.php?id=$row[$e1]'>
                        <div class='card'>
                        "
    ?>
    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['event_image']); ?>" alt="event_image"> 
    <?php
    echo "<h1 class='title'>$row[$e2]</h1>
          <p class='time'>Time  : $row[$e3]</p>
        </div>
    </a>";
}
?>
