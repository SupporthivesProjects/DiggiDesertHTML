<?php include 'includes/header.php'; ?> <section class="ihero auth" aria-label="Set a new password">
  <div class="bg">
    <img src="assets/img/auth-reset-password.jpg" width="2560" height="1440" alt="A lit oil lamp and a blue ceramic jug in a whitewashed alcove">
  </div>
  <div class="ov"></div>
  <div class="auth-card" data-r>
    <div class="auth-head auth-head1">
      <p class="lbl sage lb2">Account help</p>
      <h1 data-lines>Set a new password</h1>
      <p class="para" style="max-width:330px">Choose a new password for john@example.com, then sign in with it.</p>
    </div>
    <form class="auth-form" id="newpw" novalidate>
      <div class="frow frow1">
        <div class="field">
          <label for="password">New password</label>
          <div class="pw">
            <input id="password" name="password" type="password" required minlength="8" placeholder="••••••••••" autocomplete="new-password">
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
            <input id="confirm" name="confirm" type="password" required data-match="#password" placeholder="••••••••••" autocomplete="new-password">
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
      <button class="btn full" type="submit">Save password</button>
    </form>
    <div class="auth-foot">
      <div class="rule rule1"></div>
      <p>
        <a href="sign-in.html">Back to sign in</a>
      </p>
    </div>
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
    <h2 id="savedT">Password saved</h2>
    <p>You can sign in with your new password now.</p>
    <div class="rule"></div>
    <button class="btn btn1" type="button" data-pop-close="sign-in.html">Done</button>
  </div>
</div> <?php include 'includes/footer.php'; ?>