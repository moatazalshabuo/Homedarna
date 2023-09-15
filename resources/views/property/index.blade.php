@extends('layouts.app')

@section('title-page')
    عقاراتي
@endsection
@section('content')
    <!-- contact form -->
    <div class="contact-from-section " style="direction: rtl;text-align:right;margin-top:50px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">وصف الشقة</th>
                                    <th scope="col">المدينة</th>
                                    <th scope="col">الموقع على الخرائط</th>
                                    <th>الحالة</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($property as $key => $item)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->city }}</td>
                                        <td>{{ $item->geolocation }}</td>
                                        <td>
                                            @if ($item->status == 0)
                                                <span class="badge badge-danger">
                                                    غير محجوز
                                                </span>
                                            @else
                                                <span class="badge badge-success">
                                                    محجوز
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" href="{{ route('property.delete',$item->id) }}">
                                                <i class="fa fa-trash text-white"></i>
                                            </a>
                                            <a class="btn btn-warning"  href="{{ route('property.edit',$item) }}">
                                                <i class="fa fa-edit text-white"></i>
                                            </a>
                                            @if ($item->status == 0)
                                                <a href="{{route('changestatus',$item->id)}}" class="btn btn-primary text-white">تم الحجز</a>
                                            @else
                                                <a href="{{route('changestatus',$item->id)}}" class="text-white btn btn-primary">الغاء الحجز</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact form -->
@endsection
