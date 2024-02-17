<?php
session_start();
session_destroy();
?>
<script>
    alert('Logout berhasil');
    location='login.php';
</script>