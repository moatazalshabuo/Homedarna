<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Auth;
class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $property = Property::where('user_id',Auth::id())->get();
        return view('property/index',compact('property'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      
            return view('property/create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // التحقق من البيانات المرسلة في الطلب
    $validatedData = $request->validate([
        'city' => 'required',
        'address' => 'required',
        'geolocation' => '',
    ]);
    
    // حفظ الشقة في قاعدة البيانات
    $property = new Property();
    $property->city = $validatedData['city'];
    $property->address = $validatedData['address'];
    $property->geolocation = $validatedData['geolocation'];
    $property->status = 0;
    $property->user_id = $request->user()->id;
    $property->save();

    // يمكنك تنفيذ الإجراءات اللازمة بعد حفظ الشقة هنا

    return redirect()->back()->with('success', 'تم حفظ الشقة بنجاح!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('property/edit',compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
         // التحقق من البيانات المرسلة في الطلب
    $validatedData = $request->validate([
        'city' => 'required',
        'address' => 'required',
        'geolocation'=>''
    ]);

    // $property = Property::findOrFail($id);

    if ($property->user_id !== $request->user()->id) {
        return redirect()->back()->with('error', 'غير مسموح لك بتعديل هذا العقار.');
    }

    $property->city = $validatedData['city'];
    $property->address = $validatedData['address'];
    $property->geolocation = $validatedData['geolocation'];
    $property->save();

    // يمكنك تنفيذ الإجراءات اللازمة بعد حفظ التعديلات هنا

    return redirect()->route('property.index')->with('success', 'تم حفظ التعديلات بنجاح!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $property = Property::findOrFail($id);

    if ($property->user_id !== Auth::user()->id) {
        return redirect()->back()->with('error', 'غير مسموح لك بحذف هذا العقار.');
    }

    $property->delete();

    return redirect()->back()->with('success', 'تم حذف الشقة بنجاح!');
    }

    public function changeStatus($id)
{
    $property = Property::findOrFail($id);

    if ($property->user_id !== Auth::user()->id) {
        return redirect()->back()->with('error', 'غير مسموح لك بتعديل حالة هذا العقار.');
    }

    $property->status = !$property->status;
    $property->save();

    return redirect()->back()->with('success', 'تم تغيير حالة الشقة بنجاح!');
}

public function properties(){
    $query = Property::query();
    $query->where('status',0);
    if(request('city')){
        $query->where('city',request('city'));
    }
    $properties = $query->paginate(1);
    return view('show_property',compact('properties'));
}
}
