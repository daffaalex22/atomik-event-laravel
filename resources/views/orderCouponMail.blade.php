@component('mail::message')
<h1>{{ $name }}, thank you for your order!</h1>
<p>These are your coupon code(s) for Kreanesia event:</p>
<div>
<?php for ($i = $startCount; $i < $startCount + $coupon; $i++) { ?>  
<div class="coupon-card">
    <div class="coupon-container">
        <h4><b><i>Kreasia-{{ $i }}</i></b></h4>
    </div>
</div>
<br /> 
<?php } ?>
</div>
@endcomponent