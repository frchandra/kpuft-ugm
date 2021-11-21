<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="vote.css">
    <title>Pemilu FT UGM 2021</title>
    <link rel="icon" href="logo-kpu-2021.ico">
</head>

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
    var chosen;

    function vote(i) {
        console.log(i + " siap dipilih")
        chosen = i;
        document.getElementById("modalTitle").innerHTML = "Calon Ketua No Urut " + i;
        document.getElementById("value").value = i;
    }

    function sendVote() {
        console.log(chosen + "dipilih")
    }
</script>

<body>

    <div class="hero-container text-center">
        <h3 class="font-mont back"><a class="back" href="/">&#8592; Kembali</a></h3>
        <h2 class="font-mont cta">Anda Masuk Sebagai {{ $nama }}</h2>
        <h1 class="title font-squids" style="margin-bottom: 10px;">Calon Ketua BEM KMFT UGM 2021 </h1>
        <h2 class="font-mont cta">Klik Calon Ketua Pilihanmu!</h2>

        <div class="content-container">
          <form action="dashboard" method="POST">
            @csrf
            <input type="text" name="calonId" value="1" hidden> 
          </form>
          <button id="button1" class="button" onclick="openModal(), vote(1)"></button>
          
          <form action="dashboard" method="POST">
            @csrf
            <input type="text" name="calonId" value="2" hidden> 
          </form>
          <button id="button2" class="button" onclick="openModal(), vote(2)"></button>
          


        </div>


        <!-- The Modal -->
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <p class="close" onclick="closeModal()">&times;</p>
                <h2 style="margin-bottom: 20px;">Apakah Anda Yakin Memilih <span id="modalTitle">Calon Ketua No Urut</span>?</h2>
                <p>Pilihan anda akan disimpan dan TIDAK dapat diganti lagi</p>
                <div style="margin-top: 40px;">

                  <form action="dashboard" method="POST">
                    @csrf
                    <button class="confirmBtn" style="background-color: #304B72;" onclick="closeModal()">Tidak, kembali</button>
                    <input id="value" type="text" name="calonId" hidden>
                    <button type="submit" class="confirmBtn" style="background-color: #FB2481;" >Ya, pilih</button>
                  </form>

                </div>
            </div>
        </div>

</body>

</html>