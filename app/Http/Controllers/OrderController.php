<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Order;
use App\Notifications\InvoicePaid;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('dashboard.orders.index',compact('orders'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
       return view('dashboard.orders.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $validatedData = $request->validate(
            [
                'status' => 'required',
                'note' => 'nullable'
            ]
        );

        if($order->update($validatedData)) {
            (new MailMessage)
                ->subject('شكرا لإشتراكك نتمنى لك تعلم ممتع')
                ->greeting('!' . $order->user->full_name . 'مرحبا . ')
                ->line('تمت الموافقة على طلبك رقم ' . $order->id)
                ->action('إبدأ التعلم', url('/courses'))
                ->line('منصة نخبة الأمل. Elite Hope');
            return redirect()->to('dashboard/orders')->with('status','تم تعديل الطلب بنجاح');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }


    public function createOrder($courseSlug,Request $request)
    {

        $course = Course::where('slug',$courseSlug)->first();

        $orderExists = Order::where('course_id',$course->id)->where('user_id',Auth::id())->where('status','unpaid')->first();

        if($orderExists) abort(401);

        $created = Order::create([
            'course_id' => $course->id,
            'status' => 'unpaid',
            'user_id' => Auth::id()
        ]);



    }

    public function uploadReceipt($orderId,Request $request)
    {
        $request->validate([
            'receipt' => 'required|max:2048|mimes:jpg,png,jpeg,svg,pdf,webp'
        ]);

        $order = Order::findOrFail($orderId);

        if($order->user_id != Auth::id() && empty($order->receipt)) abort(401);

        if($request->hasFile('receipt')) {
            $file = $request->file(['receipt'])->store('/orders/receipts/','public');
        }

        $updated = $order->update(
            [
                'receipt' => $file,
                'status' => 'pending'
            ]
        );


        if($updated) {
            return redirect()->to('/orders/' . $orderId);
        }

        abort(500);

    }

    public function userOrders()
    {
        $user = Auth::user();

        $orders = $user->orders;

        return view('orders',compact('user','orders'));
    }

    public function userOrder($orderId)
    {

        $order = Order::where('id',$orderId)->where('user_id',Auth::id())->first();

        if(!empty($order)) {

            return view('order',compact('order'));

        }
        abort(404);


    }
}
