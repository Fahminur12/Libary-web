<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Buat Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }

        h1 {
            color: #131313;
            margin-bottom: 20px;
        }

        form {
            background-color: #0F172Aff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
        }

        div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #f3f3f3;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .error {
            color: red;
            font-size: 0.875em;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #131313;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #1a1a1a;
            border: 1px solid white;
        }
    </style>
</head>
<body>
    <h1>Form Buat Buku</h1>
    <form action="/buku" method="POST">
        @csrf
        <div>
            <label for="kode_buku">Kode Buku :</label>
            <input type="text" id="kode_buku" name="kode_buku" value="{{ old('kode_buku') }}">
            @error('kode_buku')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="nama_buku">Nama Buku :</label>
            <input type="text" id="nama_buku" name="nama_buku" value="{{ old('nama_buku') }}">
            @error('nama_buku')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="penerbit_buku">Penerbit Buku:</label>
            <input type="text" id="penerbit_buku" name="penerbit_buku" value="{{ old('penerbit_buku') }}">
            @error('penerbit_buku')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="penulis_buku">Penulis Buku :</label>
            <input type="text" id="penulis_buku" name="penulis_buku" value="{{ old('penulis_buku') }}">
            @error('penulis_buku')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="tahun_terbit">Tahun Terbit :</label>
            <input type="text" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit') }}">
            @error('tahun_terbit')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
