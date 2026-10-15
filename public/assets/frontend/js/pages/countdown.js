/* NEBULA MART: flash deal countdowns.
   A timer with data-end (epoch ms) counts down to that moment and reloads the page once it hits zero,
   so prices go back to normal. A timer without data-end falls back to the next Dhaka midnight (UTC+6, no DST). */
(function () {
  'use strict';
  var boxes = document.querySelectorAll('[data-end], #flash-countdown');
  if (!boxes.length) return;
  var OFFSET = 6 * 3600 * 1000, DAY = 86400000;
  var reloading = false;
  function pad(n) { return (n < 10 ? '0' : '') + n; }
  function set(box, key, value) {
    var el = box.querySelector('[data-fc="' + key + '"]');
    if (el) el.textContent = value;
  }
  function reloadOnce() {
    if (reloading) return;
    reloading = true;
    try {
      var last = +sessionStorage.getItem('nm-fc-reload') || 0;
      if (Date.now() - last < 30000) return;       // guards against a reload loop when the clocks disagree
      sessionStorage.setItem('nm-fc-reload', String(Date.now()));
    } catch (e) { /* storage blocked: reload once anyway */ }
    setTimeout(function () { location.reload(); }, 1500);
  }
  function tick() {
    var now = Date.now();
    Array.prototype.forEach.call(boxes, function (box) {
      var end = +box.getAttribute('data-end');
      var left = end ? end - now : DAY - ((now + OFFSET) % DAY);
      if (left <= 0) { left = 0; if (end) reloadOnce(); }
      var t = Math.floor(left / 1000);
      set(box, 'h', pad(Math.floor(t / 3600)));
      set(box, 'm', pad(Math.floor((t % 3600) / 60)));
      set(box, 's', pad(t % 60));
    });
  }
  tick();
  setInterval(tick, 1000);
})();
