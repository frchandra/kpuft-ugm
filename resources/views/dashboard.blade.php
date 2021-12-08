<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" href="vote.css"> --}}
    <title>Pemilu FKT UGM 2021</title>
    {{-- <link rel="icon" href="logo-kpu-2021.ico"> --}}
</head>

<body>

    <h1>hello</h1>
    <h2>Anda Masuk Sebagai {{ $nama }}</h2>

    <form action="dashboard" method="POST" onsubmit="return confirm('Are you sure you want to submit?');">
        @csrf
        <p>Category 1</p>
        <input type="radio"  name="cat01" value="DHAFIN ANDRIAN" required>
        <label>calon01</label><br>
        <input type="radio"  name="cat01" value="ANTI DHAFIN ANDRIAN">
        <label>anti calon01</label><br>
      
         
        <p>Catogory 2</p>
        <input type="radio" name="cat02" value="DHIMAS RAMADHAN" required>
        <label>calon02</label><br>
        <input type="radio" name="cat02" value="ANTI DHIMAS RAMADHAN">
        <label>anti calon02</label><br>

        <p>Catogory 3</p>
        <input type="radio" name="cat03" value="AURORA TARISA" required>
        <label>calon03</label><br>
        <input type="radio" name="cat03" value="ANTI AURORA TARISA">
        <label>anti calon03</label><br>
        
        <br>

        <input type="submit" value="Submit">
    </form>


</body>

</html>