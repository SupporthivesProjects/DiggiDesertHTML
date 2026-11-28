<?php include 'includes/header.php'; ?>

  <section class="ihero co-hero contact-hero" aria-labelledby="contactT">
    <div class="contact-media">
      <div class="bg">
        <img src="assets/img/contact-hero-door.jpg" width="1536" height="1497" alt="An olive tree in a terracotta pot beside a weathered teal door">
      </div>
      <div class="ov"></div>
      <div class="copy">
        <p class="lbl lsage fx" style="--d:.6s">Get in touch</p>
        <h1 class="t-display" id="contactT" data-lines>Contact</h1>
        <p class="lead fx" style="--d:.9s">Questions about a package, an order or something we do not list. Write to us here, or email us direct.</p>
        <a href="mailto:hello@diggidesert.com" class="biglink ul st fx" style="--d:1.1s">hello@diggidesert.com</a>
      </div>
    </div>
    <div class="contact-pane">
      <div class="texture"></div>
      <form class="contact-form" id="brief" novalidate aria-labelledby="writeT">
        <h2 class="t-h5" id="writeT">Write to us</h2>
        <div class="contact-fields">
          <div class="frow">
            <div class="field">
              <label for="cName">Full name</label>
              <input id="cName" name="name" type="text" placeholder="John Smith" autocomplete="name" required>
              <span class="msg">Enter your full name.</span>
            </div>
            <div class="field">
              <label for="cEmail">Email</label>
              <input id="cEmail" name="email" type="email" placeholder="john@example.com" autocomplete="email" required>
              <span class="msg">Enter a valid email address.</span>
            </div>
          </div>
          <div class="frow">
            <div class="field">
              <label for="cPhone">Phone</label>
              <input id="cPhone" name="phone" type="tel" placeholder="+44 7700 900123" autocomplete="tel">
              <span class="msg">Enter a phone number.</span>
            </div>
            <div class="field">
              <label for="cTopic">Topic</label>
              <div class="sel">
                <select id="cTopic" name="topic">
                  <option value="package">Choosing a package</option>
                  <option value="order">An order</option>
                  <option value="brief">A custom brief</option>
                  <option value="other">Something else</option>
                </select>
              </div>
            </div>
          </div>
          <div class="field">
            <label for="cMsg">Message</label>
            <textarea id="cMsg" name="message" placeholder="Type here" required></textarea>
            <span class="msg">Tell us what you need.</span>
          </div>
        </div>
        <label class="check">
          <input type="checkbox" name="consent" required>
          <span class="box">
            <svg viewBox="0 0 12 12" fill="none" aria-hidden="true">
              <path d="M2 6.5l2.6 2.5L10 3.5" stroke="#fff" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </span>
          <span>I agree to the <a href="terms.html">Terms and conditions</a> and the <a href="privacy.html">Privacy policy</a>. </span>
        </label>
        <div class="submit">
          <div class="recaptcha" aria-label="I'm not a robot">
            <span class="l">
              <span class="cb">
                <svg viewBox="0 0 22 22" fill="none" aria-hidden="true">
                  <path d="M4 11.5l4.5 4.5L18 6.5" stroke="#3F8F5A" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </span>I'm not a robot </span>
            <span class="brand">
              <svg viewBox="0 0 28 28" fill="none" aria-hidden="true">
                <path d="M14 2.5a11.5 11.5 0 0 1 10.9 7.7l-3.6 1.3a7.7 7.7 0 0 0-13.6-1.6L10.4 12H2.6V4.2l2.4 2.4A11.5 11.5 0 0 1 14 2.5z" fill="#1C3AA9" />
                <path d="M25.4 14a11.5 11.5 0 0 1-6.4 10.3l-1.7-3.4a7.7 7.7 0 0 0 4.3-6.9h3.8z" fill="#4285F4" />
                <path d="M14 25.5A11.5 11.5 0 0 1 2.6 15.2l3.8-.4a7.7 7.7 0 0 0 12.9 4.6l1.7 3.4a11.4 11.4 0 0 1-7 2.7z" fill="#ABABAB" />
              </svg>
              <b>reCAPTCHA</b>
              <small>Privacy · Terms</small>
            </span>
          </div>
          <button class="btn" type="submit">Send message</button>
        </div>
      </form>
    </div>
  </section>
  <section class="contact-ways stone wrap sec" aria-labelledby="waysT">
    <div class="head">
      <div class="contact-ways-head">
        <p class="lbl sage" data-r>Before you write</p>
        <h2 class="t-h2" id="waysT" data-lines>Other ways to get an answer</h2>
      </div>
      <p class="lead" data-r>Most questions are answered on the site already. Here is where to look.</p>
    </div>
    <div class="grid-3 contact-cards">
      <div class="contact-card" data-r>
        <span class="contact-index">1</span>
        <div>
          <h3 class="t-small">Choosing a package</h3>
          <p>Every service page lists what each tier includes and its price.</p>
        </div>
        <a href="services.html" class="jl ul st">Browse services</a>
      </div>
      <div class="contact-card" data-r>
        <span class="contact-index">2</span>
        <div>
          <h3 class="t-small">Orders and invoices</h3>
          <p>Sign in to find your orders, invoices and finished deliverables.</p>
        </div>
        <a href="sign-in.html" class="jl ul st">Sign in</a>
      </div>
      <div class="contact-card" data-r>
        <span class="contact-index">3</span>
        <div>
          <h3 class="t-small">Work we do not list</h3>
          <p>Send a custom brief from any path page and we will quote it.</p>
        </div>
        <a href="#brief" class="jl ul st">Send a brief</a>
      </div>
    </div>
  </section>
<div class="pop" id="sent" role="dialog" aria-modal="true" aria-labelledby="sentT" aria-hidden="true">
  <div class="pop-box">
    <div class="pop-top">
      <span class="lbl">Posted</span>
      <span class="postmark" aria-hidden="true">
        <i class="wave">
          <svg viewBox="0 0 91 10.5" fill="none">
            <path d="M.4 5.25c10-6 20-6 30 0s20 6 30 0 20-6 30 0" stroke="currentColor" stroke-width="1.5" />
          </svg>
        </i>
        <i class="wave">
          <svg viewBox="0 0 91 10.5" fill="none">
            <path d="M.4 5.25c10-6 20-6 30 0s20 6 30 0 20-6 30 0" stroke="currentColor" stroke-width="1.5" />
          </svg>
        </i>
        <i class="wave">
          <svg viewBox="0 0 91 10.5" fill="none">
            <path d="M.4 5.25c10-6 20-6 30 0s20 6 30 0 20-6 30 0" stroke="currentColor" stroke-width="1.5" />
          </svg>
        </i>
        <i class="ring"></i>
        <i class="ring2"></i>
        <span class="mk">
          <svg viewBox="0 0 34 34" aria-hidden="true">
            <defs>
              <clipPath id="pmclip">
                <rect x="0" y="0" width="34" height="20" />
              </clipPath>
            </defs>
            <circle cx="17" cy="17" r="16.23" fill="none" stroke="currentColor" stroke-width="1.545" transform="rotate(-90 17 17)" />
            <g clip-path="url(#pmclip)">
              <path d="M10.5 20a6.5 6.5 0 0 1 13 0z" fill="currentColor" />
            </g>
            <path d="M2.5 20H31.5" fill="none" stroke="currentColor" stroke-width="1.545" stroke-linecap="round" />
          </svg>
        </span>
      </span>
    </div>
    <h2 id="sentT">Message sent</h2>
    <p>Thanks, we will reply to you by email.</p>
    <div class="rule"></div>
    <button class="btn" type="button" data-pop-close>Done</button>
  </div>
</div>

<?php include 'includes/footer.php'; ?>

