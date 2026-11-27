<?php include 'includes/header.php'; ?>

  <section class="ihero band pur-hero in" aria-label="Checkout">
    <div class="pur-media">
      <img src="assets/img/checkout-hero.jpg" width="1440" height="960" alt="An old brass key and a small teal dish resting on folded linen on a wooden table">
    </div>
    <div class="copy">
      <span class="lbl lsage fx co-out-only" style="--d:.5s">Before you pay</span>
      <span class="lbl lsage fx co-in-only" style="--d:.5s">Signed in as <span data-user-name="">John Smith</span>
      </span>
      <h1 class="t-display on" data-lines="" style="--d: 0s;">
        <span class="ln">
          <span style="--i:0">Checkout</span>
        </span>
      </h1>
      <p class="lead fx co-out-only" style="--d:.9s">Sign in, or create an account, so your <br>order and its work have a home. </p>
      <p class="lead fx co-in-only" style="--d:.9s">Check your details and your order, <br>then finish paying on a secure page. </p>
      <p class="co-signed fx co-in-only" style="--d:1s">Signed in as <span data-user-name="">John Smith</span>
      </p>
    </div>
  </section>
  <section class="co-mod wrap" id="coMod" aria-label="Checkout">
    <div class="co-auth co-fade co-out-only" id="coAuth">
      <div class="co-card signin" data-r="">
        <form id="signinForm" novalidate="" aria-labelledby="signinT">
          <h2 id="signinT">Sign in</h2>
          <div class="field">
            <label for="siEmail">Email</label>
            <input type="email" id="siEmail" name="email" autocomplete="email" value="john@example.com" required="">
            <span class="msg">Enter your email address.</span>
          </div>
          <div class="field">
            <label for="siPw">Password</label>
            <div class="pw">
              <input type="password" id="siPw" name="password" autocomplete="current-password" value="passwordA1" required="">
              <button class="eye" type="button" aria-label="Show password" aria-pressed="false">
                <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                  <path d="M1 10C4 4 16 4 19 10C16 16 4 16 1 10Z" stroke="currentColor" stroke-width="1.5"></path>
                  <circle cx="10" cy="10" r="3" fill="currentColor"></circle>
                </svg>
              </button>
            </div>
            <span class="msg">Enter your password.</span>
          </div>
          <a href="forgot-password.php" class="co-forgot">Forgot password?</a>
          <button class="btn full" type="submit">Sign in and continue</button>
        </form>
        <div class="co-why">
          <span class="lbl-s sage">Why an account</span>
          <p>Your account holds your orders, invoices and finished work in one place, for as long as you need them.</p>
        </div>
      </div>
      <div class="co-card" data-r="">
        <form id="createForm" novalidate="" aria-labelledby="createT">
          <h2 id="createT">Create an account</h2>
          <div class="field">
            <label for="crName">Full name</label>
            <input type="text" id="crName" name="name" autocomplete="name" value="John Smith" required="">
            <span class="msg">Enter your full name.</span>
          </div>
          <div class="field">
            <label for="crEmail">Email</label>
            <input type="email" id="crEmail" name="email" autocomplete="email" value="john@example.com" required="">
            <span class="msg">Enter a valid email address.</span>
          </div>
          <div class="field">
            <label for="crPw">Password</label>
            <div class="pw">
              <input type="password" id="crPw" name="password" autocomplete="new-password" value="passwordA1" minlength="8" required="">
              <button class="eye" type="button" aria-label="Show password" aria-pressed="false">
                <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                  <path d="M1 10C4 4 16 4 19 10C16 16 4 16 1 10Z" stroke="currentColor" stroke-width="1.5"></path>
                  <circle cx="10" cy="10" r="3" fill="currentColor"></circle>
                </svg>
              </button>
            </div>
            <span class="msg">Use at least 8 characters.</span>
          </div>
          <div class="field">
            <label for="crPw2">Confirm password</label>
            <div class="pw">
              <input type="password" id="crPw2" name="confirm" autocomplete="new-password" value="passwordA1" data-match="#crPw" required="">
              <button class="eye" type="button" aria-label="Show password" aria-pressed="false">
                <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                  <path d="M1 10C4 4 16 4 19 10C16 16 4 16 1 10Z" stroke="currentColor" stroke-width="1.5"></path>
                  <circle cx="10" cy="10" r="3" fill="currentColor"></circle>
                </svg>
              </button>
            </div>
            <span class="msg">The passwords do not match.</span>
          </div>
          <label class="check">
            <input type="checkbox" name="consent" required="">
            <span class="box">
              <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                <path d="M5 10.25L8.5 13.75L15 6.25" stroke="#fff" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </span>
            <span>I agree to the <a href="terms.php">Terms and conditions</a> and the <a href="privacy.php">Privacy policy</a>. </span>
          </label>
          <div class="recaptcha" role="checkbox" tabindex="0" aria-checked="false">
            <span class="l">
              <span class="cb">
                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                  <path d="M4 12.5L9.5 18L20 7" stroke="#3F8F5A" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </span>I'm not a robot </span>
            <span class="brand">
              <svg viewBox="0 0 28 28" fill="none" aria-hidden="true">
                <path d="M14 2a12 12 0 0 1 10.4 6l-3.5 2A8 8 0 0 0 6.1 12H3.2A12 12 0 0 1 14 2z" fill="#1C3AA9"></path>
                <path d="M26 14a12 12 0 0 1-6 10.4l-2-3.5A8 8 0 0 0 20 14h-2.5l4.5-5 4 5z" fill="#4285F4"></path>
                <path d="M14 26A12 12 0 0 1 3.6 20l3.5-2A8 8 0 0 0 14 22c1.1 0 2.1-.2 3-.6l1.4 2.6A12 12 0 0 1 14 26z" fill="#ABABAB"></path>
              </svg>
              <b>reCAPTCHA</b>
              <small>Privacy · Terms</small>
            </span>
          </div>
          <button class="btn outline full" type="submit">Create account and continue</button>
        </form>
      </div>
    </div>
    <div class="co-details co-fade co-in-only" id="coDetails">
      <form id="detailsForm" novalidate="" aria-labelledby="detailsT" data-r="" class="on" style="--d: 0s;">
        <h2 id="detailsT">Your details</h2>
        <div class="co-fields">
          <div class="frow">
            <div class="field">
              <label for="dName">Full name</label>
              <input type="text" id="dName" name="name" autocomplete="name" value="John Smith" required="">
              <span class="msg">Enter your full name.</span>
            </div>
            <div class="field">
              <label for="dEmail">Email</label>
              <input type="email" id="dEmail" name="email" autocomplete="email" value="john@example.com" required="">
              <span class="msg">Enter a valid email address.</span>
            </div>
          </div>
          <div class="frow">
            <div class="field">
              <label for="dPhone">Phone</label>
              <input type="tel" id="dPhone" name="phone" autocomplete="tel" value="+44 7700 900123" required="">
              <span class="msg">Enter your phone number.</span>
            </div>
            <div class="field">
              <label for="dDob">Date of birth</label>
              <input type="text" id="dDob" name="dob" inputmode="numeric" autocomplete="bday" value="12 / 05 / 1990" required="">
              <span class="msg">Enter your date of birth.</span>
            </div>
          </div>
          <div class="field">
            <label for="dAddress">Address</label>
            <input type="text" id="dAddress" name="address" autocomplete="street-address" value="14 Birch Lane" required="">
            <span class="msg">Enter your address.</span>
          </div>
          <div class="frow">
            <div class="field">
              <span id="dCountryL">Country</span>
              <div class="sel">
                <select name="country" aria-labelledby="dCountryL" autocomplete="country-name" required="">
                  <option>United Kingdom</option>
                  <option>Ireland</option>
                  <option>France</option>
                  <option>Germany</option>
                  <option>Spain</option>
                  <option>Italy</option>
                  <option>Netherlands</option>
                  <option>United States</option>
                  <option>Canada</option>
                  <option>Australia</option>
                </select>
                <button type="button" class="sel-btn" aria-haspopup="listbox" aria-expanded="false">
                  <span>United Kingdom</span>
                  <svg viewBox="0 0 13.5 7.5" fill="none" aria-hidden="true">
                    <path d="M.75.75l6 6 6-6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </button>
                <ul class="sel-list" role="listbox">
                  <li role="option" data-value="United Kingdom" aria-selected="true">United Kingdom</li>
                  <li role="option" data-value="Ireland" aria-selected="false">Ireland</li>
                  <li role="option" data-value="France" aria-selected="false">France</li>
                  <li role="option" data-value="Germany" aria-selected="false">Germany</li>
                  <li role="option" data-value="Spain" aria-selected="false">Spain</li>
                  <li role="option" data-value="Italy" aria-selected="false">Italy</li>
                  <li role="option" data-value="Netherlands" aria-selected="false">Netherlands</li>
                  <li role="option" data-value="United States" aria-selected="false">United States</li>
                  <li role="option" data-value="Canada" aria-selected="false">Canada</li>
                  <li role="option" data-value="Australia" aria-selected="false">Australia</li>
                </ul>
              </div>
              <span class="msg">Choose your country.</span>
            </div>
            <div class="field">
              <label for="dCity">City</label>
              <input type="text" id="dCity" name="city" autocomplete="address-level2" value="Bristol" required="">
              <span class="msg">Enter your city.</span>
            </div>
            <div class="field">
              <label for="dPost">Postcode</label>
              <input type="text" id="dPost" name="postcode" autocomplete="postal-code" value="BS1 4DJ" required="">
              <span class="msg">Enter your postcode.</span>
            </div>
          </div>
        </div>
      </form>
    </div>
    <aside class="pur-sum on" data-sticky="120" data-r="" aria-labelledby="sumT" style="position: relative; transform: translate3d(0px, 0px, 0px); --d: 0s;">
      <h2 id="sumT">Summary</h2>
      <div class="pur-sum-lines" id="coLines">
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
      <div class="pur-sum-total co-out-only">
        <b>Total at checkout</b>
        <span class="amt" id="coTotalOut" data-shown="3708">£3,708</span>
      </div>
      <p class="small co-out-only">Change a package or its term from your cart.</p>
      <div class="co-code co-in-only" id="coCode">
        <div class="field">
          <label for="coCodeIn">Discount code</label>
          <input type="text" id="coCodeIn" name="code" autocomplete="off" value="WELCOME10" autocapitalize="characters">
          <span class="msg">That code was not recognised.</span>
        </div>
        <button class="btn outline" type="button" id="coApply" aria-pressed="true">Applied</button>
      </div>
      <div class="pur-sums co-in-only">
        <div>
          <span>Subtotal</span>
          <span id="coSub" data-shown="3708">£3,708</span>
        </div>
        <div id="coDiscRow">
          <span>Discount, WELCOME10</span>
          <span>
            <span id="coDisc" data-shown="370.8">£370.80</span> off </span>
        </div>
      </div>
      <div class="pur-sum-total co-in-only">
        <b>Total today</b>
        <span class="amt" id="coTotal" data-shown="3337.2">£3,337.20</span>
      </div>
      <div class="co-in-only" id="coConsent">
        <label class="check">
          <input type="checkbox" name="consent" required="">
          <span class="box">
            <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
              <path d="M5 10.25L8.5 13.75L15 6.25" stroke="#fff" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </span>
          <span>I agree to the <a href="terms.php">Terms and conditions</a> and the <a href="privacy.php">Privacy policy</a>. </span>
        </label>
      </div>
      <button class="btn full co-in-only" type="button" id="coPay">Continue to secure payment</button>
      <div class="pur-logos co-in-only">
        <svg viewBox="0 0 76 24" role="img" aria-label="Visa and Mastercard">
          <g>
            <path d="M33 0H3C1.34315 0 0 1.34315 0 3V21C0 22.6569 1.34315 24 3 24H33C34.6569 24 36 22.6569 36 21V3C36 1.34315 34.6569 0 33 0Z" fill="white"></path>
            <g>
              <path d="M7.87083 9.22727L9.62864 14.7528H9.69611L11.4575 9.22727H13.162L10.6549 16.5H8.67338L6.16273 9.22727H7.87083Z" fill="#1A1F71"></path>
              <path d="M15.575 9.22727V16.5H14.0374V9.22727H15.575Z" fill="#1A1F71"></path>
              <path d="M20.7854 11.3189C20.757 11.0324 20.6351 10.8099 20.4197 10.6513C20.2042 10.4927 19.9118 10.4134 19.5425 10.4134C19.2916 10.4134 19.0797 10.4489 18.9069 10.5199C18.734 10.5885 18.6015 10.6844 18.5091 10.8075C18.4192 10.9306 18.3742 11.0703 18.3742 11.2266C18.3695 11.3568 18.3967 11.4704 18.4559 11.5675C18.5174 11.6645 18.6015 11.7486 18.708 11.8196C18.8145 11.8883 18.9376 11.9486 19.0773 12.0007C19.217 12.0504 19.3662 12.093 19.5248 12.1286L20.1782 12.2848C20.4954 12.3558 20.7866 12.4505 21.0518 12.5689C21.3169 12.6873 21.5465 12.8329 21.7407 13.0057C21.9348 13.1785 22.0851 13.3821 22.1917 13.6165C22.3006 13.8509 22.3562 14.1196 22.3586 14.4226C22.3562 14.8677 22.2426 15.2536 22.0177 15.5803C21.7951 15.9046 21.4732 16.1567 21.0518 16.3366C20.6327 16.5142 20.1273 16.603 19.5354 16.603C18.9483 16.603 18.4369 16.513 18.0013 16.3331C17.5681 16.1532 17.2296 15.8868 16.9857 15.5341C16.7442 15.179 16.6176 14.7398 16.6057 14.2166H18.0937C18.1102 14.4605 18.1801 14.6641 18.3032 14.8274C18.4287 14.9884 18.5956 15.1103 18.8039 15.1932C19.0146 15.2737 19.2525 15.3139 19.5177 15.3139C19.7781 15.3139 20.0042 15.276 20.1959 15.2003C20.3901 15.1245 20.5404 15.0192 20.6469 14.8842C20.7535 14.7493 20.8067 14.5942 20.8067 14.419C20.8067 14.2557 20.7582 14.1184 20.6611 14.0071C20.5664 13.8958 20.4268 13.8011 20.2421 13.723C20.0598 13.6449 19.8361 13.5739 19.5709 13.5099L18.779 13.3111C18.1659 13.1619 17.6817 12.9287 17.3266 12.6115C16.9715 12.2943 16.7951 11.867 16.7975 11.3295C16.7951 10.8892 16.9123 10.5045 17.1491 10.1754C17.3882 9.84635 17.7161 9.58949 18.1327 9.40483C18.5494 9.22017 19.0229 9.12784 19.5532 9.12784C20.093 9.12784 20.5641 9.22017 20.9665 9.40483C21.3714 9.58949 21.6862 9.84635 21.9111 10.1754C22.136 10.5045 22.252 10.8857 22.2591 11.3189H20.7854Z" fill="#1A1F71"></path>
              <path d="M24.4804 16.5H22.8327L25.3433 9.22727H27.3248L29.8319 16.5H28.1842L26.3625 10.8892H26.3057L24.4804 16.5ZM24.3774 13.6413H28.2694V14.8416H24.3774V13.6413Z" fill="#1A1F71"></path>
            </g>
            <path d="M73 0H43C41.3431 0 40 1.34315 40 3V21C40 22.6569 41.3431 24 43 24H73C74.6569 24 76 22.6569 76 21V3C76 1.34315 74.6569 0 73 0Z" fill="white"></path>
            <path d="M53.5 19C57.366 19 60.5 15.866 60.5 12C60.5 8.13401 57.366 5 53.5 5C49.634 5 46.5 8.13401 46.5 12C46.5 15.866 49.634 19 53.5 19Z" fill="#EB001B"></path>
            <path d="M62.5 19C66.366 19 69.5 15.866 69.5 12C69.5 8.13401 66.366 5 62.5 5C58.634 5 55.5 8.13401 55.5 12C55.5 15.866 58.634 19 62.5 19Z" fill="#F79E1B"></path>
            <path d="M58 6.6C58.7962 7.25675 59.4373 8.08143 59.8774 9.01499C60.3176 9.94856 60.5458 10.9679 60.5458 12C60.5458 13.0321 60.3176 14.0514 59.8774 14.985C59.4373 15.9186 58.7962 16.7433 58 17.4C57.2038 16.7433 56.5627 15.9186 56.1226 14.985C55.6824 14.0514 55.4542 13.0321 55.4542 12C55.4542 10.9679 55.6824 9.94856 56.1226 9.01499C56.5627 8.08143 57.2038 7.25675 58 6.6Z" fill="#FF5F00"></path>
          </g>
        </svg>
      </div>
    </aside>
  </section>

<?php include 'includes/footer.php'; ?>

