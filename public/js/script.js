function confirmLogout() {
    if (confirm("Apakah anda yakin ingin keluar?")) {
        document.getElementById("keluar-app").submit();
    }
}
let currentStep = 1;
const totalSteps = 3;
const stepTitles = [
  "Step 1: CV dan Surat Lamaran",
  "Step 2: Informasi Tambahan",
  "Step 3: Detail Lain",
];

function updateSteps() {
  for (let i = 1; i <= totalSteps; i++) {
    const step = document.getElementById('step' + i);
    const content = document.getElementById('content' + i);
    if (i <= currentStep) {
      step.classList.add('active');
    } else {
      step.classList.remove('active');
    }

    if (i === currentStep) {
      content.classList.add('active');
    } else {
      content.classList.remove('active');
    }
  }

  // Update garis progress
  const stepLine = document.getElementById('stepLine');
  if (currentStep === totalSteps) {
    stepLine.style.background = '#FF8B00';
  } else {
    stepLine.style.background = '#ccc';
  }

  // Update judul
  document.getElementById('stepTitle').textContent = stepTitles[currentStep - 1];

  // Ganti tombol Next jadi Submit kalau di step terakhir
  const nextButton = document.getElementById('nextButton');
  if (currentStep === totalSteps) {
    nextButton.textContent = 'Submit';
    nextButton.onclick = submitForm;
  } else {
    nextButton.textContent = 'Next';
    nextButton.onclick = nextStep;
  }
}

function nextStep() {
  // Validasi dulu field di step sekarang
  const currentContent = document.getElementById('content' + currentStep);
  const inputs = currentContent.querySelectorAll('input, select, textarea');

  let valid = true;

  inputs.forEach(input => {
    if (!input.checkValidity()) {
      input.classList.add('is-invalid'); // optional styling error
      valid = false;
    } else {
      input.classList.remove('is-invalid');
    }
  });

  // Kalau semua valid, baru next
  if (valid) {
    if (currentStep < totalSteps) {
      currentStep++;
      updateSteps();
    }
  } else {
    alert('Mohon lengkapi semua isian terlebih dahulu.');
  }
}

function prevStep() {
  if (currentStep > 1) {
    currentStep--;
    updateSteps();
  } else {
    // Kalau udah di step 1 dan klik back, balik ke job desc
    document.getElementById('applyForm').style.display = 'none';
    document.getElementById('jobContent').style.display = 'block';
  }
}




document.getElementById('foto').addEventListener('change', function () {
  if (this.files.length > 0) {
      document.getElementById('cvUploadForm').submit();
  }
});
// Tambah Deskripsi
function tambahDeskripsi() {
  const section = document.getElementById('job_description-section');
  const div = document.createElement('div');
  div.classList.add('mb-2', 'deskripsi-item');

  div.innerHTML = `
    <div class="input-group">
      <input type="text" name="deskripsi[]" class="form-control" placeholder="Job Description" required>
      <button type="button" class="btn btn-danger btn-sm" onclick="hapusItem(this)">Hapus</button>
    </div>
  `;

  section.appendChild(div);
}

// Tambah Kualifikasi
function tambahKualifikasi() {
  const section = document.getElementById('kualifikasi-section');
  const div = document.createElement('div');
  div.classList.add('mb-2', 'kualifikasi-item');

  div.innerHTML = `
    <div class="input-group">
      <input type="text" name="kualifikasi[]" class="form-control" placeholder="Kualifikasi" required>
      <button type="button" class="btn btn-danger btn-sm" onclick="hapusItem(this)">Hapus</button>
    </div>
  `;

  section.appendChild(div);
}

// Tambah Benefit
function tambahBenefit() {
  const section = document.getElementById('benefit-section');
  const div = document.createElement('div');
  div.classList.add('mb-2', 'benefit-item');

  div.innerHTML = `
    <div class="input-group">
      <input type="text" name="benefit[]" class="form-control" placeholder="Benefit" required>
      <button type="button" class="btn btn-danger btn-sm" onclick="hapusItem(this)">Hapus</button>
    </div>
  `;

  section.appendChild(div);
}

// Tambah Soal
function tambahSoal() {
  const section = document.getElementById('soal-section');
  const div = document.createElement('div');
  div.classList.add('mb-2', 'soal-item');

  div.innerHTML = `
    <div class="input-group">
      <input type="text" name="soal[]" class="form-control" placeholder="Isi Soal" required>
      <button type="button" class="btn btn-danger btn-sm" onclick="hapusItem(this)">Hapus</button>
    </div>
  `;

  section.appendChild(div);
}

// Hapus item (umum)
function hapusItem(button) {
  const item = button.closest('.mb-2');
  item.remove();
}
