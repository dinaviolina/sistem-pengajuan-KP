
@extends('layouts.main')
@section('container')
        <div class="col-12">
              <div class="card top-selling overflow-auto">
                <div class="card-body pb-0">
                  <h5 class="card-title">Fakultas <span>| Today</span></h5>
                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Preview Surat</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Acc</th>
                        <th scope="col">Remove</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="#"><img src="{{ asset('import/assets/img/product-1.jpg') }}" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa voluptas nulla</a></td>
                        <td>$64</td>
                        <td class="fw-bold">124</td>
                        <td>$5,828</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
    </section>
@endsection