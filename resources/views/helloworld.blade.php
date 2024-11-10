<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Sederhana dengan Laravel</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f7f7f7;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        width: 900px;
    }
    .inputform {
        font-size: 14px;
        border-radius: 6px;
        line-height: 1.5;
        padding: 10px;
        transition: box-shadow 100ms ease-in, border 100ms ease-in, background-color 100ms ease-in;
        border: 2px solid #dee1e2;
        color: rgb(14, 14, 16);
        background: #dee1e2;
        width: 100%;
        box-sizing: border-box;
        margin-bottom: 15px;
    }
    .inputform:hover {
        border-color: #ccc;
    }
    .inputform:focus {
        border: 2px solid #9147ff;
        background: #fff;
        outline: none;
    }
    select.inputform {
        height: 40px;
    }
    button {
        padding: 10px 20px;
        font-size: 16px;
        background-color: #9147ff;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }
    button:hover {
        background-color: #722ed1;
    }
    h1 {
        font-size: 24px;
        margin-bottom: 20px;
        text-align: center;
    }
</style>
</head>
<body>
    <div class="containerform">
        <h1>Form Sederhana dengan Laravel</h1>
        <form action="" method="">
            <input type="text" placeholder="Nama" class="inputform" required>
            <input type="number" placeholder="Usia" class="inputform" required>
            <select name="" class="inputform" required>
                <option value="">Pilih Kelas</option>
                <option value="">X RPL 1</option>
                <option value="">X RPL 2</option>
                <option value="">X RPL 3</option>
            </select>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
