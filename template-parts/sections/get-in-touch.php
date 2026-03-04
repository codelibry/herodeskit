<?php

$title   = $args['get-in-touch__title'] ?? get_sub_field('get-in-touch__title');
$email   = $args['get-in-touch__email'] ?? get_sub_field('get-in-touch__email');
$phone   = $args['get-in-touch__phone'] ?? get_sub_field('get-in-touch__phone');
$address = $args['get-in-touch__address'] ?? get_sub_field('get-in-touch__address');

if (empty($email) && empty($phone) && empty($address)) {
    return;
}

?>

<section class="get-in-touch">
    <div class="container">

        <?php if ($title): ?>
            <h2 class="get-in-touch__title" data-reveal="fade-up">
                <?php echo esc_html($title); ?>
            </h2>
        <?php endif; ?>

        <div class="get-in-touch__items" data-reveal="fade-up" data-reveal-delay="150">

            <?php if ($email): ?>
                <div class="get-in-touch__item">
                    <div class="get-in-touch__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="22" viewBox="0 0 28 22" fill="none">
                            <path d="M26.6739 5.28571C26.6739 5.28571 20.9293 12.4286 13.8579 12.4286C6.78644 12.4286 1.04186 5.28571 1.04186 5.28571M5.57143 21H22.1429C23.743 21 24.5431 21 25.1543 20.6886C25.6919 20.4147 26.129 19.9776 26.4029 19.44C26.7143 18.8289 26.7143 18.0287 26.7143 16.4286V5.57143C26.7143 3.97129 26.7143 3.1712 26.4029 2.56003C26.129 2.02241 25.6919 1.58533 25.1543 1.31141C24.5431 1 23.743 1 22.1429 1H5.57143C3.97129 1 3.1712 1 2.56003 1.31141C2.02241 1.58533 1.58533 2.02241 1.31141 2.56003C1 3.1712 1 3.97127 1 5.57143V16.4286C1 18.0287 1 18.8289 1.31141 19.44C1.58533 19.9776 2.02241 20.4147 2.56003 20.6886C3.1712 21 3.97127 21 5.57143 21Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3 class="get-in-touch__label">Send us an email</h3>
                    <a class="get-in-touch__value" href="mailto:<?php echo esc_attr($email); ?>">
                        <?php echo esc_html($email); ?>
                    </a>
                </div>
            <?php endif; ?>

            <?php if ($phone): ?>
                <div class="get-in-touch__item">
                    <div class="get-in-touch__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                            <path d="M16.3054 5.41665C17.3635 5.62309 18.3359 6.14059 19.0983 6.90291C19.8606 7.66523 20.3781 8.63768 20.5845 9.69581M16.3054 1.08331C18.5037 1.32754 20.5537 2.312 22.1188 3.87507C23.6838 5.43814 24.6709 7.48691 24.9179 9.68498M23.8345 18.33V21.58C23.8357 21.8817 23.7739 22.1803 23.6531 22.4568C23.5322 22.7332 23.3549 22.9814 23.1326 23.1853C22.9103 23.3893 22.6478 23.5446 22.362 23.6412C22.0762 23.7379 21.7733 23.7738 21.4729 23.7466C18.1393 23.3844 14.9371 22.2453 12.1237 20.4208C9.50617 18.7575 7.28697 16.5383 5.62369 13.9208C3.79283 11.0946 2.65345 7.87689 2.29786 4.52831C2.27078 4.22874 2.30639 3.9268 2.4024 3.64174C2.49841 3.35668 2.65272 3.09473 2.85552 2.87257C3.05831 2.65041 3.30514 2.47291 3.5803 2.35138C3.85545 2.22984 4.15289 2.16693 4.45369 2.16665H7.70369C8.22944 2.16147 8.73913 2.34765 9.13776 2.69047C9.5364 3.0333 9.79677 3.50938 9.87036 4.02998C10.0075 5.07005 10.2619 6.09127 10.6287 7.07415C10.7744 7.4619 10.806 7.8833 10.7196 8.28843C10.6332 8.69356 10.4325 9.06543 10.1412 9.35998L8.76536 10.7358C10.3075 13.448 12.5532 15.6936 15.2654 17.2358L16.6412 15.86C16.9357 15.5687 17.3076 15.368 17.7127 15.2816C18.1179 15.1952 18.5393 15.2267 18.927 15.3725C19.9099 15.7392 20.9311 15.9936 21.9712 16.1308C22.4974 16.2051 22.978 16.4701 23.3216 16.8756C23.6652 17.2811 23.8477 17.7987 23.8345 18.33Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3 class="get-in-touch__label">Call us</h3>
                    <a class="get-in-touch__value" href="tel:<?php echo esc_attr(preg_replace('/[^+\d]/', '', $phone)); ?>">
                        <?php echo esc_html($phone); ?>
                    </a>
                </div>
            <?php endif; ?>

            <?php if ($address): ?>
                <div class="get-in-touch__item">
                    <div class="get-in-touch__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28" fill="none">
                            <path d="M12 14.6667C14.2091 14.6667 16 12.8758 16 10.6667C16 8.45753 14.2091 6.66667 12 6.66667C9.79086 6.66667 8 8.45753 8 10.6667C8 12.8758 9.79086 14.6667 12 14.6667Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 1.33334C9.17131 1.33334 6.45869 2.45715 4.45829 4.45755C2.4579 6.45795 1.33409 9.17057 1.33409 12C1.33409 14.4933 1.93409 16.1467 3.33409 17.8667L12 27.3333L20.6674 17.8667C22.0674 16.1467 22.6674 14.4933 22.6674 12C22.6674 9.17057 21.5436 6.45795 19.5432 4.45755C17.5428 2.45715 14.8301 1.33334 12 1.33334Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3 class="get-in-touch__label">Our Location</h3>
                    <span class="get-in-touch__value">
                        <?php echo esc_html($address); ?>
                    </span>
                </div>
            <?php endif; ?>

        </div>

    </div>
</section>
