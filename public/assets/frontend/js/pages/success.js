/* NEBULA MART — order success page */
document.addEventListener('click', function (e) {
  if (e.target.closest('[data-print]')) { window.print(); return; }

  var copy = e.target.closest('#copy');
  if (!copy) return;

  var no = document.getElementById('no');
  if (!no) return;

  var done = function () {
    var label = copy.textContent;
    copy.textContent = 'Copied';
    setTimeout(function () { copy.textContent = label; }, 1600);
  };

  if (navigator.clipboard && navigator.clipboard.writeText) {
    navigator.clipboard.writeText(no.textContent.trim()).then(done, function () {});
  }
});
