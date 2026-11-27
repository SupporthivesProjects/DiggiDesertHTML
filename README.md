# Diggidesert

TimeLine full day<br>
Start Date : 26/11/2026<br>
End Date : 28/11/2026 (EOD)<br>

# Developer Team
Developer Team:Vijay,Rahul,Dhiraj,Saakshi-C,Saakshi-K,Tirthak,Diksha<br>
Project Report : Jeet <br>
Team Lead : Vijay <br>
Co-Team Lead : Rahul<br>

# QA Team
QA - Parth/Shailesh<br>

# Project Task Allocation

| Team Member | Assigned Pages / Responsibilities |
|---|---|
| Vijay | Header, Footer,  Terms, Privacy, Cookies, Error, All modal & Popup|
| Rahul | Cart, Checkout, Checkout Success/Failed, All modal & Popup |
| Dhiraj | Build Your Own, Service Landing, ContactUs, All modal & Popup |
| Tirthak | Service Individual (All 6 Services), All modal & Popup |
| Saakshi C | Dashboard, All modal & Popup |
| Sakshi K | HomePage, About Us, All modal & Popup |
| Diksha | Login, Register, Reset, Forgot, All modal & Popup |


## Common Project Responsibilities

- Link Optimization – Ensure all internal and external links work correctly.
- Responsive Design – Ensure all pages are fully responsive across desktop, tablet, and mobile devices.
- Cross-Browser Compatibility – Verify compatibility across major browsers.
- UI Consistency – Maintain consistent layouts, typography, colors, and spacing.
- Modal & Popup Functionality – Ensure all modals and popups work correctly.
- Navigation – Verify all navigation menus, buttons, and redirects.
- Testing & Bug Fixing – Test assigned pages and fix UI and functional issues.


# Email Template

Rahul: Invoice / Email Templates.


### Check values (demo cart: SEO Silver 3 months, UX/UI Bronze, Email marketing Bronze 1 month; WELCOME10 at checkout)

| Currency | SEO | UX/UI | Email | Subtotal | WELCOME10 | Total |
|---|---|---|---|---|---|---|
| GBP | £909 | £375 | £79 | £1,363 | £136.30 off | £1,226.70 |
| USD | $1,154.43 | $476.25 | $100.33 | $1,731.01 | $173.10 off | $1,557.91 |
| EUR | €1,063.53 | €438.75 | €92.43 | €1,594.71 | €159.47 off | €1,435.24 |
| CAD | C$1,618.02 | C$667.50 | C$140.62 | C$2,426.14 | C$242.61 off | C$2,183.53 |
| AUD | A$1,772.55 | A$731.25 | A$154.05 | A$2,657.85 | A$265.79 off | A$2,392.06 |

Account history in GBP: DD10417 PPC Bronze £209 plus Social media Bronze £125, total £334; DD10391 SEO Bronze, £95. Packages at Silver for 1 month: Discovery £973 (319 + 449 + 205), Decision £1,883 (1,375 + 139 + 369). From prices: SEO £95, PPC £209, Social media £125, UX/UI £375, Email marketing £79, ORM £179; Discovery from £95, Decision from £79.

## State

Cart, sign in, currency (GBP by default) and the cookie choice persist in the browser (`localStorage` and `sessionStorage`, wrapped in try and catch with an in memory fallback) and ride between pages in the URL hash as a base64 record, which each page reads and then removes. The first visit seeds the demo cart (SEO Silver 3 months, UX/UI Bronze, Email marketing Bronze 1 month). The live site replaces this with its own session and cart on the server.

# Figma
figma copy-version:- https://www.figma.com/design/98tHOFSfARabDiNQZqIs5x/AD574---RS-DM---Diggidesert.com--Copy-?m=dev

live figma :- https://www.figma.com/design/Nzu8cQekA8enevrhWSlyrO/AD574---RS-DM---Diggidesert.com?node-id=12311-9330&m=dev <br>

prototype figma:- https://ad574-diggidesert-site.netlify.app/


## Console

`dd` in the console: `dd.version()`, `dd.state()`, `dd.cart()` (lines and totals in the current currency), `dd.reset()` (restores the demo cart), `dd.currency('USD')` (sets a currency and returns the current one), `dd.rates()`, `dd.consent()`, `dd.cookies()` (opens the settings panel), `dd.resetConsent()`, `dd.pay(false)`, `dd.signIn()`, `dd.signOut()`, `dd.remeasure()`, `dd.replay()` (replays the hero entrance, also the R key), `dd.preload()`, `dd.tune.lerp`, `dd.to('#selector')`, `dd.gate(category, fn)`.