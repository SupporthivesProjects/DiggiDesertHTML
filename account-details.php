<?php include 'includes/header.php'; ?>
<section class="ihero acct" aria-label="Account">
  <div class="bg">
    <img src="assets/img/account-hero-stockroom.jpg" width="2560" height="746" alt="Shelves of folded linen and blue ceramic jars in a sunlit stockroom">
  </div>
  <div class="ov"></div>
  <div class="acct-copy">
    <p class="lbl lsage" data-r>Signed in as <span data-user-name>John Smith</span>
    </p>
    <h1 class="t-h1" data-lines>Account details</h1>
    <p class="lead" data-r>Your details and password. Change either one at any time.</p>
  </div>
  <nav class="acct-nav" aria-label="Account pages" data-r>
    <div class="acct-tabs">
      <a href="account-orders.php">
        <span class="l">Orders and invoices</span>
        <span class="s">Orders</span>
      </a>
      <a href="account-deliverables.php">Deliverables</a>
      <a href="account-details.php" aria-current="page">
        <span class="l">Account details</span>
        <span class="s">Details</span>
      </a>
    </div>
    <button class="acct-out" type="button" id="signout">Sign out</button>
  </nav>
</section>
<section class="wrap sec" id="details">
  <div class="det">
    <form class="det-card main" id="detailsForm" novalidate data-r>
      <h2>Your details</h2>
      <div class="det-fields">
        <div class="frow">
          <div class="field">
            <label for="name">Full name</label>
            <input id="name" name="name" type="text" required value="John Smith" autocomplete="name">
            <span class="msg">Enter your full name.</span>
          </div>
          <div class="field">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" required value="john@example.com" autocomplete="email">
            <span class="msg">Enter a valid email address.</span>
          </div>
        </div>
        <div class="frow">
          <div class="field">
            <label for="phone">Phone</label>
            <input id="phone" name="phone" type="tel" required value="+44 7700 900123" autocomplete="tel">
            <span class="msg">Enter your phone number.</span>
          </div>
          <div class="field">
            <label for="dob">Date of birth</label>
            <input id="dob" name="dob" type="text" required value="12 / 05 / 1990" inputmode="numeric" autocomplete="bday">
            <span class="msg">Enter your date of birth.</span>
          </div>
        </div>
        <div class="field">
          <label for="address">Address</label>
          <input id="address" name="address" type="text" required value="14 Birch Lane" autocomplete="street-address">
          <span class="msg">Enter your address.</span>
        </div>
        <div class="frow">
          <div class="field">
            <label for="country">Country</label>
            <div class="sel">
              <select id="country" name="country" required autocomplete="country-name">
                <option>United Kingdom</option>
                <option>Ireland</option>
                <option>France</option>
                <option>Germany</option>
                <option>Spain</option>
                <option>Netherlands</option>
                <option>United States</option>
                <option>Canada</option>
                <option>Australia</option>
              </select>
            </div>
            <span class="msg">Choose your country.</span>
          </div>
          <div class="field">
            <label for="city">City</label>
            <input id="city" name="city" type="text" required value="Bristol" autocomplete="address-level2">
            <span class="msg">Enter your city.</span>
          </div>
          <div class="field">
            <label for="postcode">Postcode</label>
            <input id="postcode" name="postcode" type="text" required value="BS1 4DJ" autocomplete="postal-code">
            <span class="msg">Enter your postcode.</span>
          </div>
        </div>
      </div>
      <button class="btn" type="submit">Save details</button>
    </form>
    <form class="det-card pass" id="passwordForm" novalidate data-r>
      <div class="det-fields">
        <h2>Password</h2>
        <div class="field">
          <label for="current">Current password</label>
          <div class="pw">
            <input id="current" name="current" type="password" required placeholder="••••••••••" autocomplete="current-password">
            <button class="eye" type="button" aria-label="Show password" aria-pressed="false">
              <svg viewBox="0 0 20 20" width="20" height="20" fill="none" aria-hidden="true">
                <path d="M1 10C4 4 16 4 19 10C16 16 4 16 1 10Z" stroke="currentColor" stroke-width="1.5" />
                <circle cx="10" cy="10" r="3" fill="currentColor" />
              </svg>
            </button>
          </div>
          <span class="msg">Enter your current password.</span>
        </div>
        <div class="field">
          <label for="newpw">New password</label>
          <div class="pw">
            <input id="newpw" name="newpw" type="password" required minlength="8" placeholder="••••••••••" autocomplete="new-password">
            <button class="eye" type="button" aria-label="Show password" aria-pressed="false">
              <svg viewBox="0 0 20 20" width="20" height="20" fill="none" aria-hidden="true">
                <path d="M1 10C4 4 16 4 19 10C16 16 4 16 1 10Z" stroke="currentColor" stroke-width="1.5" />
                <circle cx="10" cy="10" r="3" fill="currentColor" />
              </svg>
            </button>
          </div>
          <span class="msg">Use at least 8 characters.</span>
        </div>
        <div class="field">
          <label for="confirm">Confirm new password</label>
          <div class="pw">
            <input id="confirm" name="confirm" type="password" required data-match="#newpw" placeholder="••••••••••" autocomplete="new-password">
            <button class="eye" type="button" aria-label="Show password" aria-pressed="false">
              <svg viewBox="0 0 20 20" width="20" height="20" fill="none" aria-hidden="true">
                <path d="M1 10C4 4 16 4 19 10C16 16 4 16 1 10Z" stroke="currentColor" stroke-width="1.5" />
                <circle cx="10" cy="10" r="3" fill="currentColor" />
              </svg>
            </button>
          </div>
          <span class="msg">The passwords do not match.</span>
        </div>
      </div>
      <button class="btn" type="submit">Save password</button>
    </form>
  </div>
</section>
<div class="pop" id="saved" role="dialog" aria-modal="true" aria-labelledby="savedT" aria-hidden="true">
  <div class="pop-box">
    <div class="pop-top">
      <span class="lbl">Posted</span>
      <span class="postmark" aria-hidden="true">
        <i class="wave">
          <svg viewBox="0 0 91 10.5" width="90" height="9" fill="none">
            <path d="M.4 5.25c10-6 20-6 30 0s20 6 30 0 20-6 30 0" stroke="currentColor" stroke-width="1.5" />
          </svg>
        </i>
        <i class="wave">
          <svg viewBox="0 0 91 10.5" width="90" height="9" fill="none">
            <path d="M.4 5.25c10-6 20-6 30 0s20 6 30 0 20-6 30 0" stroke="currentColor" stroke-width="1.5" />
          </svg>
        </i>
        <i class="wave">
          <svg viewBox="0 0 91 10.5" width="90" height="9" fill="none">
            <path d="M.4 5.25c10-6 20-6 30 0s20 6 30 0 20-6 30 0" stroke="currentColor" stroke-width="1.5" />
          </svg>
        </i>
        <i class="ring"></i>
        <i class="ring2"></i>
        <span class="mk">
          <svg viewBox="0 0 34 34" width="36" height="36" aria-hidden="true">
            <defs>
              <clipPath id="pmclip">
                <rect x="0" y="0" width="34" height="20" />
              </clipPath>
            </defs>
            <circle cx="17" cy="17" r="16.23" fill="none" stroke="currentColor" stroke-width="1.545" />
            <g clip-path="url(#pmclip)">
              <path d="M10.5 20a6.5 6.5 0 0 1 13 0z" fill="currentColor" />
            </g>
            <path d="M2.5 20H31.5" fill="none" stroke="currentColor" stroke-width="1.545" stroke-linecap="round" />
          </svg>
        </span>
      </span>
    </div>
    <h2 id="savedT">Details saved</h2>
    <p>Your account details are up to date.</p>
    <div class="rule"></div>
    <button class="btn" type="button" data-pop-close>Done</button>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
