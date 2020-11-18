<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Notifications Email Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the Notification library to build
    | the Notification emails. You are free to change them to anything
    | you want to customize your views to better match your platform.
    | Supported colors are blue, green, and red.
    |
    */

    // Auth Notifications
    'password_updated' => [
        'subject' => 'พาสเวิร์ดอัพเดตสำเร็จ :marketplace !',
        'greeting' => 'Hello :user!',
        'message' => 'รหัสผ่านสำหรับบัญชีของคุณได้มีการเปลี่ยนแปลงเรียบร้อยแล้ว หากนี่ไม่ใช่คุณ กรุณาติดต่อเราโดยทันที คลิกที่ลิ้งค์ด้านล่างเพื่อเข้าสู่ระบบไปยังหน้าโปรไฟล์ของคุณ',
        'button_text' => 'เข้าโปรไฟล์ของคุณ',
    ],

    // Billing Notifications
    'invoice_created' => [
        'subject' => ':marketplace Monthly subscription fee invoice',
        'greeting' => 'Hello :merchant!',
        'message' => 'ขอบคุณสำหรับการสนับสนุน เราแนบเอกสาร invoice ในบันทึกของคุณ หากมีข้อสงสัยกรุณาติดต่อเรา',
        'button_text' => 'ไปสู่ Dashboard',
    ],

    // Customer Notifications
    'customer_registered' => [
        'subject' => 'ยินดีต้อนรับเข้าสู่ :marketplace marketplace!',
        'greeting' => 'Congratulation :customer!',
        'message' => 'คุณสร้างบัญชีสำเร็จ คลิกที่ปุ่มด้านล่างเพื่อยืนยันอีเมล์',
        'button_text' => 'ยืนยันอีเมล์',
    ],

    'customer_updated' => [
        'subject' => 'ข้อมูลบัญชีอัพเดตสำเร็จ!',
        'greeting' => 'Hello :customer!',
        'message' => 'การแจ้งเตือนนี้เพื่อให้คุณรู้ว่าบัญชีของคุณอัพเดตเรียบร้อย!',
        'button_text' => 'เข้าสู่โปรไฟล์ของคุณ',
    ],

    'customer_password_reset' => [
        'subject' => 'แจ้งเตือนรีเซ็ตพาสเวิร์ด',
        'greeting' => 'Hello :user!',
        'message' => 'คุณได้รับอีเมล์นี้เนื่องจากเราได้รับคำขอรีเซ็ตพาสเวิร์ดจากบัญชีของคุณ หากคุณไม่ได้เป็นผู้ขอรีเซ็ตพาสเวิร์ด กรุณาเพิกเฉยต่อการแจ้งเตือนนี้',
        'button_text' => 'รีเซ็ตพาสเวิร์ด',
    ],

    // Dispute Notifications
    'dispute_acknowledgement' => [
        'subject' => '[Order ID: :order_id] ข้อพิพาทนำส่งสำเร็จ',
        'greeting' => 'Hello :customer',
        'message' => 'การแจ้งเตือนนี้เพื่อให้คุณทราบว่าเราได้รับข้อพิพาทสำหรับคำสั่งซื้อ ทีมงานของเราจะรีบติดต่อคุณกลับไปโดยเร็วที่สุดhe Order ID: :order_id,',
        'button_text' => 'ดูข้อพิพาท',
    ],

    'dispute_created' => [
        'subject' => 'ข้อพิพาทใหม่สำหรับคำสั่งซื้อ Order ID: :order_id',
        'greeting' => 'Hello :merchant!',
        'message' => 'คุณได้รับข้อพิพาทใหม่สำหรับคำสั่งซื้อ กรุณาแก้ไขช้อพิพาทที่เกิดกับลูกค้า',
        'button_text' => 'ดูข้อพิพาท',
    ],

    'dispute_updated' => [
        'subject' => '[Order ID: :order_id] สถานะข้อพิพาทอัพเดต!',
        'greeting' => 'Hello :customer!',
        'message' => 'ข้อพิพาทสำหรับคำสั่งซื้อ.....อัพเดตด้วยข้อความจากผู้ขาย ตอบกลับ กรุณาตรวจสอบด้านล่างและติดต่อเราหากคุณต้องการความช่วยเหลือ',
        'button_text' => 'ดูข้อพิพาท',
    ],

    'dispute_appealed' => [
        'subject' => '[Order ID: :order_id] Dispute appealed!',
        'greeting' => 'Hello!',
        'message' => 'ข้อพิพาทสำหรับคำสั่งซื้อ.....อุทธรณ์ด้วยข้อความ  กรุณาตรวจสอบด้านล่างเพื่อดูรายละเอียด Order ID :order_id',
        'button_text' => 'ดูข้อพิพาท',
    ],

    'appealed_dispute_replied' => [
        'subject' => '[Order ID: :order_id] New respons for appealed dispute!',
        'greeting' => 'Hello!',
        'message' => 'ข้อพิพาท คำสั่งซื้อ ได้รับการตอบรับ Order ID :order_id : </br></br> ":reply"',
        'button_text' => 'ดูข้อพิพาท',
    ],

    // Inventory
    'low_inventory_notification' => [
        'subject' => 'แจ้งเตือนรายการสต็อกสินค้าเหลือน้อย!',
        'greeting' => 'Hello!',
        'message' => 'สต็อกในรายการสินค้าของคุณจำนวนน้อยลง กรุณาเพิ่มสต็อกในรายการสินค้าเพื่อให้สินค้าแสดงบนหน้าสินค้าทั้งหมด',
        'button_text' => 'อัพเดทรายการสินค้า',
    ],

    'inventory_bulk_upload_procceed_notice' => [
        'subject' => 'การนำเข้ารายการสินค้าจำนวนมากกำลังดำเนินการ',
        'greeting' => 'Hello!',
        'message' => 'รายการสินค้าจำนวนมากของคุณกำลังดำเนินการ. จำนวนแถวนำเข้า : สำเร็จ, จำนวนแถวนำเข้าไม่สำเร็จ: ไม่สำเร็จ',
        'failed' => 'กรุณาแนบไฟล์ใหม่สำหรับแถวที่นำเข้าไม่สำเร็จ',
        'button_text' => 'ดูรายการสินค้า',
    ],

    // Message Notifications
    'new_message' => [
        'subject' => ':subject',
        'greeting' => 'Hello :receiver',
        'message' => ':message',
        'button_text' => 'ดูข้อความ',
    ],

    'message_replied' => [
        'subject' => ':user replied :subject',
        'greeting' => 'Hello :receiver',
        'message' => ':ตอบกลับ',
        'button_text' => 'ดูข้อความ',
    ],

    // Order Notifications
    'order_created' => [
        'subject' => '[Order ID: :order] คำสั่งซื้อของคุณสำเร็จ',
        'greeting' => 'Hello :customer',
        'message' => 'ขอบคุณที่เลือกเรา คำสั่งซื้อหมายเลข....ได้รับเรียบร้อย เราจะแจ้งให้คุณทราบถึงสถานะของคำสั่งซื้อ [Order ID :order]',
        'button_text' => 'ไปยังร้านค้า',
    ],

    'merchant_order_created_notification' => [
        'subject' => 'คำสั่งซื้อใหม่ [Order ID: :order] นำส่งไปยังร้านค้าแล้ว',
        'greeting' => 'Hello :ผู้ขาย',
        'message' =>  'คำสั่งซื้อใหม่ [Order ID :order] นำส่งแล้ว. กรุณาเช็ครายละเอียดคำสั่งซื้อและ เตรียมนำส่งสินค้าโดยเร็วที่สุด ',
        'button_text' => 'เตรียมนำส่งสินค้า',
    ],

    'order_updated' => [
        'subject' => 'คำสั่งซื้อของคุณอัปเดตแล้ว [Order ID: :order]!',
        'greeting' => 'Hello :customer',
        'message' => 'คำสั่งซื้อของคุณอัปเดทแล้ว [Order ID :order] กรุณาดูรายละเอียดด้านล่า คุณสามารถตรวจสอบคำสั่งซื้อได้ที่ Dashboard',
        'button_text' => 'ไปยังร้านค้า',
    ],

    'order_fulfilled' => [
        'subject' => 'คำสั่งซื้อของคุณอยู่ระหว่างการนำส่ง [Order ID: :order]!',
        'greeting' => 'Hello :customer',
        'message' => 'เราขอแจ้งให้ทราบว่าคำสั่งซื้อของคุณอยู่ระหว่างการนำส่ง กรุณาดูรายละเอียดคำสั่งซื้อด้านล่าง คุณสามารถเช็ครายการคำสั่งซื้อของคุณได้ที่ Dashboard',
        'button_text' => 'ไปยังร้านค้า',
    ],

    'order_paid' => [
        'subject' => '[Order ID: :order] คำสั่งซื้อของคุณชำระเงินสำเร็จแล้ว!',
        'greeting' => 'Hello :customer',
        'message' => 'คำสั่งซื้อ [Order ID :order] ชำระเงินสำเร็จและอยู่ในขั้นตอนการนำส่ง กรุณาเช็ครายละเอียดคำสั่งซื้อด้านล่าง คุณสามารถเช็ครายการคำสั่งซื้อได้ที่ Dashboard',
        'button_text' => 'ไปยังร้านค้า',
    ],

    'order_payment_failed' => [
        'subject' => '[Order ID: :order] การชำระเงินไม่สำเร็จ!',
        'greeting' => 'Hello :customer',
        'message' => 'คำสั่งซื้อ [Order ID :order] ชำระเงินไม่สำเร็จ กรุณาเช็ครายละเอียดคำสั่งซื้อด้านล่าง คุณสามารถเช็ครายการคำสั่งซื้อได้ที่ Dashboard',
        'button_text' => 'ไปยังร้านค้า',
    ],

    // Refund Notifications
    'refund_initiated' => [
        'subject' => 'คำสั่งซื้อ [Order ID: :order] คำร้องขอคืนเงินได้รับเรียบร้อย',
        'greeting' => 'Hello :customer',
        'message' => 'คำร้องขอคืนเงินสำหรับ order :order ได้รับแล้วและอยู่ในขั้นตอนการรีวิวคำขอ เราจะแจ้งให้ทราบถึงสถานะการคืนเงิน',
    ],

    'refund_approved' => [
        'subject' => '[Order ID: :order] คำร้องขอคืนเงินอนุมัติเรียบร้อย',
        'greeting' => 'Hello :customer',
        'message' => 'การยื่นคำร้องขอคืนเงินสำหรับคำสั่งซื้อของคุณ order :order ได้รับการอนุมัติ: ยอดเงินคืน: เราส่งเงินคืนไปยังช่องทางการชำระเงินของคุณเรียบร้อยแล้ว อาจใช้เวลา 2-3 วัน กรุณาติดต่อธนาคารปลายทางหากยังไม่มียอดเงินคืนเข้า This is a notification to let you know that we have approved a refund request for your order :order. Refunded amount is :amount. We have sent the money to your payment method, it may take few days to effect your account. Contact your payment provider if you don\'t see the money effected in few days.',
    ],

    'refund_declined' => [
        'subject' => '[Order ID: :order] คำร้องขอคืนเงินถูกปฏิเสธ',
        'greeting' => 'Hello :customer',
        'message' => 'การยื่นคำร้องขอคืนเงินสำหรับคำสั่งซื้อของคุณ order :order ถูกปฏิเสธ ถ้าคุณไม่พอใจกับการแก้ไขของผู้ขาย กรุณาติดต่อผู้ขายโดยตรงหรือเปิดข้อพิพาทใน :marketplace',
    ],

    // Shop Notifications
    'shop_created' => [
        'subject' => 'ร้านค้าสร้างสำเร็จ!',
        'greeting' => 'Congratulation :merchant!',
        'message' => 'ร้านค้าของคุณ :shop_name สร้างสำเร็จแล้ว คลิกปุ่มด้านล่างเพื่อเข้าสู่ระบบร้านค้า',
        'button_text' => 'ไปยังร้านค้า',
    ],

    'shop_updated' => [
        'subject' => 'ข้อมูลร้านค้าอัปเดตสำเร็จ',
        'greeting' => 'Hello :merchant!',
        'message' => 'ร้านค้าของคุณ :shop_name อัปเดตสำเร็จแล้ว!',
        'button_text' => 'ไปยัง Dashboard',
    ],

    'shop_config_updated' => [
        'subject' => 'โครงร่างร้านค้าอัปเดตสำเร็จ!',
        'greeting' => 'Hello :merchant!',
        'message' => 'โครงร่างร้านค้าของคุณอัปเดตสำเร็จ! คลิกปุ่มด้านล่างเพื่อเข้าสู่ระบบร้านค้า',
        'button_text' => 'ไปยัง Dashboard',
    ],

    'shop_down_for_maintainace' => [
        'subject' => 'ร้านค้าของคุณไม่สามารถใช้งานได้',
        'greeting' => 'Hello :merchant!',
        'message' => 'ร้านค้าของคุณ :shop_name ไม่สามรถใช้งานได้! ลูกค้าไม่สามารถเยี่ยมชมร้านค้าของคุณได้',
        'button_text' => 'ไปยังหน้า Config',
    ],

    'shop_is_live' => [
        'subject' => 'ร้านค้าของคุณกลับมาใช้งานได้!',
        'greeting' => 'Hello :merchant',
        'message' => 'ร้านค้าของคุณ shop :shop_name กลับมาใช้งานได้',
        'button_text' => 'ไปยัง Dashboard',
    ],

    'shop_deleted' => [
        'subject' => 'ร้านค้าของคุณถูกลบออก :marketplace!',
        'greeting' => 'Hello Merchant!',
        'message' => 'ร้านค้าของคุณลบออกจากเว็บไซต์เรียบร้อยแล้ว เราจะคิดถึงคุณ',
    ],

    // System Notifications
    'system_is_down' => [
        'subject' => 'หน้า :marketplace ไม่สามารถใช้งานได้ขณะนี้!',
        'greeting' => 'Hello :user!',
        'message' => 'หน้า :marketplace ไม่สามรถใช้งานได้! ลูกค้าไม่สามารถเยี่ยมชมร้านค้าของคุณได้',
        'button_text' => 'ไปยังหน้า config',
    ],

    'system_is_live' => [
        'subject' => ':marketplace กลับมาใช้งานได้',
        'greeting' => 'Hello :user!',
        'message' => 'ร้านค้าของคุณ :marketplace กลับมาใช้งานได้',
        'button_text' => 'ไปยัง Dashboard',
    ],

    'system_info_updated' => [
        'subject' => ':marketplace - ข้อมูลอัปเดตสำเร็จ!',
        'greeting' => 'Hello :user!',
        'message' => ':marketplace อัปเดตสำเร็จ!',
        'button_text' => 'ไปยัง Dashboard',
    ],

    'system_config_updated' => [
        'subject' => ':marketplace - marketplace โครงร่างอัปเดตสำเร็จ!',
        'greeting' => 'Hello :user!',
        'message' => 'โครงร่าง :marketplace อัปเดตสำเร็จ! คลิกปุ่มด้านล่างเพื่อเข้าสู่ระบบร้านค้า',
        'button_text' => 'View settings',
    ],

    'new_contact_us_message' => [
        'subject' => 'ข้อความใหม่จากฟอร์มติดต่อเรา :subject',
        'greeting' => 'Hello!',
        'message_footer_with_phone' => 'คุณสามารถตอบกลับผ่านอีเมล์นี้หรือติดต่อเบอร์ :phone',
        'message_footer' => 'ติดต่อทางอีเมล์',
    ],

    // Ticket Notifications
    'ticket_acknowledgement' => [
        'subject' => '[Ticket ID: :ticket_id] :subject',
        'greeting' => 'Hello :user',
        'message' => 'This is a notification to let you know that we have received your ticket :ticket_id successfully! Our support team will get back to you as soon as possible.',
        'button_text' => 'View the ticket',
    ],

    'ticket_created' => [
        'subject' => 'New Support Ticket [Ticket ID: :ticket_id] :subject',
        'greeting' => 'Hello!',
        'message' => 'You have received a new support ticket ID :ticket_id, Sender :sender from the vendor :vendor. Review and assing the ticket to support team.',
        'button_text' => 'View the ticket',
    ],

    'ticket_assigned' => [
        'subject' => 'A ticket just assinged to you [Ticket ID: :ticket_id] :subject',
        'greeting' => 'Hello :user',
        'message' => 'This is a notification to let you know that ticket [Ticket ID: :ticket_id] :subject just assinged to you. Review and reply the ticket to as soon as possible.',
        'button_text' => 'Reply the ticket',
    ],

    'ticket_replied' => [
        'subject' => ':user replied the ticket [Ticket ID: :ticket_id] :subject',
        'greeting' => 'Hello :user',
        'message' => ':reply',
        'button_text' => 'View the ticket',
    ],

    'ticket_updated' => [
        'subject' => 'A Ticket [Ticket ID: :ticket_id] :subject has been updated!',
        'greeting' => 'Hello :user!',
        'message' => 'One of your support tickets ticket ID #:ticket_id :subject has been updated. Please contact us if you need any assistance.',
        'button_text' => 'View the ticket',
    ],

    // User Notifications
    'user_created' => [
        'subject' => ':admin added you to the :marketplace marketplace!',
        'greeting' => 'Congratulation :user!',
        'message' => 'You have been added to the :marketplace by :admin! Click the button below to login into your account. Use the temporary password for initial login.',
        'alert' => 'Don\'t forgot to change your password after login.',
        'button_text' => 'ไปยังโปรไฟล์',
    ],
    'user_updated' => [
        'subject' => 'ข้อมูลบัญชีอัพเดตสำเร็จ',
        'greeting' => 'Hello :user!',
        'message' => 'บัญชีของคุณอัพเดตสำเร็จ',
        'button_text' => 'ไปยังโปรไฟล์',
    ],

    // Vendor Notifications
    'verdor_registered' => [
        'subject' => 'ผู้ขายใหม่ลงทะเบียนสำเร็จ New vendor just registered!',
        'greeting' => 'Congratulation!',
        'message' => 'มีผู้ขายใหม่ ชื่อร้าน <strong>:shop_name</strong> และอีเมล์ผู้ขาย :merchant_email Your marketplace :marketplace just got a new verdor with shop name <strong>:shop_name</strong> and the merchant\'s email address is :merchant_email',
        'button_text' => 'ไปยัง Dashboard',
    ],

    // User/Merchant Notification
    'email_verification' => [
        'subject' => 'Verify your :marketplace account!',
        'greeting' => 'Congratulation :user!',
        'message' => 'บัญชีของคุณสร้างสำเร็จแล้ว คลิกปุ่มด้านล่างเพื่อยืนยันอีเมล์ Your account has been created successfully! Click the button below to verify your email address.',
        'button_text' => 'ยืนยันอีเมล์',
    ],

    // Version 1.2.6
    'dispute_solved' => [
        'subject' => 'ข้อพิพาท [Order ID: :order_id] ได้รับการแก้ไขแล้ว!',
        'greeting' => 'Hello :customer!',
        'message' => 'ข้อพิพาทของคำสั่งซื้อ ID: :order_id ได้รับการแก้ไขแล้ว. ขอบคุณค่ะ',
        'button_text' => 'ดูข้อพิพาท',
    ],
];