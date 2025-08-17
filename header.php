<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
    <div class='header-logo'>
        <div class="logo-badge" aria-label="The Molnar Group">
            <img src="/wp-content/themes/elementiq/assets/images/outer-logo.svg" class="logo-badge__outer" alt="" aria-hidden="true" />
            <img src="/wp-content/themes/elementiq/assets/images/inner-logo.svg" class="logo-badge__inner" alt="The Molnar Group — Real Estate Inc." />
        </div>
    </div>
    <div class='header-navigation'>
        <nav>
            <ul>
                <li>
                    <a class='nav__link' href='#'>Home</a>
                </li>
                <li>
                    <a class='nav__link' href='#'>Our Team</a>
                </li>
                <li>
                    <a class='nav__link' href='#'>Our Projects</a>
                </li>
                <li>
                    <a class='nav__link' href='#'>Awards</a>
                </li>
            </ul>
        </nav>
        <a class='secondary-button' href='/contact-us'>Contact Us</a>
    </div>
</header>