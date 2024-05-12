@if ($jawaban->isEmpty())
    <script>
        alert('No data found.');
        window.close();
    </script>
@endif

<table class="table table-striped">
    <!-- <tr style="text-align:center;">
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
                    <a href="{{ asset('storage/upload/'.$jwb->jawaban) }}" target="_blank" rel="noopener noreferrer">{{ $jwb->jawaban }}</a>
                @else
                    {{ $jwb->jawaban != 1 ? $jwb->jawaban : $formulirOption[$jwb->checkbox_id] }}
                @endif
            </td>
        </tr>
    @endforeach -->

    <tr style="text-align:left;">
        <td>Kategori</td>
        <td></td>
        <td></td>
        <td>{{ $formulir[0]->formulir_nama }}</td>
    </tr>
    <tr style="text-align:left;">
        <td>Nama Form</td>
        <td></td>
        <td></td>
        <td>{{ $formulir[0]->parent->nama }}</td>
    </tr>
    <br>

    <tr style="text-align:left;">
        @foreach ($formulir as $form)
            <td>{{ $form->formulir_nama }}</td>
        @endforeach
    </tr>

    @foreach ($jwbFilter as $jb)
        <tr>
            @foreach($jb as $val)
                <td>{{ $val }}</td>
            @endforeach
        </tr>
    @endforeach
</table>