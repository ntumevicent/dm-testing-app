@extends('layouts.admin-master')

@section('title')
View Bill Category
@endsection

@section('content')
<section class="section">

  <div class="section-body">
  <div class="row mt-4">
              <div class="col-12 col-md-7 col-lg-7">
                    <table class="table">
                        <thead>
                           <tr>
                               <td>photo title</td>
                               <td>photo</td>
                               <td>action</td>
                           </tr>
                        </thead>
                        @foreach($photos as $row)
                           <tbody>
                               <tr>
                                
                                   <td>{{$row->photo_title}}</td>
                                   <td>{{$row->photo}}</td>
                                   <td>
                                    <a href="{{ route('edit.page', $row->id) }}" class="btn btn-info">edit</a>
                                    <button type="button" class="btn btn-danger delete-photo" data-id="{{ $row->id }}">delete</a>
                                  </td>
                               </tr>
                           </tbody>
                        @endforeach
                       </table>
                    
                </div>
              </div>
            </div>      
</div>

  </div>
</section>
@endsection
