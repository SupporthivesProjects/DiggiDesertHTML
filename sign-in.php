<?php include 'includes/header.php'; ?>

<section class="ihero auth in" aria-label="Sign in">
  <div class="bg"><img src="assets/img/auth-sign-in.jpg" width="2560" height="1440" alt="A straw hat and a linen tote bag hanging on wooden pegs above a teal bench"></div>
  <div class="ov"></div>
  <div class="auth-card on" data-r="" style="--d: 0s;">
    <div class="auth-head">
      <h1 data-lines="" class="on" style="--d: 0.08s;"><span class="ln"><span style="--i:0">Sign in</span></span></h1>
      <p>Your orders, invoices and finished files, all in one place.</p>
    </div>
    <form class="auth-form" id="signin" novalidate="">
      <div class="frow">
  <div class="field"><label for="email">Email</label><input id="email" name="email" type="email" required="" placeholder="john@example.com" autocomplete="email"><span class="msg">Enter your email address.</span></div>
  <div class="field"><label for="password">Password</label><div class="pw"><input id="password" name="password" type="password" required="" placeholder="••••••••••" autocomplete="current-password"><button class="eye" type="button" aria-label="Show password" aria-pressed="false"><svg viewBox="0 0 20 20" width="20" height="20" fill="none" aria-hidden="true"><path d="M1 10C4 4 16 4 19 10C16 16 4 16 1 10Z" stroke="currentColor" stroke-width="1.5"></path><circle cx="10" cy="10" r="3" fill="currentColor"></circle></svg></button></div><span class="msg">Enter your password.</span></div>
      </div>
      <div class="auth-act"><a href="forgot-password.html" class="jl auth-link">Forgot password?</a><button class="btn" type="submit">Sign in</button></div>
    </form>
    <div class="auth-foot">
      <div class="rule"></div>
      <p>New here? <a href="sign-up.html">Create an account</a></p>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>

