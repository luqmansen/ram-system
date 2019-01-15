@extends('inc.navbar')

@section('title')
    Form Peminjaman Ruangan
@endsection

@section('content')
    
    
    {!! Form::open(['action' => 'FormController@store1', 'method' => 'POST', "class" => 'form', 'enctype' => 'multipart/form-data']) !!}
    {{-- this action is where our form is submitting to --}}
    
            <div class="form-group">
                    <div class='row'>
                        <div class="col">
                                {{Form::label('date', 'Tanggal Peminjaman ')}}
                                {{Form::date('date', '',['class' => 'form-control', 'style' => 'width:80%'])}}
                        </div>
                        <div class='col'>
                                 {{Form::label('id_room', 'Ruangan ')}}
                                <div class="dropdown">
                                        @php
                                            $room = []
                                        @endphp
                                        {{Form::select('id_room', ['502' => '502', '503' => '503', '504' => '504'],'', ['class'=>"btn btn-secondary dropdown-toggle", 'type'=>"button" ,'id'=>"dropdownMenuButton" ,'data-toggle'=>"dropdown" ,'aria-haspopup'=>"true", 'aria-expanded'=>"true"])}}
                                </div>
                        </div>
                </div>
            </div>

            <div class="form-group">
                
                    
            </div>
            <div class="row">
                <div class="col">
                        <div class="form-group">
                                {{Form::label('start_hour', ' Mulai : ')}}
                                {{Form::time('start_hour', '',['class' => 'form-control'])}}
                        </div>
                </div>
                <div class="col">
                        <div class="form-group">
                                {{Form::label('end_hour', ' Selesai : ')}}
                                {{Form::time('end_hour', '',['class' => 'form-control'] )}}
                        </div>
                </div>
             </div>
            
            <div class="form-group">
                    {{Form::label('description', 'Deskripsi Singkat Acara  ')}}
                    {{Form::text('description', '',['class' => 'form-control', 'placeholder' => 'Diskripsi Singkat '])}}
            </div>
            
            <div class="form-group">
                    {{Form::label('note', 'Catatan  ')}}
                    {{Form::text('note', '',['class' => 'form-control', 'placeholder' => 'Diskripsi Singkat '])}}
            </div>

            <div>
                    
                {{Form::label('file_name', 'Surat Peminjaman (PDF atau Gambar) ')}}
                {{Form::file('file_name', ['class' => 'form-control'])}}
            </div>

            {{Form::submit('Submit', ['class' => 'btn btn-primary', 'style' => 'margin: 10px'])}}
    {!! Form::close() !!}

@endsection    