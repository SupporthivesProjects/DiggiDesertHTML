
(() => {
  const C = window.CATALOGUE, $ = DD.$, $$ = DD.$$;
  const list = $('#cartLines'), body = $('#cartBody'), empty = $('#cartEmpty'), sumLines = $('#sumLines'), total = $('#sumTotal');
  const heroLines = $('#heroLines'), heroEmpty = $('#heroEmpty');
  const counters = new WeakMap();
  let mine = false;

  function paintAmt(el, v) {
    const cur = DD.state.cur;
    const from = el.dataset.shown != null ? parseFloat(el.dataset.shown) : v;
    el.dataset.shown = v;
    if (DD.RM || Math.abs(from - v) < .005) { el.textContent = C.fmt(v, cur); return; }
    const t0 = performance.now(); const prev = counters.get(el); if (prev) cancelAnimationFrame(prev);
    const step = (t) => { const k = DD.clamp((t - t0) / 650, 0, 1); const e = 1 - Math.pow(1 - k, 3); el.textContent = C.fmt(k < 1 ? from + (v - from) * e : v, cur); if (k < 1) counters.set(el, requestAnimationFrame(step)); };
    counters.set(el, requestAnimationFrame(step));
  }

  const includes = (l) => C.service(l.id).tiers[l.tier].sub;

  function lineHTML(l) {
    const s = C.service(l.id), p = C.PATHS[s.path];
    const tiers = C.TIERS.map((t) => '<option value="' + t + '"' + (t === l.tier ? ' selected' : '') + '>' + C.TIER_NAMES[t] + '</option>').join('');
    const terms = s.oneOff ? '<option value="1" selected>One price</option>' : C.TERMS.map((t) => '<option value="' + t + '"' + (t === l.term ? ' selected' : '') + '>' + C.termLabel(l.id, t) + '</option>').join('');
    return '<article class="cart-line" data-id="' + l.id + '" data-r>' +
      '<div class="cart-line-copy"><span class="lbl-s sage">' + p.name + '</span><h2>' + s.name + '</h2><p class="inc">' + includes(l) + '</p></div>' +
      '<div class="cart-line-ctls">' +
      '<div class="cart-line-ctl tier"><span class="lbl-s sage" id="tier-' + l.id + '">Tier</span><div class="sel"><select data-k="tier" aria-labelledby="tier-' + l.id + '">' + tiers + '</select></div></div>' +
      '<div class="cart-line-ctl term"><span class="lbl-s sage" id="term-' + l.id + '">Term</span><div class="sel"><select data-k="term" aria-labelledby="term-' + l.id + '"' + (s.oneOff ? ' disabled' : '') + '>' + terms + '</select></div></div>' +
      '</div>' +
      '<div class="cart-line-price"><span class="amt" data-gbp="' + C.priceGBP(l.id, l.tier, l.term) + '"></span><button type="button" class="rm" aria-label="Remove ' + s.name + '">Remove</button></div>' +
      '</article>';
  }

  function sumHTML(l) {
    const s = C.service(l.id);
    return '<div class="pur-sum-line" data-id="' + l.id + '"><div><b>' + s.name + '</b><small>' + C.choiceLabel(l.id, l.tier, l.term) + '</small></div><span class="price" data-gbp="' + C.priceGBP(l.id, l.tier, l.term) + '"></span></div>';
  }

  function paintTotal() {
    const t = C.totals(DD.cart.lines(), DD.state.cur, false);
    paintAmt(total, t.total);
  }

  function renderSummary(instant) {
    const lines = DD.cart.lines();
    const have = $$('.pur-sum-line', sumLines).map((r) => r.dataset.id);
    if (have.join() !== lines.map((l) => l.id).join()) {
      sumLines.innerHTML = lines.map(sumHTML).join('');
      DD.repaint(sumLines, true);
    } else {
      lines.forEach((l) => { const r = $('.pur-sum-line[data-id="' + l.id + '"]', sumLines); $('small', r).textContent = C.choiceLabel(l.id, l.tier, l.term); DD.paintPrice($('.price', r), C.priceGBP(l.id, l.tier, l.term), instant); });
    }
    paintTotal();
  }

  function showEmpty() {
    body.hidden = true; empty.hidden = false; heroLines.hidden = true; heroEmpty.hidden = false;
    DD.revealNew(empty); DD.remeasure();
  }

  function render() {
    const lines = DD.cart.lines();
    if (!lines.length) { list.innerHTML = ''; showEmpty(); return; }
    body.hidden = false; empty.hidden = true; heroLines.hidden = false; heroEmpty.hidden = true;
    list.innerHTML = lines.map(lineHTML).join('');
    $$('.sel', list).forEach(DD.sel);
    DD.repaint(list, true);
    renderSummary(true);
    DD.revealNew(list); DD.remeasure();
  }

  list.addEventListener('change', (e) => {
    const sel = e.target.closest('select'); if (!sel) return;
    const line = sel.closest('.cart-line'), id = line.dataset.id;
    const patch = {}; patch[sel.dataset.k] = sel.dataset.k === 'term' ? +sel.value : sel.value;
    mine = true; DD.cart.update(id, patch); mine = false;
    const l = DD.cart.lines().find((x) => x.id === id);
    $('.inc', line).textContent = includes(l);
    DD.paintPrice($('.amt', line), C.priceGBP(id, l.tier, l.term));
    renderSummary();
    DD.remeasure();
  });

  list.addEventListener('click', (e) => {
    const b = e.target.closest('.rm'); if (!b) return;
    const line = b.closest('.cart-line'), id = line.dataset.id;
    mine = true; DD.cart.remove(id); mine = false;
    renderSummary();
    const done = () => { line.remove(); if (!DD.cart.lines().length) showEmpty(); DD.remeasure(); };
    if (DD.RM) { done(); return; }
    line.style.height = line.offsetHeight + 'px'; void line.offsetWidth;
    line.classList.add('out');
    setTimeout(done, 520);
  });

  document.addEventListener('dd:cart', () => {
    if (mine) return;
    const shown = $$('.cart-line', list).map((x) => x.dataset.id).join();
    if (shown !== DD.cart.lines().map((l) => l.id).join()) render();
  });
  document.addEventListener('dd:currency', paintTotal);

  render();
})();