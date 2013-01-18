<?php
session_start();

session_destroy();

echo '<meta http-equiv="refresh" content="0; URL=../">';

?>
<script type="text/javascript">
window.close();
</script>