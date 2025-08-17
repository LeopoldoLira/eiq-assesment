

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

<script defer>  
document.addEventListener('DOMContentLoaded', function () {
  const section = document.getElementById('projects-row');
  const el = document.querySelector('.projects-swiper');
  if (!section || !el || !window.Swiper) return;

  // read the section’s left/right padding so first/last slide align to page gutters
  function getOffsets() {
    const rect = section.getBoundingClientRect();
    const cs   = getComputedStyle(section);
    const padL = parseFloat(cs.paddingLeft) || 0;
    const padR = parseFloat(cs.paddingRight) || 0;
    const left  = Math.max(0, rect.left) + padL;
    const right = Math.max(0, window.innerWidth - rect.right) + padR;
    return { before: left, after: right };
  }

  const opts = (() => {
    const { before, after } = getOffsets();
    return { slidesOffsetBefore: before, slidesOffsetAfter: after };
  })();

  // DISTINCT INSTANCE
  const projectsSwiper = new Swiper('.projects-swiper', {
    slidesPerView: 'auto',
    spaceBetween: 24,
    freeMode: { enabled: true }, // smooth scroll; change to false to snap
    watchOverflow: true,
    grabCursor: true,
    keyboard: { enabled: true },
    navigation: { nextEl: '.projects-next', prevEl: '.projects-prev' },
    ...opts,
    on: {
      resize(sw) {
        const { before, after } = getOffsets();
        sw.params.slidesOffsetBefore = before;
        sw.params.slidesOffsetAfter  = after;
        sw.update();
      }
    },
    breakpoints: {
      0:   { spaceBetween: 16 },
      768: { spaceBetween: 20 },
      1200:{ spaceBetween: 24 }
    }
  });

  // keep offsets in sync if fonts/layout shift
  const ro = new ResizeObserver(() => {
    const { before, after } = getOffsets();
    projectsSwiper.params.slidesOffsetBefore = before;
    projectsSwiper.params.slidesOffsetAfter  = after;
    projectsSwiper.update();
  });
  ro.observe(section);
});

</script>

</body>
</html>