

<?php wp_footer(); ?>

<footer>
    <div class='footer-wrapper'>
        <div class='footer-wrapper__socials'>
            <div class='footer-wrapper__socials--image'>
                <img src="/wp-content/themes/elementiq/assets/images/footer-logo.png" alt=""/>
            </div>
            <div class='footer-wrapper__socials--wrapper'>
                <div class='address'>
                    <p><span>Address:</span> 1285 West Broadway (#570) Vancouver, BC V6H 3X8</p>
                </div>
                <div class='social'>
                    <img src="/wp-content/themes/elementiq/assets/images/ig-logo.png" alt=""/>
                    <img src="/wp-content/themes/elementiq/assets/images/fb-logo.png" alt=""/>
                    <img src="/wp-content/themes/elementiq/assets/images/linkedin-logo.png" alt=""/>
                </div>
            </div>
        </div>
        <div class='footer-wrapper__quick-links'>
            <h2>Quick Links</h2>
            <div>
                <a href="/">Home</a>
                <a href="/">Our Projects</a>
                <a href="/">Our Team</a>
            </div>
        </div>
        <div class='footer-wrapper__contact'>
            <h2>Contact Us</h2>
            <div>
                <a href="/"><span>Phone:</span> 604-730-7333</a>
                <a href="/"><span>Fax:</span> 604-730-7339</a>
            </div>
        </div>
    </div>
</footer>

<section class="copyright">
    <nav>
        <ul>
            <li><p>The Molnar Group © Since 1969</p></li>
            <li><a href="/">Privacy Policy</a></li>
            <li><a href="/">Terms and Conditions</a></li>
        </ul>
    </nav>
    <p>Website by <a href='https://elementiq.com'>Element IQ</a></p>
</section>


<script defer>
    // /assets/js/theme.js
document.addEventListener('DOMContentLoaded', () => {
  const sliderEl = document.querySelector('.team-swiper');
  // Create Swiper
  const sw = new Swiper(sliderEl, {
    autoHeights: false,
    slidesPerView: 3,
    spaceBetween: 30,            // card gap
    freeMode: { enabled: true }, // natural scroll; turn off to snap to slides
    watchOverflow: true,
    grabCursor: true,
    keyboard: { enabled: true },
    mousewheel: { forceToAxis: true },

  });
});

</script>

</body>
</html>