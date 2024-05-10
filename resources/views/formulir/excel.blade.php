
<table class="table table-striped">
    <tr style="text-align:center;">
        <td>No</td>
        <td>Kategori</td>
        <td>Soal</td>
        <td>Jawaban</td>
    </tr>
    @foreach ($jawaban as $jwb)
        <tr style="text-align:center;">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $jwb->formulir->parent->nama }}</td>
            <td>{{ $jwb->variabel }}</td>
            <td>
                @if ($jwb->formulir->formulir_tipe == 'file')
                    <a href="{{ asset('upload/'.$jwb->jawaban) }}" target="_blank" rel="noopener noreferrer">{{ $jwb->jawaban }}</a>
                @else
                    {{ $jwb->jawaban != 1 ? $jwb->jawaban : $formulirOption[$jwb->checkbox_id] }}
                @endif
            </td>
        </tr>
    @endforeach

</table>