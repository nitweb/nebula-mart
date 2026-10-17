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

  function clearErrors() {
    form.querySelectorAll('.js-err').forEach(function (n) { n.remove(); });
  }

  function showError(input, msg) {
    var fld = input.closest('.fld') || input.parentNode;
    var p = document.createElement('p');
    p.className = 'js-err text-sm font-bold mt-1';
    p.style.color = '#c0392b';
    p.setAttribute('role', 'alert');
    p.textContent = msg;
    fld.appendChild(p);
  }

  // Strip spaces, dashes and the +88 / 88 prefix so the number matches the stored 01XXXXXXXXX form.
  var phone = form.querySelector('input[name="phone"]');
  if (phone) {
    phone.addEventListener('blur', function () {
      phone.value = phone.value.replace(/[\s\-]+/g, '').replace(/^(\+?88)(?=01)/, '');
    });
  }

  form.addEventListener('submit', function (e) {
    clearErrors();
    if (phone) phone.value = phone.value.replace(/[\s\-]+/g, '').replace(/^(\+?88)(?=01)/, '');

    if (!form.checkValidity()) {
      e.preventDefault();
      var bad = form.querySelector(':invalid');
      if (bad) {
        showError(bad, bad.name === 'phone'
          ? 'Enter a valid mobile number, like 01XXXXXXXXX.'
          : (bad.validationMessage || 'Please fill in this field.'));
        bad.focus();
      }
      return;
    }

    var btn = form.querySelector('[type="submit"]');
    if (btn) {
      setTimeout(function () { btn.disabled = true; }, 0);
      setTimeout(function () { btn.disabled = false; }, 8000);
    }
  });
})();
