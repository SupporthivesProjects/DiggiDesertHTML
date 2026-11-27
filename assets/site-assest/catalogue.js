(() => {
  const PATHS = {
    discovery: { id: 'discovery', name: 'Discovery', page: 'services.html#discovery', tag: 'They find you', services: ['seo', 'ppc', 'social-media'] },
    decision: { id: 'decision', name: 'Decision', page: 'services.html#decision', tag: 'They pick you', services: ['ux-ui', 'email-marketing', 'orm'] }
  };

  const TERMS = [1, 3, 6, 12];
  const PACKAGE_TIER = 'silver';
  const PACKAGE_TERM = 1;

  const SERVICES = [
    {
      id: 'seo', name: 'SEO', path: 'discovery', page: 'seo.html',
      line: 'Rank for the searches your customers already make.',
      tiers: {
        bronze: { sub: 'National SEO, 5 keywords', includes: ['National coverage', '5 keywords'], prices: { 1: 95, 3: 271, 6: 513, 12: 969 } },
        silver: { sub: 'National SEO, 15 keywords', includes: ['National coverage', '15 keywords'], prices: { 1: 319, 3: 909, 6: 1723, 12: 3254 } },
        gold: { sub: 'National and international SEO, 30 keywords', includes: ['National and international coverage', '30 keywords'], prices: { 1: 609, 3: 1736, 6: 3289, 12: 6212 } }
      }
    },
    {
      id: 'ppc', name: 'PPC', path: 'discovery', page: 'ppc.html',
      line: 'Google Ads that show up the moment someone is ready to buy.',
      adSpend: { bronze: 99, silver: 250, gold: 550 },
      tiers: {
        bronze: { sub: 'Google Search, 1 campaign', includes: ['Google Search', '1 campaign'], prices: { 1: 209, 3: 610, 6: 1188, 12: 2310 } },
        silver: { sub: 'Search and Shopping, up to 3 campaigns', includes: ['Search and Shopping', 'Up to 3 campaigns'], prices: { 1: 449, 3: 1317, 6: 2575, 12: 5030 } },
        gold: { sub: 'Google and Meta, up to 6 campaigns', includes: ['Google and Meta', 'Up to 6 campaigns'], prices: { 1: 1039, 3: 3044, 6: 5941, 12: 11588 } }
      }
    },
    {
      id: 'social-media', name: 'Social media', path: 'discovery', page: 'social-media.html',
      line: 'Written and designed posts, and replies to the people who comment.',
      tiers: {
        bronze: { sub: '2 platforms, 12 posts a month', includes: ['2 platforms', '12 posts a month'], prices: { 1: 125, 3: 356, 6: 675, 12: 1275 } },
        silver: { sub: '3 platforms, 30 posts a month', includes: ['3 platforms', '30 posts a month'], prices: { 1: 205, 3: 584, 6: 1107, 12: 2091 } },
        gold: { sub: '4 platforms, 60 posts a month', includes: ['4 platforms', '60 posts a month'], prices: { 1: 449, 3: 1280, 6: 2425, 12: 4580 } }
      }
    },
    {
      id: 'ux-ui', name: 'UX/UI', path: 'decision', page: 'ux-ui.html', oneOff: true,
      line: 'A WordPress website, designed and built for you.',
      tiers: {
        bronze: { sub: 'WordPress design and build, 5 pages, 1 email address', includes: ['WordPress, premium theme', '5 pages', '1 email address'], price: 375 },
        silver: { sub: 'WordPress or Shopify design and build, 10 pages, 3 email addresses', includes: ['WordPress or Shopify, custom', '10 pages', '3 email addresses'], price: 1375 },
        gold: { sub: 'Bespoke design and build, 20 pages, 5 email addresses', includes: ['Bespoke design and build', '20 pages', '5 email addresses'], price: 3795 }
      }
    },
    {
      id: 'email-marketing', name: 'Email marketing', path: 'decision', page: 'email-marketing.html',
      line: 'Emails that bring people back and turn one order into the next.',
      tiers: {
        bronze: { sub: '3 flows, 2 campaigns a month', includes: ['3 automated flows'], prices: { 1: 79, 3: 225, 6: 427, 12: 806 } },
        silver: { sub: '6 flows, 4 campaigns a month', includes: ['6 automated flows'], prices: { 1: 139, 3: 396, 6: 751, 12: 1418 } },
        gold: { sub: '10 flows, 8 campaigns a month', includes: ['10 automated flows'], prices: { 1: 295, 3: 841, 6: 1593, 12: 3009 } }
      }
    },
    {
      id: 'orm', name: 'ORM', path: 'decision', page: 'orm.html',
      line: 'Articles, profiles and posts that rank above the rest when people search your name.',
      tiers: {
        bronze: { sub: '3 phrases, 1 article a month', includes: ['3 phrases protected', '1 article a month'], prices: { 1: 179, 3: 510, 6: 967, 12: 1826 } },
        silver: { sub: '7 phrases, 3 articles a month', includes: ['7 phrases protected', '3 articles a month'], prices: { 1: 369, 3: 1052, 6: 1993, 12: 3764 } },
        gold: { sub: '15 phrases, 6 articles a month', includes: ['15 phrases protected', '6 articles a month'], prices: { 1: 829, 3: 2363, 6: 4477, 12: 8456 } }
      }
    }
  ];

  const TIERS = ['bronze', 'silver', 'gold'];
  const TIER_NAMES = { bronze: 'Bronze', silver: 'Silver', gold: 'Gold' };

  const BASE = 'GBP';
  const RATES = { GBP: 1, USD: 1.27, EUR: 1.17, CAD: 1.78, AUD: 1.95 };
  const RATES_DATED = '23 November 2026';
  const CURRENCIES = {
    GBP: { code: 'GBP', symbol: '£', locale: 'en-GB' },
    USD: { code: 'USD', symbol: '$', locale: 'en-US' },
    EUR: { code: 'EUR', symbol: '€', locale: 'en-IE' },
    CAD: { code: 'CAD', symbol: 'C$', locale: 'en-CA' },
    AUD: { code: 'AUD', symbol: 'A$', locale: 'en-AU' }
  };
  const CURRENCY_ORDER = ['GBP', 'USD', 'EUR', 'CAD', 'AUD'];

  const DISCOUNT = { code: 'WELCOME10', rate: 0.10 };

  const round2 = (n) => Math.round(n * 100 + 1e-6) / 100;

  const byId = {};
  SERVICES.forEach((s) => { byId[s.id] = s; });
  const service = (id) => byId[id];

  const priceGBP = (id, tier, term) => {
    const s = byId[id];
    const t = s && s.tiers[tier];
    if (!t) return 0;
    return s.oneOff ? t.price : (t.prices[term] || 0);
  };

  const convert = (gbp, cur) => round2(gbp * (RATES[cur] || 1));
  const price = (id, tier, term, cur) => convert(priceGBP(id, tier, term), cur || BASE);

  const fromGBP = (id) => {
    const s = byId[id];
    return Math.min(...TIERS.map((t) => (s.oneOff ? s.tiers[t].price : s.tiers[t].prices[1])));
  };
  const pathFromGBP = (pathId) => Math.min(...SERVICES.filter((s) => s.path === pathId).map((s) => fromGBP(s.id)));

  const packageLines = (pathId) => PATHS[pathId].services.map((id) => ({ id, tier: PACKAGE_TIER, term: PACKAGE_TERM }));
  const packageGBP = (pathId) => packageLines(pathId).reduce((a, l) => a + priceGBP(l.id, l.tier, l.term), 0);

  const fmtNumber = (n, cur) => {
    const c = CURRENCIES[cur] || CURRENCIES[BASE];
    const whole = cur === BASE && Math.abs(n - Math.round(n)) < 0.005;
    return n.toLocaleString(c.locale, { minimumFractionDigits: whole ? 0 : 2, maximumFractionDigits: whole ? 0 : 2 });
  };
  const fmt = (n, cur) => (CURRENCIES[cur] || CURRENCIES[BASE]).symbol + fmtNumber(n, cur || BASE);

  const termLabel = (id, term) => {
    const s = byId[id];
    if (s && s.oneOff) return 'One price';
    return term === 1 ? '1 month' : term + ' months';
  };
  const choiceLabel = (id, tier, term) => {
    const s = byId[id];
    if (s && s.oneOff) return TIER_NAMES[tier] + ', one price';
    return TIER_NAMES[tier] + ', ' + termLabel(id, term);
  };

  const totals = (lines, cur, discountOn) => {
    const rows = lines.map((l) => ({ ...l, amount: price(l.id, l.tier, l.term, cur) }));
    const subtotal = round2(rows.reduce((a, r) => a + r.amount, 0));
    const discount = discountOn ? round2(subtotal * DISCOUNT.rate) : 0;
    const total = round2(subtotal - discount);
    return { rows, subtotal, discount, total };
  };

  const DEMO_CART = [
    { id: 'seo', tier: 'silver', term: 3 },
    { id: 'ux-ui', tier: 'bronze', term: 1 },
    { id: 'email-marketing', tier: 'bronze', term: 1 }
  ];

  window.CATALOGUE = {
    PATHS, TERMS, SERVICES, TIERS, TIER_NAMES, BASE, CURRENCIES, CURRENCY_ORDER, RATES, RATES_DATED, DISCOUNT, DEMO_CART, PACKAGE_TIER, PACKAGE_TERM,
    service, priceGBP, convert, price, fromGBP, pathFromGBP, packageLines, packageGBP, fmt, fmtNumber, termLabel, choiceLabel, totals, round2
  };
})();
