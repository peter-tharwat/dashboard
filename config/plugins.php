<?php

return [

    [
        'category'=>"أدوات مفيدة",
        'category_slug'=>"usefull_tools",
        'slug'=>"sticky_message",
        'title'=>"شريط الاعلان العلوي",
        'image'=>"/images/plugins/header_message.png",
        'description'=>"إعلان الهيدر هو إعلان يظهر عادةً في الجزء العلوي من صفحات الويب، غالبًا ما يتميز بتصميم مستطيل عريض يمكن أن يشمل نصوصًا، صورًا، أو عناصر تفاعلية. يكون الهدف منه جذب انتباه المستخدم فور دخوله الصفحة، ويمكن استخدامه لعرض عروض ترويجية، أخبار مهمة، أو رسائل تسويقية."
    ],
    [
        'category'=>"أدوات مفيدة",
        'category_slug'=>"usefull_tools",
        'slug'=>"navbar_main_button",
        'title'=>"الزر الرئيسي للشريط العلوي",
        'image'=>"/images/plugins/navbar_main_button.png",
        'description'=>"الزر في الـ navbar (شريط التنقل) هو عنصر تفاعلي يتم استخدامه ضمن الشريط العلوي للواجهة لتوفير خيارات التنقل السريعة بين صفحات أو أقسام الموقع. يُستخدم هذا الزر لعدة أغراض"
    ],
    [
        'category'=>"أدوات مفيدة",
        'category_slug'=>"usefull_tools",
        'slug'=>"images_compress",
        'title'=>"تقليص حجم الصور تلقائياً عند الرفع",
        'image'=>"/images/plugins/images_compress.png",
        'description'=>"يمكنك من خلال هذه الاضافة ضغط الصور المرفوعة في جميع الصفحات في الموقع تلقائياً مع المحافظة قدر الامكان على جودة الصور ويمكنك ايقافها قبل الرفع اذا أردت عدم ضغط الصور"
    ],
    [
        'category'=>"أدوات مفيدة",
        'category_slug'=>"usefull_tools",
        'slug'=>"general_popup",
        'title'=>"نافذة منبثقة PopUp",
        'image'=>"/images/plugins/general_popup.png",
        'description'=>"يمكنك من خلال هذه الاضافة تنبيه الزوار بأي رسائل تحتاجها بشكل مباشر وكذلك اتخاذ اجراء مباشرةً بكل بساطة",
        'initial_values'=>[
            'settings'=>[
                'popup_id'=>str()->ulid(),
                'title'=>"تذكير",
                'description'=>"مرحباً بك في موقعنا الالكتروني",
                'html_content'=>null,

                'btn_url'=>"#",
                'btn_url_in_new_tab'=>0,
                'btn_text'=>"حسناً",

                'delay_to_show'=>3000,
                'reopen_after_hours'=>720
            ]
        ]
    ],

    [
        'category'=>"أدوات مفيدة",
        'category_slug'=>"usefull_tools",
        'slug'=>"cross_pages_code",
        'title'=>"كود مشترك في الصفحات",
        'image'=>"/images/plugins/cross_pages_code.png",
        'description'=>"يمكنك عبر هذه الاضافة اضافة كود مخصص يتم طباعته في جميع الصفحات في الموقع بشكل مباشر",
        'initial_values'=>[
            'settings'=>[
                'top_navbar_enable'=>0,
                'top_navbar_code'=>'',
                'bottom_navbar_enable'=>0,
                'bottom_navbar_code'=>'',
                'top_footer_enable'=>0,
                'top_footer_code'=>'',
                'bottom_footer_enable'=>0,
                'bottom_footer_code'=>'',
            ]
        ]

    ],
    /*[
        'category'=>"أدوات مفيدة",
        'category_slug'=>"usefull_tools",
        'slug'=>"self_whatsapp_connect",
        'title'=>"الربط مع واتس آب خاص",
        'image'=>"/images/plugins/self_whatsapp_connect.png",
        'description'=>"تتيح لك تلك الاضافة الربط مع واتس آب من رقمك الشخصي أو رقم الحساب التجاري الخاص بك في واتس آب وارسال الرسائل القصيرة من خلاله مباشرةً",
        'initial_values'=>[
            'settings'=>[
                'whatsapp_number'=>'',
                'use_for_order_confirmation'=>1,
                'use_for_account_confirmation'=>1,
            ]
        ]

    ],
    [
        'category'=>"أدوات مفيدة",
        'category_slug'=>"usefull_tools",
        'slug'=>"self_whatsapp_connect2",
        'title'=>"الربط مع واتس آب خاص 2",
        'image'=>"/images/plugins/self_whatsapp_connect2.png",
        'description'=>"تتيح لك تلك الاضافة الربط مع واتس آب من رقمك الشخصي أو رقم الحساب التجاري الخاص بك في واتس آب وارسال الرسائل القصيرة من خلاله مباشرةً",
        'initial_values'=>[
            'settings'=>[
                'whatsapp_number'=>'',
                'use_for_order_confirmation'=>0,
                'use_for_account_confirmation'=>0,
            ]
        ]

    ],*/

    
    [
        'category'=>"أدوات مفيدة",
        'category_slug'=>"usefull_tools",
        'slug'=>"smtp_email_config",
        'title'=>"اعدادات الارسال SMTP",
        'image'=>"/images/plugins/smtp_email_config.png",
        'description'=>"يمكنك عبر هذه الآداة استخدام الارسال عبر اعدادات SMTP مخصصة بشكل مباشر دون التقيد بحد أقصى للارسال",
        'initial_values'=>[
            'settings'=>[
                'MAIL_MAILER'=>'smtp',
                'MAIL_HOST'=>'smtp.google.com',
                'MAIL_PORT'=>587,
                'MAIL_USERNAME'=>'support@domain.com',
                'MAIL_PASSWORD'=>'',
                'MAIL_ENCRYPTION'=>'null',
                'MAIL_FROM_ADDRESS'=>"support@domain.com",
                'MAIL_FROM_NAME'=>"Domain",
            ]
        ]

    ],


    /*[
        'category'=>"أدوات مفيدة",
        'category_slug'=>"usefull_tools",
        'slug'=>"lock_site_with_password",
        'title'=>"اغلاق الموقع بكلمة مرور",
        'image'=>"/images/plugins/lock_site_with_password.png",
        'description'=>"يمكنك من خلال هذه الاضافة اغلاق الموقع الخاص بك بكلمة مرور وارسالها إلى المستخدمين الموثوقين عبر البريد الالكتروني إذا قاموا بالتسجيل لديك",
        'initial_values'=>[
            'settings'=>[
                'lock_password'=>'',
                'lock_id'=>str()->ulid(),

                'component_content'=>"",
                'view_password_tab'=>1,
                'view_registeration_tab'=>1,
                'registeration_message'=>"",

                'name_required'=>0,
                'phone_required'=>0,
                'email_required'=>0,

                'name_title'=>"الاسم",
                'phone_title'=>"رقم الهاتف",
                'email_title'=>"البريد الالكتروني",
            ]
        ]
    ],*/



    [
        'category'=>"التسجيل",
        'category_slug'=>"registeration",
        'slug'=>"login_with_google",
        'title'=>"تسجيل الدخول عبر Google",
        'image'=>"/images/plugins/login_with_google.png",
        'description'=>"يمكنك من خلال هذه الاضافة انشاء حساب وتسجيل الدخول في الموقع الخاص بك عبر Google مباشرةً وهذا يساعد في تسريع عملية التسجيل في الموقع الخاص بك"
    ],
    [
        'category'=>"التسجيل",
        'category_slug'=>"registeration",
        'slug'=>"login_with_facebook",
        'title'=>"تسجيل الدخول عبر Facebook",
        'image'=>"/images/plugins/login_with_facebook.png",
        'description'=>"يمكنك من خلال هذه الاضافة انشاء حساب وتسجيل الدخول في الموقع الخاص بك عبر Facebook مباشرةً وهذا يساعد في تسريع عملية التسجيل في الموقع الخاص بك"
    ],

    [
        'category'=>"الحماية",
        'category_slug'=>"security",
        'slug'=>"google_recaptcha",
        'title'=>"جوجل Recaptcha",
        'image'=>"/images/plugins/google_recaptcha.png",
        'description'=>"يمكنك من خلال هذه الاضافة تفعيل جوجل ريكابشا عند التسجيل وفي استمارة تواصل معنا لتجنب الرسائل المزعجة والروبوتات التي من الممكن أن تستهدف موقعك"
    ],

    

    [
        'category'=>"احصائيات",
        'category_slug'=>"analytics",
        'slug'=>"google_analytics",
        'title'=>"تحليلات جوجل",
        'image'=>"/images/plugins/google-analytics.png",
        'description'=>"هي أداة مجانية من تطوير جوجل تُستخدم لتتبع وجمع البيانات المتعلقة بأداء المواقع الإلكترونية وتطبيقات الجوال. تساعد هذه الأداة أصحاب المواقع على فهم سلوك المستخدمين، مصادر الزيارات، وتحليل الأداء بشكل مفصل لاتخاذ قرارات تسويقية قائمة على البيانات"
    ],
    [
        'category'=>"احصائيات",
        'category_slug'=>"analytics",
        'slug'=>"google_tag_manager",
        'title'=>"جوجل تاج مانيجر",
        'image'=>"/images/plugins/google-tag-manager.png",
        'description'=>"Google Tag Manager هو نظام إدارة العلامات (Tags) يتيح لك إضافة وتتبع أكواد التحليلات والتسويق بسهولة، دون الحاجة إلى تعديل شفرة الموقع في كل مرة. يمكن من خلاله إدارة علامات مثل Google Analytics وFacebook Pixel وأدوات أخرى، مما يبسط العمل على المسوّقين والمطورين."
    ],
    [
        'category'=>"تسويق",
        'category_slug'=>"marketing",
        'slug'=>"facebook_pixel",
        'title'=>"فيسبوك بيكسل",
        'image'=>"/images/plugins/facebook-pixel.png",
        'description'=>"Facebook Pixel هو كود JavaScript يُضاف إلى موقعك لتتبع نشاط الزوار وتحليل تفاعلهم مع المحتوى. يساعدك في قياس فعالية حملات الإعلانات من خلال تتبع التحويلات (مثل شراء منتج أو إكمال نموذج). كما يتيح لك إعادة استهداف الزوار على Facebook وإنشاء جمهور مخصص للإعلانات."
    ],
    [
        'category'=>"تسويق",
        'category_slug'=>"marketing",
        'slug'=>"tiktok_pixel",
        'title'=>"تيكتوك بيكسل",
        'image'=>"/images/plugins/tiktok-pixel.png",
        'description'=>"Tiktok Pixel هو كود JavaScript يُضاف إلى موقعك لتتبع نشاط الزوار وتحليل تفاعلهم مع المحتوى. يساعدك في قياس فعالية حملات الإعلانات من خلال تتبع التحويلات (مثل شراء منتج أو إكمال نموذج). كما يتيح لك إعادة استهداف الزوار على Tiktok وإنشاء جمهور مخصص للإعلانات."
    ],
    [
        'category'=>"تسويق",
        'category_slug'=>"marketing",
        'slug'=>"utm_url_builder",
        'title'=>"منشئ روابط الحملات الاعلانية",
        'image'=>"/images/plugins/utm_url_builder.png",
        'description'=>"هي أداة لإنشاء روابط URL تتضمن معلمات UTM لتتبع مصادر الزيارات وتحليل أداء الحملات التسويقية، مثل utm_source (المصدر)، utm_medium (الوسيط)، وutm_campaign (الحملة). تساعد على معرفة من أين يأتي الزوار وكيفية وصولهم للموقع لتحسين استراتيجيات التسويق."
    ],
    /*[
        'category'=>"تسويق",
        'category_slug'=>"marketing",
        'slug'=>"whatsapp_campaign",
        'title'=>"ارسال رسائل واتس آب",
        'image'=>"/images/plugins/whatsapp_campaign.png",
        'description'=>"يمكنك من خلال هذه الاضافة ارسال رسائل جماعية لمجموعة كاملة من المستخدمين بشكل مباشر للحصول على أفضل نتائج واعادة استهداف"
    ],*/
    /*[
        'category'=>"تسويق",
        'category_slug'=>"marketing",
        'slug'=>"email_campaign",
        'title'=>"ارسال رسائل عبر البريد",
        'image'=>"/images/plugins/email_campaign.png",
        'description'=>"يمكنك من خلال هذه الاضافة ارسال رسائل جماعية لمجموعة كاملة من المستخدمين عبر البريد الالكتروني بشكل مباشر للحصول على أفضل نتائج واعادة استهداف"
    ],*/
    /*[
        'category'=>"تسويق",
        'category_slug'=>"marketing",
        'slug'=>"lucky_wheel",
        'title'=>"عجلة الحظ",
        'image'=>"/images/plugins/lucky_wheel.png",
        'description'=>"من خلال عجلة الحظ يمكنك انشاء عجلة حظ بأكواد خصم تقوم بتحديدها تظهر للمستخدم بنسبة مئوية تقوم بتحديدها ويمكنك من خلال عجلة الحظ طلب بعض البيانات من المستخدم لكي تعمل العجلة بشكل سليم",
        'initial_values'=>[
            'settings'=>[
                'title'=>'',
                'id'=>str()->ulid(),
                'hide_in_browser_for_hours'=>1,

                'name_required'=>0,
                'phone_required'=>0,
                'email_required'=>0,

                'name_title'=>"الاسم",
                'phone_title'=>"رقم الهاتف",
                'email_title'=>"البريد الالكتروني",
                'wheel_color'=>"#c7160c",

                'fields'=>[
                    [
                        'id'=>1,
                        'title'=>"",
                        'percentage'=>0,
                        'coupon'=>"",
                    ],
                    [
                        'id'=>2,
                        'title'=>"",
                        'percentage'=>0,
                        'coupon'=>"",
                    ],
                    [
                        'id'=>3,
                        'title'=>"",
                        'percentage'=>0,
                        'coupon'=>"",
                    ],
                    [
                        'id'=>4,
                        'title'=>"",
                        'percentage'=>0,
                        'coupon'=>"",
                    ],
                    [
                        'id'=>5,
                        'title'=>"",
                        'percentage'=>0,
                        'coupon'=>"",
                    ],
                    [
                        'id'=>6,
                        'title'=>"",
                        'percentage'=>0,
                        'coupon'=>"",
                    ],
                    [
                        'id'=>7,
                        'title'=>"",
                        'percentage'=>0,
                        'coupon'=>"",
                    ],
                    [
                        'id'=>8,
                        'title'=>"",
                        'percentage'=>0,
                        'coupon'=>"",
                    ],
                    [
                        'id'=>9,
                        'title'=>"",
                        'percentage'=>0,
                        'coupon'=>"",
                    ],
                    [
                        'id'=>10,
                        'title'=>"",
                        'percentage'=>0,
                        'coupon'=>"",
                    ],
                ],


            ]
        ]
    ],*/
    [
        'category'=>"دعم",
        'category_slug'=>"support",
        'slug'=>"freshchat",
        'title'=>"فريش شات",
        'image'=>"/images/plugins/freshchat.png",
        'description'=>"Freshchat هو نظام محادثة مباشر (Live Chat) مخصص لتحسين تجربة العملاء من خلال تواصل فوري وسلس. يوفر منصة موحدة للتفاعل مع العملاء عبر قنوات متعددة مثل الموقع الإلكتروني، تطبيقات الهاتف، والبريد الإلكتروني، مما يسهل إدارة المحادثات وتعزيز رضا العملاء."
    ],
    [
        'category'=>"دعم",
        'category_slug'=>"support",
        'slug'=>"crisp",
        'title'=>"كريسب",
        'image'=>"/images/plugins/crisp.png",
        'description'=>"Crisp هو نظام محادثة مباشر (Live Chat) ودعم عملاء يوفر تجربة شاملة للتواصل مع الزوار والعملاء. يتيح التواصل الفوري من خلال الدردشة، إلى جانب ميزات متقدمة مثل الردود التلقائية وتكاملات مع تطبيقات أخرى. يهدف إلى تعزيز التفاعل مع العملاء وزيادة المبيعات عبر موقعك."
    ],
    
    [
        'category'=>"كود مخصص",
        'category_slug'=>"custom_codes",
        'slug'=>"header_code",
        'title'=>"كود هيدر مخصص",
        'image'=>"/images/plugins/header_code.png",
        'description'=>"إضافة Plugin لإدراج كود في الهيدر (Header) شائعة في منصات إدارة المحتوى، مثل WordPress، وتتيح للمستخدمين إضافة أكواد HTML أو CSS أو JavaScript بسهولة في قسم <head> من صفحات الموقع. يُستخدم هذا النوع من الإضافات لأغراض متعددة"
    ],

    [
        'category'=>"كود مخصص",
        'category_slug'=>"custom_codes",
        'slug'=>"footer_code",
        'title'=>"كود فوتر مخصص",
        'image'=>"/images/plugins/footer_code.png",
        'description'=>"إضافة أكواد إلى الفوتر تُستخدم لتحسين أداء الموقع، أو إدراج أكواد تتبع، أو تكامل مع خدمات أخرى. يمكن إضافة هذه الأكواد باستخدام Plugins دون الحاجة إلى تعديل مباشر في الملفات البرمجية، مما يسهل العملية للمستخدمين غير المتمرسين في البرمجة."
    ],
    [
        'category'=>"كود مخصص",
        'category_slug'=>"custom_codes",
        'slug'=>"ads_text",
        'title'=>"كود Ads.txt",
        'image'=>"/images/plugins/ads_text.png",
        'description'=>"ads.txt هو اختصار لـ Authorized Digital Sellers، وهو معيار طوره IAB Tech Lab للمساعدة في مكافحة الاحتيال في الإعلانات الرقمية. هذا الملف يتم وضعه في الجذر الأساسي للموقع (root) ويحدد البائعين المصرح لهم ببيع الإعلانات نيابة عنك. وجود هذا الملف يساعد في ضمان أن إعلاناتك تُعرض من خلال منصات موثوقة فقط."
    ],
    [
        'category'=>"كود مخصص",
        'category_slug'=>"custom_codes",
        'slug'=>"robots_code",
        'title'=>"كود Robots",
        'image'=>"/images/plugins/robots_code.png",
        'description'=>"robots.txt هو ملف نصي يُستخدم في المواقع الإلكترونية للتحكم في كيفية وصول روبوتات محركات البحث والزواحف (مثل Googlebot) إلى محتوى الموقع. الهدف من هذا الملف هو إعطاء تعليمات لهذه الروبوتات حول الصفحات أو الأقسام التي يمكن أو لا يمكن فهرستها."
    ],
 /*   [
        'category'=>"شركات الشحن",
        'category_slug'=>"shipping_companies",
        'slug'=>"shipping_with_bosta",
        'title'=>"الشحن مع Bosta.co",
        'image'=>"/images/plugins/shipping_with_bosta.png",
        'description'=>"بوسطة هي شركة رائدة في مجال الخدمات اللوجستية والتكنولوجيا، تأسست في مصر عام 2017 بهدف تبسيط وتسهيل عمليات الشحن والتوصيل داخل البلاد. تقدم بوسطة مجموعة متنوعة من الخدمات المصممة لتلبية احتياجات الأفراد والشركات على حد سواء."
    ],*/



    
 

    /*[
        'category'=>"مدفوعات",
        'category_slug'=>"payment_gateways",
        'slug'=>"cod_payment",
        'title'=>"الدفع عند الاستلام",
        'image'=>"/images/plugins/cod_payment.png",
        'description'=>"الدفع عند الاستلام هو أحد خيارات الدفع الشائعة التي تُتيح للعملاء دفع قيمة المشتريات مباشرةً عند استلام الطلب. يُستخدم هذا النظام بشكل كبير في التجارة الإلكترونية، خاصة في الأسواق التي يفضل فيها العملاء التأكد من جودة المنتج قبل الدفع."
    ],
    [
        'category'=>"مدفوعات",
        'category_slug'=>"payment_gateways",
        'slug'=>"kashier_credit",
        'title'=>"كاشير (بطاقات)",
        'image'=>"/images/plugins/kashier.png",
        'description'=>"مدفوعات كاشير هي خدمة إلكترونية للدفع الإلكتروني تمكّن الشركات والأفراد من معالجة المدفوعات بسهولة وسرعة. توفر هذه الخدمة حلولًا متكاملة تدعم عمليات الدفع سواء عبر الإنترنت (مثل المتاجر الإلكترونية) أو في نقاط البيع (POS) بشكل آمن وفعال."
    ],

    [
        'category'=>"مدفوعات",
        'category_slug'=>"payment_gateways",
        'slug'=>"kashier_wallets",
        'title'=>"كاشير (محافظ الكترونية)",
        'image'=>"/images/plugins/wallets.png",
        'description'=>"المحافظ الإلكترونية هي وسيلة دفع رقمية تُتيح للمستخدمين تخزين الأموال وإجراء المعاملات المالية عبر تطبيقات الهواتف الذكية أو منصات الإنترنت بسهولة وأمان. توفر المحافظ الإلكترونية بديلاً مرنًا عن البطاقات المصرفية والدفع النقدي، مما يجعلها خيارًا شائعًا في التجارة الإلكترونية والمعاملات اليومية."
    ],
    [
        'category'=>"مدفوعات",
        'category_slug'=>"payment_gateways",
        'slug'=>"kashier_installments",
        'title'=>"كاشير (أنظمة التقسيط)",
        'image'=>"/images/plugins/kashier_installments.png",
        'description'=>"الدفع بالتقسيط هو نظام يتيح للعملاء شراء المنتجات أو الخدمات من خلال دفع ثمنها على أقساط متساوية على مدى فترة زمنية محددة بدلاً من دفع المبلغ الكامل دفعة واحدة. يستخدم هذا النظام بشكل شائع في عمليات الشراء الكبيرة، مثل الإلكترونيات والأثاث والسيارات، وأحيانًا في التجارة الإلكترونية لتعزيز القوة الشرائية للعملاء."
    ],
    [
        'category'=>"مدفوعات",
        'category_slug'=>"payment_gateways",
        'slug'=>"kashier_fawry",
        'title'=>"كاشير (فوري)",
        'image'=>"/images/plugins/kashier_fawry.png",
        'description'=>"فوري هي شبكة رائدة في مجال الخدمات المالية الإلكترونية في مصر، تأسست في عام 2008، وتُقدم حلولًا متنوعة للدفع الإلكتروني للأفراد والشركات. تُعد فوري من أكبر منصات الدفع في مصر، حيث تُتيح للعملاء إجراء مدفوعات متعددة مثل فواتير الخدمات (الكهرباء، المياه، الغاز)، شحن الرصيد للهاتف المحمول، دفع أقساط القروض، وتسديد التبرعات عبر شبكة متكاملة من المنافذ الإلكترونية."
    ],
    [
        'category'=>"مدفوعات",
        'category_slug'=>"payment_gateways",
        'slug'=>"paysky_cards",
        'title'=>"باي سكاي (بطاقات)",
        'image'=>"/images/plugins/paysky_cards.png",
        'description'=>"مدفوعات paysky هي بوابة دفع الكترونية يمكنك من خلالها استقبال المدفوعات من العملاء مباشرة عبر فيزا وماستر كارد"
    ],
    */


    

];

