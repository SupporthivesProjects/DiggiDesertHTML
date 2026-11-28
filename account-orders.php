<?php include 'includes/header.php'; ?>
<section class="ihero acct" aria-label="Account">
  <div class="bg">
    <img src="assets/img/account-hero-stockroom.jpg" width="2560" height="746" alt="Shelves of folded linen and blue ceramic jars in a sunlit stockroom">
  </div>
  <div class="ov"></div>
  <div class="acct-copy">
    <p class="lbl lsage mb-fs-14" data-r>Signed in as John Smith
    </p>
    <h1 class="t-h1" data-lines>Orders and invoices</h1>
    <p class="lead" data-r>Every order you have placed, with its invoice ready to download.</p>
  </div>
  <nav class="acct-nav" aria-label="Account pages" data-r>
    <div class="acct-tabs">
      <a href="account-orders.html" aria-current="page">
        <span class="l">Orders and invoices</span>
        <span class="s">Orders</span>
      </a>
      <a href="account-deliverables.html">Deliverables</a>
      <a href="account-details.html">
        <span class="l">Account details</span>
        <span class="s">Details</span>
      </a>
    </div>
    <button class="acct-out" type="button" id="signout">Sign out</button>
  </nav>
</section>
<section class="wrap sec" id="orders">
  <div class="ord-list">
    <article class="ord-card" data-order="DD10482" data-r>
      <div class="ord-head">
        <div>
          <h2>Order DD10482</h2>
          <p>Placed 17 Nov 2026</p>
        </div>
        <div class="ord-acts">
          <span class="ord-status">
            <i></i>Active </span>
          <button type="button" class="acct-link inert">Download invoice</button>
        </div>
      </div>
      <div class="rule"></div>
      <div class="ord-lines">
        <div class="ord-line">
          <div>
            <b>SEO</b>
            <small>Silver, 3 months</small>
          </div>
          <span class="ord-amt" data-price="svc:seo:silver:3"></span>
        </div>
        <div class="ord-line">
          <div>
            <b>UX/UI</b>
            <small>Bronze, one price</small>
          </div>
          <span class="ord-amt" data-price="svc:ux-ui:bronze:1"></span>
        </div>
        <div class="ord-line">
          <div>
            <b>Email marketing</b>
            <small>Bronze, 1 month</small>
          </div>
          <span class="ord-amt" data-price="svc:email-marketing:bronze:1"></span>
        </div>
      </div>
      <div class="rule"></div>
      <div class="ord-sums">
        <div>
          <span>Subtotal</span>
          <span class="num" data-sum="subtotal"></span>
        </div>
        <div>
          <span>Discount, WELCOME10</span>
          <span class="num" data-sum="discount"></span>
        </div>
        <div class="ord-total">
          <b>Total</b>
          <span class="ord-amt" data-sum="total"></span>
        </div>
      </div>
    </article>
    <article class="ord-card" data-order="DD10417" data-r>
      <div class="ord-head">
        <div>
          <h2>Order DD10417</h2>
          <p>Placed 2 Sep 2026</p>
        </div>
        <div class="ord-acts">
          <span class="ord-status ended">
            <i></i>Ended </span>
          <button type="button" class="acct-link inert">Download invoice</button>
        </div>
      </div>
      <div class="rule"></div>
      <div class="ord-lines">
        <div class="ord-line">
          <div>
            <b>PPC</b>
            <small>Bronze, 1 month</small>
          </div>
          <span class="ord-amt" data-price="svc:ppc:bronze:1"></span>
        </div>
        <div class="ord-line">
          <div>
            <b>Social media</b>
            <small>Bronze, 1 month</small>
          </div>
          <span class="ord-amt" data-price="svc:social-media:bronze:1"></span>
        </div>
      </div>
      <div class="rule"></div>
      <div class="ord-sums">
        <div class="ord-total">
          <b>Total</b>
          <span class="ord-amt" data-sum="total"></span>
        </div>
      </div>
    </article>
    <article class="ord-card" data-order="DD10391" data-r>
      <div class="ord-head">
        <div>
          <h2>Order DD10391</h2>
          <p>Placed 11 Aug 2026</p>
        </div>
        <div class="ord-acts">
          <span class="ord-status ended">
            <i></i>Ended </span>
          <button type="button" class="acct-link inert">Download invoice</button>
        </div>
      </div>
      <div class="rule"></div>
      <div class="ord-lines">
        <div class="ord-line">
          <div>
            <b>SEO</b>
            <small>Bronze, 1 month</small>
          </div>
          <span class="ord-amt" data-price="svc:seo:bronze:1"></span>
        </div>
      </div>
      <div class="rule"></div>
      <div class="ord-sums">
        <div class="ord-total">
          <b>Total</b>
          <span class="ord-amt" data-sum="total"></span>
        </div>
      </div>
    </article>
  </div>
  <div class="ord-empty" data-r>
    <svg viewBox="0 0 72 72" width="72" height="72" fill="none" aria-hidden="true">
      <rect width="72" height="72" rx="16" fill="#E7E5E0" />
      <path d="M48 28L40 20H24V52H48V28ZM40 20V28H48" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
    </svg>
    <div>
      <h2>No orders yet</h2>
      <p>When you buy a package, the order and its invoice show here.</p>
    </div>
    <a href="services.html" class="btn">Explore services</a>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
