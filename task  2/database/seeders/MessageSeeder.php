<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Message;
use App\Models\Order;
use App\Models\User;
class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = Order::first();
        $doctor = User::where('email', 'doctor@lazord.com')->first();
        $admin = User::where('email', 'admin@lazord.com')->first();

        if ($order && $doctor && $admin) {
            // رسالة من الطبيب
            Message::create([
                'order_id' => $order->id,
                'user_id' => $doctor->id,
                'message' => 'مرحباً، هل يمكنكم استلام الطبعة اليوم؟',
                'is_read' => true,
            ]);

            // رد من الأدمن
            Message::create([
                'order_id' => $order->id,
                'user_id' => $admin->id,
                'message' => 'أهلاً دكتور، نعم المندوب سيصل خلال ساعتين.',
                'is_read' => false,
            ]);
        }
    }
}
