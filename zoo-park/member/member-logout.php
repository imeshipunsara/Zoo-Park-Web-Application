<?php

include "../config.php";

# clear session
session_start();
session_unset();
session_destroy();

# redirect to login page using javascript
?>

<script>
    window.location.href = '<?php echo $APP_BASE_DOMAIN . $APP_BASE_PATH ?>';
</script>