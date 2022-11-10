<?php
foreach ($alerts as $alert) {
?>
<div class="alert alert-<?=$alert['type'];?> alert-dismissible fade show text-center w-75 position-absolute top-0 start-50 translate-middle-x mt-3" role="alert">
    <?php switch ($alert['type']) {
        case 'success':
            echo '<i class="bi bi-check-circle-fill"></i>';
            break;
        
        case 'info':
        case 'warning':
            echo '<i class="bi bi-info-circle-fill"></i>';
            break;
        
        case 'danger':
            echo '<i class="bi bi-exclamation-circle-fill"></i>';
            break;
        
    }
    echo '&nbsp;&nbsp;&nbsp;';
    echo $alert['content'];
    ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}