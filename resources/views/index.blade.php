<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data</title>
    <link rel="stylesheet" href="{{ asset('css.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <nav>
      <p>CRUD Data Kendaraan</p>
    </nav>
    <div>
        <div class="container">
            <div class="card">
                @if (session('msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Berhasil!</strong> {{ session('msg') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                
                <div class="card-header">
                  <h4>Data Kendaraan</h4>
                    <button type="button" class="btn btn-sm btn-primary" onclick="window.location='{{ url('kendaraan/add') }}'">Tambah Data</button>
                </div>
                <div class="card-body">
                    <table class="table table-dark table-hover">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>CC</th>
                            <th>Brand</th>
                            <th>Tahun</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach ($Kendaraan as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->jenis }}</td>
                            <td>{{ $row->cc }}</td>
                            <td>{{ $row->brand }}</td>
                            <td>{{ $row->tahun }}</td>
                            <td>Rp {{ $row->harga }}</td>
                            <td>
                                <button onclick="window.location='{{ url('kendaraan/'.$row->id) }}'" type="button" class="btn btn-sm btn-info" title="Edit Data">Edit</button>
                                <form onsubmit="return hapus('{{ $row->nama }}')" style="display: inline" action="{{ url('kendaraan/'.$row->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Hapus Data" class="btn btn-danger btn-sm">
                                  Delete
                                </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
              </div>
        </div>
    </div>
    
    <script>
        function hapus(params) {
          pesan = confirm('yakin Anda ingin menghapus data ini?');
          if(pesan) return true;
          else return false;
        }
        
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>