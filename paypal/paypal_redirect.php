<?php
session_start();
// header('Location: "https://www.sandbox.paypal.com/cgi-bin/webscr?business=info@codexworld.com&cmd=_xclick&item_name=tittle-1&item_number=1&amount=1&currency_code="<?php echo PAYPAL_CURRENCY; ?>"&return="<?php echo PAYPAL_RETURN_URL; ?>"&cancel_return="<?php echo PAYPAL_CANCEL_URL; ?>');



// Include configuration file 
include_once 'config.php';

// Include database connection file 
include_once 'dbConnect.php';
?>
<div class="container">
    <?php
    // Fetch products from the database 
    $results = $db->query("SELECT `sd`.`id` as `sd_details`,`sd`.`service_process_status`,`sd`.`service_status`,`ts`.`id`, `ts`.`title`,`ts`.`inst`, `ts`.`tba_service_category`, `ts`.`tba_service_type`, `ts`.`description`, `ts`.`price`, `ts`.`price_amt`, `ts`.`remarks`, `ts`.`url`, `ts`.`inst`,`ts`.`cdate`, `ts`.`cby` FROM `tba_services` `ts` LEFT JOIN `subscribers_details` `sd` ON `sd`.`tba_service_id`=`ts`.`id` AND `sd`.`client_id`='$session_id' WHERE `ts`.`is_active` = '0'");
    while ($row = $results->fetch_assoc()) {
    ?>
        <div class="pro-box">
            <img src="<?php echo "../" . $row['inst']; ?>" / width="50">
            <div class="body">
                <h5><?php echo $row['title']; ?></h5>
                <h6>Price: <?php echo '$' . $row['price_amt'] . ' ' . PAYPAL_CURRENCY; ?></h6>

                <!-- PayPal payment form for displaying the buy button -->
                <form action="<?php echo PAYPAL_URL; ?>" method="post">
                    <!-- Identify your business so that you can collect the payments. -->
                    <input type="hidden" name="business" value="info@codexworld.com">

                    <!-- Specify a Buy Now button. -->
                    <input type="hidden" name="cmd" value="_xclick">

                    <!-- Specify details about the item that buyers will purchase. -->
                    <input type="hidden" name="item_name" value="<?php echo $row['title']; ?>">
                    <input type="hidden" name="item_number" value="<?php echo $row['id']; ?>">
                    <input type="hidden" name="amount" value="<?php echo $row['price_amt']; ?>">
                    <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">

                    <!-- Specify URLs -->
                    <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
                    <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">

                    <!-- Display the payment button. -->
                    <input type="image" name="submit" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif">
                </form>
            </div>
        </div>
    <?php } ?>
</div>