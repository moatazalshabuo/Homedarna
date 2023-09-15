@extends('layouts.app')

@section('content')
    <!-- products -->
    <div class="product-section mt-150 mb-150">
        <div class="container">

            <div class="row">
                <div class="col-md-12 m-2">
                    <form method="GET" style="direction: rtl">

                        <select name="city" id="city" class="form-control select2">
                            <option value="">الكل</option>
                            <option value="طرابلس">طرابلس</option>
                            <option value="بنغازي">بنغازي</option>
                            <option value="مصراتة">مصراتة</option>
                            <option value="الزاوية">الزاوية</option>
                            <option value="سبها">سبها</option>
                            <option value="زليتن">زليتن</option>
                            <option value="صبراتة">صبراتة</option>
                            <option value="غريان">غريان</option>
                            <option value="سرت">سرت</option>
                            <option value="اجدابيا">اجدابيا</option>
                            <option value="درنة">درنة</option>
                            <option value="طبرق">طبرق</option>
                            <option value="ترهونة">ترهونة</option>
                            <option value="الكفرة">الكفرة</option>
                            <option value="القبة">القبة</option>
                            <option value="بني-وليد">بني وليد</option>
                            <option value="المرج">المرج</option>
                            <option value="نالوت">نالوت</option>
                            <option value="صرمان">صرمان</option>
                            <option value="تاورغاء">تاورغاء</option>
                            <option value="يفرن">يفرن</option>
                            <option value="زوارة">زوارة</option>
                            <option value="أوباري">أوباري</option>
                            <option value="مرزق">مرزق</option>
                            <option value="البريقة">البريقة</option>
                            <option value="هون">هون</option>
                            <option value="جالو">جالو</option>
                            <option value="سلوق">سلوق</option>
                            <option value="الأصابعة">الأصابعة</option>
                            <option value="الزنتان">الزنتان</option>
                            <option value="الجفرة">الجفرة</option>
                            <option value="مزدة">مزدة</option>
                            <option value="البطنان">البطنان</option>
                            <option value="الجبل-الأخضر">الجبل الأخضر</option>
                            <option value="الواحات">الواحات</option>
                            <option value="وادي-الشاطئ">وادي الشاطئ</option>
                            <option value="وادي-الحياة">وادي الحياة</option>
                            <option value="غات">غات</option>
                            <option value="المرقب">المرقب</option>
                            <option value="الجفارة">الجفارة</option>
                            <option value="الجبل-الغربي">الجبل الغربي</option>
                            <option value="توكرة">توكرة</option>
                            <option value="الأبيار">الأبيار</option>
                            <option value="أوجلة">أوجلة</option>
                            <option value="مردة">مردة</option>
                            <option value="راس-لانوف">راس لانوف</option>
                            <option value="ودان">ودان</option>
                            <option value="براك">براك</option>
                            <option value="الماية">الماية</option>
                            <option value="الجميل">الجميل</option>
                            <option value="غدامس">غدامس</option>
                            <option value="سوسة">سوسة</option>
                            <option value="العجيلات">العجيلات</option>
                            <option value="رقدالين">رقدالين</option>
                            <option value="زلطن">زلطن</option>
                            <option value="مسلاتة">مسلاتة</option>
                            <option value="الخمس">الخمس</option>
                            <option value="قصر-الاخيار">قصر الاخيار</option>
                        </select>

                        <input type="submit" value="البحث" class="btn btn-primary ">

                    </form>
                </div>
            </div>

            <div class="row product-lists" style="direction: rtl;text-align:right">
                @foreach ($properties as $item)
                    <div class="col-lg-4 col-md-6 text-center strawberry">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="single-product.html"><img src="assets/img/home.jpg" alt=""></a>
                            </div>
                            <div><span>المدينة</span> : {{ $item->city }}</div>
                            <div><span>العنوان</span> : {{ $item->address }}</div>
                            <div><span>رقم الهاتف</span> : {{ $item->user->phone }}</div>
                            <div><span>الخرائط</span> :
                                @if ($item->geolocation)
                                    <a class="btn btn-primary">{{ $item->geolocation }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    {!! $properties->links() !!}
                </div>
            </div>
        </div>
        <!-- end products -->
    @endsection
    @section('js')
    @isset($_GET['city'])
        
    
    <script>
        $(function(){
            $("#city").val("{{ $_GET['city'] }}")
        })
    </script>
    @endisset 
    
@endsection