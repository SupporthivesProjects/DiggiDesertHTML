<?php include 'includes/header.php'; ?>

<section class="ihero auth" aria-label="Sign in">
  <div class="bg"><img src="assets/img/auth-sign-in.jpg" width="2560" height="1440" alt="A straw hat and a linen tote bag hanging on wooden pegs above a teal bench"></div>
  <div class="ov"></div>
  <div class="auth-card" data-r>
    <div class="auth-head">
      <h1 data-lines>Sign in</h1>
      <p>Your orders, invoices and finished files, all in one place.</p>
    </div>
    <form class="auth-form" id="signin" novalidate>
      <div class="frow">
  <div class="field"><label for="email">Email</label><input id="email" name="email" type="email" required placeholder="john@example.com" autocomplete="email"><span class="msg">Enter your email address.</span></div>
  <div class="field"><label for="password">Password</label><div class="pw"><input id="password" name="password" type="password" required placeholder="••••••••••" autocomplete="current-password"><button class="eye" type="button" aria-label="Show password" aria-pressed="false"><svg viewBox="0 0 20 20" width="20" height="20" fill="none" aria-hidden="true"><path d="M1 10C4 4 16 4 19 10C16 16 4 16 1 10Z" stroke="currentColor" stroke-width="1.5"/><circle cx="10" cy="10" r="3" fill="currentColor"/></svg></button></div><span class="msg">Enter your password.</span></div>
      </div>
      <div class="auth-act"><a href="forgot-password.html" class="jl auth-link">Forgot password?</a><button class="btn" type="submit">Sign in</button></div>
    </form>
    <div class="auth-foot">
      <div class="rule"></div>
      <p>New here? <a href="sign-up.html">Create an account</a></p>
    </div>
  </div>
</section>

<div class="pop" id="saved" role="dialog" aria-modal="true" aria-labelledby="savedT" aria-hidden="false">
    <div class="pop-box">
        <div class="pop-top"><span class="lbl">Posted</span><span class="postmark" aria-hidden="true"><i class="wave"><svg viewBox="0 0 91 10.5" width="90" height="9" fill="none"><path d="M.4 5.25c10-6 20-6 30 0s20 6 30 0 20-6 30 0" stroke="currentColor" stroke-width="1.5"></path></svg></i><i class="wave"><svg viewBox="0 0 91 10.5" width="90" height="9" fill="none"><path d="M.4 5.25c10-6 20-6 30 0s20 6 30 0 20-6 30 0" stroke="currentColor" stroke-width="1.5"></path></svg></i><i class="wave"><svg viewBox="0 0 91 10.5" width="90" height="9" fill="none"><path d="M.4 5.25c10-6 20-6 30 0s20 6 30 0 20-6 30 0" stroke="currentColor" stroke-width="1.5"></path></svg></i><i class="ring"></i><i class="ring2"></i><span class="mk"><svg viewBox="0 0 34 34" width="36" height="36" aria-hidden="true"><defs><clipPath id="pmclip"><rect x="0" y="0" width="34" height="20"></rect></clipPath></defs><circle cx="17" cy="17" r="16.23" fill="none" stroke="currentColor" stroke-width="1.545"></circle><g clip-path="url(#pmclip)"><path d="M10.5 20a6.5 6.5 0 0 1 13 0z" fill="currentColor"></path></g><path d="M2.5 20H31.5" fill="none" stroke="currentColor" stroke-width="1.545" stroke-linecap="round"></path></svg></span></span>
        </div>
        <h2 id="savedT">Check your email</h2>
        <p>Your account details are up to date.</p>
        <div class="rule"></div>
        <button class="btn" type="button" data-pop-close="">Done</button>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

