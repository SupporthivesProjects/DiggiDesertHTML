<?php include 'includes/header.php'; ?>

<section class="ihero auth" aria-label="Reset your password">
  <div class="bg">
    <img src="assets/img/auth-reset-password.jpg" width="2560" height="1440" alt="A lit oil lamp and a blue ceramic jug in a whitewashed alcove">
  </div>
  <div class="ov"></div>
  <div class="auth-card" data-r>
    <div class="auth-head auth-head1">
      <p class="lbl sage lb2">Account help</p>
      <h1 data-lines>Reset your password</h1>
      <p class="para" style="max-width:330px">Enter the email you signed up with and we will send you a link to set a new one.</p>
    </div>
    <form class="auth-form" id="forgot" novalidate>
      <div class="frow auth-one">
        <div class="field field1">
          <label for="email">Email</label>
          <input id="email" name="email" type="email" required placeholder="john@example.com" autocomplete="email">
          <span class="msg">Enter a valid email address.</span>
        </div>
        <button class="btn btn1" type="submit">Send reset link</button>
      </div>
    </form>
    <div class="auth-foot">
      <div class="rule rule1"></div>
      <p>Remembered it? <a href="sign-in.php">Sign in</a>
      </p>
    </div>
  </div>
</section>
<div class="pop" id="check" role="dialog" aria-modal="true" aria-labelledby="checkT" aria-hidden="true">
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
    <h2 id="checkT">Check your email</h2>
    <p>A reset link is on its way to john@example.com.</p>
    <div class="rule "></div>
    <button class="btn" type="button" data-pop-close="new-password.php">Done</button>
  </div>
</div>

<?php include 'includes/footer.php'; ?>