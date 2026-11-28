(() => {
  const VERSION = '2.0';
  const BUILT = '2026-11-23 22:00';
  const C = window.CATALOGUE;
  const RM = matchMedia('(prefers-reduced-motion: reduce)').matches;
  const MOB = matchMedia('(max-width:819px)');
  const $ = (s, r = document) => r.querySelector(s);
  const $$ = (s, r = document) => [...r.querySelectorAll(s)];
  const clamp = (v, a, b) => Math.min(b, Math.max(a, v));
  const root = document.documentElement;
  const PAGE = (location.pathname.split('/').pop() || 'index.php').replace(/\.php$/, '') || 'index';
  const CROSSFADE = 'PageRevealEvent' in window && location.protocol !== 'file:';
  const EASE_OUT = (k) => 1 - Math.pow(1 - k, 3);
  const STICKY_TOP = 120;
  const COUNT_MS = 650;
  const FLY_MS = 850;

  /* ---------- state: cart, sign in, currency and consent travel in the hash and mirror to storage ---------- */
  const STORE_KEY = 'dd-state-2';
  const CONSENT_KEY = 'dd-consent';
  const PRELOAD_KEY = 'dd-preloaded';
  const b64e = (s) => btoa(unescape(encodeURIComponent(s))).replace(/\+/g, '-').replace(/\//g, '_').replace(/=+$/, '');
  const b64d = (s) => decodeURIComponent(escape(atob(s.replace(/-/g, '+').replace(/_/g, '/'))));
  const fresh = () => ({ cart: C.DEMO_CART.map((l) => ({ ...l })), user: null, cur: C.BASE, seen: {}, after: null, order: null });
  let state = null;
  let consent = null;
  const mem = {};
  const readLocal = () => { try { return JSON.parse(localStorage.getItem(STORE_KEY)); } catch (e) { return mem.state || null; } };
  const CUR_KEY = 'dd-cur';
  const writeLocal = (v) => { mem.state = v; const keep = consent && consent.preferences; const out = keep ? v : Object.assign({}, v, { cur: undefined, seen: {} }); try { localStorage.setItem(STORE_KEY, JSON.stringify(out)); sessionStorage.setItem(CUR_KEY, v.cur); } catch (e) {} };
  const readSessionCur = () => { try { return sessionStorage.getItem(CUR_KEY); } catch (e) { return null; } };
  const readConsent = () => { try { return JSON.parse(sessionStorage.getItem(CONSENT_KEY)); } catch (e) { return mem.consent || null; } };
  const writeConsent = (v) => { mem.consent = v; try { if (v) sessionStorage.setItem(CONSENT_KEY, JSON.stringify(v)); else sessionStorage.removeItem(CONSENT_KEY); } catch (e) {} };

  let anchor = null;
  let arrivedAt = null;
  (function hydrate() {
    const h = location.hash.slice(1);
    let fromHash = null;
    if (h.startsWith('s=')) {
      const parts = h.split('&');
      try { fromHash = JSON.parse(b64d(parts[0].slice(2))); } catch (e) { fromHash = null; }
      parts.slice(1).forEach((p) => { if (p.startsWith('a=')) anchor = p.slice(2); });
      history.replaceState(null, '', location.pathname + location.search);
    } else if (h) {
      anchor = h;
    }
    arrivedAt = anchor;
    const local = readLocal();
    state = Object.assign(fresh(), local || {}, fromHash && fromHash.state ? fromHash.state : {});
    const hashCur = fromHash && fromHash.state && fromHash.state.cur;
    if (!hashCur && !(local && local.cur)) { const sc = readSessionCur(); state.cur = sc && C.CURRENCIES[sc] ? sc : C.BASE; }
    if (!C.CURRENCIES[state.cur]) state.cur = C.BASE;
    if (!state.seen) state.seen = {};
    consent = (fromHash && fromHash.consent) || readConsent();
    if (consent) writeConsent(consent);
    writeLocal(state);
  })();
  const save = () => writeLocal(state);
  const packState = () => 's=' + b64e(JSON.stringify({ state, consent }));

  /* ---------- page transitions: the browser crossfades the two documents; older browsers fade out then in ---------- */
  const INTERNAL = /^\/?([a-z0-9-]+(\.php)?)?(\?[^#]*)?(#.*)?$/i;
  const MOVED = { discovery: 'services.php#discovery', decision: 'services.php#decision' };
  const moved = (href) => { const m = href.match(/^\/?(discovery|decision)(\.php)?([?#].*)?$/i); return m ? MOVED[m[1].toLowerCase()] : href; };
  const pageOf = (href) => { const p = href.replace(/[?#].*$/, '').replace(/^\//, ''); return p ? (p.endsWith('.php') ? p : p + '.php') : 'index.php'; };
  let leaving = false;
  function go(href, a) {
    if (leaving) return;
    leaving = true;
    const url = href.replace(/#.*$/, '') + '#' + packState() + (a ? '&a=' + a : '');
    if (RM || CROSSFADE) { location.href = url; return; }
    root.classList.add('leaving');
    setTimeout(() => { location.href = url; }, 380);
  }
  window.addEventListener('pageshow', (e) => { if (e.persisted) { leaving = false; root.classList.remove('leaving'); } });

  /* ---------- unbuilt actions: an inert tooltip anchored to the control ---------- */
  const tip = $('#tip'); let tt;
  function tipAt(el, msg) {
    if (!tip) return;
    tip.textContent = msg || 'Page not built yet';
    const r = el.getBoundingClientRect(); tip.classList.remove('below'); tip.classList.add('on');
    const w = tip.offsetWidth, h = tip.offsetHeight; let x = r.left + r.width / 2 - w / 2; x = clamp(x, 8, innerWidth - w - 8);
    let y = r.top - h - 10; if (y < 8) { y = r.bottom + 10; tip.classList.add('below'); }
    tip.style.left = x + 'px'; tip.style.top = y + 'px'; tip.style.setProperty('--ax', (r.left + r.width / 2 - x) + 'px');
    clearTimeout(tt); tt = setTimeout(() => tip.classList.remove('on'), 1600);
  }
  addEventListener('scroll', () => tip && tip.classList.remove('on'), { passive: true });

  document.addEventListener('click', (e) => {
    const a = e.target.closest('a,button');
    if (!a) return;
    if (a.classList.contains('inert') || a.dataset.inert != null) { e.preventDefault(); e.stopPropagation(); tipAt(a, a.dataset.inert || undefined); return; }
    if (a.tagName !== 'A') return;
    let href = a.getAttribute('href') || '';
    if (!href || href.startsWith('mailto:') || href.startsWith('tel:') || a.target === '_blank') return;
    if (href.startsWith('#')) {
      e.preventDefault(); e.stopPropagation();
      const id = href.slice(1);
      const t = id && document.getElementById(id);
      if (t) scTo(offTop(t) - (MOB.matches ? 72 : 96));
      else tipAt(a);
      return;
    }
    if (INTERNAL.test(href)) {
      e.preventDefault(); e.stopPropagation();
      href = moved(href);
      const hash = href.includes('#') ? href.split('#')[1] : '';
      const page = pageOf(href);
      if (page === PAGE + '.php' && hash) { const t = document.getElementById(hash); if (t) { scTo(offTop(t) - 96); return; } }
      go(href.replace(/#.*$/, '') || page, hash || null);
      return;
    }
    e.preventDefault(); e.stopPropagation(); tipAt(a);
  }, true);

  /* ---------- smooth scroll: the page is translated toward the native scroll position on wheel and trackpad ---------- */
  const SC = { lerp: .085, cur: scrollY, on: false };
  const scEl = $('#sc');
  const setH = () => { if (SC.on && scEl) document.body.style.height = scEl.offsetHeight + 'px'; };
  function smoothOn() { if (SC.on || RM || !scEl) return; SC.on = true; SC.cur = scrollY; root.classList.add('sm'); setH(); stickyMode(); }
  function smoothOff() { if (!SC.on) return; SC.on = false; root.classList.remove('sm'); document.body.style.height = ''; scEl.style.transform = ''; SC.cur = scrollY; stickyMode(); }
  addEventListener('wheel', (e) => { if (!e.ctrlKey) smoothOn(); }, { passive: true });
  addEventListener('touchstart', smoothOff, { passive: true });
  if (scEl) new ResizeObserver(setH).observe(scEl);
  function scStep() {
    if (!SC.on) { SC.cur = scrollY; return; }
    const t = scrollY; SC.cur += (t - SC.cur) * SC.lerp; if (Math.abs(t - SC.cur) < .1) SC.cur = t;
    const dpr = devicePixelRatio || 1; scEl.style.transform = 'translate3d(0,' + (-Math.round(SC.cur * dpr) / dpr) + 'px,0)';
  }
  const scTo = (y) => { if (SC.on || RM) scrollTo(0, Math.max(0, y)); else scrollTo({ top: Math.max(0, y), behavior: 'smooth' }); };
  const offTop = (el) => el.getBoundingClientRect().top + SC.cur;

  /* sticky columns under the smooth scroll: translated by hand, native sticky otherwise */
  const STICKY = $$('[data-sticky]').map((el) => ({ el, top: +el.dataset.sticky || STICKY_TOP, box: el.parentElement }));
  function stickyMode() {
    STICKY.forEach((s) => {
      if (SC.on) { s.el.style.position = 'relative'; s.el.style.top = ''; }
      else { s.y = 0; s.el.style.transform = ''; s.el.style.position = 'sticky'; s.el.style.top = s.top + 'px'; }
    });
  }
  function stickyStep() {
    if (!SC.on || MOB.matches) return;
    STICKY.forEach((s) => {
      const b = s.box.getBoundingClientRect(), h = s.el.offsetHeight, cs = getComputedStyle(s.box);
      const natural = b.top + (s.el.offsetParent === s.box ? s.el.offsetTop : s.el.offsetTop - s.box.offsetTop);
      const room = b.bottom - parseFloat(cs.paddingBottom) - natural - h;
      const y = clamp(s.top - natural, 0, Math.max(0, room));
      s.y = y;
      s.el.style.transform = 'translate3d(0,' + y.toFixed(2) + 'px,0)';
    });
  }

  /* ---------- reveals ---------- */
  $$('[data-lines]').forEach((el) => { const parts = el.innerHTML.split(/<br\s*\/?>/i); el.innerHTML = parts.map((p, i) => '<span class="ln"><span style="--i:' + i + '">' + p.trim() + '</span></span>').join(''); });
  $$('[data-chars]').forEach((el) => { const t = el.textContent.trim(); let i = 0; el.innerHTML = '<span class="mask"><span style="transform:none">' + [...t].map((c) => c === ' ' ? ' ' : '<span class="ch" style="--i:' + (i++) + '">' + c + '</span>').join('') + '</span></span>'; });
  const revealables = $$('[data-r],[data-lines]');
  const io = new IntersectionObserver((es) => {
    const ins = es.filter((e) => e.isIntersecting).map((e) => e.target).sort((a, b) => a.compareDocumentPosition(b) & 2 ? 1 : -1);
    ins.forEach((el, i) => { el.style.setProperty('--d', Math.min(i * .08, .64) + 's'); el.classList.add('on'); io.unobserve(el); });
  }, { rootMargin: '0px 0px -4% 0px', threshold: .08 });
  function arm() { revealables.forEach((el) => { if (RM) el.classList.add('on'); else io.observe(el); }); }
  function revealNew(scope) {
    $$('[data-r],[data-lines]', scope).forEach((el) => { if (!revealables.includes(el)) { revealables.push(el); if (RM) el.classList.add('on'); else io.observe(el); } });
  }

  /* ---------- image parallax inside clipped frames ---------- */
  const PX = $$('.clip>img').map((img) => ({ img, box: img.parentElement }));
  function parallax() {
    if (RM) return; const vh = innerHeight;
    PX.forEach((o) => { const r = o.box.getBoundingClientRect(); if (r.bottom < -50 || r.top > vh + 50) return; const k = clamp((r.top + r.height / 2 - vh / 2) / (vh / 2 + r.height / 2), -1, 1); o.img.style.transform = 'translate3d(0,' + (k * -5).toFixed(2) + '%,0)'; });
  }

  /* ---------- nav ---------- */
  const head = $('#head');
  const pills = $('.o2-pills'), ind = pills && $('.o2-ind', pills), links = pills ? $$('a', pills) : [], home = pills && $('a.hot', pills);
  function pillTo(a) { if (!ind || !a) return; ind.style.width = a.offsetWidth + 'px'; ind.style.transform = 'translateX(' + a.offsetLeft + 'px)'; links.forEach((l) => l.classList.toggle('hot', l === a)); }
  const pillHome = () => { if (home) pillTo(home); else if (pills) { links.forEach((l) => l.classList.remove('hot')); } };
  links.forEach((a) => { a.addEventListener('pointerenter', () => pillTo(a)); a.addEventListener('focus', () => pillTo(a)); });
  if (pills) {
    pills.classList.toggle('none', !home);
    pills.addEventListener('pointerleave', pillHome); pills.addEventListener('focusout', (e) => { if (!pills.contains(e.relatedTarget)) pillHome(); });
  }
  function pillSet() { if (!pills) return; pills.classList.add('still'); pillHome(); void ind.offsetWidth; pills.classList.toggle('still', RM); }

  const cartCounts = $$('.cartn');
  function paintCart() { const n = state.cart.length; cartCounts.forEach((el) => { el.textContent = n; }); }
  function paintAuth() {
    $$('.si').forEach((el) => { el.textContent = state.user ? 'Account' : 'Sign in'; el.setAttribute('href', state.user ? 'account-orders.php' : 'sign-in.php'); });
    $$('[data-user-name]').forEach((el) => { el.textContent = state.user ? state.user.name : ''; });
    document.body.classList.toggle('signed-in', !!state.user);
  }

  /* mobile menu */
  const menu = $('#menu');
  function openMenu() { if (!menu) return; menu.classList.add('open'); root.classList.add('lock'); menu.setAttribute('aria-hidden', 'false'); setTimeout(() => { const x = $('.x', menu); x && x.focus(); }, RM ? 0 : 80); }
  function closeMenu() { if (!menu) return; menu.classList.remove('open'); root.classList.remove('lock'); menu.setAttribute('aria-hidden', 'true'); }
  $$('.o2-burger').forEach((b) => b.addEventListener('click', openMenu));
  if (menu) { $('.x', menu).addEventListener('click', closeMenu); menu.addEventListener('keydown', (e) => { if (e.key === 'Escape') closeMenu(); }); }

  /* currency: one pill, one menu, every price repaints */
  const CURS = C.CURRENCY_ORDER;
  const TICK = '<svg class="tk" viewBox="0 0 12 9" fill="none" aria-hidden="true"><path d="M1 4.5L4.2 7.7L11 1" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"/></svg>';
  function initCur(wrap) {
    const btn = $('.cur-btn', wrap), list = $('.cur-menu', wrap);
    // list.innerHTML = CURS.map((k) => '<li role="option" data-cur="' + k + '"><span>' + C.CURRENCIES[k].symbol + ' ' + k + '</span>' + TICK + '</li>').join('');
    const items = $$('li', list);
    const paint = () => { items.forEach((li) => li.setAttribute('aria-selected', li.dataset.cur === state.cur)); const c = C.CURRENCIES[state.cur]; btn.textContent = btn.dataset.full != null ? c.symbol + ' ' + c.code : c.symbol; btn.setAttribute('aria-label', 'Currency, ' + c.code); };
    let fi = -1;
    const focusItem = () => { items.forEach((li, i) => li.classList.toggle('focus', i === fi)); };
    const open = () => { wrap.classList.add('open'); btn.setAttribute('aria-expanded', 'true'); fi = CURS.indexOf(state.cur); focusItem(); if (document.activeElement !== btn) btn.focus({ preventScroll: true }); };
    const close = (back) => { wrap.classList.remove('open'); btn.setAttribute('aria-expanded', 'false'); items.forEach((li) => li.classList.remove('focus')); if (back) btn.focus(); };
    btn.addEventListener('click', () => (wrap.classList.contains('open') ? close() : open()));
    btn.addEventListener('keydown', (e) => { if ((e.key === 'ArrowDown' || e.key === 'ArrowUp') && !wrap.classList.contains('open')) { e.preventDefault(); e.stopPropagation(); open(); } });
    items.forEach((li, i) => { li.addEventListener('click', () => { setCur(li.dataset.cur); close(true); }); li.addEventListener('pointerenter', () => { fi = i; focusItem(); }); });
    wrap.addEventListener('keydown', (e) => {
      if (!wrap.classList.contains('open')) return;
      if (e.key === 'Escape') { e.preventDefault(); e.stopPropagation(); close(true); }
      else if (e.key === 'ArrowDown') { e.preventDefault(); fi = (fi + 1) % items.length; focusItem(); }
      else if (e.key === 'ArrowUp') { e.preventDefault(); fi = (fi + items.length - 1) % items.length; focusItem(); }
      else if (e.key === 'Home') { e.preventDefault(); fi = 0; focusItem(); }
      else if (e.key === 'End') { e.preventDefault(); fi = items.length - 1; focusItem(); }
      else if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); if (fi >= 0) { setCur(items[fi].dataset.cur); close(true); } }
      else if (e.key === 'Tab') close();
    });
    document.addEventListener('click', (e) => { if (!wrap.contains(e.target)) close(); });
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape' && wrap.classList.contains('open') && !wrap.contains(document.activeElement)) close(true); });
    wrap.paint = paint; paint();
  }
  const curWraps = $$('.curw');
  curWraps.forEach(initCur);
  function setCur(c) { if (!C.CURRENCIES[c] || c === state.cur) return; state.cur = c; save(); curWraps.forEach((w) => w.paint()); repaint(); document.dispatchEvent(new CustomEvent('dd:currency', { detail: c })); }

  /* ---------- prices: every figure comes from the catalogue in pounds, every change counts up ---------- */
  const parseShown = (el) => { const m = (el.textContent || '').replace(/[^0-9.]/g, ''); return m ? parseFloat(m) : 0; };
  const counters = new WeakMap();
  function paintMoney(el, target, instant) {
    const from = el.dataset.shownCur ? parseShown(el) : target;
    el.dataset.shownCur = state.cur;
    const prev = counters.get(el); if (prev) cancelAnimationFrame(prev);
    if (instant || RM || !el.textContent || Math.abs(from - target) < .005) { el.textContent = C.fmt(target, state.cur); return; }
    const t0 = performance.now();
    const step = (t) => { const k = clamp((t - t0) / COUNT_MS, 0, 1); const v = from + (target - from) * EASE_OUT(k); el.textContent = C.fmt(k < 1 ? v : target, state.cur); if (k < 1) counters.set(el, requestAnimationFrame(step)); };
    counters.set(el, requestAnimationFrame(step));
  }
  function paintPrice(el, gbp, instant) { el.dataset.gbp = gbp; paintMoney(el, C.convert(+gbp, state.cur), instant); }
  function resolvePrice(key) {
    const p = key.split(':');
    if (p[0] === 'path') return C.pathFromGBP(p[1]);
    if (p[0] === 'pkg') return C.packageGBP(p[1]);
    if (p[0] === 'svc' && p[2] === 'from') return C.fromGBP(p[1]);
    if (p[0] === 'svc') return C.priceGBP(p[1], p[2], +p[3] || 1);
    if (p[0] === 'spend') return (C.service('ppc').adSpend || {})[p[1]] || 0;
    return 0;
  }
  function repaint(scope, instant) {
    $$('[data-price]', scope || document).forEach((el) => paintPrice(el, resolvePrice(el.dataset.price), instant));
    $$('[data-gbp]:not([data-price])', scope || document).forEach((el) => paintPrice(el, el.dataset.gbp, instant));
  }

  /* ---------- cart ---------- */
  function cartIndex(id) { return state.cart.findIndex((l) => l.id === id); }
  function addToCart(line, fromEl) {
    const i = cartIndex(line.id);
    const entry = { id: line.id, tier: line.tier, term: C.service(line.id).oneOff ? 1 : (line.term || 1) };
    if (i >= 0) state.cart[i] = entry; else state.cart.push(entry);
    save(); paintCart();
    if (fromEl) fly(fromEl, C.service(line.id).name);
    document.dispatchEvent(new CustomEvent('dd:cart', { detail: state.cart }));
  }
  function addMany(lines, fromEl) {
    lines.forEach((l, k) => { const i = cartIndex(l.id); const entry = { id: l.id, tier: l.tier, term: C.service(l.id).oneOff ? 1 : (l.term || 1) }; if (i >= 0) state.cart[i] = entry; else state.cart.push(entry); });
    save(); paintCart();
    if (fromEl) fly(fromEl, lines.length + (lines.length === 1 ? ' service' : ' services'));
    document.dispatchEvent(new CustomEvent('dd:cart', { detail: state.cart }));
  }
  function removeFromCart(id) { const i = cartIndex(id); if (i >= 0) state.cart.splice(i, 1); save(); paintCart(); document.dispatchEvent(new CustomEvent('dd:cart', { detail: state.cart })); }
  function updateLine(id, patch) { const i = cartIndex(id); if (i < 0) return; Object.assign(state.cart[i], patch); save(); document.dispatchEvent(new CustomEvent('dd:cart', { detail: state.cart })); }
  function bump() { const c = $('.o2-cart'); if (!c) return; c.classList.remove('bump'); void c.offsetWidth; c.classList.add('bump'); }
  function fly(fromEl, label) {
    const target = $('.o2-cart'); if (!target || RM) { bump(); return; }
    const a = fromEl.getBoundingClientRect(), b = target.getBoundingClientRect();
    const chip = document.createElement('span'); chip.className = 'fly'; chip.textContent = label;
    document.body.appendChild(chip);
    const w = chip.offsetWidth, h = chip.offsetHeight;
    const x0 = a.left + a.width / 2 - w / 2, y0 = a.top + a.height / 2 - h / 2;
    const x1 = b.left + b.width / 2 - w / 2, y1 = b.top + b.height / 2 - h / 2;
    chip.style.left = x0 + 'px'; chip.style.top = y0 + 'px';
    const dx = x1 - x0, dy = y1 - y0;
    chip.animate([
      { transform: 'translate(0,0) scale(1)', opacity: 1 },
      { transform: 'translate(' + (dx * .5) + 'px,' + (dy * .5 - 60) + 'px) scale(.9)', opacity: 1, offset: .55 },
      { transform: 'translate(' + dx + 'px,' + dy + 'px) scale(.3)', opacity: 0 }
    ], { duration: FLY_MS, easing: 'cubic-bezier(.4,0,.2,1)', fill: 'forwards' }).onfinish = () => { chip.remove(); bump(); };
  }

  /* ---------- segmented selectors: the active pill slides ---------- */
  function initSeg(seg) {
    const opts = $$('button', seg); let indEl = $('.seg-ind', seg);
    if (!indEl) { indEl = document.createElement('span'); indEl.className = 'seg-ind'; indEl.setAttribute('aria-hidden', 'true'); seg.prepend(indEl); }
    const to = (b, still) => {
      if (!b) return;
      if (still) seg.classList.add('still');
      indEl.style.width = b.offsetWidth + 'px'; indEl.style.height = b.offsetHeight + 'px'; indEl.style.transform = 'translate(' + b.offsetLeft + 'px,' + (b.offsetTop - indEl.offsetTop) + 'px)';
      if (still) { void indEl.offsetWidth; seg.classList.toggle('still', RM); }
    };
    const select = (b, fire) => { opts.forEach((o) => { const on = o === b; o.setAttribute('aria-checked', on); o.tabIndex = on ? 0 : -1; }); to(b); if (fire) seg.dispatchEvent(new CustomEvent('change', { bubbles: true, detail: { value: b.dataset.value, button: b } })); };
    opts.forEach((b, i) => {
      b.setAttribute('role', 'radio'); if (!b.hasAttribute('aria-checked')) b.setAttribute('aria-checked', 'false');
      b.addEventListener('click', () => { if (b.getAttribute('aria-checked') !== 'true') select(b, true); });
      b.addEventListener('keydown', (e) => { let j = null; if (e.key === 'ArrowRight' || e.key === 'ArrowDown') j = (i + 1) % opts.length; if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') j = (i + opts.length - 1) % opts.length; if (e.key === 'Home') j = 0; if (e.key === 'End') j = opts.length - 1; if (j !== null) { e.preventDefault(); select(opts[j], true); opts[j].focus(); } });
    });
    seg.setAttribute('role', 'radiogroup');
    const cur = opts.find((o) => o.getAttribute('aria-checked') === 'true') || opts[0];
    opts.forEach((o) => { o.tabIndex = o === cur ? 0 : -1; });
    seg.value = () => (opts.find((o) => o.getAttribute('aria-checked') === 'true') || opts[0]).dataset.value;
    seg.set = (v, fire) => { const b = opts.find((o) => o.dataset.value == v); if (b) select(b, fire); };
    seg.measure = () => to(opts.find((o) => o.getAttribute('aria-checked') === 'true') || opts[0], true);
    requestAnimationFrame(() => seg.measure());
    SEGS.push(seg);
  }
  const SEGS = [];
  $$('.seg').forEach(initSeg);

  /* ---------- branded dropdown: the native select keeps the value, a drawn list does the talking ---------- */
  function initSel(sel) {
    const native = $('select', sel); if (!native) return;
    const btn = document.createElement('button'); btn.type = 'button'; btn.className = 'sel-btn'; btn.setAttribute('aria-haspopup', 'listbox'); btn.setAttribute('aria-expanded', 'false');
    const label = document.createElement('span'); btn.appendChild(label);
    btn.insertAdjacentHTML('beforeend', '<svg viewBox="0 0 13.5 7.5" fill="none" aria-hidden="true"><path d="M.75.75l6 6 6-6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>');
    const list = document.createElement('ul'); list.className = 'sel-list'; list.setAttribute('role', 'listbox');
    const opts = [...native.options].map((o) => { const li = document.createElement('li'); li.setAttribute('role', 'option'); li.dataset.value = o.value; li.textContent = o.textContent; if (o.disabled) li.setAttribute('aria-disabled', 'true'); list.appendChild(li); return li; });
    sel.append(btn, list);
    const lifted = [];
    const paint = () => { label.textContent = native.options[native.selectedIndex] ? native.options[native.selectedIndex].textContent : ''; opts.forEach((li) => li.setAttribute('aria-selected', li.dataset.value === native.value)); };
    let fi = -1;
    const focusItem = () => opts.forEach((li, i) => li.classList.toggle('focus', i === fi));
    const open = () => {
      if (native.disabled) return;
      let p = sel.parentElement; while (p && p !== document.body) { const cs = getComputedStyle(p); if (cs.overflow !== 'visible' && cs.overflowY !== 'visible') { lifted.push([p, p.style.overflow]); p.style.overflow = 'visible'; } p = p.parentElement; }
      const r = sel.getBoundingClientRect(); sel.classList.toggle('up', innerHeight - r.bottom < 240 && r.top > 240);
      sel.classList.add('open'); btn.setAttribute('aria-expanded', 'true'); fi = native.selectedIndex; focusItem(); if (document.activeElement !== btn) btn.focus({ preventScroll: true });
    };
    const close = (back) => { sel.classList.remove('open'); btn.setAttribute('aria-expanded', 'false'); opts.forEach((li) => li.classList.remove('focus')); lifted.splice(0).forEach(([p, v]) => { p.style.overflow = v; }); if (back) btn.focus(); };
    const choose = (v) => { if (native.value !== v) { native.value = v; paint(); native.dispatchEvent(new Event('change', { bubbles: true })); } };
    btn.addEventListener('click', () => sel.classList.contains('open') ? close() : open());
    btn.addEventListener('keydown', (e) => { if ((e.key === 'ArrowDown' || e.key === 'ArrowUp' || e.key === ' ') && !sel.classList.contains('open')) { e.preventDefault(); e.stopPropagation(); open(); } });
    opts.forEach((li, i) => { li.addEventListener('click', () => { if (li.getAttribute('aria-disabled')) return; choose(li.dataset.value); close(true); }); li.addEventListener('pointerenter', () => { fi = i; focusItem(); }); });
    sel.addEventListener('keydown', (e) => {
      if (!sel.classList.contains('open')) return;
      if (e.key === 'Escape') { e.preventDefault(); close(true); }
      else if (e.key === 'ArrowDown') { e.preventDefault(); fi = (fi + 1) % opts.length; focusItem(); }
      else if (e.key === 'ArrowUp') { e.preventDefault(); fi = (fi + opts.length - 1) % opts.length; focusItem(); }
      else if (e.key === 'Home') { e.preventDefault(); fi = 0; focusItem(); }
      else if (e.key === 'End') { e.preventDefault(); fi = opts.length - 1; focusItem(); }
      else if (e.key === 'Enter') { e.preventDefault(); if (fi >= 0) { choose(opts[fi].dataset.value); close(true); } }
      else if (e.key === 'Tab') close();
    });
    document.addEventListener('click', (e) => { if (!sel.contains(e.target)) close(); });
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape' && sel.classList.contains('open') && !sel.contains(document.activeElement)) close(true); });
    const desc = Object.getOwnPropertyDescriptor(HTMLSelectElement.prototype, 'value');
    Object.defineProperty(native, 'value', { get() { return desc.get.call(this); }, set(v) { desc.set.call(this, v); paint(); } });
    btn.disabled = native.disabled; if (native.disabled) sel.classList.add('locked');
    sel.paint = paint; paint();
  }
  $$('.sel').forEach(initSel);

  /* ---------- popups: overlay fades, the postmark panel rises, the stamp lands last ---------- */
  let popLast = null;
  function openPop(id) {
    const p = typeof id === 'string' ? document.getElementById(id) : id; if (!p) return;
    popLast = document.activeElement; p.classList.add('show'); root.classList.add('lock'); p.setAttribute('aria-hidden', 'false');
    setTimeout(() => { const f = $('.pop-box .btn, .pop-box button, .pop-box a', p); f && f.focus(); }, RM ? 0 : 120);
  }
  function closePop(p) {
    p = p || $('.pop.show'); if (!p) return;
    p.classList.remove('show'); root.classList.remove('lock'); p.setAttribute('aria-hidden', 'true');
    if (popLast && popLast.focus) popLast.focus();
    document.dispatchEvent(new CustomEvent('dd:popclose', { detail: p.id }));
  }
  document.addEventListener('click', (e) => {
    const o = e.target.closest('[data-pop]'); if (o) { e.preventDefault(); openPop(o.dataset.pop); return; }
    const c = e.target.closest('[data-pop-close]'); if (c) { e.preventDefault(); const p = c.closest('.pop'); const to = c.dataset.popClose; closePop(p); if (to) go(to); return; }
    if (e.target.classList && e.target.classList.contains('pop')) closePop(e.target);
  });
  document.addEventListener('keydown', (e) => {
    const p = $('.pop.show'); if (!p) return;
    if (e.key === 'Escape') { e.preventDefault(); closePop(p); }
    if (e.key === 'Tab') { const f = $$('button:not([disabled]),a[href],input,select,textarea', p).filter((x) => x.offsetParent); if (!f.length) return; const first = f[0], last = f[f.length - 1]; if (e.shiftKey && document.activeElement === first) { e.preventDefault(); last.focus(); } else if (!e.shiftKey && document.activeElement === last) { e.preventDefault(); first.focus(); } }
  });

  /* ---------- forms: inline validation, consent, the reCAPTCHA stub ---------- */
  $$('.recaptcha').forEach((r) => { r.setAttribute('role', 'checkbox'); r.tabIndex = 0; r.setAttribute('aria-checked', 'false'); const tick = () => { r.classList.toggle('ok'); r.classList.remove('err'); r.setAttribute('aria-checked', r.classList.contains('ok')); }; r.addEventListener('click', tick); r.addEventListener('keydown', (e) => { if (e.key === ' ' || e.key === 'Enter') { e.preventDefault(); tick(); } }); });
  $$('.field .eye').forEach((b) => b.addEventListener('click', () => { const i = $('input', b.parentElement); const show = i.type === 'password'; i.type = show ? 'text' : 'password'; b.setAttribute('aria-pressed', show); }));
  const EMAIL = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  function validate(form) {
    let ok = true, first = null;
    $$('.field', form).forEach((f) => {
      const i = $('input,textarea,select', f); if (!i) return;
      let bad = false;
      if (i.required && !i.value.trim()) bad = true;
      else if (i.type === 'email' && i.value && !EMAIL.test(i.value)) bad = true;
      else if (i.dataset.match && i.value !== $(i.dataset.match, form).value) bad = true;
      else if (i.minLength > 0 && i.value && i.value.length < i.minLength) bad = true;
      f.classList.toggle('err', bad); if (bad) { ok = false; first = first || i; }
    });
    $$('.check', form).forEach((c) => { const i = $('input', c); if (i && i.required) { const bad = !i.checked; c.classList.toggle('err', bad); if (bad) ok = false; } });
    const rc = $('.recaptcha', form); if (rc && !rc.classList.contains('ok')) { rc.classList.add('err'); ok = false; }
    if (first) first.focus();
    return ok;
  }
  document.addEventListener('input', (e) => { const f = e.target.closest('.field.err'); if (f) f.classList.remove('err'); const c = e.target.closest('.check.err'); if (c && e.target.checked) c.classList.remove('err'); });

  /* ---------- carousels: pagination dots on mobile ---------- */
  $$('.cards,.tcards,[data-carousel]').forEach((c) => {
    const d = document.createElement('div'); d.className = 'dots'; d.setAttribute('aria-hidden', 'true'); d.innerHTML = [...c.children].map((_, i) => '<i' + (i ? '' : ' class="on"') + '></i>').join(''); c.after(d);
    c.addEventListener('scroll', () => { const w = c.children[0].offsetWidth + 12; const i = Math.round(c.scrollLeft / w); [...d.children].forEach((x, j) => x.classList.toggle('on', j === i)); }, { passive: true });
  });

  /* ---------- cookie consent: nothing optional runs before a choice ---------- */
  const CATS = ['preferences', 'analytics', 'marketing'];
  const queue = [];
  const gate = (cat, fn) => { if (consent && consent[cat]) fn(); else queue.push({ cat, fn }); };
  function applyConsent(c) { consent = c; writeConsent(c); save(); for (let i = queue.length - 1; i >= 0; i--) { if (c[queue[i].cat]) { const q = queue.splice(i, 1)[0]; q.fn(); } } }
  const ck = $('#ck'), cks = $('#cks'), sws = cks ? $$('.sw[data-cat]', cks) : []; let lastFocus = null;
  const showBanner = (v) => ck && ck.classList.toggle('show', v);
  function openSettings() { if (!cks) return; lastFocus = document.activeElement; sws.forEach((sw) => sw.setAttribute('aria-checked', !!(consent && consent[sw.dataset.cat]))); cks.classList.add('show'); root.classList.add('lock'); showBanner(false); setTimeout(() => { const f = $('.sw[data-cat],button', cks); f && f.focus(); }, RM ? 0 : 60); }
  function closeSettings() { if (!cks) return; cks.classList.remove('show'); root.classList.remove('lock'); if (!consent) showBanner(true); lastFocus && lastFocus.focus && lastFocus.focus(); }
  function decide(all) { const c = { necessary: true }; CATS.forEach((k) => { c[k] = all; }); applyConsent(c); showBanner(false); if (cks && cks.classList.contains('show')) closeSettings(); }
  document.addEventListener('click', (e) => {
    const b = e.target.closest('[data-ck]'); if (!b) return; const a = b.dataset.ck;
    if (a === 'accept') decide(true); else if (a === 'reject') decide(false); else if (a === 'manage' || a === 'open') openSettings(); else if (a === 'close') closeSettings();
    else if (a === 'save') { const c = { necessary: true }; sws.forEach((sw) => { c[sw.dataset.cat] = sw.getAttribute('aria-checked') === 'true'; }); applyConsent(c); closeSettings(); }
  });
  sws.forEach((sw) => sw.addEventListener('click', () => sw.setAttribute('aria-checked', sw.getAttribute('aria-checked') !== 'true')));
  if (cks) {
    cks.addEventListener('click', (e) => { if (e.target === cks) closeSettings(); });
    cks.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') { e.preventDefault(); closeSettings(); }
      if (e.key === 'Tab') { const f = $$('button:not([disabled]),a', cks).filter((x) => x.offsetParent); const first = f[0], last = f[f.length - 1]; if (e.shiftKey && document.activeElement === first) { e.preventDefault(); last.focus(); } else if (!e.shiftKey && document.activeElement === last) { e.preventDefault(); first.focus(); } }
    });
  }

  /* ---------- hero entrance and the preloader (first page of the session, and every homepage) ---------- */
  const heroes = $$('.hero,.ihero');
  let navStill = false;
  function play() {
    const list = navStill ? heroes : [head, ...heroes]; navStill = false;
    list.forEach((h) => h && h.classList.remove('in')); void document.body.offsetWidth;
    root.classList.remove('arriving');
    requestAnimationFrame(() => requestAnimationFrame(() => list.forEach((h) => h && h.classList.add('in'))));
  }
  const PL = $('#pl');
  function count(ms, fn) { const t0 = performance.now(); (function f(t) { const k = clamp((t - t0) / ms, 0, 1); fn(EASE_OUT(k)); if (k < 1) requestAnimationFrame(f); })(t0); }
  function afterEnter() {
    if (anchor) { const t = document.getElementById(anchor); if (t) setTimeout(() => scTo(offTop(t) - 96), RM ? 0 : 600); anchor = null; }
    if (!consent) setTimeout(() => showBanner(true), RM ? 0 : 1800);
  }
  function preload(force) {
    let seen = false; try { seen = sessionStorage.getItem(PRELOAD_KEY) === '1'; } catch (e) { seen = !!mem.pl; }
    if (RM || !PL || (seen && PAGE !== 'index' && !force)) { play(); afterEnter(); return; }
    try { sessionStorage.setItem(PRELOAD_KEY, '1'); } catch (e) { mem.pl = true; }
    PL.classList.add('on'); root.classList.add('lock'); root.classList.remove('arriving'); void PL.offsetWidth; requestAnimationFrame(() => PL.classList.add('go'));
    const tr = $('.ob .tr', PL), pc = $('.ob .pc', PL), r = $('.ob .st.r', PL);
    count(1600, (k) => { tr.style.setProperty('--p', k); pc.textContent = Math.round(k * 100) + '%'; if (k > .96) r.classList.add('on'); });
    setTimeout(() => { PL.classList.add('out'); play(); }, 1900);
    setTimeout(() => { PL.className = ''; PL.style.display = 'none'; root.classList.remove('lock'); afterEnter(); }, 3100);
  }

  /* ---------- homepage: the journey line, the statement, the compare tabs ---------- */
  let homeFrame = () => {};
  function initHome() {
    const J = $('#journey'); if (!J) return;
    const jHits = $$('[data-at]', J), stA = $('#stA'), stB = $('#stB'); let jp = 0, jt = 0;
    const jTarget = () => { const r = J.getBoundingClientRect(), vh = innerHeight; return MOB.matches ? clamp((vh * .8 - r.top) / (r.height), 0, 1) : clamp((vh * .95 - r.top) / (vh * .7), 0, 1); };
    const stmt = $('#stmt'); let wi = 0;
    $$('span', stmt).forEach((s) => { s.innerHTML = s.textContent.split(' ').map((w) => '<span class="w" style="--i:' + (wi++) + '">' + w + '</span>').join(' '); });
    const words = $$('.w', stmt); let litN = -1;
    const tabs = $$('.tab'), tabsEl = $('.tabs'), tabind = $('.tabind'), panelsEl = $('#panels');
    const indTo = (t) => { const v = MOB.matches; tabind.style.width = v ? '' : t.offsetWidth + 'px'; tabind.style.transform = v ? 'translateY(' + (t.offsetTop - 4) + 'px)' : 'translateX(' + t.offsetLeft + 'px)'; };
    function select(t, focus) {
      const cur = $('.panel.cur'), next = $('#' + t.getAttribute('aria-controls'));
      tabs.forEach((x) => { const on = x === t; x.setAttribute('aria-selected', on); x.tabIndex = on ? 0 : -1; });
      indTo(t); if (focus) t.focus(); if (cur === next) return;
      panelsEl.style.height = cur.offsetHeight + 'px'; next.hidden = false;
      requestAnimationFrame(() => { cur.classList.remove('cur'); next.classList.add('cur'); panelsEl.style.height = next.offsetHeight + 'px'; setTimeout(() => { if (!cur.classList.contains('cur')) cur.hidden = true; panelsEl.style.height = ''; remeasure(); }, RM ? 0 : 720); });
    }
    tabs.forEach((t, i) => { t.addEventListener('click', () => select(t)); t.addEventListener('keydown', (e) => { let j = null; if (e.key === 'ArrowRight' || e.key === 'ArrowDown') j = (i + 1) % 3; if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') j = (i + 2) % 3; if (e.key === 'Home') j = 0; if (e.key === 'End') j = 2; if (j !== null) { e.preventDefault(); select(tabs[j], true); } }); });
    function tabsSet() { tabsEl.classList.add('still'); indTo($('.tab[aria-selected=true]')); void tabind.offsetWidth; tabsEl.classList.toggle('still', RM); }
    tabsSet(); MEASURE.push(tabsSet);
    const cue = $('#cue'); cue && cue.addEventListener('click', () => scTo(offTop($('#intro'))));
    homeFrame = (y, moved) => {
      if (moved) { const r = stmt.getBoundingClientRect(), vh = innerHeight; const k = RM ? 1 : clamp((vh * .85 - r.top) / (r.height + vh * .3), 0, 1); const n = Math.round(k * words.length); if (n !== litN) { words.forEach((w, i) => w.classList.toggle('lit', i < n)); litN = n; } }
      jt = jTarget(); jp = RM ? jt : jp + (jt - jp) * .09; if (Math.abs(jt - jp) < .0005) jp = jt;
      J.style.setProperty('--p', jp.toFixed(4));
      jHits.forEach((h) => h.classList.toggle('hit', jp >= +h.dataset.at - .001));
      stA.style.opacity = jp > .5 ? .4 : 1; stB.style.opacity = jp > .5 ? 1 : .4;
    };
    window.dd_tab = (n) => select(tabs[{ discovery: 0, decision: 1, build: 2 }[n] ?? n]);
    const T2 = $$('.o2-tile').map((t) => ({ t, p: $('.o2-pan', t), x: 0, y: 0, tx: 0, ty: 0 }));
    T2.forEach((o) => { o.t.addEventListener('pointermove', (e) => { if (e.pointerType !== 'mouse') return; const r = o.t.getBoundingClientRect(); o.tx = ((e.clientX - r.left) / r.width - .5) * -22; o.ty = ((e.clientY - r.top) / r.height - .5) * -16; }); o.t.addEventListener('pointerleave', () => { o.tx = 0; o.ty = 0; }); });
    tileFrame = () => { if (!RM) T2.forEach((o) => { o.x += (o.tx - o.x) * .06; o.y += (o.ty - o.y) * .06; o.p.style.transform = 'translate3d(' + o.x.toFixed(2) + 'px,' + o.y.toFixed(2) + 'px,0)'; }); };
  }
  let tileFrame = () => {};

  /* ---------- frame loop ---------- */
  let lastY = -1;
  (function frame() {
    tileFrame();
    scStep(); const y = SC.cur; const moved = y !== lastY;
    if (moved) { parallax(); stickyStep(); lastY = y; if (scrollY >= root.scrollHeight - innerHeight - 4) revealables.forEach((el) => { if (!el.classList.contains('on')) { el.classList.add('on'); io.unobserve(el); } }); }
    homeFrame(y, moved);
    requestAnimationFrame(frame);
  })();

  const MEASURE = [];
  function remeasure() { pillSet(); SEGS.forEach((s) => s.measure()); MEASURE.forEach((f) => f()); setH(); parallax(); stickyStep(); lastY = -1; }
  addEventListener('resize', remeasure);
  document.fonts && document.fonts.ready.then(remeasure);
  addEventListener('keydown', (e) => { if ((e.key === 'r' || e.key === 'R') && !e.target.closest('input,textarea') && !e.metaKey && !e.ctrlKey) play(); });

  /* ---------- auth and payment demo ---------- */
  function signIn(name) { state.user = { name: name || 'John Smith' }; const to = state.after || 'account-orders.php'; state.after = null; save(); paintAuth(); return to; }
  function signOut() { state.user = null; save(); paintAuth(); }
  function pay(ok) {
    const flag = new URLSearchParams(location.search).get('pay');
    const good = ok == null ? flag !== 'fail' : !!ok;
    if (good) { state.order = { ref: 'DD10482', lines: state.cart.map((l) => ({ ...l })), cur: state.cur, placed: new Date().toISOString() }; state.cart = []; save(); paintCart(); }
    go(good ? 'payment-complete.php' : 'payment-failed.php');
  }

  /* ---------- console namespace ---------- */
  window.dd = {
    version: () => VERSION + ' (' + BUILT + ')',
    built: BUILT,
    state: () => ({ page: PAGE, cart: state.cart, user: state.user, currency: state.cur, consent, smooth: SC.on, reducedMotion: RM }),
    cart: () => C.totals(state.cart, state.cur, true),
    reset: () => { state = fresh(); save(); paintCart(); paintAuth(); repaint(); document.dispatchEvent(new CustomEvent('dd:cart', { detail: state.cart })); return state.cart; },
    consent: () => consent,
    cookies: openSettings,
    resetConsent: () => { writeConsent(null); consent = null; showBanner(true); },
    pay,
    currency: (c) => { if (c) setCur(String(c).toUpperCase()); return state.cur; },
    rates: () => ({ base: C.BASE, dated: C.RATES_DATED, ...C.RATES }),
    signIn, signOut,
    remeasure, replay: play, preload: () => preload(true), entry: () => entry,
    tune: { get lerp() { return SC.lerp; }, set lerp(v) { SC.lerp = v; } },
    to: (sel) => { const t = typeof sel === 'string' ? $(sel) : sel; t && scTo(offTop(t) - 96); },
    tab: (n) => window.dd_tab && window.dd_tab(n),
    gate,
    go: (page) => go(page)
  };

  /* ---------- shared api for the pages ---------- */
  window.DD = {
    $, $$, clamp, RM, MOB, PAGE, get anchor() { return arrivedAt; },
    get state() { return state; }, save, consent: () => consent,
    go, scTo, offTop, remeasure, revealNew, tipAt,
    paintPrice, paintMoney, repaint, setCur,
    cart: { add: addToCart, addMany, remove: removeFromCart, update: updateLine, lines: () => state.cart, totals: (d) => C.totals(state.cart, state.cur, d), paint: paintCart },
    seg: initSeg, sel: initSel,
    popup: openPop, closePopup: closePop,
    validate, signIn, signOut, pay, play
  };

  /* ---------- boot: fixed layers live outside the scroll frame ---------- */
  if (scEl) $$('.pop', scEl).forEach((p) => document.body.appendChild(p));
  if (ck) document.body.prepend(ck);
  paintCart(); paintAuth(); repaint(null, true); initHome(); pillSet(); stickyMode(); arm();
  let entry = null;
  function enter(how) { if (entry) return; entry = how; preload(); }
  function crossfade(vt) { root.classList.add('xf'); root.classList.remove('arriving'); navStill = true; if (head) head.classList.add('in'); vt.finished.then(() => root.classList.remove('xf')); enter('crossfade'); entry = 'crossfade'; }
  if (window.ddCrossfade) crossfade(window.ddCrossfade);
  else if (CROSSFADE) addEventListener('pagereveal', (e) => { if (e.viewTransition) crossfade(e.viewTransition); }, { once: true });
  if (document.readyState === 'complete') enter('load'); else addEventListener('load', () => enter('load'));
})();
