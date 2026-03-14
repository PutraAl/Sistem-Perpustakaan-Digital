<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #2c3e50; }
        table { border-collapse: collapse; width: 50%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #3498db; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Daftar Buku</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Buku</th>
            </tr>
        </thead>
        <tbody>
            @foreach($buku as $b)
                <tr>
                    <td>{{ $b['id'] }}</td>
                    <td>{{ $b['nama'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
