/* NEBULA MART — saved addresses: district + area / thana pickers (same behaviour as checkout) */
(function () {
  'use strict';
  var BD = { 'Dhaka': ['Dhaka', 'Gazipur', 'Narayanganj', 'Narsingdi', 'Manikganj', 'Munshiganj', 'Tangail', 'Kishoreganj', 'Faridpur', 'Gopalganj', 'Madaripur', 'Rajbari', 'Shariatpur'], 'Chattogram': ['Chattogram', "Cox's Bazar", 'Cumilla', 'Feni', 'Brahmanbaria', 'Noakhali', 'Lakshmipur', 'Chandpur', 'Rangamati', 'Bandarban', 'Khagrachhari'], 'Rajshahi': ['Rajshahi', 'Bogura', 'Pabna', 'Sirajganj', 'Natore', 'Naogaon', 'Chapainawabganj', 'Joypurhat'], 'Khulna': ['Khulna', 'Jashore', 'Satkhira', 'Bagerhat', 'Kushtia', 'Jhenaidah', 'Magura', 'Narail', 'Chuadanga', 'Meherpur'], 'Barishal': ['Barishal', 'Bhola', 'Patuakhali', 'Pirojpur', 'Jhalokathi', 'Barguna'], 'Sylhet': ['Sylhet', 'Moulvibazar', 'Habiganj', 'Sunamganj'], 'Rangpur': ['Rangpur', 'Dinajpur', 'Gaibandha', 'Kurigram', 'Lalmonirhat', 'Nilphamari', 'Panchagarh', 'Thakurgaon'], 'Mymensingh': ['Mymensingh', 'Jamalpur', 'Netrokona', 'Sherpur'] };
  var TH = { "Dhaka": ["Dhanmondi", "Gulshan", "Banani", "Mirpur", "Uttara", "Mohammadpur", "Motijheel", "Tejgaon", "Badda", "Rampura", "Khilgaon", "Jatrabari", "Malibagh", "Shyamoli", "Farmgate", "Old Dhaka", "Demra", "Lalbagh", "Kotwali", "Sutrapur", "Pallabi", "Kafrul", "Cantonment", "Shahbagh", "Ramna", "Paltan", "Hazaribagh", "Sabujbagh", "Khilkhet", "Bhatara", "Adabor", "Bangshal", "Chawkbazar", "Gendaria", "Wari", "Savar", "Keraniganj", "Dhamrai", "Nawabganj", "Dohar"], "Gazipur": ["Gazipur Sadar", "Kaliakair", "Kaliganj", "Kapasia", "Sreepur", "Tongi"], "Narayanganj": ["Narayanganj Sadar", "Araihazar", "Bandar", "Rupganj", "Sonargaon", "Fatullah", "Siddhirganj"], "Narsingdi": ["Narsingdi Sadar", "Belabo", "Monohardi", "Palash", "Raipura", "Shibpur"], "Manikganj": ["Manikganj Sadar", "Daulatpur", "Ghior", "Harirampur", "Saturia", "Shivalaya", "Singair"], "Munshiganj": ["Munshiganj Sadar", "Gazaria", "Lohajang", "Sirajdikhan", "Sreenagar", "Tongibari"], "Tangail": ["Tangail Sadar", "Basail", "Bhuapur", "Delduar", "Dhanbari", "Ghatail", "Gopalpur", "Kalihati", "Madhupur", "Mirzapur", "Nagarpur", "Sakhipur"], "Kishoreganj": ["Kishoreganj Sadar", "Austagram", "Bajitpur", "Bhairab", "Hossainpur", "Itna", "Karimganj", "Katiadi", "Kuliarchar", "Mithamain", "Nikli", "Pakundia", "Tarail"], "Faridpur": ["Faridpur Sadar", "Alfadanga", "Bhanga", "Boalmari", "Charbhadrasan", "Madhukhali", "Nagarkanda", "Sadarpur", "Saltha"], "Gopalganj": ["Gopalganj Sadar", "Kashiani", "Kotalipara", "Muksudpur", "Tungipara"], "Madaripur": ["Madaripur Sadar", "Kalkini", "Rajoir", "Shibchar"], "Rajbari": ["Rajbari Sadar", "Baliakandi", "Goalanda", "Kalukhali", "Pangsha"], "Shariatpur": ["Shariatpur Sadar", "Bhedarganj", "Damudya", "Gosairhat", "Naria", "Zajira"], "Chattogram": ["Kotwali", "Pahartali", "Panchlaish", "Khulshi", "Double Mooring", "Bayazid", "Halishahar", "Chandgaon", "Bakalia", "Patenga", "Anwara", "Banshkhali", "Boalkhali", "Chandanaish", "Fatikchhari", "Hathazari", "Lohagara", "Mirsharai", "Patiya", "Rangunia", "Raozan", "Sandwip", "Satkania", "Sitakunda"], "Cox's Bazar": ["Cox's Bazar Sadar", "Chakaria", "Kutubdia", "Maheshkhali", "Pekua", "Ramu", "Teknaf", "Ukhia"], "Cumilla": ["Cumilla Sadar", "Cumilla Sadar Dakshin", "Barura", "Brahmanpara", "Burichang", "Chandina", "Chauddagram", "Daudkandi", "Debidwar", "Homna", "Laksam", "Meghna", "Monohorgonj", "Muradnagar", "Nangalkot", "Titas"], "Feni": ["Feni Sadar", "Chhagalnaiya", "Daganbhuiyan", "Fulgazi", "Parshuram", "Sonagazi"], "Brahmanbaria": ["Brahmanbaria Sadar", "Akhaura", "Ashuganj", "Bancharampur", "Bijoynagar", "Kasba", "Nabinagar", "Nasirnagar", "Sarail"], "Noakhali": ["Noakhali Sadar", "Begumganj", "Chatkhil", "Companiganj", "Hatiya", "Kabirhat", "Senbagh", "Sonaimuri", "Subarnachar"], "Lakshmipur": ["Lakshmipur Sadar", "Kamalnagar", "Raipur", "Ramganj", "Ramgati"], "Chandpur": ["Chandpur Sadar", "Faridganj", "Haimchar", "Haziganj", "Kachua", "Matlab Dakshin", "Matlab Uttar", "Shahrasti"], "Rangamati": ["Rangamati Sadar", "Baghaichhari", "Barkal", "Belaichhari", "Juraichhari", "Kaptai", "Kawkhali", "Langadu", "Naniarchar", "Rajasthali"], "Bandarban": ["Bandarban Sadar", "Alikadam", "Lama", "Naikhongchhari", "Rowangchhari", "Ruma", "Thanchi"], "Khagrachhari": ["Khagrachhari Sadar", "Dighinala", "Lakshmichhari", "Mahalchhari", "Manikchhari", "Matiranga", "Panchhari", "Ramgarh"], "Rajshahi": ["Boalia", "Motihar", "Rajpara", "Shah Makhdum", "Bagha", "Bagmara", "Charghat", "Durgapur", "Godagari", "Mohanpur", "Paba", "Puthia", "Tanore"], "Bogura": ["Bogura Sadar", "Adamdighi", "Dhunat", "Dhupchanchia", "Gabtali", "Kahaloo", "Nandigram", "Sariakandi", "Shajahanpur", "Sherpur", "Shibganj", "Sonatala"], "Pabna": ["Pabna Sadar", "Atgharia", "Bera", "Bhangura", "Chatmohar", "Faridpur", "Ishwardi", "Santhia", "Sujanagar"], "Sirajganj": ["Sirajganj Sadar", "Belkuchi", "Chauhali", "Kamarkhanda", "Kazipur", "Raiganj", "Shahjadpur", "Tarash", "Ullapara"], "Natore": ["Natore Sadar", "Bagatipara", "Baraigram", "Gurudaspur", "Lalpur", "Singra", "Naldanga"], "Naogaon": ["Naogaon Sadar", "Atrai", "Badalgachhi", "Dhamoirhat", "Manda", "Mahadebpur", "Niamatpur", "Patnitala", "Porsha", "Raninagar", "Sapahar"], "Chapainawabganj": ["Chapainawabganj Sadar", "Bholahat", "Gomastapur", "Nachole", "Shibganj"], "Joypurhat": ["Joypurhat Sadar", "Akkelpur", "Kalai", "Khetlal", "Panchbibi"], "Khulna": ["Khulna Sadar", "Sonadanga", "Khalishpur", "Daulatpur", "Khan Jahan Ali", "Batiaghata", "Dacope", "Dumuria", "Dighalia", "Koyra", "Paikgachha", "Phultala", "Rupsha", "Terokhada"], "Jashore": ["Jashore Sadar", "Abhaynagar", "Bagherpara", "Chaugachha", "Jhikargachha", "Keshabpur", "Manirampur", "Sharsha"], "Satkhira": ["Satkhira Sadar", "Assasuni", "Debhata", "Kalaroa", "Kaliganj", "Shyamnagar", "Tala"], "Bagerhat": ["Bagerhat Sadar", "Chitalmari", "Fakirhat", "Kachua", "Mollahat", "Mongla", "Morrelganj", "Rampal", "Sarankhola"], "Kushtia": ["Kushtia Sadar", "Bheramara", "Daulatpur", "Khoksa", "Kumarkhali", "Mirpur"], "Jhenaidah": ["Jhenaidah Sadar", "Harinakunda", "Kaliganj", "Kotchandpur", "Maheshpur", "Shailkupa"], "Magura": ["Magura Sadar", "Mohammadpur", "Shalikha", "Sreepur"], "Narail": ["Narail Sadar", "Kalia", "Lohagara"], "Chuadanga": ["Chuadanga Sadar", "Alamdanga", "Damurhuda", "Jibannagar"], "Meherpur": ["Meherpur Sadar", "Gangni", "Mujibnagar"], "Barishal": ["Barishal Sadar", "Agailjhara", "Babuganj", "Bakerganj", "Banaripara", "Gournadi", "Hizla", "Mehendiganj", "Muladi", "Wazirpur"], "Bhola": ["Bhola Sadar", "Borhanuddin", "Charfasson", "Daulatkhan", "Lalmohan", "Manpura", "Tazumuddin"], "Patuakhali": ["Patuakhali Sadar", "Bauphal", "Dashmina", "Dumki", "Galachipa", "Kalapara", "Mirzaganj", "Rangabali"], "Pirojpur": ["Pirojpur Sadar", "Bhandaria", "Kawkhali", "Mathbaria", "Nazirpur", "Nesarabad", "Zianagar"], "Jhalokathi": ["Jhalokathi Sadar", "Kathalia", "Nalchity", "Rajapur"], "Barguna": ["Barguna Sadar", "Amtali", "Bamna", "Betagi", "Patharghata", "Taltali"], "Sylhet": ["Sylhet Sadar", "Kotwali", "Jalalabad", "Balaganj", "Beanibazar", "Bishwanath", "Companiganj", "Dakshin Surma", "Fenchuganj", "Golapganj", "Gowainghat", "Jaintiapur", "Kanaighat", "Osmani Nagar", "Zakiganj"], "Moulvibazar": ["Moulvibazar Sadar", "Barlekha", "Juri", "Kamalganj", "Kulaura", "Rajnagar", "Sreemangal"], "Habiganj": ["Habiganj Sadar", "Ajmiriganj", "Bahubal", "Baniachong", "Chunarughat", "Lakhai", "Madhabpur", "Nabiganj", "Shayestaganj"], "Sunamganj": ["Sunamganj Sadar", "Bishwamvarpur", "Chhatak", "Dakshin Sunamganj", "Derai", "Dharampasha", "Dowarabazar", "Jagannathpur", "Jamalganj", "Sullah", "Tahirpur"], "Rangpur": ["Rangpur Sadar", "Badarganj", "Gangachara", "Kaunia", "Mithapukur", "Pirgachha", "Pirganj", "Taraganj"], "Dinajpur": ["Dinajpur Sadar", "Birampur", "Birganj", "Biral", "Bochaganj", "Chirirbandar", "Fulbari", "Ghoraghat", "Hakimpur", "Kaharole", "Khansama", "Nawabganj", "Parbatipur"], "Gaibandha": ["Gaibandha Sadar", "Fulchhari", "Gobindaganj", "Palashbari", "Sadullapur", "Saghata", "Sundarganj"], "Kurigram": ["Kurigram Sadar", "Bhurungamari", "Char Rajibpur", "Chilmari", "Phulbari", "Nageshwari", "Rajarhat", "Raomari", "Ulipur"], "Lalmonirhat": ["Lalmonirhat Sadar", "Aditmari", "Hatibandha", "Kaliganj", "Patgram"], "Nilphamari": ["Nilphamari Sadar", "Dimla", "Domar", "Jaldhaka", "Kishoreganj", "Saidpur"], "Panchagarh": ["Panchagarh Sadar", "Atwari", "Boda", "Debiganj", "Tetulia"], "Thakurgaon": ["Thakurgaon Sadar", "Baliadangi", "Haripur", "Pirganj", "Ranisankail"], "Mymensingh": ["Mymensingh Sadar", "Bhaluka", "Dhobaura", "Fulbaria", "Gaffargaon", "Gauripur", "Haluaghat", "Ishwarganj", "Muktagachha", "Nandail", "Phulpur", "Tarakanda", "Trishal"], "Jamalpur": ["Jamalpur Sadar", "Bakshiganj", "Dewanganj", "Islampur", "Madarganj", "Melandaha", "Sarishabari"], "Netrokona": ["Netrokona Sadar", "Atpara", "Barhatta", "Durgapur", "Kalmakanda", "Kendua", "Khaliajuri", "Madan", "Mohanganj", "Purbadhala"], "Sherpur": ["Sherpur Sadar", "Jhenaigati", "Nakla", "Nalitabari", "Sreebardi"] };
  var ALL = [];
  Object.keys(BD).forEach(function (d) { BD[d].forEach(function (x) { ALL.push({ n: x, d: d }); }); });
  ALL.sort(function (a, b) { return a.n.localeCompare(b.n); });

  function esc(v) { return String(v == null ? '' : v).replace(/[&<>"']/g, function (c) { return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]; }); }
  function find(v) { v = (v || '').trim().toLowerCase(); return ALL.filter(function (x) { return x.n.toLowerCase() === v; })[0] || null; }

  function setup(wrap) {
    var dt = wrap.querySelector('[data-ap-district]');
    var at = wrap.querySelector('[data-ap-area]');
    var dl = wrap.querySelector('[data-ap-district-list]');
    var al = wrap.querySelector('[data-ap-area-list]');
    if (!dt || !at || !dl || !al) return;
    var form = dt.form;
    var shown = [], idx = -1, areas = [], ai = -1, ash = [], lastD = null;

    function areasFor() {
      var m = find(dt.value), n = m ? m.n : '';
      if (n === lastD) return;
      if (lastD !== null) at.value = '';
      lastD = n;
      areas = n ? (TH[n] || []) : [];
      at.disabled = !n;
      at.placeholder = n ? 'Select or type thana / upazila' : 'Select district first';
    }

    function render(q) {
      q = (q || '').trim().toLowerCase();
      shown = ALL.filter(function (x) { return !q || x.n.toLowerCase().indexOf(q) >= 0; });
      idx = shown.length ? 0 : -1;
      dl.innerHTML = shown.length ? shown.map(function (x, i) { return '<li role="option" data-i="' + i + '"' + (i === 0 ? ' class="on"' : '') + '>' + esc(x.n) + '<small>' + esc(x.d) + '</small></li>'; }).join('') : '<li class="none">No district found</li>';
    }
    function dopen() { render(dt.dataset.q); dl.hidden = false; dt.setAttribute('aria-expanded', 'true'); }
    function dclose() { dl.hidden = true; dt.setAttribute('aria-expanded', 'false'); }
    function dpick(i) { var x = shown[i]; if (!x) return; dt.value = x.n; dt.dataset.q = ''; dclose(); areasFor(); }
    function dhi() { var l = dl.querySelectorAll('li'); l.forEach(function (e, i) { e.classList.toggle('on', i === idx); }); if (l[idx]) l[idx].scrollIntoView({ block: 'nearest' }); }

    dt.addEventListener('focus', function () { dt.dataset.q = ''; dopen(); dt.select(); });
    dt.addEventListener('input', function () { dt.dataset.q = dt.value; render(dt.value); dl.hidden = false; areasFor(); });
    dt.addEventListener('keydown', function (e) {
      if (e.key === 'ArrowDown') { e.preventDefault(); if (dl.hidden) dopen(); else { idx = Math.min(idx + 1, shown.length - 1); dhi(); } }
      else if (e.key === 'ArrowUp') { e.preventDefault(); idx = Math.max(idx - 1, 0); dhi(); }
      else if (e.key === 'Enter' && !dl.hidden) { e.preventDefault(); dpick(idx); }
      else if (e.key === 'Escape' || e.key === 'Tab') { dclose(); }
    });
    dl.addEventListener('mousedown', function (e) { var li = e.target.closest('li[data-i]'); if (li) { e.preventDefault(); dpick(+li.dataset.i); } });
    document.addEventListener('click', function (e) { if (!dt.contains(e.target) && !dl.contains(e.target)) dclose(); });
    dt.addEventListener('blur', function () { setTimeout(function () { var m = find(dt.value); if (m) dt.value = m.n; dclose(); areasFor(); }, 120); });

    function arender(q) {
      q = (q || '').trim().toLowerCase();
      ash = areas.filter(function (x) { return !q || x.toLowerCase().indexOf(q) >= 0; });
      ai = ash.length ? 0 : -1;
      al.innerHTML = ash.map(function (x, i) { return '<li role="option" data-i="' + i + '"' + (i === 0 ? ' class="on"' : '') + '>' + esc(x) + '</li>'; }).join('');
      al.hidden = !ash.length;
    }
    function aclose() { al.hidden = true; }
    function apick(i) { if (ash[i] == null) return; at.value = ash[i]; aclose(); }
    function ahi() { var l = al.querySelectorAll('li'); l.forEach(function (e, i) { e.classList.toggle('on', i === ai); }); if (l[ai]) l[ai].scrollIntoView({ block: 'nearest' }); }

    at.addEventListener('focus', function () { if (!at.disabled) { arender(''); at.select(); } });
    at.addEventListener('input', function () { arender(at.value); });
    at.addEventListener('keydown', function (e) {
      if (e.key === 'ArrowDown') { e.preventDefault(); if (al.hidden) arender(''); else { ai = Math.min(ai + 1, ash.length - 1); ahi(); } }
      else if (e.key === 'ArrowUp') { e.preventDefault(); ai = Math.max(ai - 1, 0); ahi(); }
      else if (e.key === 'Enter' && !al.hidden) { e.preventDefault(); apick(ai); }
      else if (e.key === 'Escape' || e.key === 'Tab') { aclose(); }
    });
    al.addEventListener('mousedown', function (e) { var li = e.target.closest('li[data-i]'); if (li) { e.preventDefault(); apick(+li.dataset.i); } });
    at.addEventListener('blur', function () { setTimeout(aclose, 120); });

    // Keep a saved / old() value as it is on load, then enable the area box.
    (function init() { var m = find(dt.value); lastD = m ? m.n : ''; areas = m ? (TH[m.n] || []) : []; at.disabled = !m; })();

    if (form && !form.dataset.apBound) {
      form.dataset.apBound = '1';
      form.addEventListener('submit', function (e) {
        if (!find(dt.value)) {
          e.preventDefault();
          dt.setCustomValidity('Please select a district from the list');
          dt.reportValidity();
          dt.setCustomValidity('');
          return;
        }
        at.disabled = false;
      });
    }
  }

  document.querySelectorAll('[data-ap]').forEach(setup);
})();
