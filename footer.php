

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
  document.addEventListener('DOMContentLoaded', () => {
  const marquee = document.querySelector('.partners-marquee');
  if (!marquee) return;

  const scroller = marquee.querySelector('.partners-scroller');
  const track    = marquee.querySelector('.partners-track');
  const ref      = document.querySelector('.wrap') || document.body;

  const speedPxPerSec = parseFloat(marquee.dataset.speed || 80); // px/sec
  const pauseSec      = parseFloat(marquee.dataset.pause || 2);  // seconds

  function setPads(){
    const r = ref.getBoundingClientRect();
    const cs = getComputedStyle(ref);
    const padL = parseFloat(cs.paddingLeft) || 0;
    const padR = parseFloat(cs.paddingRight) || 0;
    const left  = Math.max(0, r.left) + padL;
    const right = Math.max(0, window.innerWidth - r.right) + padR;
    track.style.setProperty('--pad-left',  left + 'px');
    track.style.setProperty('--pad-right', right + 'px');
  }

  function buildKeyframes(travel){
    // movement time each way (s)
    const move = travel / speedPxPerSec;
    const total = move * 2 + pauseSec * 2;

    // percentage stops for: start hold, end move, end hold
    const p1 = (pauseSec / total) * 100;
    const p2 = ((pauseSec + move) / total) * 100;
    const p3 = ((pauseSec + move + pauseSec) / total) * 100;

    // unique name so we can replace cleanly
    const name = 'pp_' + Math.random().toString(36).slice(2);
    let styleEl = document.getElementById('partnersKF');
    if (!styleEl) {
      styleEl = document.createElement('style');
      styleEl.id = 'partnersKF';
      document.head.appendChild(styleEl);
    }
    styleEl.textContent = `
      @keyframes ${name} {
        0%    { transform: translateX(0); }
        ${p1}%{ transform: translateX(0); }                         /* hold at start */
        ${p2}%{ transform: translateX(-${travel}px); }              /* move to end */
        ${p3}%{ transform: translateX(-${travel}px); }              /* hold at end */
        100%  { transform: translateX(0); }                         /* move back */
      }
    `;

    track.style.animationName = name;
    track.style.animationDuration = `${total}s`;
  }

  function refresh(){
    setPads();
    const travel = Math.max(0, track.scrollWidth - scroller.clientWidth);
    buildKeyframes(travel);
  }

  window.addEventListener('load', refresh);
  window.addEventListener('resize', () => requestAnimationFrame(refresh));
  new ResizeObserver(refresh).observe(track);
  new ResizeObserver(refresh).observe(ref);
});


</script>


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