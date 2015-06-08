<div id="api">
  <shareholder-count>                
    <?php
    $result = count_users();
    $subscriber_count = $result["avail_roles"]["subscriber"];
    echo $subscriber_count;
    ?>
  </shareholder-count>
</div>