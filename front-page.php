<?php
/**
 *  Template Name: Home
 *
 * Description: Custom homepage Template.
 *
 * @package Element IQ
 */
?>

<? get_header();?>


<section class='hero-section' style='background-image: url("/wp-content/themes/elementiq/assets/images/herobackground.png");'>
    <h1>A 50-Year Legacy of Building Community Based Housing</h1>

    <div class='hero-section__cards'>
      <div class='hero-section__cards--card'>
        <div><h2>RENTALS</h2></div>
        <div class='divider'>
          <div class='divider-line'></div>
          <img src='/wp-content/themes/elementiq/assets/images/grey-star.svg' />
          <div class='divider-line'></div>
        </div>
        <div><p>Molnar is committed to quality rentals for Vancouver families in need.</p></div>
      </div>
      <div class='hero-section__cards--card'>
        <div><h2>CONDOS</h2></div>
        <div class='divider'>
          <div class='divider-line'></div>
          <img src='/wp-content/themes/elementiq/assets/images/grey-star.svg' />
          <div class='divider-line'></div>
        </div>
        <div><p>Molnar condos blend style and function—award-winning homes for families.</p></div>
      </div>
      <div class='hero-section__cards--card'>
        <div><h2>COMMERCIAL</h2></div>
        <div class='divider'>
          <div class='divider-line'></div>
          <img src='/wp-content/themes/elementiq/assets/images/grey-star.svg' />
          <div class='divider-line'></div>
        </div>
        <div><p>We revitalize commercial spaces to meet real community needs.</p></div>
      </div>
    </div>
</section>

<section class='projects-section'>
  <div class='projects-section__content-wrapper'>
    <div class='projects-section__content-wrapper--content'>
          <h2>BULDING FOR TOMORROW</h2>
          <p>At Molnar Group, we create thoughtfully designed, community-focused developments that stand the test of time. From vibrant rental homes to revitalized commercial spaces, our projects are built with purpose, quality, and long-term impact in mind.</p>
    </div>
    <div class='projects-section__content-wrapper--link'>
       <a href='/projects'>
            <div>
              <p>View Projects</p>
              <img src='/wp-content/themes/elementiq/assets/images/grey-star.svg' />
            </div>
          </a>

    </div>
  </div>
  <div class='projects-section__showcase'>
    <div class='projects-section__showcase--heading'>
      <h2>
        BETTER <span style='font-style:italic;'>LIVING</span>
      </h2>
    </div>
    <div class='projects-section__showcase--image first-image'>
      <img style='border-radius: 0 2.063rem 0 0' src="/wp-content/themes/elementiq/assets/images/showcase_01.png" alt="">
    </div>
    <div class='projects-section__showcase--image second-image'>
      <img style='border-radius: 0 0 0 2.063rem' src="/wp-content/themes/elementiq/assets/images/showcase_02.png" alt="">
    </div>
    <div class='projects-section__showcase--heading'>
      <h2>
        <span style='font-style:italic;'>A VISION </span> FOR LIFE
      </h2>
    </div>
  </div>
  <div class='projects-section__content'>
    <div class='projects-section__content--heading'>
        <h2>BY FAMILIES FOR FAMILIES</h2>
    </div>
    <div class='projects-section__content--paragraphs'>
      <div>
        <p>Andre Molnar established the Molnar Group in 1969 with a clear vision: to build homes for families. With 50 years of experience, the family-run company has built close to 6,000 homes across Western Canada and the Pacxific Northwest.</p>
        <p>Known for high-quality finishes with broad market appeal, the Molnar Group’s singular focus now is to develop and deliver much-needed purpose-built rental homes in Vancouver and on Vancouver Island. The company’s expertise in all aspects of project management assures residents that their homes are the very best.</p>
      </div>
      <div>
        <p>In addition to family-oriented residential development, the Molnar Group maintains a portfolio of commercial properties in Washington State and Western Canada, including the prestigious Hotel Bellwether in Bellingham. It has also developed and managed a portfolio of properties in Montreal.</p>
        <p>The Molnar Group constantly seeks retail properties as well as redevelopment opportunities for projects that will serve the needs of generations to come.</p>
      </div>
    </div>
  </div>
</section>

<div class='page-section-divider'>
  <div class='divider-line'></div>
    <img src='/wp-content/themes/elementiq/assets/images/white-star.png' />
  <div class='divider-line'></div>
</div>

<div class='page-section-divider'>
  <div class='divider-line'></div>
    <img src='/wp-content/themes/elementiq/assets/images/white-star.png' />
  <div class='divider-line'></div>
</div>


<section class='memberships-section'>
  <h2>CHARITIES/MEMBERSHIPS</h2>
   <!-- Full-bleed marquee -->
  <div class="partners-marquee" data-speed="500" data-pause="2"> <!-- px/sec -->
    <div class="partners-scroller" aria-label="Partner logos">
      <ul class="partners-track">
        <?php if (have_rows('partnerships')): while (have_rows('partnerships')): the_row();
          $logo = get_sub_field('partner_image'); // ACF image (array)
        ?>
        <li class="partners-item">
            <?php echo wp_get_attachment_image(
              is_array($logo) ? $logo['ID'] : $logo,
              'medium',
              false,
              ['class'=>'partners-img','alt'=>'Partner logo', 'loading'=>'lazy','decoding'=>'async']
            ); ?>
        </li>
        <?php endwhile; endif; ?>
      </ul>
    </div>
  </div>

</section>

<div class='page-section-divider'>
  <div class='divider-line'></div>
    <img src='/wp-content/themes/elementiq/assets/images/white-star.png' />
  <div class='divider-line'></div>
</div>


<section class='our-team-section'>
  <div class='our-team-section__headings'>
    <h2>Our Team</h2>
    <p>As proud residents of the Lower Mainland, the Molnar team has an integrated understanding of the local communities it serves. Add to that, this dedicated group of experts has more than a century of combined experience in BC’s housing sector.</p>
  </div>
  <div class='our-team-section__slider'>
     <!-- full-bleed container so slides can overflow the page container -->
  <div class="swiper team-swiper swiper--bleed">
    <div class="swiper-wrapper">
      <?php if (have_rows('team_cards')): while (have_rows('team_cards')): the_row();
        $img = get_sub_field('team_image'); // ACF image (array)
        $name = get_sub_field('team_name');
        $role = get_sub_field('team_position');
      ?>
      <article class="swiper-slide team-card">
        <figure class="team-card__media">
          <?php if ($img) echo wp_get_attachment_image($img['ID'], 'large', false, ['class'=>'team-card__img']); ?>
        </figure>
        <h3 class="team-card__name"><?php echo esc_html($name); ?></h3>
        <p class="team-card__role"><?php echo esc_html($role); ?></p>
      </article>
      <?php endwhile; endif; ?>
    </div>
  </div>
  </div>
</section>


<div class='page-section-divider'>
  <div class='divider-line'></div>
    <img src='/wp-content/themes/elementiq/assets/images/white-star.png' />
  <div class='divider-line'></div>
</div>


<section class='cta-section'>
  <div class='cta-section__wrapper'>
    <h2>Building for Tomorrow</h2>
    <p>At Molnar Group, we create thoughtfully designed, community-focused developments that stand the test of time. From vibrant rental homes to revitalized commercial spaces, our projects are built with purpose, quality, and long-term impact in mind.</p>
    <a class='secondary-button' href="/">Get in Touch</a>
    <img src="/wp-content/themes/elementiq/assets/images/cta-background.png" alt="">
    <img src="/wp-content/themes/elementiq/assets/images/cta-background-02.png" alt="">
  </div>
</section>


<p class='disclaimer'>
  Links to third-party websites are provided for convenience and do not imply endorsement; we are not responsible for the content or availability of these external sites. We also do not guarantee uninterrupted access to this site and are not liable for any temporary unavailability due to technical issues beyond our control.
</p>



<? get_footer();?>