<?php include 'includes/header.php'; ?>

<section class="ihero band pur-hero in" aria-label="Payment complete">
  <div class="pur-media">
    <img src="assets/img/payment-complete-hero.jpg" width="1440" height="960" alt="An open teal door letting sunlight into a whitewashed hallway with a clay pot by the step">
  </div>
  <div class="copy">
    <span class="lbl lsage fx" style="--d:.5s">Order <span class="pay-ref">DD10482</span>
    </span>
    <h1 class="t-display on" data-lines="" style="--d: 0s;">
      <span class="ln">
        <span style="--i:0">Payment complete</span>
      </span>
    </h1>
    <p class="lead fx" style="--d:.9s">Thanks, John. A receipt is on its way to john@example.com.</p>
  </div>
</section>
<section class="pay-mod" aria-label="Your order">
  <div class="pay-status">
    <div class="pay-mark on" data-r="" aria-hidden="true" style="--d: 0s;">
      <svg viewBox="0 0 88 88" fill="none">
        <circle cx="44" cy="44" r="44" fill="currentColor"></circle>
        <path d="M28.1 44.6L39.1 55.6L59.9 32.4" stroke="#fff" stroke-width="3.67" stroke-linecap="round" stroke-linejoin="round"></path>
      </svg>
    </div>
    <h2 class="t-h3 on" data-lines="" style="--d: 0s;">
      <span class="ln">
        <span style="--i:0">Payment received</span>
      </span>
    </h2>
    <p class="lead on" data-r="" style="--d: 0s;">Your packages are in your account now, each with its term. As the work is delivered, you will find it there too.</p>
    <div class="pay-acts stackm on" data-r="" style="--d: 0s;">
      <a href="account-orders.php" class="btn">Go to my account</a>
      <a href="index.php" class="btn outline">Back to home</a>
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
          <small>Silver, 3 months</small>
        </div>
        <span class="price" data-gbp="909" data-shown-cur="GBP">£909</span>
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
        <span id="orderSub" data-shown="1363">£1,363</span>
      </div>
      <div id="orderDiscRow">
        <span>Discount, WELCOME10</span>
        <span>
          <span id="orderDisc" data-shown="136.3">£136.30</span> off </span>
      </div>
    </div>
    <div class="pur-sum-total">
      <b>Total paid</b>
      <span class="amt" id="orderTotal" data-shown="1226.7">£1,226.70</span>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>

