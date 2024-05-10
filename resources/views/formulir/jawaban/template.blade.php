<div style="border: 2px solid black; padding:20px">
    <h3 class="text-center">{{ $formulir->nama }}</h3>
    <br>
    <b>Deskripsi : </b><br>
    <p class="text-justify">{{ $formulir->deskripsi }}</p>
    <br><br>
    <input type="hidden" name="parentId" value="{{ $formulir->id }}">
    @foreach ($formulir->formulir as $key => $form)
    <input type="hidden" name="variabel[{{ $form->id }}]" value="{{ $form->formulir_nama }}" >
    <input type="hidden" name="variabel_change[{{ $form->id }}]" value="{{ str_replace(' ', '_', $form->formulir_nama) }}" >
    <input type="hidden" name="formId[]" value="{{ $form->id }}" >
    @if ($form->formulir_tipe == 'checkbox')
    <h5>{{ $form->formulir_nama }}: <span class="text-danger">{{ $form->formulir_required ? '*' : '' }}</span></h5>
        @foreach ($form->option as $option)
            <input type="checkbox" id="{{ $option->option_soal }}" name="{{ str_replace(' ', '_', $form->formulir_nama) }}[{{ $option->id }}]" >
            <label for="{{ $option->option_soal }}">{{ $option->option_soal }}</label>
            <br>
        @endforeach
    @else
        <div class="row"> 
            <div class="form-group col-md-12">
                <label class="form-label" for="{{ $form->formulir_nama }}">{{ Ucfirst($form->formulir_nama) }}: <span class="text-danger">{{ $form->formulir_required ? '*' : '' }}</span></label>
                <input type="{{ $form->formulir_tipe }}" name="{{ $form->formulir_nama }}" id="{{ $form->formulir_nama }}" 
                    class="form-control" {{ $form->formulir_required ? 'required' : '' }}>

            </div>
        </div>
    @endif
        <br>
    @endforeach
</div>