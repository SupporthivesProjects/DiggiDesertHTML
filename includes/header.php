<?php
  $currentPage = basename($_SERVER['PHP_SELF']);
?>
<!doctype php>
<php lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diggidesert</title>
    <link rel="icon" href="./assets/logos/mark-amber.svg" type="image/svg+xml">
    <link rel="stylesheet" href="./assets/devcss/mainBase.css">
  </head>
  <body>
      <div class="o2-head" id="head">
        <header class="o2-nav">
          <div class="o2-navbg"></div>
          <a href="index.php" class="o2-logo" aria-label="Diggidesert home">
            <svg viewBox="0 0 34 34" aria-hidden="true"><defs><clipPath id="dclip"><rect x="0" y="0" width="34" height="20"/></clipPath></defs><circle class="ring" cx="17" cy="17" r="16.23" fill="none" stroke="currentColor" stroke-width="1.545" transform="rotate(-90 17 17)"/><g clip-path="url(#dclip)"><path class="sun" d="M10.5 20a6.5 6.5 0 0 1 13 0z" fill="currentColor"/></g><path class="horizon" d="M2.5 20H31.5" fill="none" stroke="currentColor" stroke-width="1.545" stroke-linecap="round"/></svg>
            <b class="fx" style="--d:.6s">DIGGIDESERT</b>
          </a>
          <nav class="o2-pills fx" style="--d:.3s" aria-label="Main"><span class="o2-ind" aria-hidden="true"></span><a href="index.php" class=" hot" aria-current="page">Home</a><a href="services.php" class="">Services</a><a href="about.php" class="">About</a><a href="contact.php" class="">Contact</a></nav>
          <div class="o2-act">
            <div class="curw fx" style="--d:.45s">
              <button class="o2-glass o2-cur cur-btn" type="button" aria-haspopup="listbox" aria-expanded="false" aria-label="Currency, GBP">£</button>
              <ul class="cur-menu" role="listbox" aria-label="Currency">
                <li role="option" data-cur="GBP" aria-selected="false" class="">
                  <span>£ GBP</span>
                  <svg class="tk" viewBox="0 0 12 9" fill="none" aria-hidden="true">
                    <path d="M1 4.5L4.2 7.7L11 1" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </li>
                <li role="option" data-cur="USD" aria-selected="false" class="focus">
                  <span>$ USD</span>
                  <svg class="tk" viewBox="0 0 12 9" fill="none" aria-hidden="true">
                    <path d="M1 4.5L4.2 7.7L11 1" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </li>
                <li role="option" data-cur="EUR" aria-selected="true" class="">
                  <span>€ EUR</span>
                  <svg class="tk" viewBox="0 0 12 9" fill="none" aria-hidden="true">
                    <path d="M1 4.5L4.2 7.7L11 1" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </li>
                <li role="option" data-cur="CAD" aria-selected="false" class="">
                  <span>C$ CAD</span>
                  <svg class="tk" viewBox="0 0 12 9" fill="none" aria-hidden="true">
                    <path d="M1 4.5L4.2 7.7L11 1" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </li>
                <li role="option" data-cur="AUD" aria-selected="false" class="">
                  <span>A$ AUD</span>
                  <svg class="tk" viewBox="0 0 12 9" fill="none" aria-hidden="true">
                    <path d="M1 4.5L4.2 7.7L11 1" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </li>
                <li role="option" data-cur="AUD" aria-selected="false" class="">
                  <span>A$ INR</span>
                  <svg class="tk" viewBox="0 0 12 9" fill="none" aria-hidden="true">
                    <path d="M1 4.5L4.2 7.7L11 1" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </li>
              </ul>
            </div>
            <a href="sign-in.php" class="o2-glass si fx" style="--d:.5s">Sign in</a>
            <a href="cart.php" class="o2-cart fx" style="--d:.55s"><span>Cart (<span class="n cartn">0</span>)</span></a>
            <button class="o2-burger fx" style="--d:.55s" type="button" aria-label="Open menu" aria-controls="menu"><svg width="16" height="8" viewBox="0 0 16 8" fill="none" aria-hidden="true"><path d="M0 1h16M0 7h16" stroke="#fff" stroke-width="1.5" stroke-linecap="round"/></svg></button>
          </div>
        </header>
      </div>
      <div class="menu" id="menu" aria-hidden="false" role="dialog" aria-label="Menu">
        <div class="bar">
          <a href="index.php" class="o2-logo" aria-label="Diggidesert home">
            <svg viewBox="0 0 34 34" aria-hidden="true">
              <defs>
                <clipPath id="mclip">
                  <rect x="0" y="0" width="34" height="20"></rect>
                </clipPath>
              </defs>
              <circle cx="17" cy="17" r="16.23" fill="none" stroke="currentColor" stroke-width="1.545" transform="rotate(-90 17 17)"></circle>
              <g clip-path="url(#mclip)">
                <path d="M10.5 20a6.5 6.5 0 0 1 13 0z" fill="currentColor"></path>
              </g>
              <path d="M2.5 20H31.5" fill="none" stroke="currentColor" stroke-width="1.545" stroke-linecap="round"></path>
            </svg>
          </a>
          <div class="acts">
            <a href="cart.php" class="o2-cart">
              <span>Cart ( <span class="n cartn">3</span>) </span>
            </a>
            <button class="x" type="button" aria-label="Close menu">
              <svg width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true">
                <path d="M1 1l10 10M11 1L1 11" stroke="#fff" stroke-width="1.5" stroke-linecap="round"></path>
              </svg>
            </button>
          </div>
        </div>
        <nav class="links" aria-label="Menu">
          <a href="index.php" class="hot" aria-current="page" style="--i:0">Home</a>
          <a href="services.php" style="--i:1">Services</a>
          <a href="about.php" style="--i:2">About</a>
          <a href="contact.php" style="--i:3">Contact</a>
        </nav>
        <div class="acct">
          <a href="sign-in.php" class="si">Sign in</a>
          <div class="curw">
            <button class="cur-btn" type="button" data-full="" aria-haspopup="listbox" aria-expanded="false" aria-label="Currency, GBP">£ GBP</button>
            <ul class="cur-menu" role="listbox" aria-label="Currency">
              <li role="option" data-cur="GBP" aria-selected="true">
                <span>£ GBP</span>
                <svg class="tk" viewBox="0 0 12 9" fill="none" aria-hidden="true">
                  <path d="M1 4.5L4.2 7.7L11 1" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </li>
              <li role="option" data-cur="USD" aria-selected="false">
                <span>$ USD</span>
                <svg class="tk" viewBox="0 0 12 9" fill="none" aria-hidden="true">
                  <path d="M1 4.5L4.2 7.7L11 1" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </li>
              <li role="option" data-cur="EUR" aria-selected="false">
                <span>€ EUR</span>
                <svg class="tk" viewBox="0 0 12 9" fill="none" aria-hidden="true">
                  <path d="M1 4.5L4.2 7.7L11 1" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </li>
              <li role="option" data-cur="CAD" aria-selected="false">
                <span>C$ CAD</span>
                <svg class="tk" viewBox="0 0 12 9" fill="none" aria-hidden="true">
                  <path d="M1 4.5L4.2 7.7L11 1" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </li>
              <li role="option" data-cur="AUD" aria-selected="false">
                <span>A$ AUD</span>
                <svg class="tk" viewBox="0 0 12 9" fill="none" aria-hidden="true">
                  <path d="M1 4.5L4.2 7.7L11 1" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </li>
              <li role="option" data-cur="INR" aria-selected="false">
                <span>N$ INR</span>
                <svg class="tk" viewBox="0 0 12 9" fill="none" aria-hidden="true">
                  <path d="M1 4.5L4.2 7.7L11 1" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </li>
            </ul>
          </div>
        </div>
        <div class="mdet">
          <span class="pay">We take <svg viewBox="0 0 76 24" role="img" aria-label="Visa and Mastercard">
              <g clip-path="url(#clip0_0_115)">
                <path d="M33 0H3C1.34315 0 0 1.34315 0 3V21C0 22.6569 1.34315 24 3 24H33C34.6569 24 36 22.6569 36 21V3C36 1.34315 34.6569 0 33 0Z" fill="white"></path>
                <g>
                  <path d="M7.87083 9.22727L9.62864 14.7528H9.69611L11.4575 9.22727H13.162L10.6549 16.5H8.67338L6.16273 9.22727H7.87083Z" fill="#1A1F71"></path>
                  <path d="M15.575 9.22727V16.5H14.0374V9.22727H15.575Z" fill="#1A1F71"></path>
                  <path d="M20.7854 11.3189C20.757 11.0324 20.6351 10.8099 20.4197 10.6513C20.2042 10.4927 19.9118 10.4134 19.5425 10.4134C19.2916 10.4134 19.0797 10.4489 18.9069 10.5199C18.734 10.5885 18.6015 10.6844 18.5091 10.8075C18.4192 10.9306 18.3742 11.0703 18.3742 11.2266C18.3695 11.3568 18.3967 11.4704 18.4559 11.5675C18.5174 11.6645 18.6015 11.7486 18.708 11.8196C18.8145 11.8883 18.9376 11.9486 19.0773 12.0007C19.217 12.0504 19.3662 12.093 19.5248 12.1286L20.1782 12.2848C20.4954 12.3558 20.7866 12.4505 21.0518 12.5689C21.3169 12.6873 21.5465 12.8329 21.7407 13.0057C21.9348 13.1785 22.0851 13.3821 22.1917 13.6165C22.3006 13.8509 22.3562 14.1196 22.3586 14.4226C22.3562 14.8677 22.2426 15.2536 22.0177 15.5803C21.7951 15.9046 21.4732 16.1567 21.0518 16.3366C20.6327 16.5142 20.1273 16.603 19.5354 16.603C18.9483 16.603 18.4369 16.513 18.0013 16.3331C17.5681 16.1532 17.2296 15.8868 16.9857 15.5341C16.7442 15.179 16.6176 14.7398 16.6057 14.2166H18.0937C18.1102 14.4605 18.1801 14.6641 18.3032 14.8274C18.4287 14.9884 18.5956 15.1103 18.8039 15.1932C19.0146 15.2737 19.2525 15.3139 19.5177 15.3139C19.7781 15.3139 20.0042 15.276 20.1959 15.2003C20.3901 15.1245 20.5404 15.0192 20.6469 14.8842C20.7535 14.7493 20.8067 14.5942 20.8067 14.419C20.8067 14.2557 20.7582 14.1184 20.6611 14.0071C20.5664 13.8958 20.4268 13.8011 20.2421 13.723C20.0598 13.6449 19.8361 13.5739 19.5709 13.5099L18.779 13.3111C18.1659 13.1619 17.6817 12.9287 17.3266 12.6115C16.9715 12.2943 16.7951 11.867 16.7975 11.3295C16.7951 10.8892 16.9123 10.5045 17.1491 10.1754C17.3882 9.84635 17.7161 9.58949 18.1327 9.40483C18.5494 9.22017 19.0229 9.12784 19.5532 9.12784C20.093 9.12784 20.5641 9.22017 20.9665 9.40483C21.3714 9.58949 21.6862 9.84635 21.9111 10.1754C22.136 10.5045 22.252 10.8857 22.2591 11.3189H20.7854Z" fill="#1A1F71"></path>
                  <path d="M24.4804 16.5H22.8327L25.3433 9.22727H27.3248L29.8319 16.5H28.1842L26.3625 10.8892H26.3057L24.4804 16.5ZM24.3774 13.6413H28.2694V14.8416H24.3774V13.6413Z" fill="#1A1F71"></path>
                </g>
                <path d="M73 0H43C41.3431 0 40 1.34315 40 3V21C40 22.6569 41.3431 24 43 24H73C74.6569 24 76 22.6569 76 21V3C76 1.34315 74.6569 0 73 0Z" fill="white"></path>
                <path d="M53.5 19C57.366 19 60.5 15.866 60.5 12C60.5 8.13401 57.366 5 53.5 5C49.634 5 46.5 8.13401 46.5 12C46.5 15.866 49.634 19 53.5 19Z" fill="#EB001B"></path>
                <path d="M62.5 19C66.366 19 69.5 15.866 69.5 12C69.5 8.13401 66.366 5 62.5 5C58.634 5 55.5 8.13401 55.5 12C55.5 15.866 58.634 19 62.5 19Z" fill="#F79E1B"></path>
                <path d="M58 6.6C58.7962 7.25675 59.4373 8.08143 59.8774 9.01499C60.3176 9.94856 60.5458 10.9679 60.5458 12C60.5458 13.0321 60.3176 14.0514 59.8774 14.985C59.4373 15.9186 58.7962 16.7433 58 17.4C57.2038 16.7433 56.5627 15.9186 56.1226 14.985C55.6824 14.0514 55.4542 13.0321 55.4542 12C55.4542 10.9679 55.6824 9.94856 56.1226 9.01499C56.5627 8.08143 57.2038 7.25675 58 6.6Z" fill="#FF5F00"></path>
              </g>
              <defs>
                <clipPath>
                  <rect width="76" height="24" fill="white"></rect>
                </clipPath>
              </defs>
            </svg>
          </span>
          <hr>
          <p>Diggidesert Ltd, registered in [Country], company no. [00000000]. Registered office: [Street], [City] [Postcode], [Country].</p>
        </div>
      </div>
      <div id="sc">
      <main>

  


  
  