@extends('admin')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-8">   
                    <img src="{{$inf->thumbnail == 'default.jpg' ? '/default.jpg' : '/storage/'.$inf->thumbnail}}" class="img-thumbnail" alt="">
                    <form  action="{{route('informasi.destroy',$inf)}}" style="display: inline;" method="post">
                        @method('delete')
                        <button type="submit" class="btn btn-danger mt-2" onclick="return confirm('Yakin Akan Menghapus Berita Ini ?')"><i class="fa fa-trash"></i> Hapus</button>
                    </form>
                    <a href="{{route('informasi.update',$inf)}}" class="btn btn-warning mt-2"><i class="fa fa-edit"></i> Edit</a>
                    @if ($inf->file !== null)
                        <a href="#" class="btn btn-success mt-2" data-toggle="modal" data-target="#exampleModal" data-pdf="{{$inf->file}}" id="file" ><i class="fab fa-readme" ></i> Baca Laporan</a>
                        <a  href="{{route('informasi.download',$inf)}}" class="btn btn-primary mt-2"><i class="fa fa-download"></i> Download</a>
                    @endif
                    <hr>
                    <h3>{{$inf->title}}</h3>
                    <div class="badge badge-success">{{$inf->info->information}}</div>
                    <div class="mt-3">
                        {!! $inf->body !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="text-center mt-2">Related Post</h5>
                    @forelse ($related as $rl)
                    <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                        <img src="{{$rl->thumbnail == 'default.jpg' ? '/default.jpg' : '/storage/'.$rl->thumbnail}}" class="card-img-top" alt="..."/>
                        <div class="card-body">
                          <p class="card-text">
                              {!! Str::limit($rl->body,75,'.') !!}
                          </p>
                          <small><a href="{{route('informasi.show',$rl)}}">Lihat</a></small>
                        </div>
                    </div>
                    <hr>
                    @empty
                        <h6 class="text-warning">Tidak Ada Postingan Terkait </h6>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
            <div class="pdfobject-container" id="example1"></div>  
        </div>
      </div>
    </div>
</div>
@endsection