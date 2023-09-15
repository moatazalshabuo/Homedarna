@extends('layouts.app')

@section('title-page')
    اضافة شقة / منزل
@endsection
@section('content')
    <!-- contact form -->
    <div class="contact-from-section mt-150 mb-150" style="direction: rtl;text-align:right">
        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-4 p-2 mb-5 mb-lg-0">
                    <div class="form-title">
                        <h2>اضافة شقة</h2>
                    </div>
                    <div id="form_status"></div>
                    <div class="contact-form">
                        <form method="POST" id="fruitkha-contact" action="{{ route('property.update',$property) }}">
                            @method("PUT")
                            @csrf
                            <div class="form-group">
                                <div class="form-group">
                                    <label>المدينة</label>
                                    <select class="form-control select2" name="city" id="city"> 
                                        <option value="">اختر المدينة</option>
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
                                </div>
                                @error('city')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">وصف الموقع</label>
                                <input id="address" type="address"
                                    class="form-control @error('address') is-invalid @enderror" name="address"
                                    value="{{ old('address',$property->address) }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="geolocation">رابط الموقع على الخرائط (اختياري)</label>
                                <input id="geolocation" type="geolocation"
                                    class="form-control @error('geolocation') is-invalid @enderror" name="geolocation"
                                    value="{{ old('geolocation',$property->geolocation) }}" autocomplete="geolocation" autofocus>

        
                            </div>
                           
                            {{-- <input type="hidden" name="token" value="FsWga4&@f6aw" /> --}}
                            <p><input type="submit" value="حفظ" class="text-white">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact form -->
@endsection

@section('js')
    <script>
        $(function(){
            $("#city").val("{{ old('city',$property->city) }}")
        })
    </script>
@endsection