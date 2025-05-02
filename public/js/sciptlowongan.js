        // JavaScript untuk menampilkan form ketika tombol "Apply" diklik
function showForm() {
  document.getElementById('jobContent').style.display = 'none';
  document.getElementById('applyForm').style.display = 'block';
  currentStep = 1;
  updateSteps();
}

function hideForm() {
    document.getElementById("jobContent").style.display = "block"; // Tampilkan konten lowongan
    document.getElementById("applyForm").style.display = "none";  // Sembunyikan form
}