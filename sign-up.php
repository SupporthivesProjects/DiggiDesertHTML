<?php include 'includes/header.php'; ?>

<section class="ihero auth tall" aria-label="Create an account">
  <div class="bg"><img src="assets/img/auth-sign-up.jpg" width="2391" height="1445" alt="A teal glass vase holding an olive branch beside a stack of folded linen tied with a ribbon"></div>
  <div class="ov"></div>
  <div class="auth-card" data-r>
    <div class="auth-head">
      <h1 data-lines>Create an account</h1>
      <p style="max-width:280px">One account keeps every order, invoice and finished file together.</p>
    </div>
    <form class="auth-form" id="signup" novalidate>
      <div class="frow">
  <div class="field"><label for="name">Full name</label><input id="name" name="name" type="text" required placeholder="John Smith" autocomplete="name"><span class="msg">Enter your full name.</span></div>
  <div class="field"><label for="email">Email</label><input id="email" name="email" type="email" required placeholder="john@example.com" autocomplete="email"><span class="msg">Enter a valid email address.</span></div>
      </div>
      <div class="frow">
        <div class="field"><label for="password">Password</label><div class="pw"><input id="password" name="password" type="password" required minlength="8" placeholder="••••••••••" autocomplete="new-password"><button class="eye" type="button" aria-label="Show password" aria-pressed="false"><svg viewBox="0 0 20 20" width="20" height="20" fill="none" aria-hidden="true"><path d="M1 10C4 4 16 4 19 10C16 16 4 16 1 10Z" stroke="currentColor" stroke-width="1.5"/><circle cx="10" cy="10" r="3" fill="currentColor"/></svg></button></div><span class="msg">Use at least 8 characters.</span></div>
        <div class="field"><label for="confirm">Confirm password</label><div class="pw"><input id="confirm" name="confirm" type="password" required data-match="#password" placeholder="••••••••••" autocomplete="new-password"><button class="eye" type="button" aria-label="Show password" aria-pressed="false"><svg viewBox="0 0 20 20" width="20" height="20" fill="none" aria-hidden="true"><path d="M1 10C4 4 16 4 19 10C16 16 4 16 1 10Z" stroke="currentColor" stroke-width="1.5"/><circle cx="10" cy="10" r="3" fill="currentColor"/></svg></button></div><span class="msg">The passwords do not match.</span></div>
      </div>
      <label class="check"><input type="checkbox" required><span class="box"><svg viewBox="0 0 12 10" fill="none" aria-hidden="true"><path d="M1 5l3.5 3.5L11 1.5" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></span><span>I agree to the <a href="terms.html">Terms and conditions</a> and the <a href="privacy.html">Privacy policy</a>.</span></label>
      <div class="submit auth-submit"><div class="recaptcha"><span class="l"><span class="cb"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 12.5l5 5L20 7" stroke="#3F8F5A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>I'm not a robot</span><span class="brand"><svg viewBox="0 0 27.37 28" width="28" height="28" fill="none" aria-hidden="true"><mask id="rcmask" fill="#fff"><path d="M27.3747 18.1373C26.4526 21.1182 24.5611 23.7056 22.0006 25.4887C19.4401 27.2719 16.3572 28.1485 13.2415 27.9795C10.1259 27.8104 7.15597 26.6054 4.80338 24.5557C2.45079 22.506 0.850353 19.7291 0.256187 16.6659C-0.33798 13.6028 0.108177 10.4289 1.52382 7.64828C2.93946 4.86765 5.24345 2.63962 8.06996 1.31796C10.8965 -0.00369987 14.0835 -0.343244 17.125 0.353241C20.1665 1.04973 22.8882 2.74232 24.8579 5.16228L14 14L27.3747 18.1373Z"/></mask><path d="M27.3747 18.1373C26.4526 21.1182 24.5611 23.7056 22.0006 25.4887C19.4401 27.2719 16.3572 28.1485 13.2415 27.9795C10.1259 27.8104 7.15597 26.6054 4.80338 24.5557C2.45079 22.506 0.850353 19.7291 0.256187 16.6659C-0.33798 13.6028 0.108177 10.4289 1.52382 7.64828C2.93946 4.86765 5.24344 2.63962 8.06996 1.31796C10.8965 -0.00369987 14.0835 -0.343244 17.125 0.353241C20.1665 1.04973 22.8882 2.74232 24.8579 5.16228L14 14L27.3747 18.1373Z" stroke="#4A8FD9" stroke-width="6" mask="url(#rcmask)"/></svg><b>reCAPTCHA</b><small>Privacy · Terms</small></span></div><button class="btn" type="submit">Create account</button></div>
    </form>
    <div class="auth-foot">
      <div class="rule"></div>
      <p>Already have an account? <a href="sign-in.html">Sign in</a></p>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>

