<?php include 'includes/header.php'; ?>
<style>
  .pay-mod{
    z-index: 0;
  }
</style>
  <section class="ihero band pur-hero in" aria-label="Payment failed">
    <div class="pur-media">
      <img src="assets/img/payment-failed-hero.jpg" width="1440" height="960" alt="A closed teal door in a whitewashed wall with a terracotta vase beside it">
    </div>
    <div class="copy">
      <span class="lbl lsage fx" style="--d:.5s">Order <span class="pay-ref">DD10482</span>
      </span>
      <h1 class="t-display on" data-lines="" style="--d: 0s;">
        <span class="ln">
          <span style="--i:0">Payment failed</span>
        </span>
      </h1>
      <p class="lead fx" style="--d:.9s">Your card was not charged, and <br>your order is just as you left it. </p>
    </div>
  </section>
  <section class="pay-mod" aria-label="Your order">
    <div class="pay-status">
      <div class="pay-mark bad on" data-r="" aria-hidden="true" style="--d: 0s;">
        <svg viewBox="0 0 88 88" fill="none">
          <circle cx="44" cy="44" r="44" fill="currentColor"></circle>
          <path d="M31 31L57 57M57 31L31 57" stroke="#fff" stroke-width="3.67" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
      </div>
      <h2 class="t-h3 on" data-lines="" style="--d: 0s;">
        <span class="ln">
          <span style="--i:0">Nothing went through</span>
        </span>
      </h2>
      <p class="lead on" data-r="" style="--d: 0s;">This is usually a card detail or a check by your bank. Try again, or pay with a different card.</p>
      <div class="pay-acts on" data-r="" style="--d: 0s;">
        <a href="checkout.php" class="btn">Try again</a>
        <a href="contact.php" class="btn outline">Contact us</a>
      </div>
    </div>
    <div class="pay-order on" data-r="" style="--d: 0.08s;">
      <div class="pay-order-top">
        <h2>Your order</h2>
        <span class="lbl-s sage pay-ref">DD10482</span>
      </div>
      <div class="pur-sum-lines" id="orderLines">
        <div class="pur-sum-line">
          <div>
            <b>SEO</b>
            <small>Silver, 12 months</small>
          </div>
          <span class="price" data-gbp="3254" data-shown-cur="GBP">£3,254</span>
        </div>
        <div class="pur-sum-line">
          <div>
            <b>UX/UI</b>
            <small>Bronze, one price</small>
          </div>
          <span class="price" data-gbp="375" data-shown-cur="GBP">£375</span>
        </div>
        <div class="pur-sum-line">
          <div>
            <b>Email marketing</b>
            <small>Bronze, 1 month</small>
          </div>
          <span class="price" data-gbp="79" data-shown-cur="GBP">£79</span>
        </div>
      </div>
      <div class="pur-sums">
        <div>
          <span>Subtotal</span>
          <span id="orderSub" data-shown="3708">£3,708</span>
        </div>
        <div id="orderDiscRow">
          <span>Discount, WELCOME10</span>
          <span>
            <span id="orderDisc" data-shown="370.8">£370.80</span> off </span>
        </div>
      </div>
      <div class="pur-sum-total">
        <b>Total today</b>
        <span class="amt" id="orderTotal" data-shown="3337.2">£3,337.20</span>
      </div>
    </div>
  </section>

<?php include 'includes/footer.php'; ?>

