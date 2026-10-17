/* NEBULA MART — login + register (show/hide password, strength meter) */
(function () {
  'use strict';
  var form = document.getElementById('auth-form');
  if (!form) return;
  document.querySelectorAll('[data-eye]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var input = btn.parentNode.querySelector('input');
      var show = input.type === 'password';
      input.type = show ? 'text' : 'password';
      btn.setAttribute('aria-pressed', show);
      btn.setAttribute('aria-label', show ? 'Hide password' : 'Show password');
      var ic = btn.querySelector('.ic');
      ic.classList.toggle('ic-eye', !show);
      ic.classList.toggle('ic-eye-off', show);
    });
  });

  var pw = form.querySelector('[data-strength]');
  var meter = document.getElementById('pw-meter');
  var label = document.getElementById('pw-label');
  if (pw && meter && label) {
    pw.addEventListener('input', function () {
      var v = pw.value, s = 0;
      if (v.length >= 8) s++;
      if (/[a-z]/.test(v) && /[A-Z]/.test(v)) s++;
      if (/\d/.test(v)) s++;
      if (/[^A-Za-z0-9]/.test(v)) s++;
      if (v && s < 1) s = 1;
      meter.setAttribute('data-level', s);
      label.textContent = v ? ['', 'Weak', 'Fair', 'Good', 'Strong'][s] : 'Use at least 8 characters';
    });
  }

  form.addEventListener('submit', function (e) {
    if (!form.reportValidity()) e.preventDefault();
  });
})();
