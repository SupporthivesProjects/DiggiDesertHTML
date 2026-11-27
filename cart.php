<?php include 'includes/header.php'; ?>

<div>
  <section class="ihero band pur-hero in" aria-label="Cart">
    <div class="pur-media">
      <img src="assets/img/cart-hero.jpg" width="1440" height="960" alt="A wicker basket of folded linen and a white jug on a sunlit step by a teal door">
    </div>
    <div class="copy">
      <h1 class="t-display on" data-lines="" style="--d: 0s;">
        <span class="ln">
          <span style="--i:0">Cart</span>
        </span>
      </h1>
      <p class="lead fx" style="--d:.9s" id="heroLines">Check each package and its term, then head to checkout.</p>
      <p class="lead fx" style="--d:.9s" id="heroEmpty" hidden="">Packages you add will show here, each with its term.</p>
    </div>
  </section>
  <section class="cart-mod wrap" id="cartBody" aria-label="Your cart">
    <div class="cart-lines" id="cartLines">
      <article class="cart-line on" data-id="seo" data-r="" style="--d: 0.08s;">
        <div class="cart-line-copy">
          <span class="lbl-s sage">Discovery</span>
          <h2>SEO</h2>
          <p class="inc">National SEO, 15 keywords</p>
        </div>
        <div class="cart-line-ctls">
          <div class="cart-line-ctl tier">
            <span class="lbl-s sage" id="tier-seo">Tier</span>
            <div class="sel">
                <select data-k="tier" aria-labelledby="tier-seo">
                    <option value="bronze">Bronze</option>
                    <option value="silver" selected>Silver</option>
                    <option value="gold">Gold</option>
                </select>
            </div>
          </div>
          <div class="cart-line-ctl term">
            <span class="lbl-s sage" id="term-seo">Term</span>
            <div class="sel">
              <select data-k="term" aria-labelledby="term-seo">
                <option value="1">1 month</option>
                <option value="3">3 months</option>
                <option value="6">6 months</option>
                <option value="12" selected="">12 months</option>
              </select>
            </div>
          </div>
        </div>
        <div class="cart-line-price">
          <span class="amt" data-gbp="3254" data-shown-cur="GBP">£3,254</span>
          <button type="button" class="rm" aria-label="Remove SEO">Remove</button>
        </div>
      </article>
      <article class="cart-line on" data-id="ux-ui" data-r="" style="--d: 0s;">
        <div class="cart-line-copy">
          <span class="lbl-s sage">Decision</span>
          <h2>UX/UI</h2>
          <p class="inc">WordPress design and build, 5 pages, 1 email address</p>
        </div>
        <div class="cart-line-ctls">
          <div class="cart-line-ctl tier">
            <span class="lbl-s sage" id="tier-ux-ui">Tier</span>
            <div class="sel">
              <select data-k="tier" aria-labelledby="tier-ux-ui">
                <option value="bronze" selected="">Bronze</option>
                <option value="silver">Silver</option>
                <option value="gold">Gold</option>
              </select>
            </div>
          </div>
          <div class="cart-line-ctl term">
            <span class="lbl-s sage" id="term-ux-ui">Term</span>
            <div class="sel locked">
              <select data-k="term" aria-labelledby="term-ux-ui" disabled="">
                <option value="1" selected="">One price</option>
              </select>
            </div>
          </div>
        </div>
        <div class="cart-line-price">
          <span class="amt" data-gbp="375" data-shown-cur="GBP">£375</span>
          <button type="button" class="rm" aria-label="Remove UX/UI">Remove</button>
        </div>
      </article>
      <article class="cart-line on" data-id="email-marketing" data-r="" style="--d: 0s;">
        <div class="cart-line-copy">
          <span class="lbl-s sage">Decision</span>
          <h2>Email marketing</h2>
          <p class="inc">3 flows, 2 campaigns a month</p>
        </div>
        <div class="cart-line-ctls">
          <div class="cart-line-ctl tier">
            <span class="lbl-s sage" id="tier-email-marketing">Tier</span>
            <div class="sel">
              <select data-k="tier" aria-labelledby="tier-email-marketing">
                <option value="bronze" selected="">Bronze</option>
                <option value="silver">Silver</option>
                <option value="gold">Gold</option>
              </select>
            </div>
          </div>
          <div class="cart-line-ctl term">
            <span class="lbl-s sage" id="term-email-marketing">Term</span>
            <div class="sel">
              <select data-k="term" aria-labelledby="term-email-marketing">
                <option value="1" selected="">1 month</option>
                <option value="3">3 months</option>
                <option value="6">6 months</option>
                <option value="12">12 months</option>
              </select>
            </div>
          </div>
        </div>
        <div class="cart-line-price">
          <span class="amt" data-gbp="79" data-shown-cur="GBP">£79</span>
          <button type="button" class="rm" aria-label="Remove Email marketing">Remove</button>
        </div>
      </article>
    </div>
    <aside class="pur-sum on" data-r="" aria-labelledby="sumT">
      <h2 id="sumT">Summary</h2>
      <div class="pur-sum-lines" id="sumLines">
        <div class="pur-sum-line" data-id="seo">
          <div>
            <b>SEO</b>
            <small>Silver, 12 months</small>
          </div>
          <span class="price" data-gbp="3254" data-shown-cur="GBP">£3,254</span>
        </div>
        <div class="pur-sum-line" data-id="ux-ui">
          <div>
            <b>UX/UI</b>
            <small>Bronze, one price</small>
          </div>
          <span class="price" data-gbp="375" data-shown-cur="GBP">£375</span>
        </div>
        <div class="pur-sum-line" data-id="email-marketing">
          <div>
            <b>Email marketing</b>
            <small>Bronze, 1 month</small>
          </div>
          <span class="price" data-gbp="79" data-shown-cur="GBP">£79</span>
        </div>
      </div>
      <div class="pur-sum-total">
        <b>Total at checkout</b>
        <span class="amt" id="sumTotal" data-shown="3708">£3,708</span>
      </div>
      <a href="checkout.php" class="btn full">Go to checkout</a>
      <p class="small">You sign in or create an account before you pay. Each service runs for its own term.</p>
    </aside>
  </section>
  <section class="cart-empty" id="cartEmpty" hidden="" aria-label="Your cart is empty">
    <h2 class="t-h3" data-lines="">
      <span class="ln">
        <span style="--i:0">Your cart is empty</span>
      </span>
    </h2>
    <p class="lead" data-r="">Start from Discovery or Decision, or build your own mix of services.</p>
    <div class="cart-empty-acts" data-r="">
      <a href="services.php" class="btn">Explore services</a>
      <a href="build-your-own.php" class="btn outline">Build your own</a>
    </div>
  </section>
</div>

<?php include 'includes/footer.php'; ?>

