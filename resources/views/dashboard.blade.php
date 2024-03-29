<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="vote.css"/>
    <title>Pemilwa FKT UGM 2021</title>
    <link rel="icon" href="logo-kpu-2021.ico">
    <link rel="stylesheet" href="vote.css">
</head>

<body>

    <div class="hero-container text-center">
    
      <h3 class="back"><a class="back" href="/">&#8592; Kembali</a></h3>
      <h2>Anda Masuk Sebagai {{ $nama }}</h2>
    
      <p class="font-title" style="font-size: calc(0.5rem + 7vmin); margin-top: 3vmin;">Klik Calon Ketua Pilihanmu!</p>
    
    
      <form action="dashboard" method="POST" onsubmit="return confirm('Are you sure you want to submit?');">
        @csrf 
        <div class="hiddenradio">
          {{-- <h1>Calon Ketua DPM</h1> --}}
          <div class="choice">
          <label>
            <input type="radio" name="cat01" value="AURORA TARISA" required>
            <img src="assets/images/calon2.png">
          </label>
          <p style="min-width: 20vmin;">atau</p>
          <label>
            <input type="radio" name="cat01" value="ANTI AURORA TARISA" required>
            <img src="assets/images/kosong.png">
          </label>
        </div>
    
        </div>
        
        <div class="hiddenradio">
          {{-- <h1>Calon Ketua DPM UF</h1> --}}
          <div class="choice">
            <label>
              <input type="radio" name="cat02" value="DHAFIN ANDRIAN" required>
              <img src="assets/images/calon3.png">
            </label>
            <p style="min-width: 20vmin;">atau</p>
            <label>
              <input type="radio" name="cat02" value="ANTI DHAFIN ANDRIAN" required>
              <img src="assets/images/kosong.png">
            </label>
          </div>
    
        </div>
        
        <div class="hiddenradio">
          {{-- <h1>Calon Ketua LEM</h1> --}}
          <div class="choice">
          <label>
            <input type="radio" name="cat03" value="DHIMAS RAMADHAN" required>
            <img src="assets/images/calon1.png">
          </label>
          <p style="min-width: 20vmin;">atau</p>
          <label>
            <input type="radio" name="cat03" value="ANTI DHIMAS RAMADHAN" required>
            <img src="assets/images/kosong.png">
          </label>
        </div>
        </div>
        
        <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <p class="close" onclick="closeModal()">&times;</p>
                    <h2 style="margin-bottom: 20px;">Apakah Anda Yakin dengan Seluruh Pilihan Anda?</h2>
                    <p>Pastikan Anda telah memilih seluruh bagian. Jawaban akan disimpan dan tidak bisa diganti lagi</p>
                    <div style="margin-top: 40px; display: flex; flex-direction: column; align-items: center;">
                        <div class="confirmBtn" style="background-color: grey;" onclick="closeModal()">Tidak, kembali</div>
                        <a  style="text-decoration: none;" href="/terimakasih" >
                            <button class="confirmBtn" style="background-color: #126B59;" onclick="sendVote()">Ya, pilih</button>
                        </a>
                    </div>
                </div>
        </div>
    
        <div class="button" onclick="openModal()">
            Pilih
        </div>
    
        <div id="myModal" class="modal">
              <!-- Modal content -->
              <div class="modal-content">
                  <p class="close" onclick="closeModal()">&times;</p>
                  <h2 style="margin-bottom: 20px;">Apakah Anda Yakin Memilih <span id="modalTitle">Calon Ketua No Urut</span>?</h2>
                  <p>Jawaban akan disimpan dan tidak bisa diganti lagi</p>
                  <div style="margin-top: 40px;">
                      <button class="confirmBtn" style="background-color: #304B72;" onclick="closeModal()">Tidak, kembali</button>
                      <a  style="text-decoration: none;" href="/terimakasih" >
                          <button class="confirmBtn" style="background-color:yellow;" onclick="sendVote()"><input type="submit" value="Ya, Pilih"></button>
                      </a>
                  </div>
              </div>
        </div>
    
        </form> 
    </div>
    
</body>

</html>

<script>
    function openModal() {
        document.getElementById("myModal").style.display = "block";
    }
  
    function closeModal() {
        document.getElementById("myModal").style.display = "none";
    }
  
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == document.getElementById("myModal")) {
            document.getElementById("myModal").style.display = "none";
        }
    }
</script>