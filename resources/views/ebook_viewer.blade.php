<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>{{ $ebook->title }}</title>

  <!-- CDN resmi PDF.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
  <script>
    pdfjsLib.GlobalWorkerOptions.workerSrc = "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js";
  </script>

  <style>
    body { margin:0; overflow:auto; background:#f8f9fa; user-select:none; }
    #pdf-viewer { text-align:center; height:100vh; overflow:auto; }
    canvas { margin:10px auto; display:block; box-shadow:0 0 5px rgba(0,0,0,.2); }
  </style>
</head>
<body>
<div id="pdf-viewer"></div>

<script>
const url = "{{ route('ebooks.file', $ebook->id) }}";
const container = document.getElementById("pdf-viewer");

pdfjsLib.getDocument(url).promise.then(pdf => {
  console.log("Total halaman:", pdf.numPages);
  for (let i = 1; i <= pdf.numPages; i++) {
    pdf.getPage(i).then(page => {
      const canvas = document.createElement("canvas");
      container.appendChild(canvas);
      const ctx = canvas.getContext("2d");
      const viewport = page.getViewport({ scale: 1.5 });
      canvas.height = viewport.height;
      canvas.width = viewport.width;
      page.render({ canvasContext: ctx, viewport });
    });
  }
});

// 🔒 Blokir klik kanan & shortcut
document.addEventListener("contextmenu", e => e.preventDefault());
document.addEventListener("keydown", e => {
  if ((e.ctrlKey && ['s','p','c','u'].includes(e.key.toLowerCase())) || e.key === 'PrintScreen') e.preventDefault();
});

// ⚠️ Deteksi tab berpindah
document.addEventListener("visibilitychange", () => {
  if (document.hidden) alert("⚠️ Jangan berpindah tab saat membaca eBook!");
});
</script>
</body>
</html>
