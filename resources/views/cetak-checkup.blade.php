@extends('layouts.main')
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

@section('content')
@section('main-content')
<div class="card px-5">
  <div class="title py-3">
    <h1>Rekap Data Pasien</h1>
  </div>
  <div class="card-body">
    <div class="table-responsive" id="exportContent">
      <table class="table table-striped" id="table">
        <thead>
          <tr>
            <th>
              No
            </th>
            <th>
              NIK
            </th>
            <th>
              Tanggal
            </th>
            <th>
              Nama Pasien
            </th>
            <th>
              Alamat
            </th>
            <th>
              Umur
            </th>
            <th>
              Poli
            </th>
            <th>
              Diagnosa
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($pasien as $p)
          <tr>
            <td>
              {{ $loop->iteration }}
            </td>
            <td>
              {{ $p->nik }}
            </td>
            <td>
              {{ $p->tanggal_kunjungan }}
            </td>
            <td>
              {{ $p->nama_pasien }}
            </td>
            <td>
              {{ $p->alamat }}
            </td>
            <td>
              {{ $p->umur }}
            </td>
            <td>
              {{ $p->poli }}
            </td>
            <td>
              {{ $p->diagnosa }}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection

@section('script')
<script>
  let type = window.location.search.split('=')[1];

  async function export2xls(type, fn, dl) {
    var elt = await document.getElementById('table');
    var wb = XLSX.utils.table_to_book(elt, {
      sheet: "sheet1"
    });
    return dl ?
      XLSX.write(wb, {
        bookType: type,
        bookSST: true,
        type: 'base64'
      }) :
      XLSX.writeFile(wb, fn || ('riwayat-checkup.' + (type || 'xlsx')));
  }

  function export2Word(element, filename = '') {
    var preHtml =
      "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>";
    var postHtml = "</body></html>";
    var html = preHtml + document.getElementById(element).innerHTML + postHtml;

    var blob = new Blob(['\ufeff', html], {
      type: 'application/msword'
    });
    // Specify link url
    var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);
    // Specify file name
    filename = filename ? filename + '.doc' : 'document.doc';
    // Create download link element
    var downloadLink = document.createElement("a");
    document.body.appendChild(downloadLink);
    if (navigator.msSaveOrOpenBlob) {
      navigator.msSaveOrOpenBlob(blob, filename);
    } else {
      // Create a link to the file
      downloadLink.href = url;
      // Setting the file name
      downloadLink.download = filename;
      //triggering the function
      downloadLink.click();
    }
    document.body.removeChild(downloadLink);
  }

  if (type == 'pdf') {
    window.print();
  }
  if (type == 'excel') {
    export2xls('xlsx');
  }
  if (type == 'msword') {
    export2Word('exportContent', 'Riwayat-checkup');
  }

</script>
@endsection

@endsection