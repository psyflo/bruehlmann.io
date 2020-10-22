<?php
    $data = isset($_GET['data']) ? rawurldecode($_GET['data']) : null;

echo '<img  alt="tick" src="data:'.$data.'" >';
?>