-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2024 at 09:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `updated_civil_center`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_url_in` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NEW_WINDOW',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `main_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `editor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `file_url` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `main_image`, `is_featured`, `slug`, `title`, `description`, `meta_description`, `views`, `created_at`, `updated_at`, `editor_id`, `category_id`, `file_url`) VALUES
(4, 1, '4/post-md-4.jpg', 1, 'مراجعة-كتاب-علوم-الشرع-والعلوم-الاجتماعية-نحو-تجاوز-القطيعة', 'مراجعة كتاب علوم الشرع والعلوم الاجتماعية نحو تجاوز القطيعة', '<h1 class=\"post-head\">مراجعة كتاب علوم الشرع والعلوم الاجتماعية نحو تجاوز القطيعة</h1>', 'مراجعة كتاب علوم الشرع والعلوم الاجتماعية نحو تجاوز القطيعة', 2, '2024-01-04 08:08:47', '2024-01-14 15:21:03', 10, 4, 'https://drive.google.com/file/d/16iZSXRty7g7KJ-hUaeSevxilk7LSwwRQ/view?usp=drive_link'),
(5, 1, '4/post-md-4.jpg', 1, 'قريبا', 'قريبًا...', '<p>قريبا</p>', NULL, 0, '2024-01-04 08:41:48', '2024-01-04 08:41:48', 10, 3, NULL),
(6, 1, '4/post-md-4.jpg', 0, 'مشكلات-البحث-العلمي-في-العلوم-الاجتماعية-بالجامعات-اليمنية', 'مشكلات البحث العلمي في العلوم الاجتماعية بالجامعات اليمنية', '<p><span lang=\"AR-SA\" dir=\"RTL\" style=\"font-size: 14.0pt; line-height: 115%; font-family: \'Traditional Arabic\',serif; mso-fareast-font-family: Calibri; mso-fareast-theme-font: minor-latin; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;\">مشكلات البحث العلمي في العلوم الاجتماعية بالجامعات اليمنية</span></p>', NULL, 0, '2024-01-08 17:43:59', '2024-01-08 17:43:59', 11, 1, NULL),
(7, 1, '4/post-md-4.jpg', 0, 'جهل-الأسرة-اليمنية-بالأمراض-النفسية-الناتجة-عن-الحرب-وأثره-على-الفرد', 'جهل الأسرة اليمنية بالأمراض النفسية الناتجة عن الحرب وأثره على الفرد', '<p><span lang=\"AR-SA\" dir=\"RTL\" style=\"font-size: 14.0pt; line-height: 115%; font-family: \'Traditional Arabic\',serif; mso-fareast-font-family: Calibri; mso-fareast-theme-font: minor-latin; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;\">جهل الأسرة اليمنية بالأمراض النفسية الناتجة عن الحرب وأثره على الفرد</span></p>', NULL, 0, '2024-01-08 17:46:09', '2024-01-08 17:46:09', 12, 1, NULL),
(8, 1, '4/post-md-4.jpg', 1, 'أثر-الأزمة-اليمنية-في-انتشار-ظاهرة-فسخ-الزواج-في-محافظة-تعز', 'أثر الأزمة اليمنية في انتشار ظاهرة فسخ الزواج في محافظة تعز', NULL, NULL, 0, '2024-01-08 17:47:06', '2024-01-12 08:54:13', 15, 2, NULL),
(9, 1, '4/post-md-4.jpg', 0, 'العادات-الرمضانية-في-صنعاء-بحث-في-التاريخ-الاجتماعي', 'العادات الرمضانية في صنعاء (بحث في التاريخ الاجتماعي)', NULL, NULL, 0, '2024-01-08 17:50:29', '2024-01-08 17:50:29', 14, 1, NULL),
(10, 1, '4/post-md-4.jpg', 0, 'الدولة-الهاشمية-في-العالم-العربي-قراءة-تاريخية', 'الدولة الهاشمية في العالم العربي (قراءة تاريخية)', NULL, NULL, 0, '2024-01-08 18:18:46', '2024-01-08 18:18:46', 15, 1, NULL),
(11, 1, '4/post-md-4.jpg', 1, 'علم-الاجتماع-أهميته-وضرورته-لمراكز-التعليم-الديني-في-اليمن', 'علم الاجتماع: أهميته وضرورته لمراكز التعليم الديني في اليمن', NULL, NULL, 0, '2024-01-08 18:31:31', '2024-01-12 08:41:45', 15, 4, NULL),
(12, 1, '4/post-md-4.jpg', 0, 'الهويات-القاتلة-قراءة-في-تناحر-الهويات-اليمنية', 'الهويات القاتلة.... قراءة في تناحر الهويات اليمنية', NULL, NULL, 0, '2024-01-08 18:32:14', '2024-01-08 18:32:14', 18, 2, NULL),
(13, 1, '4/post-md-4.jpg', 0, 'خلايا-التفكير-الاجتماعية-الغائبة-في-الحالة-اليمنية', 'خلايا التفكير الاجتماعية الغائبة في الحالة اليمنية', '<p style=\"text-align: right;\"><span style=\"color: #000000;\">أصل هذه المقالة كلمة ألقيت في ندوة إشهار المركز المدني في مدينة تعز على هامش معرض الكتاب وقد حاولنا التطرق فيها إلى ضرورة وجود مراكز دراسات وخلايا تفكير اجتماعي تسهم في الكشف عن واقعنا الاجتماعي وأثر غياب ذلك في ضعف وضبابية رؤيتنا لأنفسنا وللواقع الذي نعيشه  </span></p>\r\n<p style=\"text-align: right;\"> </p>\r\n<p style=\"text-align: right;\"><span style=\"color: #000000;\">وكان من المقرر أن يفتتح المركز في منتصف العام المنصرم وكنا بدأنا التنسيق مع الدكاترة الفضلاء في جامعة تعز على أن تقام الندوة في الجامعة لولا جائحة كورونا التي فجأت العالم، فأُخر الافتتاح لهذا اليوم البهيج، والتي صادف فعاليات معرض الكتاب في هذه المدينة الجميلة  ، فالتقينا بمدير مكتب الثقافة قبل أيام على هامش المعرض أ.عبدالخالق سيف وعرضنا عليه الفكرة فكان أن رحب وشجع وسهل لنا كثيرا من التنسيقات ذات العلاقة، فله منا الشكر والتقدير. </span></p>\r\n<p style=\"text-align: right;\"> </p>\r\n<p style=\"text-align: right;\"><span style=\"color: #000000;\">- أما عن المركز المدني للدراسات واختصاصه فباختصار..  هو مؤسسة بحثية يمنية وليدة طموحة ستتخصص  في دراسة ومعالجة مختلف الظواهر الاجتماعية والفكرية المتصلة بالشأن اليمني، وسيكثف المركز جهوده في استفتاح مواضيع ودراسة ظواهر هي في الضل من اهتمام الدارسين اليمنيين أي أنها  لا تأخذ حظها من العناية أو الدراسة أو الإبراز رغم كونها ظواهر!، كما سيعطي المركز في دراساته أهمية لمعالجة الظواهر المحلية والنشطة والتي تشكل أولوية اجتماعية من الناحية الزمنية والموضوعية.  </span></p>\r\n<p style=\"text-align: right;\"><span style=\"color: #000000;\">  وهنا نلفت نظر الحاضرين والمتابعين أن المركز ليس من أولوياته ولا في مجالاته تناول المسائل السياسية ولا بحثها، إذ نشعر أن هذا المجال قد حظي بالاهتمام المقبول كما أن تعقيدات المشهد السياسي اليمني قد طغت على كثير من الظواهر الاجتماعية والفكرية اليمنية وأغفلتها. </span></p>\r\n<p style=\"text-align: right;\"> </p>\r\n<p style=\"text-align: right;\"> </p>\r\n<p style=\"text-align: right;\"><span style=\"color: #000000;\">وسبب آخر حول إغفال المركز لدراسة الظواهر السياسية المباشرة في الحالة اليمنية وهي أن الظاهرة السياسية اليمنية اليوم لا تسير وفق المنطق السياسي، أو لا تعمل ضمن الأطر الموضوعية للممارسة السياسية، فنحن أمام ايدلوجيات حاكمة وتيارات مناطقية نافذة وعشائر سياسية تعمل خارج الموضوعية السياسية، فهي تقع ضمن تأثيرات القرار والإرادة والمال الخارجي، وإن وجدت مراكز الدراسات التي تعنى بالشأن السياسي فمجالها المكاني لا يمكن أن يكون في الداخل اليمني  في الحالة الراهنة، إذ من أهم شروط عمل هذه المراكز هو توفر عنصري الأمن والحرية وهو ما لا يتوافر في الظرفية اليمنية الراهنة، وإن وجدت فلا بد من توفر المعطى الآخر، حتى تؤتي هذه المراكز أكلها وتحقق مقاصدها، هذا المعطى هو أن يمتلك صانع القرار السياسي اليمني العزيمة والتواضع معا، للتفاعل مع إنتاج هذه المراكز والتي قد تسهم في تقديم تصورات ومقترحات تساعده في الخروج من المآزق وحالة التيه السياسي التي يعيشها  ونعيشها كمجتمع يمني معه، وهذا لا يعني انفكاك المركز المدني عن معالجة الظاهرة السياسية وما تلقيه من ضلال على الواقع الاجتماعي اليمني فالدراسات الاجتماعية والفكرية باللازم، تظل متصلة بالشأن السياسي بوجه من الوجوه . </span></p>\r\n<p style=\"text-align: right;\"> </p>\r\n<p style=\"text-align: right;\"><span style=\"color: #000000;\">أما عن موضوع المشاركة الأساسي والمعنون بخلايا التفكير الاجتماعية الغائبة في الحالة اليمنية فله تمهيد ننفذ من خلاله إلى تناول الأفكار المتصلة به، وقد وضعنها في  عناصر متسلسلة ليسهل استرجاعها واستذكارها بيسر كما أن هذا سيساعدنا على الاختصار المتوافق مع الزمن المقرر للمشاركة: </span></p>\r\n<p style=\"text-align: right;\"> </p>\r\n<p style=\"text-align: right;\"> </p>\r\n<p style=\"text-align: right;\"><span style=\"color: #000000;\">- أولا في العنوان \"خلايا التفكير الغائبة في الحالة اليمنية\": </span></p>\r\n<p style=\"text-align: right;\"><span style=\"color: #000000;\">نقصد بخلايا التفكير مراكز البحوث والدراسات وهي تسمى أيضا بيوت الخبرة أو مجامع التفكير أو خزانات التفكير كترجمة حرفية، وهي مراكز تهتم بدراسة الظواهر وتقديم التوصيات والاستشارات لذوي العلاقة وتتوزع من حيث اختصاصاتها وانتمائتها بشكل واسع. </span></p>\r\n<p style=\"text-align: right;\"> </p>\r\n<p style=\"text-align: right;\"><span style=\"color: #000000;\">فمراكز التفكير والرأي اليمنية سواء كانت في صورتها المؤسسية كمراكز بحوث أو كفرق ومجموعات بحثية حرة كلها تدخل في وصف \" الغائبة\" كما ذكرنا في عنوان الموضوع ,, الغائبة حد الموت، وغيابها الوجودي عمومًا عن المشهد اليمني واضح جدا  فضلا عن غيابها كمؤسسات فاعلة ، وهذا الغياب في الحضور والفاعلية ظاهرة تستحق من النخب اليمنية المراجعة والاستنفار، وهذه اللفظة \" الغياب\" نقصدها بالمعنى الحرفي للكلمة، وهذا التعبير ليس مجرد انطباع أو إحساس منا بالمشكلة بقدر ما هو ناتج عن همّ وقراءة واعية من طرفنا في ذات الظاهرة، ويمكن أن نوضح حجم هذه المشكلة في جملة من المدخلات المختصرة:</span></p>\r\n<p style=\"text-align: right;\"> </p>\r\n<p style=\"text-align: right;\"><span style=\"color: #000000;\">- أما الغياب على المستوى المحلي:   أجرينا قبل افتتاح المركز المدني تتبعًا لمراكز الدراسات اليمنية \"القائمة على استحياء\" ووجدناها لا تتعدى خمسة مراكز بحثية، كلها تتبع اتجاهات سياسية في الساحة المحلية أو الدولية، وهذا يمنعها بالتأكيد من دراسة الظواهر اليمنية في إطار بحثي ذو نزعة استقلالية، بل تنتج دراساتها وفقًا للأولويات التي يطلبها الممول أو المالك أو الإعلام لا وفقا لما يحتاجه المجتمع، ثم أن هذه المراكز الخمسة  يغلب على إنتاجها وأنشطتها البحثية التأطير السياسي، ولا تحظى الدراسات الاجتماعية فيها بالمساحة والعناية المطلوبة وهو ما نسعى في المركز المدني للاعتناء به. </span></p>\r\n<p style=\"text-align: right;\"><span style=\"color: #000000;\">- وفي مظهر آخر يعكس حالة الغياب والاحتياج معًا لهذه المراكز في الحالة اليمنية أننا لا نعرف مجتمعاتنا على وجه الدقة: لنضرب مثلا بالمجتمع الذي نعيش فيه في هذه المدينة مدينة تعز، ونضع بعضا من الاسئلة الاستكشافية في أحد ظواهرها، لنعرف من خلال ذلك فداحة غياب مراكز الدراسات وعدم اضطلاعها بأدوارها التبصيرية: </span></p>\r\n<p style=\"text-align: right;\"> </p>\r\n<p style=\"text-align: right;\"><span style=\"color: #000000;\">ظاهرة فقدان المعيل كأب أو أخ في هذه الحرب اليمنية اليمنية، وآثارها هذه الظاهرة وتداعياتها على المستوى الاجتماعي، نحن جاهلون بها تماما، وهذه الأسئلة توضح صورة الجهل الذي نقصده، فكم عدد هذه الأسر ولو بشكل تقريبي؟ وكم نسبتها إلى المجتمع التعزي ككل؟ ، ثم ما هي توزعاتها بين الريف والمدينة؟ وكم عدد إناث هذه الأسر مقارنة بالذكور وما هي فئاتهم العمرية؟ كم عدد الملتحقين من هذه الأسر بالتعليم؟ ماذا يعملون وما هي المهن التي يعملون من خلالها؟ ما مدى فاعلية علاقات القرابة من حيث العناية والاهتمام بهم كتعويض عن فقدان الأب؟ كيف يقضي أبناء هذه الأسر أوقاتهم وأين؟. </span></p>\r\n<p style=\"text-align: right;\"> </p>\r\n<p style=\"text-align: right;\"><span style=\"color: #000000;\">إذا علمنا إجابة هذه الأسئلة وغيرها يبقى أن نعرف ما هي التوجيهات والتوصيات والمعالجات الناتجة عن تلك الإجابات، وإذا كنا نجهل كل ذلك أساسا وهذا غالب الظن، كيف يمكن أن نعالج هذه الظاهرة بوجه الدقة وتداعياتها وتأثيراتها  المستقبلية على المجتمع. </span></p>\r\n<p style=\"text-align: right;\"> </p>\r\n<p style=\"text-align: right;\"><span style=\"color: #000000;\">أنا لا أعلم دراسة أو بحث حول هذه الظاهرة أنجز من فريق بحثي أو مركز أكاديمي في هذه المدينة أو غيرها من المدن اليمنية رغم توغل هذه الظاهرة وشيوعها!</span></p>\r\n<p style=\"text-align: right;\"> </p>\r\n<p style=\"text-align: right;\"><span style=\"color: #000000;\">- أثّر غياب هذه المراكز أيضا في توهان وضياع الباحث والمفكر اليمني فقد أصبحت أولويات كثير منهم وما يعالجونه من أفكار في شبكات التواصل أو في إشاعة أفكارهم وآرائهم، لا تعبر حقيقة عن الضروريات والحاجيات الاجتماعية والثقافية النازلة على رأس المجتمع اليمني والتي يحتاج فيها لإجابات ومعالجات. </span></p>\r\n<p style=\"text-align: right;\"><span style=\"color: #000000;\">فمثلا ستجد باحثين ومفكرين يتناولون قضايا فكرية منفكة تماما عن واقعنا الاجتماعي كمناقشة مسألة حد الردة مثلا، وهذا مثال لا أكثر قصدت به أن هذا الموضوع من حيث كونه مشكلة اجتماعية أو حتى مسألة فكرية لا يشكل أولوية اليوم للمجتمع اليمني، بل وتصبح بعض صفحات الباحثين مكانا للاستعراض الثقافي المقصود وغير المقصود أحيانا، غير أن حالة التفكك التي يعيشها المفكر والباحث اليمني لأسباب عدة ليس هذا مكان عرضها، أفرزت عنده مشكلة في الوعي بوظيفته وأربكته، فأصبح ينقل ما يقرأه لمجمتعه ومتابعيه عوضًا أن ينقل الظواهر الاجتماعية إلى ما يطالعه ويبحثه ثم يخرج لنا بدراسة ناضجة أو توصيات ثمينة تسهم في فهم الظواهر ومعالجتها، وأظن أن من أهم أسباب هذه المشكلة لدى الباحث اليمني عدم وجود مراكز بحثية أو فرق تفكير مشتركة تجمع الجهود وتنظم القدرات وترتب الأولويات لهذه الطاقات البحثية!.  </span></p>\r\n<p style=\"text-align: right;\"> </p>\r\n<p style=\"text-align: right;\"><span style=\"color: #000000;\">- والملاحظة قبل الأخيرة في سياق هذا الموضوع: أن ما يزيد من أهمية وجود مراكز بحثية يمنية محلية فاعلة هو حجم المتغيرات وتشابك المشكلات في الحالة اليمنية في مختلف السياقات، فهذه الظواهر والإفرازات الاجتماعية لا ينفع معها التناول السطحي ولا البحث الفردي، بل تتطلب وجود مراكز دراسات ومؤسسات بحث وتنقيب معرفي متعددة الاختصاصات وواسعة الانتشار تضم فرقا بحثية تتآزر فيما بينها وتتداعم. </span></p>\r\n<p style=\"text-align: right;\"><span style=\"color: #000000;\">فلا يستطيع اليوم السياسي ولا المفتي ولا الإعلامي ولا المعالج للظواهر الاجتماعية أيا كان موقعه، أن يتناول الظواهر أو أن يقول رأيه فيها منفردًا، نظرًا لتعقد الظواهر وتداخلها وتشابكها، بل يحتاج إلى مراجعة المختصين والباحثين الذين يدرسون الظاهرة ثم يقربونها للمجال العام ليسهل معالجتها ثم يضعون المقترحات ويرسمون الاتجاهات بشأنها. </span></p>\r\n<p style=\"text-align: right;\"> </p>\r\n<p style=\"text-align: right;\"><span style=\"color: #000000;\">- الملاحظة الأخيرة والمهمة: أن كثيرا من الدراسات البحثية خاصة منها الصادرة عن مراكز البحوث الجامعية، تكتب بلغة مغرقة في  التنظير والتعقيد وكأنها كتبت بقصد الاعتزال عن الواقع الاجتماعي، وهي بهذا تزيد حضورها غيابا: ولهذا من أهم ما يمكن أن يقال في المشكلة هذه:: </span></p>\r\n<p style=\"text-align: right;\"></p>\r\n<p style=\"text-align: right;\"><span style=\"color: #000000;\">أن على مراكز البحوث حتى تكون مواكبة للأولويات الاجتماعية وتكون قادرة على النفاذ لمختلف الطبقات والفئات اليمنية وحاضرة في المجال العام اليمني أن تراعي  جملة أمور: </span></p>\r\n<p style=\"text-align: right;\"><span style=\"color: #000000;\">1. البحث في مواضيع يحتاجها المجتمع وصانع القرار هذه المواضيع من الضروري أن تشكل له وللمجتمع أولوية </span></p>\r\n<p style=\"text-align: right;\"><span style=\"color: #000000;\">2. لا بد من اتصال مراكز البحوث بالمستشارين وصناع القرار والمؤسسات الاجتماعية </span></p>\r\n<p style=\"text-align: right;\"><span style=\"color: #000000;\">3. من المهم التشبيك الفاعل مع المؤسسات الإعلامية والتعليمية وإمدادها بالبحوث الناجزة</span></p>\r\n<p style=\"text-align: right;\"><span style=\"color: #000000;\">4. الكتابة بلغة سهلة وعالية في آن</span></p>\r\n<p style=\"text-align: right;\"><span style=\"color: #000000;\">5. ضرورة التنسيق البيني والتعاون بين مراكز الدراسات </span></p>\r\n<p style=\"text-align: right;\"><span style=\"color: #000000;\">6. من المهم أن تنجز الدراسات من خلال فرق بحثية متكاملة داخل المركز </span></p>\r\n<p style=\"text-align: right;\"><span style=\"color: #000000;\">7. مواكبة الأحداث في العمل البحثي من أهم المسائل التي ينبغي الاعتناء بها، ولا نقصد أن تصبح مراكز البحوث مثل المؤسسات الاعلامية، إنما القصد الفاعلية المقبولة التي تقدم إجابات واعية للناس بالشكل المطلوب والوقت المطلوب.</span></p>', NULL, 2, '2024-01-08 18:33:28', '2024-01-14 16:21:12', 18, 6, NULL),
(14, 1, '4/post-md-4.jpg', 1, 'دور-مواقع-التواصل-الاجتماعي-في-توعية-الرأي-العام-بالحقوق-والحريات-العامة', 'دور مواقع التواصل الاجتماعي في توعية الرأي العام بالحقوق والحريات العامة', NULL, NULL, 1, '2024-01-08 18:35:03', '2024-01-14 11:09:39', 15, 4, NULL),
(15, 1, '4/post-md-4.jpg', 0, 'مواقع-التواصل-الاجتماعي-أهميتها-وعيوبها-وأسس-استخدامها', 'مواقع التواصل الاجتماعي (أهميتها- وعيوبها وأسس استخدامها)', NULL, NULL, 0, '2024-01-08 18:35:42', '2024-01-08 18:35:42', 18, 6, NULL),
(16, 1, '4/post-md-4.jpg', 0, 'اليمنيون-المشاهير-على-منصتي-فيس-بوك-وتويتر-2020م', 'اليمنيون المشاهير على منصتي فيس بوك وتويتر 2020م', NULL, NULL, 0, '2024-01-08 18:36:14', '2024-01-08 18:36:14', 18, 6, NULL),
(17, 1, '4/post-md-4.jpg', 0, 'المركز-المدني-يقيم-ندوة-إشهار-المركز-والذي-ستقام-بالشراكة-مع-مكتب-الثقافة-تعز', 'المركز المدني يقيم ندوة إشهار المركز والذي ستقام بالشراكة مع مكتب الثقافة- تعز', '<h3 class=\"post-title title-lg\"><a href=\"https://civil-center.net/news/1\">المركز المدني يقيم ندوة إشهار المركز والذي ستقام بالشراكة مع مكتب الثقافة- تعز</a></h3>', NULL, 0, '2024-01-08 18:38:38', '2024-01-08 18:38:38', 20, 10, NULL),
(18, 1, '4/post-md-4.jpg', 0, 'المركز-المدني-يفتح-أبوابه-للباحثين-ويعلن-الاستكتتاب-في-عدة-مواضيع-بحثية', 'المركز المدني يفتح أبوابه للباحثين ويعلن الاستكتتاب في عدة مواضيع بحثية', '<h3 class=\"post-title title-lg\"><a href=\"https://civil-center.net/news/5\">المركز المدني يفتح أبوابه للباحثين ويعلن الاستكتتاب في عدة مواضيع بحثية</a></h3>', NULL, 0, '2024-01-08 18:39:06', '2024-01-08 18:39:06', 20, 10, NULL),
(19, 1, '4/post-md-4.jpg', 0, 'المركز-المدني-يهنيء-الدكتور-آدم-الجماعي-حصوله-على-درجة-الدكتوراه-في-الأمن-الفكري', 'المركز المدني يهنيء الدكتور آدم الجماعي حصوله على درجة الدكتوراه في الأمن الفكري', '<h3 class=\"post-title title-lg\"><a href=\"https://civil-center.net/news/7\">المركز المدني يهنيء الدكتور آدم الجماعي حصوله على درجة الدكتوراه في الأمن الفكري</a></h3>', NULL, 0, '2024-01-08 18:39:36', '2024-01-08 18:39:36', 20, 10, NULL),
(20, 1, '4/post-md-4.jpg', 0, 'المركز-المدني-يطلق-موقعه-الإلكتروني', 'المركز المدني يطلق موقعه الإلكتروني', '<h3 class=\"post-title title-lg\"><a href=\"https://civil-center.net/news/4\">المركز المدني يطلق موقعه الإلكتروني</a></h3>', NULL, 0, '2024-01-08 18:40:10', '2024-01-08 18:40:10', 20, 10, NULL),
(21, 1, '4/post-md-4.jpg', 0, 'قريبا-السياسات', 'قريبًا..', '<p>قريبًا..</p>', NULL, 1, '2024-01-09 10:10:40', '2024-01-14 17:38:36', 15, 7, NULL),
(22, 1, '2/الإلحاد-اليمني-لأنور-الخضري-1_page-0001.jpg', 0, 'النوع-الاجتماعي', 'النوع الاجتماعي', '<p><span lang=\"AR-SA\" dir=\"RTL\" style=\"font-size: 14.0pt; line-height: 115%; font-family: \'Traditional Arabic\',serif; mso-fareast-font-family: Calibri; mso-fareast-theme-font: minor-latin; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;\">النوع الاجتماعي </span></p>', 'النوع الاجتماعي', 0, '2024-01-09 15:23:36', '2024-01-09 15:23:39', 20, 5, NULL),
(23, 1, '3/الإلحاد-اليمني-لأنور-الخضري-1_page-0001.jpg', 0, 'ملف-المرأة-اليمنية', 'ملف المرأة اليمنية', '<p>ملف المرأة اليمنية</p>', 'ملف المرأة اليمنية', 0, '2024-01-09 15:25:44', '2024-01-09 15:25:47', 20, 5, NULL),
(24, 1, '5/post-md-4.jpg', 0, 'قريبا-مراجعات-الكتب', 'قريبًا..', NULL, NULL, 0, '2024-01-11 16:31:23', '2024-01-11 16:31:25', 20, 4, NULL),
(25, 1, '6/post-md-4.jpg', 0, 'قريبا-ورقة-عمل-1', 'قريبًا...', NULL, NULL, 0, '2024-01-11 16:33:10', '2024-01-11 16:33:11', 20, 6, NULL),
(26, 1, '7/post-md-4.jpg', 0, 'قريبا-ورقة-عمل-2', 'قريبا ...', NULL, NULL, 2, '2024-01-11 16:33:49', '2024-01-14 15:13:43', 15, 6, 'https://drive.google.com/file/d/16iZSXRty7g7KJ-hUaeSevxilk7LSwwRQ/view?usp=drive_link');

-- --------------------------------------------------------

--
-- Table structure for table `article_comments`
--

CREATE TABLE `article_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `reviewed` tinyint(4) NOT NULL DEFAULT 0,
  `adder_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adder_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `article_tags`
--

CREATE TABLE `article_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tag_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_tags`
--

INSERT INTO `article_tags` (`id`, `article_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, NULL, NULL),
(2, 5, 1, NULL, NULL),
(3, 13, 1, NULL, NULL),
(4, 13, 2, NULL, NULL),
(5, 26, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `block_ips`
--

CREATE TABLE `block_ips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'block',
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `image`, `slug`, `title`, `description`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'research-studies', 'الأبحاث', NULL, NULL, '2023-12-22 04:18:31', '2024-01-04 04:15:22'),
(2, 1, NULL, 'research-articles', 'المقالات البحثية', NULL, NULL, '2024-01-04 04:07:34', '2024-01-04 04:15:13'),
(3, 1, NULL, 'dialogs', 'الحوارات', NULL, NULL, '2024-01-04 04:07:51', '2024-01-04 04:07:51'),
(4, 1, NULL, 'books-reviews', 'مراجعات الكتب', NULL, NULL, '2024-01-04 04:08:41', '2024-01-04 04:08:41'),
(5, 1, NULL, 'books', 'إصدارات المركز', NULL, NULL, '2024-01-04 04:14:49', '2024-01-04 04:14:49'),
(6, 1, NULL, 'worksheets', 'أوراق العمل', NULL, NULL, '2024-01-04 04:16:07', '2024-01-04 04:16:07'),
(7, 1, NULL, 'policy-papers', 'أوراق السياسات', NULL, NULL, '2024-01-04 04:16:23', '2024-01-04 04:16:23'),
(8, 1, NULL, 'translations', 'ترجمات', NULL, NULL, '2024-01-04 04:16:43', '2024-01-04 04:16:43'),
(9, 1, NULL, 'videos', 'مرئيات', NULL, NULL, '2024-01-04 04:16:54', '2024-01-04 04:16:54'),
(10, 1, NULL, 'news', 'الأخبار', NULL, NULL, '2024-01-08 16:04:28', '2024-01-08 16:04:28');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_support_reply` tinyint(4) NOT NULL DEFAULT 0,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_replies`
--

CREATE TABLE `contact_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `contact_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_support_reply` tinyint(4) NOT NULL DEFAULT 0,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `editors`
--

CREATE TABLE `editors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `editors`
--

INSERT INTO `editors` (`id`, `avatar`, `slug`, `name`, `description`, `meta_description`, `created_at`, `updated_at`) VALUES
(10, '8/User-avatar.svg.png', 'خليل-السلمي', 'خليل السلمي', NULL, 'خليل السلمي بكالوريوس هندسة ماجستير إدارة مهتم بتاريخ العلوم الشرعية وتوطين العلوم الاجتماعية (علوم التغيير). مدير البحوث في المركز المدني- تعز. المدير التنفيذي في معهد تك زون- صنعاء. سابقًا. له كتابات في العديد من المواقعِ العربية.', '2024-01-04 06:44:24', '2024-01-14 16:12:18'),
(11, NULL, 'د-أمين-الصانع', 'د. أمين الصانع', NULL, NULL, '2024-01-08 16:08:46', '2024-01-08 16:08:46'),
(12, NULL, 'محمد-العبيدي', 'د. محمد العبيدي', NULL, NULL, '2024-01-08 16:09:25', '2024-01-08 16:09:25'),
(13, NULL, 'عبدالعالم-عقلان', 'د. عبدالعالم عقلان', NULL, NULL, '2024-01-08 16:10:00', '2024-01-08 16:10:00'),
(14, NULL, 'محمد-بن-نايف-الكريمي', 'محمد بن نايف الكريمي', NULL, NULL, '2024-01-08 16:10:34', '2024-01-08 16:10:34'),
(15, NULL, 'محمد-رزق-الشلفي', 'محمد رزق الشلفي', NULL, NULL, '2024-01-08 16:10:52', '2024-01-08 16:10:52'),
(16, NULL, 'محمد-حسين', 'محمد حسين', NULL, NULL, '2024-01-08 16:11:16', '2024-01-08 16:11:16'),
(17, NULL, 'رزق-أحمد-علي', 'رزق أحمد علي', NULL, NULL, '2024-01-08 16:13:31', '2024-01-08 16:13:31'),
(18, '9/HijBHQ2S3OPlvmM1E47c.jpg', 'حمير-الحوري', 'حمير الحوري', NULL, 'كاتب صحفي، مختص إدارة وإعلام، ناشط في مجال الدعوة، مهتم بالإدارة والتنظيم.\r\n\r\nخريج جامعة الأندلس للعلوم والتقنية في مجال الإعلام.', '2024-01-08 18:30:52', '2024-01-14 16:20:06'),
(19, NULL, 'ياسر-الصلوي', 'د. ياسر الصلوي', NULL, NULL, '2024-01-08 18:34:26', '2024-01-08 18:34:26'),
(20, NULL, 'المركز-المدني', 'المركز المدني', NULL, NULL, '2024-01-08 18:36:51', '2024-01-09 15:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(4) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hub_files`
--

CREATE TABLE `hub_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `original_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `used_at` timestamp NULL DEFAULT NULL,
  `getMimeType` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_main` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visibility` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bucket_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_seens`
--

CREATE TABLE `item_seens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `traffic_landing` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domain` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prev_link` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operating_system` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_seens`
--

INSERT INTO `item_seens` (`id`, `user_id`, `ip`, `type`, `type_id`, `traffic_landing`, `domain`, `prev_link`, `agent_name`, `browser`, `device`, `operating_system`, `code`, `country_code`, `country_name`, `created_at`, `updated_at`) VALUES
(1, NULL, '127.0.0.1', 'ARTICLE', 4, NULL, NULL, 'http://127.0.0.1:8001/admin/articles', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Chrome', 'Computer', 'Windows 10', NULL, NULL, NULL, '2024-01-04 08:32:58', '2024-01-04 08:32:58'),
(2, NULL, '127.0.0.1', 'ARTICLE', 13, NULL, NULL, 'http://127.0.0.1:8001/worksheets/%D8%AE%D9%84%D8%A7%D9%8A%D8%A7-%D8%A7%D9%84%D8%AA%D9%81%D9%83%D9%8A%D8%B1-%D8%A7%D9%84%D8%A7%D8%AC%D8%AA%D9%85%D8%A7%D8%B9%D9%8A%D8%A9-%D8%A7%D9%84%D8%BA%D8%A7%D8%A6%D8%A8%D8%A9-%D9%81%D9%8A-%D8%A7%D9%84%D8%AD%D8%A7%D9%84%D8%A9-%D8%A7%D9%84%D9%8A%D9%85%D9%86%D9%8A%D8%A9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Chrome', 'Computer', 'Windows 10', NULL, NULL, NULL, '2024-01-13 05:43:53', '2024-01-13 05:43:53'),
(3, NULL, '127.0.0.1', 'ARTICLE', 26, NULL, NULL, 'http://127.0.0.1:8001/worksheets', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Chrome', 'Computer', 'Windows 10', NULL, NULL, NULL, '2024-01-13 10:47:16', '2024-01-13 10:47:16'),
(4, NULL, '127.0.0.1', 'ARTICLE', 26, NULL, NULL, 'http://127.0.0.1:8001/worksheets', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Chrome', 'Computer', 'Windows 10', NULL, NULL, NULL, '2024-01-14 10:44:00', '2024-01-14 10:44:00'),
(5, NULL, '127.0.0.1', 'ARTICLE', 14, NULL, NULL, 'http://127.0.0.1:8001/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Chrome', 'Computer', 'Windows 10', NULL, NULL, NULL, '2024-01-14 11:09:39', '2024-01-14 11:09:39'),
(6, NULL, '127.0.0.1', 'ARTICLE', 4, NULL, NULL, 'http://127.0.0.1:8001/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Chrome', 'Computer', 'Windows 10', NULL, NULL, NULL, '2024-01-14 15:21:03', '2024-01-14 15:21:03'),
(7, NULL, '127.0.0.1', 'ARTICLE', 13, NULL, NULL, 'http://127.0.0.1:8001/authors/%D8%AD%D9%85%D9%8A%D8%B1-%D8%A7%D9%84%D8%AD%D9%88%D8%B1%D9%8A', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Chrome', 'Computer', 'Windows 10', NULL, NULL, NULL, '2024-01-14 16:21:12', '2024-01-14 16:21:12'),
(8, NULL, '127.0.0.1', 'ARTICLE', 21, NULL, NULL, 'http://127.0.0.1:8001/policy-papers', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Chrome', 'Computer', 'Windows 10', NULL, NULL, NULL, '2024-01-14 17:38:36', '2024-01-14 17:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(2, 'App\\Models\\Article', 22, '8343638e-1953-43f6-95ef-341e56f8800a', 'image', 'الإلحاد اليمني لأنور الخضري-1_page-0001', 'الإلحاد-اليمني-لأنور-الخضري-1_page-0001.jpg', 'image/jpeg', 'local', 'local', 349050, '[]', '[]', '{\"tiny\":true,\"thumb\":true,\"original\":true}', '[]', 1, '2024-01-09 15:23:36', '2024-01-09 15:23:39'),
(3, 'App\\Models\\Article', 23, 'a7b6a105-1f4d-43ca-a404-d3257298911c', 'image', 'الإلحاد اليمني لأنور الخضري-1_page-0001', 'الإلحاد-اليمني-لأنور-الخضري-1_page-0001.jpg', 'image/jpeg', 'local', 'local', 349050, '[]', '[]', '{\"tiny\":true,\"thumb\":true,\"original\":true}', '[]', 1, '2024-01-09 15:25:44', '2024-01-09 15:25:47'),
(4, 'App\\Models\\Article', 21, '52ab62f6-7eb3-4c1e-8d08-c3d70241cf50', 'image', 'post-md-4', 'post-md-4.jpg', 'image/jpeg', 'local', 'local', 1491, '[]', '[]', '{\"tiny\":true,\"thumb\":true,\"original\":true}', '[]', 1, '2024-01-11 16:20:22', '2024-01-11 16:20:23'),
(5, 'App\\Models\\Article', 24, '6d3f8d95-eb7b-4409-a2ef-57759cb93c21', 'image', 'post-md-4', 'post-md-4.jpg', 'image/jpeg', 'local', 'local', 1491, '[]', '[]', '{\"tiny\":true,\"thumb\":true,\"original\":true}', '[]', 1, '2024-01-11 16:31:24', '2024-01-11 16:31:25'),
(6, 'App\\Models\\Article', 25, '16a2d122-35e9-49ed-9804-5e11e13ced00', 'image', 'post-md-4', 'post-md-4.jpg', 'image/jpeg', 'local', 'local', 1491, '[]', '[]', '{\"tiny\":true,\"thumb\":true,\"original\":true}', '[]', 1, '2024-01-11 16:33:10', '2024-01-11 16:33:11'),
(7, 'App\\Models\\Article', 26, '00477395-77b4-49f0-a5d6-6e78f42ddafb', 'image', 'post-md-4', 'post-md-4.jpg', 'image/jpeg', 'local', 'local', 1491, '[]', '[]', '{\"tiny\":true,\"thumb\":true,\"original\":true}', '[]', 1, '2024-01-11 16:33:49', '2024-01-11 16:33:50'),
(8, 'App\\Models\\Editor', 10, '12e397f7-a31f-4b76-b609-5851fa768d8d', 'avatar', 'User-avatar.svg', 'User-avatar.svg.png', 'image/png', 'local', 'local', 4753, '[]', '[]', '{\"tiny\":true,\"thumb\":true,\"original\":true}', '[]', 1, '2024-01-14 16:05:36', '2024-01-14 16:05:38'),
(9, 'App\\Models\\Editor', 18, '56709912-80ee-44ab-9612-8764b193a819', 'avatar', 'HijBHQ2S3OPlvmM1E47c', 'HijBHQ2S3OPlvmM1E47c.jpg', 'image/jpeg', 'local', 'local', 35703, '[]', '[]', '{\"tiny\":true,\"thumb\":true,\"original\":true}', '[]', 1, '2024-01-14 16:20:05', '2024-01-14 16:20:06');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `location`, `created_at`, `updated_at`) VALUES
(1, 'القائمة العلوية', 'NAVBAR', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(2, 'القائمة الجانبية', 'ASIDE_BAR', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(3, 'قائمة الفوتر', 'FOOTER', '2023-12-22 03:50:53', '2023-12-22 03:50:53');

-- --------------------------------------------------------

--
-- Table structure for table `menu_links`
--

CREATE TABLE `menu_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `menu_link_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'CUSTOM_LINK',
  `type_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_links`
--

INSERT INTO `menu_links` (`id`, `menu_id`, `menu_link_id`, `type`, `type_id`, `title`, `url`, `icon`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'CUSTOM_LINK', NULL, 'الرئيسية', 'http://127.0.0.1:8000', 'fal fa-home', 0, NULL, NULL),
(2, 1, NULL, 'CUSTOM_LINK', NULL, 'المدونة', 'http://127.0.0.1:8000/blog', 'fal fa-pen-alt', 1, NULL, NULL),
(3, 1, NULL, 'PAGE', 1, 'شروط الاستخدام', 'http://127.0.0.1:8000/page/terms', 'fal fa-lock', 2, NULL, NULL),
(4, 1, NULL, 'CUSTOM_LINK', NULL, 'تواصل معنا', 'http://127.0.0.1:8000/contact', 'fal fa-phone', 3, NULL, NULL),
(5, 2, NULL, 'CUSTOM_LINK', NULL, 'الرئيسية', 'http://127.0.0.1:8000', 'fal fa-home', 0, NULL, NULL),
(6, 2, NULL, 'CUSTOM_LINK', NULL, 'المدونة', 'http://127.0.0.1:8000/blog', 'fal fa-pen-alt', 1, NULL, NULL),
(7, 2, NULL, 'PAGE', 3, 'معلومات عنا', 'http://127.0.0.1:8000/page/about', 'fal fa-info', 1, NULL, NULL),
(8, 2, NULL, 'PAGE', 1, 'شروط الاستخدام', 'http://127.0.0.1:8000/page/terms', 'fal fa-lock', 2, NULL, NULL),
(9, 2, NULL, 'PAGE', 2, 'سياسة الخصوصية', 'http://127.0.0.1:8000/page/privacy', 'fal fa-info', 3, NULL, NULL),
(10, 2, NULL, 'CUSTOM_LINK', NULL, 'تواصل معنا', 'http://127.0.0.1:8000/contact', 'fal fa-phone', 3, NULL, NULL),
(11, 3, NULL, 'CUSTOM_LINK', NULL, 'الرئيسية', 'http://127.0.0.1:8000', 'fal fa-home', 0, NULL, NULL),
(12, 3, NULL, 'CUSTOM_LINK', NULL, 'المدونة', 'http://127.0.0.1:8000/blog', 'fal fa-pen-alt', 1, NULL, NULL),
(13, 3, NULL, 'PAGE', 1, 'شروط الاستخدام', 'http://127.0.0.1:8000/page/terms', 'fal fa-lock', 2, NULL, NULL),
(14, 3, NULL, 'CUSTOM_LINK', NULL, 'تواصل معنا', 'http://127.0.0.1:8000/contact', 'fal fa-phone', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2004_08_23_114302_create_tags_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_01_25_153606_create_sessions_table', 1),
(7, '2021_02_03_160753_create_block_ips_table', 1),
(8, '2021_02_06_024504_create_under_attacks_table', 1),
(9, '2021_02_10_074856_create_report_errors_table', 1),
(10, '2021_02_14_125240_create_notifications_table', 1),
(11, '2021_10_30_101814_create_jobs_table', 1),
(12, '2021_11_05_122341_create_hub_files_table', 1),
(13, '2021_11_14_161804_create_settings_table', 1),
(14, '2021_11_14_161805_create_rate_limits_table', 1),
(15, '2021_11_15_103143_create_rate_limit_details_table', 1),
(16, '2021_11_16_115821_create_categories_table', 1),
(17, '2021_11_16_115834_create_articles_table', 1),
(18, '2021_11_16_115903_create_contacts_table', 1),
(19, '2021_11_16_115949_create_redirections_table', 1),
(20, '2022_03_17_141301_create_item_seens_table', 1),
(21, '2022_03_17_142610_create_faqs_table', 1),
(22, '2022_04_11_131131_create_pages_table', 1),
(23, '2022_04_11_131158_create_menus_table', 1),
(24, '2022_04_11_131350_create_article_categories_table', 1),
(25, '2022_04_11_131731_create_menu_links_table', 1),
(26, '2022_04_27_173052_create_announcements_table', 1),
(27, '2022_04_27_173108_create_contact_replies_table', 1),
(28, '2022_10_12_163027_create_article_tags_table', 1),
(29, '2022_10_13_144722_create_article_comments_table', 1),
(30, '2022_12_12_161211_create_permission_tables', 1),
(31, '2022_12_25_013617_create_media_table', 1),
(32, '2022_12_25_043956_create_temp_files_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `removable` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `user_id`, `title`, `title_en`, `slug`, `image`, `description`, `meta_description`, `removable`, `created_at`, `updated_at`) VALUES
(1, 1, 'آلية الاستكتاب', 'terms', 'آلية-الاستكتاب', NULL, NULL, NULL, 0, '2023-12-22 03:50:53', '2024-01-04 08:44:35'),
(2, 1, 'سياسة النشر', 'policy', 'سياسة-النشر', NULL, NULL, NULL, 0, '2023-12-22 03:50:53', '2024-01-04 08:44:06'),
(3, 1, 'من نحن', 'about', 'عن-المركز', NULL, '<p><span>هو مركز يمني متخصص في إعداد الدراسات والبحوث، يعمل على إثراء ومعالجة الظواهر الاجتماعية والفكرية وكل ما يتصل بالإصلاح الثقافي العام من خلال استكتاب الباحثين والكتّاب المتخصصين، وفق رؤية واضحة تسعى لملئ مساحة الفراغ اليمني في مجال إنتاج الدراسات المعبرة عن المشكلات اليمنية بعيدًا عن الاستقطاب السياسي والجهوي والفكري والذي أصبح سمة ملازمة للفاعلين في صناعة الرأي العام اليمني....</span></p>', NULL, 0, '2023-12-22 03:50:53', '2024-01-14 16:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `table`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'web', 'users', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(2, 'users-read', 'web', 'users', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(3, 'users-update', 'web', 'users', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(4, 'users-delete', 'web', 'users', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(5, 'admin-analytics-read', 'web', 'admin-analytics', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(6, 'announcements-create', 'web', 'announcements', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(7, 'announcements-read', 'web', 'announcements', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(8, 'announcements-update', 'web', 'announcements', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(9, 'announcements-delete', 'web', 'announcements', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(10, 'comments-create', 'web', 'comments', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(11, 'comments-read', 'web', 'comments', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(12, 'comments-update', 'web', 'comments', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(13, 'comments-delete', 'web', 'comments', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(14, 'user-roles-read', 'web', 'user-roles', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(15, 'user-roles-update', 'web', 'user-roles', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(16, 'roles-create', 'web', 'roles', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(17, 'roles-read', 'web', 'roles', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(18, 'roles-update', 'web', 'roles', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(19, 'roles-delete', 'web', 'roles', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(20, 'tags-create', 'web', 'tags', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(21, 'tags-read', 'web', 'tags', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(22, 'tags-update', 'web', 'tags', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(23, 'tags-delete', 'web', 'tags', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(24, 'plugins-create', 'web', 'plugins', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(25, 'plugins-read', 'web', 'plugins', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(26, 'plugins-update', 'web', 'plugins', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(27, 'plugins-delete', 'web', 'plugins', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(28, 'notifications-create', 'web', 'notifications', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(29, 'notifications-read', 'web', 'notifications', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(30, 'notifications-update', 'web', 'notifications', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(31, 'notifications-delete', 'web', 'notifications', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(32, 'error-reports-create', 'web', 'error-reports', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(33, 'error-reports-read', 'web', 'error-reports', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(34, 'error-reports-update', 'web', 'error-reports', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(35, 'error-reports-delete', 'web', 'error-reports', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(36, 'articles-create', 'web', 'articles', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(37, 'articles-read', 'web', 'articles', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(38, 'articles-update', 'web', 'articles', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(39, 'articles-delete', 'web', 'articles', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(40, 'categories-create', 'web', 'categories', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(41, 'categories-read', 'web', 'categories', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(42, 'categories-update', 'web', 'categories', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(43, 'categories-delete', 'web', 'categories', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(44, 'contacts-create', 'web', 'contacts', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(45, 'contacts-read', 'web', 'contacts', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(46, 'contacts-update', 'web', 'contacts', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(47, 'contacts-delete', 'web', 'contacts', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(48, 'faqs-create', 'web', 'faqs', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(49, 'faqs-read', 'web', 'faqs', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(50, 'faqs-update', 'web', 'faqs', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(51, 'faqs-delete', 'web', 'faqs', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(52, 'menu-links-create', 'web', 'menu-links', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(53, 'menu-links-read', 'web', 'menu-links', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(54, 'menu-links-update', 'web', 'menu-links', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(55, 'menu-links-delete', 'web', 'menu-links', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(56, 'menus-create', 'web', 'menus', '2023-12-22 03:50:54', '2023-12-22 03:50:54'),
(57, 'menus-read', 'web', 'menus', '2023-12-22 03:50:54', '2023-12-22 03:50:54'),
(58, 'menus-update', 'web', 'menus', '2023-12-22 03:50:54', '2023-12-22 03:50:54'),
(59, 'menus-delete', 'web', 'menus', '2023-12-22 03:50:54', '2023-12-22 03:50:54'),
(60, 'pages-create', 'web', 'pages', '2023-12-22 03:50:54', '2023-12-22 03:50:54'),
(61, 'pages-read', 'web', 'pages', '2023-12-22 03:50:54', '2023-12-22 03:50:54'),
(62, 'pages-update', 'web', 'pages', '2023-12-22 03:50:54', '2023-12-22 03:50:54'),
(63, 'pages-delete', 'web', 'pages', '2023-12-22 03:50:54', '2023-12-22 03:50:54'),
(64, 'redirections-create', 'web', 'redirections', '2023-12-22 03:50:54', '2023-12-22 03:50:54'),
(65, 'redirections-read', 'web', 'redirections', '2023-12-22 03:50:54', '2023-12-22 03:50:54'),
(66, 'redirections-update', 'web', 'redirections', '2023-12-22 03:50:54', '2023-12-22 03:50:54'),
(67, 'redirections-delete', 'web', 'redirections', '2023-12-22 03:50:54', '2023-12-22 03:50:54'),
(68, 'hub-files-create', 'web', 'hub-files', '2023-12-22 03:50:54', '2023-12-22 03:50:54'),
(69, 'hub-files-read', 'web', 'hub-files', '2023-12-22 03:50:54', '2023-12-22 03:50:54'),
(70, 'hub-files-update', 'web', 'hub-files', '2023-12-22 03:50:54', '2023-12-22 03:50:54'),
(71, 'hub-files-delete', 'web', 'hub-files', '2023-12-22 03:50:54', '2023-12-22 03:50:54'),
(72, 'settings-update', 'web', 'settings', '2023-12-22 03:50:54', '2023-12-22 03:50:54'),
(73, 'traffics-create', 'web', 'traffics', '2023-12-22 03:50:54', '2023-12-22 03:50:54'),
(74, 'traffics-read', 'web', 'traffics', '2023-12-22 03:50:54', '2023-12-22 03:50:54'),
(75, 'traffics-update', 'web', 'traffics', '2023-12-22 03:50:54', '2023-12-22 03:50:54'),
(76, 'traffics-delete', 'web', 'traffics', '2023-12-22 03:50:54', '2023-12-22 03:50:54'),
(77, 'profile-read', 'web', 'profile', '2023-12-22 03:50:54', '2023-12-22 03:50:54'),
(78, 'profile-update', 'web', 'profile', '2023-12-22 03:50:54', '2023-12-22 03:50:54'),
(79, 'editors-create', 'web', 'editors', '2024-01-04 07:56:35', '2024-01-04 07:56:35'),
(80, 'editors-read', 'web', 'editors', '2024-01-04 07:58:55', '2024-01-03 21:00:00'),
(81, 'editors-update', 'web', 'editors', '2024-01-04 07:57:39', '2024-01-04 07:57:39'),
(82, 'editors-delete', 'web', 'editors', '2024-01-04 09:04:16', '2024-01-04 09:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rate_limits`
--

CREATE TABLE `rate_limits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `traffic_landing` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domain` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prev_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operating_system` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `query` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rate_limits`
--

INSERT INTO `rate_limits` (`id`, `user_id`, `traffic_landing`, `domain`, `prev_link`, `ip`, `agent_name`, `browser`, `device`, `operating_system`, `code`, `country_code`, `country_name`, `query`, `note`, `created_at`, `updated_at`) VALUES
(1, NULL, 'http://127.0.0.1:8000', '127.0.0.1', 'http://127.0.0.1:8000', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'Chrome', 'Computer', 'Windows 10', NULL, NULL, NULL, NULL, NULL, '2023-12-22 03:51:51', '2023-12-22 03:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `rate_limit_details`
--

CREATE TABLE `rate_limit_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rate_limit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `query` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rate_limit_details`
--

INSERT INTO `rate_limit_details` (`id`, `user_id`, `rate_limit_id`, `query`, `url`, `ip`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, NULL, 'http://127.0.0.1:8000', '127.0.0.1', '2023-12-22 03:51:51', '2023-12-22 03:51:51'),
(2, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 03:51:53', '2023-12-22 03:51:53'),
(3, NULL, 1, NULL, 'http://127.0.0.1:8000/login', '127.0.0.1', '2023-12-22 03:52:16', '2023-12-22 03:52:16'),
(4, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 03:52:17', '2023-12-22 03:52:17'),
(5, NULL, 1, NULL, 'http://127.0.0.1:8000/login', '127.0.0.1', '2023-12-22 03:52:42', '2023-12-22 03:52:42'),
(6, 1, 1, NULL, 'http://127.0.0.1:8000/admin', '127.0.0.1', '2023-12-22 03:52:43', '2023-12-22 03:52:43'),
(7, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 03:52:46', '2023-12-22 03:52:46'),
(8, 1, 1, NULL, 'http://127.0.0.1:8000/admin/tags', '127.0.0.1', '2023-12-22 03:53:06', '2023-12-22 03:53:06'),
(9, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 03:53:08', '2023-12-22 03:53:08'),
(10, 1, 1, NULL, 'http://127.0.0.1:8000/admin/categories', '127.0.0.1', '2023-12-22 04:14:17', '2023-12-22 04:14:17'),
(11, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 04:14:18', '2023-12-22 04:14:18'),
(12, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2023-12-22 04:14:20', '2023-12-22 04:14:20'),
(13, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 04:14:21', '2023-12-22 04:14:21'),
(14, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/create', '127.0.0.1', '2023-12-22 04:14:24', '2023-12-22 04:14:24'),
(15, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 04:14:25', '2023-12-22 04:14:25'),
(16, 1, 1, NULL, 'http://127.0.0.1:8000/admin/categories', '127.0.0.1', '2023-12-22 04:18:12', '2023-12-22 04:18:12'),
(17, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 04:18:13', '2023-12-22 04:18:13'),
(18, 1, 1, NULL, 'http://127.0.0.1:8000/admin/categories/create', '127.0.0.1', '2023-12-22 04:18:15', '2023-12-22 04:18:15'),
(19, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 04:18:17', '2023-12-22 04:18:17'),
(20, 1, 1, NULL, 'http://127.0.0.1:8000/admin/categories', '127.0.0.1', '2023-12-22 04:18:31', '2023-12-22 04:18:31'),
(21, 1, 1, NULL, 'http://127.0.0.1:8000/admin/categories', '127.0.0.1', '2023-12-22 04:18:31', '2023-12-22 04:18:31'),
(22, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 04:18:33', '2023-12-22 04:18:33'),
(23, 1, 1, NULL, 'http://127.0.0.1:8000/admin/categories/%D8%AA%D8%AC%D8%B1%D8%A8%D8%A9/edit', '127.0.0.1', '2023-12-22 04:18:39', '2023-12-22 04:18:39'),
(24, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 04:18:41', '2023-12-22 04:18:41'),
(25, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 04:18:48', '2023-12-22 04:18:48'),
(26, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/create', '127.0.0.1', '2023-12-22 04:19:22', '2023-12-22 04:19:22'),
(27, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 04:19:24', '2023-12-22 04:19:24'),
(28, 1, 1, NULL, 'http://127.0.0.1:8000/admin', '127.0.0.1', '2023-12-22 04:19:55', '2023-12-22 04:19:55'),
(29, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 04:19:57', '2023-12-22 04:19:57'),
(30, 1, 1, NULL, 'http://127.0.0.1:8000/admin/roles', '127.0.0.1', '2023-12-22 04:20:02', '2023-12-22 04:20:02'),
(31, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 04:20:04', '2023-12-22 04:20:04'),
(32, 1, 1, NULL, 'http://127.0.0.1:8000/admin/plugins', '127.0.0.1', '2023-12-22 04:20:06', '2023-12-22 04:20:06'),
(33, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 04:20:07', '2023-12-22 04:20:07'),
(34, 1, 1, NULL, 'http://127.0.0.1:8000/admin/plugins/create', '127.0.0.1', '2023-12-22 04:20:16', '2023-12-22 04:20:16'),
(35, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 04:20:17', '2023-12-22 04:20:17'),
(36, 1, 1, NULL, 'http://127.0.0.1:8000', '127.0.0.1', '2023-12-22 05:26:16', '2023-12-22 05:26:16'),
(37, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:26:17', '2023-12-22 05:26:17'),
(38, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:26:23', '2023-12-22 05:26:23'),
(39, 1, 1, NULL, 'http://127.0.0.1:8000/admin', '127.0.0.1', '2023-12-22 05:26:23', '2023-12-22 05:26:23'),
(40, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:26:25', '2023-12-22 05:26:25'),
(41, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2023-12-22 05:26:29', '2023-12-22 05:26:29'),
(42, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:26:30', '2023-12-22 05:26:30'),
(43, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/create', '127.0.0.1', '2023-12-22 05:26:34', '2023-12-22 05:26:34'),
(44, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:26:35', '2023-12-22 05:26:35'),
(45, 1, 1, NULL, 'http://127.0.0.1:8000/admin/redirections', '127.0.0.1', '2023-12-22 05:26:49', '2023-12-22 05:26:49'),
(46, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:26:50', '2023-12-22 05:26:50'),
(47, 1, 1, NULL, 'http://127.0.0.1:8000/admin/redirections/create', '127.0.0.1', '2023-12-22 05:26:55', '2023-12-22 05:26:55'),
(48, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:26:56', '2023-12-22 05:26:56'),
(49, 1, 1, NULL, 'http://127.0.0.1:8000/admin/faqs', '127.0.0.1', '2023-12-22 05:27:03', '2023-12-22 05:27:03'),
(50, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:27:05', '2023-12-22 05:27:05'),
(51, 1, 1, NULL, 'http://127.0.0.1:8000/admin/menus', '127.0.0.1', '2023-12-22 05:27:08', '2023-12-22 05:27:08'),
(52, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:27:09', '2023-12-22 05:27:09'),
(53, 1, 1, NULL, 'http://127.0.0.1:8000/admin/menu-links?menu_id=3', '127.0.0.1', '2023-12-22 05:27:15', '2023-12-22 05:27:15'),
(54, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:27:16', '2023-12-22 05:27:16'),
(55, 1, 1, NULL, 'http://127.0.0.1:8000/admin/pages', '127.0.0.1', '2023-12-22 05:27:30', '2023-12-22 05:27:30'),
(56, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:27:31', '2023-12-22 05:27:31'),
(57, 1, 1, NULL, 'http://127.0.0.1:8000/admin/announcements', '127.0.0.1', '2023-12-22 05:27:37', '2023-12-22 05:27:37'),
(58, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:27:38', '2023-12-22 05:27:38'),
(59, 1, 1, NULL, 'http://127.0.0.1:8000/admin/article-comments', '127.0.0.1', '2023-12-22 05:27:40', '2023-12-22 05:27:40'),
(60, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:27:42', '2023-12-22 05:27:42'),
(61, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2023-12-22 05:27:49', '2023-12-22 05:27:49'),
(62, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:27:50', '2023-12-22 05:27:50'),
(63, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/create', '127.0.0.1', '2023-12-22 05:28:03', '2023-12-22 05:28:03'),
(64, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:28:05', '2023-12-22 05:28:05'),
(65, 1, 1, NULL, 'http://127.0.0.1:8000/admin/users', '127.0.0.1', '2023-12-22 05:29:01', '2023-12-22 05:29:01'),
(66, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:29:02', '2023-12-22 05:29:02'),
(67, 1, 1, NULL, 'http://127.0.0.1:8000/admin/users/1', '127.0.0.1', '2023-12-22 05:29:12', '2023-12-22 05:29:12'),
(68, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:29:13', '2023-12-22 05:29:13'),
(69, 1, 1, NULL, 'http://127.0.0.1:8000/admin/error-reports', '127.0.0.1', '2023-12-22 05:29:24', '2023-12-22 05:29:24'),
(70, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:29:25', '2023-12-22 05:29:25'),
(71, 1, 1, NULL, 'http://127.0.0.1:8000/admin', '127.0.0.1', '2023-12-22 05:29:30', '2023-12-22 05:29:30'),
(72, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:29:32', '2023-12-22 05:29:32'),
(73, 1, 1, NULL, 'http://127.0.0.1:8000/admin/roles', '127.0.0.1', '2023-12-22 05:29:57', '2023-12-22 05:29:57'),
(74, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:29:58', '2023-12-22 05:29:58'),
(75, 1, 1, NULL, 'http://127.0.0.1:8000/admin/roles/5/edit', '127.0.0.1', '2023-12-22 05:30:04', '2023-12-22 05:30:04'),
(76, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:30:05', '2023-12-22 05:30:05'),
(77, 1, 1, NULL, 'http://127.0.0.1:8000/admin/roles', '127.0.0.1', '2023-12-22 05:30:19', '2023-12-22 05:30:19'),
(78, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:30:20', '2023-12-22 05:30:20'),
(79, 1, 1, NULL, 'http://127.0.0.1:8000/admin', '127.0.0.1', '2023-12-22 05:30:26', '2023-12-22 05:30:26'),
(80, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:30:29', '2023-12-22 05:30:29'),
(81, 1, 1, NULL, 'http://127.0.0.1:8000', '127.0.0.1', '2023-12-22 05:30:29', '2023-12-22 05:30:29'),
(82, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:30:31', '2023-12-22 05:30:31'),
(83, 1, 1, NULL, 'http://127.0.0.1:8000', '127.0.0.1', '2023-12-22 05:30:35', '2023-12-22 05:30:35'),
(84, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:30:36', '2023-12-22 05:30:36'),
(85, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:30:56', '2023-12-22 05:30:56'),
(86, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:31:09', '2023-12-22 05:31:09'),
(87, 1, 1, NULL, 'http://127.0.0.1:8000', '127.0.0.1', '2023-12-22 05:31:09', '2023-12-22 05:31:09'),
(88, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:31:11', '2023-12-22 05:31:11'),
(89, 1, 1, NULL, 'http://127.0.0.1:8000', '127.0.0.1', '2023-12-22 05:31:15', '2023-12-22 05:31:15'),
(90, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:31:17', '2023-12-22 05:31:17'),
(91, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:31:20', '2023-12-22 05:31:20'),
(92, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:31:21', '2023-12-22 05:31:21'),
(93, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:31:23', '2023-12-22 05:31:23'),
(94, 1, 1, NULL, 'http://127.0.0.1:8000/robots.txt', '127.0.0.1', '2023-12-22 05:31:26', '2023-12-22 05:31:26'),
(95, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:31:31', '2023-12-22 05:31:31'),
(96, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:31:32', '2023-12-22 05:31:32'),
(97, 1, 1, NULL, 'http://127.0.0.1:8000', '127.0.0.1', '2023-12-22 05:31:34', '2023-12-22 05:31:34'),
(98, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2023-12-22 05:31:35', '2023-12-22 05:31:35'),
(99, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:32:00', '2023-12-22 05:32:00'),
(100, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:32:25', '2023-12-22 05:32:25'),
(101, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:32:50', '2023-12-22 05:32:50'),
(102, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:33:15', '2023-12-22 05:33:15'),
(103, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:33:40', '2023-12-22 05:33:40'),
(104, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:34:05', '2023-12-22 05:34:05'),
(105, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:34:30', '2023-12-22 05:34:30'),
(106, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:34:55', '2023-12-22 05:34:55'),
(107, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:35:20', '2023-12-22 05:35:20'),
(108, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:35:45', '2023-12-22 05:35:45'),
(109, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:36:10', '2023-12-22 05:36:10'),
(110, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:36:35', '2023-12-22 05:36:35'),
(111, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:37:00', '2023-12-22 05:37:00'),
(112, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:38:48', '2023-12-22 05:38:48'),
(113, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:40:47', '2023-12-22 05:40:47'),
(114, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:42:47', '2023-12-22 05:42:47'),
(115, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:44:47', '2023-12-22 05:44:47'),
(116, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:46:48', '2023-12-22 05:46:48'),
(117, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:48:47', '2023-12-22 05:48:47'),
(118, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:49:47', '2023-12-22 05:49:47'),
(119, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:51:47', '2023-12-22 05:51:47'),
(120, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:53:48', '2023-12-22 05:53:48'),
(121, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:55:47', '2023-12-22 05:55:47'),
(122, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 05:57:48', '2023-12-22 05:57:48'),
(123, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 08:32:42', '2023-12-22 08:32:42'),
(124, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 08:32:43', '2023-12-22 08:32:43'),
(125, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 08:32:52', '2023-12-22 08:32:52'),
(126, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 08:33:40', '2023-12-22 08:33:40'),
(127, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 08:35:39', '2023-12-22 08:35:39'),
(128, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 08:36:57', '2023-12-22 08:36:57'),
(129, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 08:37:57', '2023-12-22 08:37:57'),
(130, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 08:38:57', '2023-12-22 08:38:57'),
(131, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 08:39:58', '2023-12-22 08:39:58'),
(132, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 08:40:59', '2023-12-22 08:40:59'),
(133, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 08:42:39', '2023-12-22 08:42:39'),
(134, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 08:44:39', '2023-12-22 08:44:39'),
(135, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 08:45:40', '2023-12-22 08:45:40'),
(136, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 08:47:39', '2023-12-22 08:47:39'),
(137, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 09:39:36', '2023-12-22 09:39:36'),
(138, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 09:39:52', '2023-12-22 09:39:52'),
(139, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 09:40:35', '2023-12-22 09:40:35'),
(140, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 09:42:31', '2023-12-22 09:42:31'),
(141, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 09:43:31', '2023-12-22 09:43:31'),
(142, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 09:45:31', '2023-12-22 09:45:31'),
(143, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 09:46:31', '2023-12-22 09:46:31'),
(144, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 09:47:31', '2023-12-22 09:47:31'),
(145, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 09:49:31', '2023-12-22 09:49:31'),
(146, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 09:50:33', '2023-12-22 09:50:33'),
(147, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 09:52:31', '2023-12-22 09:52:31'),
(148, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 09:53:31', '2023-12-22 09:53:31'),
(149, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 09:55:31', '2023-12-22 09:55:31'),
(150, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 09:55:43', '2023-12-22 09:55:43'),
(151, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 09:56:32', '2023-12-22 09:56:32'),
(152, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 09:56:33', '2023-12-22 09:56:33'),
(153, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 09:56:59', '2023-12-22 09:56:59'),
(154, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 09:57:08', '2023-12-22 09:57:08'),
(155, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 09:57:16', '2023-12-22 09:57:16'),
(156, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 09:57:33', '2023-12-22 09:57:33'),
(157, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 09:58:33', '2023-12-22 09:58:33'),
(158, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 09:59:33', '2023-12-22 09:59:33'),
(159, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 10:00:54', '2023-12-22 10:00:54'),
(160, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 10:01:54', '2023-12-22 10:01:54'),
(161, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 10:02:54', '2023-12-22 10:02:54'),
(162, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 10:03:55', '2023-12-22 10:03:55'),
(163, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 10:04:55', '2023-12-22 10:04:55'),
(164, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 10:06:31', '2023-12-22 10:06:31'),
(165, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 10:06:38', '2023-12-22 10:06:38'),
(166, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 10:07:31', '2023-12-22 10:07:31'),
(167, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 10:09:31', '2023-12-22 10:09:31'),
(168, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 10:11:31', '2023-12-22 10:11:31'),
(169, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 10:12:31', '2023-12-22 10:12:31'),
(170, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 10:14:31', '2023-12-22 10:14:31'),
(171, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 10:16:31', '2023-12-22 10:16:31'),
(172, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 10:17:31', '2023-12-22 10:17:31'),
(173, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 10:19:31', '2023-12-22 10:19:31'),
(174, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 10:20:31', '2023-12-22 10:20:31'),
(175, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 10:22:31', '2023-12-22 10:22:31'),
(176, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 10:24:31', '2023-12-22 10:24:31'),
(177, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 10:26:31', '2023-12-22 10:26:31'),
(178, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 10:27:31', '2023-12-22 10:27:31'),
(179, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 10:29:31', '2023-12-22 10:29:31'),
(180, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 10:31:31', '2023-12-22 10:31:31'),
(181, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 10:32:31', '2023-12-22 10:32:31'),
(182, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 10:33:31', '2023-12-22 10:33:31'),
(183, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 10:35:31', '2023-12-22 10:35:31'),
(184, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 10:37:31', '2023-12-22 10:37:31'),
(185, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2023-12-22 10:39:31', '2023-12-22 10:39:31'),
(186, 1, 1, NULL, 'http://127.0.0.1:8001', '127.0.0.1', '2024-01-04 04:05:27', '2024-01-04 04:05:27'),
(187, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:05:29', '2024-01-04 04:05:29'),
(188, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:05:29', '2024-01-04 04:05:29'),
(189, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:05:33', '2024-01-04 04:05:33'),
(190, 1, 1, NULL, 'http://127.0.0.1:8001/admin', '127.0.0.1', '2024-01-04 04:05:33', '2024-01-04 04:05:33'),
(191, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-04 04:05:42', '2024-01-04 04:05:42'),
(192, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 04:05:46', '2024-01-04 04:05:46'),
(193, 1, 1, NULL, 'http://127.0.0.1:8001/admin/article-comments', '127.0.0.1', '2024-01-04 04:05:49', '2024-01-04 04:05:49'),
(194, 1, 1, NULL, 'http://127.0.0.1:8001/admin/tags', '127.0.0.1', '2024-01-04 04:05:54', '2024-01-04 04:05:54'),
(195, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-04 04:05:56', '2024-01-04 04:05:56'),
(196, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories/%D8%AA%D8%AC%D8%B1%D8%A8%D8%A9/edit', '127.0.0.1', '2024-01-04 04:06:01', '2024-01-04 04:06:01'),
(197, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories/%D8%AA%D8%AC%D8%B1%D8%A8%D8%A9', '127.0.0.1', '2024-01-04 04:06:30', '2024-01-04 04:06:30'),
(198, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-04 04:06:30', '2024-01-04 04:06:30'),
(199, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories/create', '127.0.0.1', '2024-01-04 04:06:39', '2024-01-04 04:06:39'),
(200, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories/%D8%A7%D9%84%D8%A3%D8%A8%D8%AD%D8%A7%D8%AB/edit', '127.0.0.1', '2024-01-04 04:06:47', '2024-01-04 04:06:47'),
(201, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories/%D8%A7%D9%84%D8%A3%D8%A8%D8%AD%D8%A7%D8%AB', '127.0.0.1', '2024-01-04 04:07:02', '2024-01-04 04:07:02'),
(202, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-04 04:07:03', '2024-01-04 04:07:03'),
(203, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories/create', '127.0.0.1', '2024-01-04 04:07:05', '2024-01-04 04:07:05'),
(204, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-04 04:07:34', '2024-01-04 04:07:34'),
(205, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-04 04:07:34', '2024-01-04 04:07:34'),
(206, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories/create', '127.0.0.1', '2024-01-04 04:07:36', '2024-01-04 04:07:36'),
(207, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-04 04:07:51', '2024-01-04 04:07:51'),
(208, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-04 04:07:52', '2024-01-04 04:07:52'),
(209, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories/create', '127.0.0.1', '2024-01-04 04:07:56', '2024-01-04 04:07:56'),
(210, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-04 04:08:41', '2024-01-04 04:08:41'),
(211, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-04 04:08:41', '2024-01-04 04:08:41'),
(212, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories/create', '127.0.0.1', '2024-01-04 04:08:43', '2024-01-04 04:08:43'),
(213, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-04 04:14:49', '2024-01-04 04:14:49'),
(214, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-04 04:14:49', '2024-01-04 04:14:49'),
(215, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories/%D9%85%D8%B1%D8%A7%D8%AC%D8%B9%D8%A7%D8%AA-%D8%A7%D9%84%D9%83%D8%AA%D8%A8/edit', '127.0.0.1', '2024-01-04 04:14:53', '2024-01-04 04:14:53'),
(216, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories/article/edit', '127.0.0.1', '2024-01-04 04:15:03', '2024-01-04 04:15:03'),
(217, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories/article', '127.0.0.1', '2024-01-04 04:15:13', '2024-01-04 04:15:13'),
(218, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-04 04:15:14', '2024-01-04 04:15:14'),
(219, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories/research/edit', '127.0.0.1', '2024-01-04 04:15:16', '2024-01-04 04:15:16'),
(220, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories/research', '127.0.0.1', '2024-01-04 04:15:22', '2024-01-04 04:15:22'),
(221, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-04 04:15:23', '2024-01-04 04:15:23'),
(222, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories/create', '127.0.0.1', '2024-01-04 04:15:37', '2024-01-04 04:15:37'),
(223, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-04 04:16:07', '2024-01-04 04:16:07'),
(224, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-04 04:16:07', '2024-01-04 04:16:07'),
(225, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories/create', '127.0.0.1', '2024-01-04 04:16:11', '2024-01-04 04:16:11'),
(226, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-04 04:16:23', '2024-01-04 04:16:23'),
(227, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-04 04:16:23', '2024-01-04 04:16:23'),
(228, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories/create', '127.0.0.1', '2024-01-04 04:16:34', '2024-01-04 04:16:34'),
(229, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-04 04:16:43', '2024-01-04 04:16:43'),
(230, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-04 04:16:43', '2024-01-04 04:16:43'),
(231, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories/create', '127.0.0.1', '2024-01-04 04:16:46', '2024-01-04 04:16:46'),
(232, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-04 04:16:54', '2024-01-04 04:16:54'),
(233, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-04 04:16:54', '2024-01-04 04:16:54'),
(234, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 04:17:16', '2024-01-04 04:17:16'),
(235, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-04 04:17:19', '2024-01-04 04:17:19'),
(236, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 04:18:03', '2024-01-04 04:18:03'),
(237, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 04:18:03', '2024-01-04 04:18:03'),
(238, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/%D9%82%D8%B1%D9%8A%D8%A8%D8%A7/edit', '127.0.0.1', '2024-01-04 04:18:06', '2024-01-04 04:18:06'),
(239, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/%D9%82%D8%B1%D9%8A%D8%A8%D8%A7', '127.0.0.1', '2024-01-04 04:19:19', '2024-01-04 04:19:19'),
(240, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 04:19:20', '2024-01-04 04:19:20'),
(241, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-04 04:19:27', '2024-01-04 04:19:27'),
(242, 1, 1, NULL, 'http://127.0.0.1:8001/admin/tags', '127.0.0.1', '2024-01-04 04:19:38', '2024-01-04 04:19:38'),
(243, 1, 1, NULL, 'http://127.0.0.1:8001/admin/tags/create', '127.0.0.1', '2024-01-04 04:19:43', '2024-01-04 04:19:43'),
(244, 1, 1, NULL, 'http://127.0.0.1:8001/admin', '127.0.0.1', '2024-01-04 04:20:18', '2024-01-04 04:20:18'),
(245, 1, 1, NULL, 'http://127.0.0.1:8001', '127.0.0.1', '2024-01-04 04:20:24', '2024-01-04 04:20:24'),
(246, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:21:11', '2024-01-04 04:21:11'),
(247, 1, 1, NULL, 'http://127.0.0.1:8001/admin/tags', '127.0.0.1', '2024-01-04 04:21:26', '2024-01-04 04:21:26'),
(248, 1, 1, NULL, 'http://127.0.0.1:8001/admin/tags', '127.0.0.1', '2024-01-04 04:21:26', '2024-01-04 04:21:26'),
(249, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 04:21:31', '2024-01-04 04:21:31'),
(250, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-04 04:21:34', '2024-01-04 04:21:34'),
(251, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:21:46', '2024-01-04 04:21:46'),
(252, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:22:12', '2024-01-04 04:22:12'),
(253, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:23:09', '2024-01-04 04:23:09'),
(254, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:23:13', '2024-01-04 04:23:13'),
(255, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:24:14', '2024-01-04 04:24:14'),
(256, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:24:16', '2024-01-04 04:24:16'),
(257, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:24:18', '2024-01-04 04:24:18'),
(258, 1, 1, NULL, 'http://127.0.0.1:8001/admin/tags', '127.0.0.1', '2024-01-04 04:24:21', '2024-01-04 04:24:21'),
(259, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:25:14', '2024-01-04 04:25:14'),
(260, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:26:37', '2024-01-04 04:26:37'),
(261, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:27:37', '2024-01-04 04:27:37'),
(262, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:29:37', '2024-01-04 04:29:37'),
(263, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:31:37', '2024-01-04 04:31:37'),
(264, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:32:37', '2024-01-04 04:32:37'),
(265, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:34:37', '2024-01-04 04:34:37'),
(266, 1, 1, NULL, 'http://127.0.0.1:8001/admin/tags', '127.0.0.1', '2024-01-04 04:35:16', '2024-01-04 04:35:16'),
(267, 1, 1, NULL, 'http://127.0.0.1:8001/admin/tags/create', '127.0.0.1', '2024-01-04 04:35:19', '2024-01-04 04:35:19'),
(268, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:35:37', '2024-01-04 04:35:37'),
(269, 1, 1, NULL, 'http://127.0.0.1:8001/admin/tags', '127.0.0.1', '2024-01-04 04:36:22', '2024-01-04 04:36:22'),
(270, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:36:37', '2024-01-04 04:36:37'),
(271, 1, 1, NULL, 'http://127.0.0.1:8001/admin/tags/create', '127.0.0.1', '2024-01-04 04:36:49', '2024-01-04 04:36:49'),
(272, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:38:37', '2024-01-04 04:38:37'),
(273, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:39:18', '2024-01-04 04:39:18'),
(274, 1, 1, NULL, 'http://127.0.0.1:8001/admin/tags/create', '127.0.0.1', '2024-01-04 04:39:20', '2024-01-04 04:39:20'),
(275, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:39:37', '2024-01-04 04:39:37'),
(276, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-04 04:39:55', '2024-01-04 04:39:55'),
(277, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 04:40:08', '2024-01-04 04:40:08'),
(278, 1, 1, NULL, 'http://127.0.0.1:8001/admin/announcements', '127.0.0.1', '2024-01-04 04:40:11', '2024-01-04 04:40:11'),
(279, 1, 1, NULL, 'http://127.0.0.1:8001/admin/announcements/create', '127.0.0.1', '2024-01-04 04:40:20', '2024-01-04 04:40:20'),
(280, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:40:37', '2024-01-04 04:40:37'),
(281, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:40:42', '2024-01-04 04:40:42'),
(282, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:41:03', '2024-01-04 04:41:03'),
(283, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:41:36', '2024-01-04 04:41:36'),
(284, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:41:37', '2024-01-04 04:41:37'),
(285, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 04:41:39', '2024-01-04 04:41:39'),
(286, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-04 04:41:42', '2024-01-04 04:41:42'),
(287, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 04:41:54', '2024-01-04 04:41:54'),
(288, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:42:03', '2024-01-04 04:42:03'),
(289, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-04 04:42:06', '2024-01-04 04:42:06'),
(290, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories/create', '127.0.0.1', '2024-01-04 04:42:08', '2024-01-04 04:42:08'),
(291, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:43:37', '2024-01-04 04:43:37'),
(292, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:44:37', '2024-01-04 04:44:37'),
(293, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:45:37', '2024-01-04 04:45:37'),
(294, 1, 1, NULL, 'http://127.0.0.1:8001/admin/users', '127.0.0.1', '2024-01-04 04:45:58', '2024-01-04 04:45:58'),
(295, 1, 1, NULL, 'http://127.0.0.1:8001/admin/users/create', '127.0.0.1', '2024-01-04 04:46:19', '2024-01-04 04:46:19'),
(296, 1, 1, NULL, 'http://127.0.0.1:8001/admin/users', '127.0.0.1', '2024-01-04 04:46:30', '2024-01-04 04:46:30'),
(297, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:47:37', '2024-01-04 04:47:37'),
(298, 1, 1, NULL, 'http://127.0.0.1:8001/admin/user-roles/1', '127.0.0.1', '2024-01-04 04:49:21', '2024-01-04 04:49:21'),
(299, 1, 1, NULL, 'http://127.0.0.1:8001/admin/users', '127.0.0.1', '2024-01-04 04:49:26', '2024-01-04 04:49:26'),
(300, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:49:37', '2024-01-04 04:49:37'),
(301, 1, 1, NULL, 'http://127.0.0.1:8001/admin/users/1', '127.0.0.1', '2024-01-04 04:50:17', '2024-01-04 04:50:17'),
(302, 1, 1, NULL, 'http://127.0.0.1:8001/admin/users', '127.0.0.1', '2024-01-04 04:50:23', '2024-01-04 04:50:23'),
(303, 1, 1, NULL, 'http://127.0.0.1:8001/admin/menus', '127.0.0.1', '2024-01-04 04:51:08', '2024-01-04 04:51:08'),
(304, 1, 1, NULL, 'http://127.0.0.1:8001/admin/menu-links?menu_id=1', '127.0.0.1', '2024-01-04 04:51:18', '2024-01-04 04:51:18'),
(305, 1, 1, NULL, 'http://127.0.0.1:8001/admin/menu-links?menu_id=2', '127.0.0.1', '2024-01-04 04:51:32', '2024-01-04 04:51:32'),
(306, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:51:37', '2024-01-04 04:51:37'),
(307, 1, 1, NULL, 'http://127.0.0.1:8001/admin/plugins', '127.0.0.1', '2024-01-04 04:51:44', '2024-01-04 04:51:44'),
(308, 1, 1, NULL, 'http://127.0.0.1:8001/admin/plugins/create', '127.0.0.1', '2024-01-04 04:51:59', '2024-01-04 04:51:59'),
(309, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:53:10', '2024-01-04 04:53:10'),
(310, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:53:10', '2024-01-04 04:53:10'),
(311, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:54:10', '2024-01-04 04:54:10'),
(312, 1, 1, NULL, 'http://127.0.0.1:8001/admin/plugins/create', '127.0.0.1', '2024-01-04 04:54:47', '2024-01-04 04:54:47'),
(313, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles', '127.0.0.1', '2024-01-04 04:54:50', '2024-01-04 04:54:50'),
(314, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles/1/edit', '127.0.0.1', '2024-01-04 04:54:53', '2024-01-04 04:54:53'),
(315, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:55:37', '2024-01-04 04:55:37'),
(316, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:56:37', '2024-01-04 04:56:37'),
(317, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:58:37', '2024-01-04 04:58:37'),
(318, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:59:13', '2024-01-04 04:59:13'),
(319, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles/1/edit', '127.0.0.1', '2024-01-04 04:59:17', '2024-01-04 04:59:17'),
(320, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles/1/edit', '127.0.0.1', '2024-01-04 04:59:26', '2024-01-04 04:59:26'),
(321, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 04:59:38', '2024-01-04 04:59:38'),
(322, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 05:00:02', '2024-01-04 05:00:02'),
(323, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles/1/edit', '127.0.0.1', '2024-01-04 05:00:30', '2024-01-04 05:00:30'),
(324, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 05:00:38', '2024-01-04 05:00:38'),
(325, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 05:00:38', '2024-01-04 05:00:38'),
(326, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 05:00:41', '2024-01-04 05:00:41'),
(327, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 05:01:39', '2024-01-04 05:01:39'),
(328, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 05:03:37', '2024-01-04 05:03:37'),
(329, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 05:05:37', '2024-01-04 05:05:37'),
(330, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 05:06:37', '2024-01-04 05:06:37'),
(331, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 05:08:37', '2024-01-04 05:08:37'),
(332, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 05:09:26', '2024-01-04 05:09:26'),
(333, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles/1/edit', '127.0.0.1', '2024-01-04 05:09:28', '2024-01-04 05:09:28'),
(334, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 05:09:37', '2024-01-04 05:09:37'),
(335, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 05:12:00', '2024-01-04 05:12:00'),
(336, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 05:59:57', '2024-01-04 05:59:57'),
(337, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:00:52', '2024-01-04 06:00:52'),
(338, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:00:56', '2024-01-04 06:00:56'),
(339, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles/1/edit', '127.0.0.1', '2024-01-04 06:00:58', '2024-01-04 06:00:58'),
(340, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:02:29', '2024-01-04 06:02:29'),
(341, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles/1/edit', '127.0.0.1', '2024-01-04 06:02:45', '2024-01-04 06:02:45'),
(342, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:04:29', '2024-01-04 06:04:29'),
(343, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles/1/edit', '127.0.0.1', '2024-01-04 06:04:42', '2024-01-04 06:04:42'),
(344, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:05:29', '2024-01-04 06:05:29'),
(345, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:06:15', '2024-01-04 06:06:15'),
(346, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles/1/edit', '127.0.0.1', '2024-01-04 06:06:16', '2024-01-04 06:06:16'),
(347, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:06:29', '2024-01-04 06:06:29'),
(348, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:08:29', '2024-01-04 06:08:29'),
(349, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:09:29', '2024-01-04 06:09:29'),
(350, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:10:29', '2024-01-04 06:10:29'),
(351, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:12:29', '2024-01-04 06:12:29'),
(352, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles/1/edit', '127.0.0.1', '2024-01-04 06:13:23', '2024-01-04 06:13:23'),
(353, 1, 1, NULL, 'http://127.0.0.1:8001/admin', '127.0.0.1', '2024-01-04 06:13:42', '2024-01-04 06:13:42'),
(354, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles', '127.0.0.1', '2024-01-04 06:13:49', '2024-01-04 06:13:49'),
(355, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles/1/edit', '127.0.0.1', '2024-01-04 06:13:53', '2024-01-04 06:13:53'),
(356, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:14:29', '2024-01-04 06:14:29'),
(357, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles/1/edit', '127.0.0.1', '2024-01-04 06:15:01', '2024-01-04 06:15:01'),
(358, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:15:29', '2024-01-04 06:15:29'),
(359, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:16:29', '2024-01-04 06:16:29'),
(360, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:16:30', '2024-01-04 06:16:30'),
(361, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:17:30', '2024-01-04 06:17:30'),
(362, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:19:29', '2024-01-04 06:19:29'),
(363, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:20:29', '2024-01-04 06:20:29'),
(364, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles/1/edit', '127.0.0.1', '2024-01-04 06:21:20', '2024-01-04 06:21:20'),
(365, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:22:29', '2024-01-04 06:22:29'),
(366, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles/1/edit', '127.0.0.1', '2024-01-04 06:24:26', '2024-01-04 06:24:26'),
(367, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:24:29', '2024-01-04 06:24:29'),
(368, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:26:29', '2024-01-04 06:26:29'),
(369, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles/1/edit', '127.0.0.1', '2024-01-04 06:26:30', '2024-01-04 06:26:30'),
(370, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles/1/edit', '127.0.0.1', '2024-01-04 06:26:58', '2024-01-04 06:26:58'),
(371, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:28:29', '2024-01-04 06:28:29'),
(372, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:29:29', '2024-01-04 06:29:29'),
(373, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:30:29', '2024-01-04 06:30:29'),
(374, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles/1/edit', '127.0.0.1', '2024-01-04 06:31:09', '2024-01-04 06:31:09'),
(375, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles/1', '127.0.0.1', '2024-01-04 06:31:18', '2024-01-04 06:31:18'),
(376, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles', '127.0.0.1', '2024-01-04 06:31:19', '2024-01-04 06:31:19'),
(377, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:31:29', '2024-01-04 06:31:29'),
(378, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:33:29', '2024-01-04 06:33:29'),
(379, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles', '127.0.0.1', '2024-01-04 06:34:05', '2024-01-04 06:34:05'),
(380, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:34:29', '2024-01-04 06:34:29'),
(381, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:35:29', '2024-01-04 06:35:29'),
(382, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:37:29', '2024-01-04 06:37:29'),
(383, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:39:29', '2024-01-04 06:39:29'),
(384, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles', '127.0.0.1', '2024-01-04 06:39:49', '2024-01-04 06:39:49'),
(385, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-04 06:39:53', '2024-01-04 06:39:53'),
(386, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors/create', '127.0.0.1', '2024-01-04 06:40:02', '2024-01-04 06:40:02'),
(387, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:41:29', '2024-01-04 06:41:29'),
(388, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:42:29', '2024-01-04 06:42:29'),
(389, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors/create', '127.0.0.1', '2024-01-04 06:43:17', '2024-01-04 06:43:17'),
(390, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-04 06:43:35', '2024-01-04 06:43:35'),
(391, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors/create', '127.0.0.1', '2024-01-04 06:43:35', '2024-01-04 06:43:35'),
(392, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors/create', '127.0.0.1', '2024-01-04 06:44:18', '2024-01-04 06:44:18'),
(393, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-04 06:44:24', '2024-01-04 06:44:24'),
(394, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-04 06:44:25', '2024-01-04 06:44:25'),
(395, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:44:29', '2024-01-04 06:44:29'),
(396, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:45:29', '2024-01-04 06:45:29'),
(397, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:47:29', '2024-01-04 06:47:29'),
(398, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-04 06:48:21', '2024-01-04 06:48:21'),
(399, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-04 06:48:55', '2024-01-04 06:48:55'),
(400, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:49:29', '2024-01-04 06:49:29'),
(401, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:50:29', '2024-01-04 06:50:29'),
(402, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-04 06:50:57', '2024-01-04 06:50:57'),
(403, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:51:29', '2024-01-04 06:51:29'),
(404, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:53:29', '2024-01-04 06:53:29'),
(405, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:54:29', '2024-01-04 06:54:29'),
(406, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:56:29', '2024-01-04 06:56:29'),
(407, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 06:58:29', '2024-01-04 06:58:29'),
(408, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 07:00:29', '2024-01-04 07:00:29');
INSERT INTO `rate_limit_details` (`id`, `user_id`, `rate_limit_id`, `query`, `url`, `ip`, `created_at`, `updated_at`) VALUES
(409, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 07:01:29', '2024-01-04 07:01:29'),
(410, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-04 07:02:24', '2024-01-04 07:02:24'),
(411, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-04 07:03:07', '2024-01-04 07:03:07'),
(412, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 07:03:29', '2024-01-04 07:03:29'),
(413, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-04 07:03:50', '2024-01-04 07:03:50'),
(414, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors/%D8%AE%D9%84%D9%8A%D9%84-%D8%A7%D9%84%D8%B3%D9%84%D9%85%D9%8A/edit', '127.0.0.1', '2024-01-04 07:03:58', '2024-01-04 07:03:58'),
(415, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors/%D8%AE%D9%84%D9%8A%D9%84-%D8%A7%D9%84%D8%B3%D9%84%D9%85%D9%8A', '127.0.0.1', '2024-01-04 07:04:02', '2024-01-04 07:04:02'),
(416, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-04 07:04:03', '2024-01-04 07:04:03'),
(417, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors/%D8%AE%D9%84%D9%8A%D9%84-%D8%A7%D9%84%D8%B3%D9%84%D9%85%D9%8A/edit', '127.0.0.1', '2024-01-04 07:04:25', '2024-01-04 07:04:25'),
(418, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors/%D8%AE%D9%84%D9%8A%D9%84-%D8%A7%D9%84%D8%B3%D9%84%D9%85%D9%8A', '127.0.0.1', '2024-01-04 07:04:28', '2024-01-04 07:04:28'),
(419, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-04 07:04:28', '2024-01-04 07:04:28'),
(420, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors/%D8%AE%D9%84%D9%8A%D9%84-%D8%A7%D9%84%D8%B3%D9%84%D9%85%D9%8A/edit', '127.0.0.1', '2024-01-04 07:04:43', '2024-01-04 07:04:43'),
(421, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors/%D8%AE%D9%84%D9%8A%D9%84-%D8%A7%D9%84%D8%B3%D9%84%D9%85%D9%8A', '127.0.0.1', '2024-01-04 07:04:46', '2024-01-04 07:04:46'),
(422, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-04 07:04:47', '2024-01-04 07:04:47'),
(423, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 07:05:29', '2024-01-04 07:05:29'),
(424, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors/%D8%AE%D9%84%D9%8A%D9%84-%D8%A7%D9%84%D8%B3%D9%84%D9%85%D9%8A/edit', '127.0.0.1', '2024-01-04 07:06:06', '2024-01-04 07:06:06'),
(425, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors/%D8%AE%D9%84%D9%8A%D9%84-%D8%A7%D9%84%D8%B3%D9%84%D9%85%D9%8A', '127.0.0.1', '2024-01-04 07:06:09', '2024-01-04 07:06:09'),
(426, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-04 07:06:09', '2024-01-04 07:06:09'),
(427, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 07:06:23', '2024-01-04 07:06:23'),
(428, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-04 07:06:28', '2024-01-04 07:06:28'),
(429, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 07:07:29', '2024-01-04 07:07:29'),
(430, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 07:08:29', '2024-01-04 07:08:29'),
(431, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 07:10:29', '2024-01-04 07:10:29'),
(432, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 07:11:29', '2024-01-04 07:11:29'),
(433, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 07:13:29', '2024-01-04 07:13:29'),
(434, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 07:14:29', '2024-01-04 07:14:29'),
(435, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 07:16:29', '2024-01-04 07:16:29'),
(436, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 07:17:29', '2024-01-04 07:17:29'),
(437, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 07:18:29', '2024-01-04 07:18:29'),
(438, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 07:20:29', '2024-01-04 07:20:29'),
(439, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 07:22:29', '2024-01-04 07:22:29'),
(440, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 07:23:29', '2024-01-04 07:23:29'),
(441, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 07:25:29', '2024-01-04 07:25:29'),
(442, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-04 07:28:42', '2024-01-04 07:28:42'),
(443, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-04 07:33:50', '2024-01-04 07:33:50'),
(444, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-04 07:35:51', '2024-01-04 07:35:51'),
(445, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 07:36:43', '2024-01-04 07:36:43'),
(446, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-04 07:36:43', '2024-01-04 07:36:43'),
(447, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-04 07:37:34', '2024-01-04 07:37:34'),
(448, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 07:37:44', '2024-01-04 07:37:44'),
(449, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 07:45:10', '2024-01-04 07:45:10'),
(450, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 08:08:47', '2024-01-04 08:08:47'),
(451, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 08:08:47', '2024-01-04 08:08:47'),
(452, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/%D9%82%D8%B1%D8%A7%D8%A1%D8%A9-%D9%81%D9%8A-%D9%83%D8%AA%D8%A7%D8%A8-%D8%AA%D9%82%D8%A7%D8%B1%D8%A8-%D8%A7%D9%84%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B', '127.0.0.1', '2024-01-04 08:09:10', '2024-01-04 08:09:10'),
(453, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/%D9%82%D8%B1%D8%A7%D8%A1%D8%A9-%D9%81%D9%8A-%D9%83%D8%AA%D8%A7%D8%A8-%D8%AA%D9%82%D8%A7%D8%B1%D8%A8-%D8%A7%D9%84%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B', '127.0.0.1', '2024-01-04 08:09:53', '2024-01-04 08:09:53'),
(454, 1, 1, NULL, 'http://127.0.0.1:8001/admin/article-comments', '127.0.0.1', '2024-01-04 08:13:51', '2024-01-04 08:13:51'),
(455, 1, 1, NULL, 'http://127.0.0.1:8001/admin/article-comments', '127.0.0.1', '2024-01-04 08:14:29', '2024-01-04 08:14:29'),
(456, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 08:14:31', '2024-01-04 08:14:31'),
(457, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 08:15:14', '2024-01-04 08:15:14'),
(458, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 08:21:16', '2024-01-04 08:21:16'),
(459, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 08:21:29', '2024-01-04 08:21:29'),
(460, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 08:21:40', '2024-01-04 08:21:40'),
(461, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 08:22:27', '2024-01-04 08:22:27'),
(462, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 08:23:19', '2024-01-04 08:23:19'),
(463, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-04 08:23:23', '2024-01-04 08:23:23'),
(464, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 08:23:29', '2024-01-04 08:23:29'),
(465, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 08:23:44', '2024-01-04 08:23:44'),
(466, 1, 1, NULL, 'http://127.0.0.1:8001/article/%D9%82%D8%B1%D8%A7%D8%A1%D8%A9-%D9%81%D9%8A-%D9%83%D8%AA%D8%A7%D8%A8-%D8%AA%D9%82%D8%A7%D8%B1%D8%A8-%D8%A7%D9%84%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B4%D8%B1', '127.0.0.1', '2024-01-04 08:24:05', '2024-01-04 08:24:05'),
(467, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/%D9%82%D8%B1%D8%A7%D8%A1%D8%A9-%D9%81%D9%8A-%D9%83%D8%AA%D8%A7%D8%A8-%D8%AA%D9%82%D8%A7%D8%B1%D8%A8-%D8%A7%D9%84%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B', '127.0.0.1', '2024-01-04 08:24:05', '2024-01-04 08:24:05'),
(468, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/%D9%82%D8%B1%D8%A7%D8%A1%D8%A9-%D9%81%D9%8A-%D9%83%D8%AA%D8%A7%D8%A8-%D8%AA%D9%82%D8%A7%D8%B1%D8%A8-%D8%A7%D9%84%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B', '127.0.0.1', '2024-01-04 08:24:09', '2024-01-04 08:24:09'),
(469, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 08:24:16', '2024-01-04 08:24:16'),
(470, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 08:25:17', '2024-01-04 08:25:17'),
(471, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 08:26:18', '2024-01-04 08:26:18'),
(472, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/%D9%82%D8%B1%D8%A7%D8%A1%D8%A9-%D9%81%D9%8A-%D9%83%D8%AA%D8%A7%D8%A8-%D8%AA%D9%82%D8%A7%D8%B1%D8%A8-%D8%A7%D9%84%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B', '127.0.0.1', '2024-01-04 08:26:40', '2024-01-04 08:26:40'),
(473, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/%D9%82%D8%B1%D8%A7%D8%A1%D8%A9-%D9%81%D9%8A-%D9%83%D8%AA%D8%A7%D8%A8-%D8%AA%D9%82%D8%A7%D8%B1%D8%A8-%D8%A7%D9%84%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B', '127.0.0.1', '2024-01-04 08:27:02', '2024-01-04 08:27:02'),
(474, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/%D9%82%D8%B1%D8%A7%D8%A1%D8%A9-%D9%81%D9%8A-%D9%83%D8%AA%D8%A7%D8%A8-%D8%AA%D9%82%D8%A7%D8%B1%D8%A8-%D8%A7%D9%84%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B', '127.0.0.1', '2024-01-04 08:27:02', '2024-01-04 08:27:02'),
(475, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 08:27:19', '2024-01-04 08:27:19'),
(476, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 08:28:29', '2024-01-04 08:28:29'),
(477, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/%D9%82%D8%B1%D8%A7%D8%A1%D8%A9-%D9%81%D9%8A-%D9%83%D8%AA%D8%A7%D8%A8-%D8%AA%D9%82%D8%A7%D8%B1%D8%A8-%D8%A7%D9%84%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B', '127.0.0.1', '2024-01-04 08:28:40', '2024-01-04 08:28:40'),
(478, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/%D9%82%D8%B1%D8%A7%D8%A1%D8%A9-%D9%81%D9%8A-%D9%83%D8%AA%D8%A7%D8%A8-%D8%AA%D9%82%D8%A7%D8%B1%D8%A8-%D8%A7%D9%84%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B', '127.0.0.1', '2024-01-04 08:29:25', '2024-01-04 08:29:25'),
(479, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 08:29:29', '2024-01-04 08:29:29'),
(480, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/%D9%82%D8%B1%D8%A7%D8%A1%D8%A9-%D9%81%D9%8A-%D9%83%D8%AA%D8%A7%D8%A8-%D8%AA%D9%82%D8%A7%D8%B1%D8%A8-%D8%A7%D9%84%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B', '127.0.0.1', '2024-01-04 08:29:41', '2024-01-04 08:29:41'),
(481, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/%D9%82%D8%B1%D8%A7%D8%A1%D8%A9-%D9%81%D9%8A-%D9%83%D8%AA%D8%A7%D8%A8-%D8%AA%D9%82%D8%A7%D8%B1%D8%A8-%D8%A7%D9%84%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B', '127.0.0.1', '2024-01-04 08:29:42', '2024-01-04 08:29:42'),
(482, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/%D9%82%D8%B1%D8%A7%D8%A1%D8%A9-%D9%81%D9%8A-%D9%83%D8%AA%D8%A7%D8%A8-%D8%AA%D9%82%D8%A7%D8%B1%D8%A8-%D8%A7%D9%84%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B', '127.0.0.1', '2024-01-04 08:30:19', '2024-01-04 08:30:19'),
(483, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/%D9%82%D8%B1%D8%A7%D8%A1%D8%A9-%D9%81%D9%8A-%D9%83%D8%AA%D8%A7%D8%A8-%D8%AA%D9%82%D8%A7%D8%B1%D8%A8-%D8%A7%D9%84%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B', '127.0.0.1', '2024-01-04 08:30:35', '2024-01-04 08:30:35'),
(484, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 08:30:35', '2024-01-04 08:30:35'),
(485, 1, 1, NULL, 'http://127.0.0.1:8001/article/%D9%85%D8%B1%D8%A7%D8%AC%D8%B9%D8%A9-%D9%83%D8%AA%D8%A7%D8%A8-%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B4%D8%B1%D8%B9-%D9%88%D8%A7%D9%84%D8%B9%D9%84%D9%88%D9%85-', '127.0.0.1', '2024-01-04 08:31:07', '2024-01-04 08:31:07'),
(486, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 08:31:29', '2024-01-04 08:31:29'),
(487, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 08:32:29', '2024-01-04 08:32:29'),
(488, 1, 1, NULL, 'http://127.0.0.1:8001/article/%D9%85%D8%B1%D8%A7%D8%AC%D8%B9%D8%A9-%D9%83%D8%AA%D8%A7%D8%A8-%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B4%D8%B1%D8%B9-%D9%88%D8%A7%D9%84%D8%B9%D9%84%D9%88%D9%85-', '127.0.0.1', '2024-01-04 08:32:58', '2024-01-04 08:32:58'),
(489, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 08:34:29', '2024-01-04 08:34:29'),
(490, 1, 1, NULL, 'http://127.0.0.1:8001/article/%D9%85%D8%B1%D8%A7%D8%AC%D8%B9%D8%A9-%D9%83%D8%AA%D8%A7%D8%A8-%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B4%D8%B1%D8%B9-%D9%88%D8%A7%D9%84%D8%B9%D9%84%D9%88%D9%85-', '127.0.0.1', '2024-01-04 08:34:49', '2024-01-04 08:34:49'),
(491, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 08:35:29', '2024-01-04 08:35:29'),
(492, 1, 1, NULL, 'http://127.0.0.1:8001/article/%D9%85%D8%B1%D8%A7%D8%AC%D8%B9%D8%A9-%D9%83%D8%AA%D8%A7%D8%A8-%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B4%D8%B1%D8%B9-%D9%88%D8%A7%D9%84%D8%B9%D9%84%D9%88%D9%85-', '127.0.0.1', '2024-01-04 08:35:56', '2024-01-04 08:35:56'),
(493, 1, 1, NULL, 'http://127.0.0.1:8001/article/%D9%85%D8%B1%D8%A7%D8%AC%D8%B9%D8%A9-%D9%83%D8%AA%D8%A7%D8%A8-%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B4%D8%B1%D8%B9-%D9%88%D8%A7%D9%84%D8%B9%D9%84%D9%88%D9%85-', '127.0.0.1', '2024-01-04 08:36:55', '2024-01-04 08:36:55'),
(494, 1, 1, NULL, 'http://127.0.0.1:8001/article/%D9%85%D8%B1%D8%A7%D8%AC%D8%B9%D8%A9-%D9%83%D8%AA%D8%A7%D8%A8-%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B4%D8%B1%D8%B9-%D9%88%D8%A7%D9%84%D8%B9%D9%84%D9%88%D9%85-', '127.0.0.1', '2024-01-04 08:37:01', '2024-01-04 08:37:01'),
(495, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 08:37:29', '2024-01-04 08:37:29'),
(496, 1, 1, NULL, 'http://127.0.0.1:8001/article/%D9%85%D8%B1%D8%A7%D8%AC%D8%B9%D8%A9-%D9%83%D8%AA%D8%A7%D8%A8-%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B4%D8%B1%D8%B9-%D9%88%D8%A7%D9%84%D8%B9%D9%84%D9%88%D9%85-', '127.0.0.1', '2024-01-04 08:38:48', '2024-01-04 08:38:48'),
(497, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 08:39:29', '2024-01-04 08:39:29'),
(498, 1, 1, NULL, 'http://127.0.0.1:8001/article/%D9%85%D8%B1%D8%A7%D8%AC%D8%B9%D8%A9-%D9%83%D8%AA%D8%A7%D8%A8-%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B4%D8%B1%D8%B9-%D9%88%D8%A7%D9%84%D8%B9%D9%84%D9%88%D9%85-', '127.0.0.1', '2024-01-04 08:40:11', '2024-01-04 08:40:11'),
(499, 1, 1, NULL, 'http://127.0.0.1:8001/article/%D9%85%D8%B1%D8%A7%D8%AC%D8%B9%D8%A9-%D9%83%D8%AA%D8%A7%D8%A8-%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B4%D8%B1%D8%B9-%D9%88%D8%A7%D9%84%D8%B9%D9%84%D9%88%D9%85-', '127.0.0.1', '2024-01-04 08:40:22', '2024-01-04 08:40:22'),
(500, 1, 1, NULL, 'http://127.0.0.1:8001/article/%D9%85%D8%B1%D8%A7%D8%AC%D8%B9%D8%A9-%D9%83%D8%AA%D8%A7%D8%A8-%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B4%D8%B1%D8%B9-%D9%88%D8%A7%D9%84%D8%B9%D9%84%D9%88%D9%85-', '127.0.0.1', '2024-01-04 08:40:38', '2024-01-04 08:40:38'),
(501, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 08:40:56', '2024-01-04 08:40:56'),
(502, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/%D9%82%D8%B1%D9%8A%D8%A8%D8%A7', '127.0.0.1', '2024-01-04 08:41:06', '2024-01-04 08:41:06'),
(503, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 08:41:07', '2024-01-04 08:41:07'),
(504, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-04 08:41:10', '2024-01-04 08:41:10'),
(505, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 08:41:29', '2024-01-04 08:41:29'),
(506, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 08:41:48', '2024-01-04 08:41:48'),
(507, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 08:41:48', '2024-01-04 08:41:48'),
(508, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-04 08:42:19', '2024-01-04 08:42:19'),
(509, 1, 1, NULL, 'http://127.0.0.1:8001/admin/announcements', '127.0.0.1', '2024-01-04 08:42:30', '2024-01-04 08:42:30'),
(510, 1, 1, NULL, 'http://127.0.0.1:8001/admin/pages', '127.0.0.1', '2024-01-04 08:42:33', '2024-01-04 08:42:33'),
(511, 1, 1, NULL, 'http://127.0.0.1:8001/admin/pages/about/edit', '127.0.0.1', '2024-01-04 08:42:52', '2024-01-04 08:42:52'),
(512, 1, 1, NULL, 'http://127.0.0.1:8001/admin/pages/about', '127.0.0.1', '2024-01-04 08:43:01', '2024-01-04 08:43:01'),
(513, 1, 1, NULL, 'http://127.0.0.1:8001/admin/pages', '127.0.0.1', '2024-01-04 08:43:02', '2024-01-04 08:43:02'),
(514, 1, 1, NULL, 'http://127.0.0.1:8001/admin/pages/about/edit', '127.0.0.1', '2024-01-04 08:43:17', '2024-01-04 08:43:17'),
(515, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 08:43:29', '2024-01-04 08:43:29'),
(516, 1, 1, NULL, 'http://127.0.0.1:8001/admin/pages/about', '127.0.0.1', '2024-01-04 08:43:35', '2024-01-04 08:43:35'),
(517, 1, 1, NULL, 'http://127.0.0.1:8001/admin/pages', '127.0.0.1', '2024-01-04 08:43:35', '2024-01-04 08:43:35'),
(518, 1, 1, NULL, 'http://127.0.0.1:8001/admin/pages/privacy/edit', '127.0.0.1', '2024-01-04 08:43:44', '2024-01-04 08:43:44'),
(519, 1, 1, NULL, 'http://127.0.0.1:8001/admin/pages/privacy', '127.0.0.1', '2024-01-04 08:44:06', '2024-01-04 08:44:06'),
(520, 1, 1, NULL, 'http://127.0.0.1:8001/admin/pages', '127.0.0.1', '2024-01-04 08:44:07', '2024-01-04 08:44:07'),
(521, 1, 1, NULL, 'http://127.0.0.1:8001/admin/pages/terms/edit', '127.0.0.1', '2024-01-04 08:44:15', '2024-01-04 08:44:15'),
(522, 1, 1, NULL, 'http://127.0.0.1:8001/admin/pages/terms', '127.0.0.1', '2024-01-04 08:44:35', '2024-01-04 08:44:35'),
(523, 1, 1, NULL, 'http://127.0.0.1:8001/admin/pages', '127.0.0.1', '2024-01-04 08:44:36', '2024-01-04 08:44:36'),
(524, 1, 1, NULL, 'http://127.0.0.1:8001/admin/pages/create', '127.0.0.1', '2024-01-04 08:44:41', '2024-01-04 08:44:41'),
(525, 1, 1, NULL, 'http://127.0.0.1:8001/admin/pages', '127.0.0.1', '2024-01-04 08:45:03', '2024-01-04 08:45:03'),
(526, 1, 1, NULL, 'http://127.0.0.1:8001/admin/pages', '127.0.0.1', '2024-01-04 08:45:03', '2024-01-04 08:45:03'),
(527, 1, 1, NULL, 'http://127.0.0.1:8001/admin/settings', '127.0.0.1', '2024-01-04 08:45:20', '2024-01-04 08:45:20'),
(528, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 08:45:29', '2024-01-04 08:45:29'),
(529, 1, 1, NULL, 'http://127.0.0.1:8001/admin/pages', '127.0.0.1', '2024-01-04 08:45:45', '2024-01-04 08:45:45'),
(530, 1, 1, NULL, 'http://127.0.0.1:8001/admin/pages/%D8%AA%D9%88%D8%A7%D8%B5%D9%84-%D9%85%D8%B9%D9%86%D8%A7', '127.0.0.1', '2024-01-04 08:45:52', '2024-01-04 08:45:52'),
(531, 1, 1, NULL, 'http://127.0.0.1:8001/admin/pages', '127.0.0.1', '2024-01-04 08:45:53', '2024-01-04 08:45:53'),
(532, 1, 1, NULL, 'http://127.0.0.1:8001/admin/pages/%D8%AA%D9%88%D8%A7%D8%B5%D9%84-%D9%85%D8%B9%D9%86%D8%A7/edit', '127.0.0.1', '2024-01-04 08:45:55', '2024-01-04 08:45:55'),
(533, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 08:46:29', '2024-01-04 08:46:29'),
(534, 1, 1, NULL, 'http://127.0.0.1:8001/admin/pages/%D8%AA%D9%88%D8%A7%D8%B5%D9%84-%D9%85%D8%B9%D9%86%D8%A7', '127.0.0.1', '2024-01-04 08:46:29', '2024-01-04 08:46:29'),
(535, 1, 1, NULL, 'http://127.0.0.1:8001/admin/pages', '127.0.0.1', '2024-01-04 08:46:30', '2024-01-04 08:46:30'),
(536, 1, 1, NULL, 'http://127.0.0.1:8001/admin/pages/%D8%AA%D9%88%D8%A7%D8%B5%D9%84-%D9%85%D8%B9%D9%86%D8%A7', '127.0.0.1', '2024-01-04 08:46:35', '2024-01-04 08:46:35'),
(537, 1, 1, NULL, 'http://127.0.0.1:8001/admin/pages', '127.0.0.1', '2024-01-04 08:46:36', '2024-01-04 08:46:36'),
(538, 1, 1, NULL, 'http://127.0.0.1:8001/page/%D8%B9%D9%86-%D8%A7%D9%84%D9%85%D8%B1%D9%83%D8%B2', '127.0.0.1', '2024-01-04 08:46:44', '2024-01-04 08:46:44'),
(539, 1, 1, NULL, 'http://127.0.0.1:8001/admin/contacts', '127.0.0.1', '2024-01-04 08:46:52', '2024-01-04 08:46:52'),
(540, 1, 1, NULL, 'http://127.0.0.1:8001/admin/faqs', '127.0.0.1', '2024-01-04 08:46:59', '2024-01-04 08:46:59'),
(541, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles', '127.0.0.1', '2024-01-04 08:47:04', '2024-01-04 08:47:04'),
(542, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles/2', '127.0.0.1', '2024-01-04 08:47:11', '2024-01-04 08:47:11'),
(543, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles/2', '127.0.0.1', '2024-01-04 08:47:12', '2024-01-04 08:47:12'),
(544, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 08:48:29', '2024-01-04 08:48:29'),
(545, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 08:49:29', '2024-01-04 08:49:29'),
(546, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 08:51:29', '2024-01-04 08:51:29'),
(547, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 08:53:29', '2024-01-04 08:53:29'),
(548, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 08:55:29', '2024-01-04 08:55:29'),
(549, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 08:56:29', '2024-01-04 08:56:29'),
(550, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 08:58:29', '2024-01-04 08:58:29'),
(551, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 08:59:29', '2024-01-04 08:59:29'),
(552, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 09:00:29', '2024-01-04 09:00:29'),
(553, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 09:02:29', '2024-01-04 09:02:29'),
(554, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 09:04:29', '2024-01-04 09:04:29'),
(555, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 09:06:29', '2024-01-04 09:06:29'),
(556, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 09:07:29', '2024-01-04 09:07:29'),
(557, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 10:40:49', '2024-01-04 10:40:49'),
(558, 1, 1, NULL, 'http://127.0.0.1:8001/admin', '127.0.0.1', '2024-01-04 10:41:01', '2024-01-04 10:41:01'),
(559, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-04 10:41:12', '2024-01-04 10:41:12'),
(560, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors/create', '127.0.0.1', '2024-01-04 10:41:16', '2024-01-04 10:41:16'),
(561, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-04 10:42:01', '2024-01-04 10:42:01'),
(562, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 10:42:21', '2024-01-04 10:42:21'),
(563, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories/%D9%85%D8%B1%D8%A6%D9%8A%D8%A7%D8%AA/edit', '127.0.0.1', '2024-01-04 10:42:44', '2024-01-04 10:42:44'),
(564, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 10:43:07', '2024-01-04 10:43:07'),
(565, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-04 10:43:18', '2024-01-04 10:43:18'),
(566, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 10:44:01', '2024-01-04 10:44:01'),
(567, 1, 1, NULL, 'http://127.0.0.1:8001/admin/announcements', '127.0.0.1', '2024-01-04 10:44:13', '2024-01-04 10:44:13'),
(568, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 10:44:21', '2024-01-04 10:44:21'),
(569, 1, 1, NULL, 'http://127.0.0.1:8001/admin/pages', '127.0.0.1', '2024-01-04 10:44:24', '2024-01-04 10:44:24'),
(570, 1, 1, NULL, 'http://127.0.0.1:8001/admin/pages/%D8%A2%D9%84%D9%8A%D8%A9-%D8%A7%D9%84%D8%A7%D8%B3%D8%AA%D9%83%D8%AA%D8%A7%D8%A8/edit', '127.0.0.1', '2024-01-04 10:44:36', '2024-01-04 10:44:36'),
(571, 1, 1, NULL, 'http://127.0.0.1:8001/admin/tags', '127.0.0.1', '2024-01-04 10:44:57', '2024-01-04 10:44:57'),
(572, 1, 1, NULL, 'http://127.0.0.1:8001/admin/tags/create', '127.0.0.1', '2024-01-04 10:45:01', '2024-01-04 10:45:01'),
(573, 1, 1, NULL, 'http://127.0.0.1:8001/admin/pages', '127.0.0.1', '2024-01-04 10:45:13', '2024-01-04 10:45:13'),
(574, 1, 1, NULL, 'http://127.0.0.1:8001/admin/settings', '127.0.0.1', '2024-01-04 10:45:35', '2024-01-04 10:45:35'),
(575, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-04 10:46:01', '2024-01-04 10:46:01'),
(576, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 10:46:21', '2024-01-04 10:46:21'),
(577, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:08:40', '2024-01-04 15:08:40'),
(578, 1, 1, NULL, 'http://127.0.0.1:8001/admin/users', '127.0.0.1', '2024-01-04 15:09:11', '2024-01-04 15:09:11'),
(579, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:10:13', '2024-01-04 15:10:13'),
(580, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:11:13', '2024-01-04 15:11:13'),
(581, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:12:13', '2024-01-04 15:12:13'),
(582, 1, 1, NULL, 'http://127.0.0.1:8001/admin/users/create', '127.0.0.1', '2024-01-04 15:14:07', '2024-01-04 15:14:07'),
(583, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:14:13', '2024-01-04 15:14:13'),
(584, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:15:13', '2024-01-04 15:15:13'),
(585, 1, 1, NULL, 'http://127.0.0.1:8001/admin/users', '127.0.0.1', '2024-01-04 15:15:17', '2024-01-04 15:15:17'),
(586, 1, 1, NULL, 'http://127.0.0.1:8001/admin/users', '127.0.0.1', '2024-01-04 15:15:18', '2024-01-04 15:15:18'),
(587, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles', '127.0.0.1', '2024-01-04 15:15:24', '2024-01-04 15:15:24'),
(588, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles/2/edit', '127.0.0.1', '2024-01-04 15:15:28', '2024-01-04 15:15:28'),
(589, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles/2', '127.0.0.1', '2024-01-04 15:16:38', '2024-01-04 15:16:38'),
(590, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles', '127.0.0.1', '2024-01-04 15:16:39', '2024-01-04 15:16:39'),
(591, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:17:13', '2024-01-04 15:17:13'),
(592, 1, 1, NULL, 'http://127.0.0.1:8001/admin/roles', '127.0.0.1', '2024-01-04 15:17:42', '2024-01-04 15:17:42'),
(593, 1, 1, NULL, 'http://127.0.0.1:8001/admin/contacts', '127.0.0.1', '2024-01-04 15:17:56', '2024-01-04 15:17:56'),
(594, 1, 1, NULL, 'http://127.0.0.1:8001/admin', '127.0.0.1', '2024-01-04 15:18:05', '2024-01-04 15:18:05'),
(595, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:19:13', '2024-01-04 15:19:13'),
(596, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:20:13', '2024-01-04 15:20:13'),
(597, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:22:14', '2024-01-04 15:22:14'),
(598, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:23:13', '2024-01-04 15:23:13'),
(599, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:24:13', '2024-01-04 15:24:13'),
(600, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:26:13', '2024-01-04 15:26:13'),
(601, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:28:13', '2024-01-04 15:28:13'),
(602, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:29:13', '2024-01-04 15:29:13'),
(603, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:31:13', '2024-01-04 15:31:13'),
(604, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:33:13', '2024-01-04 15:33:13'),
(605, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:34:13', '2024-01-04 15:34:13'),
(606, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:36:13', '2024-01-04 15:36:13'),
(607, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:37:13', '2024-01-04 15:37:13'),
(608, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:38:13', '2024-01-04 15:38:13'),
(609, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:40:13', '2024-01-04 15:40:13'),
(610, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:41:13', '2024-01-04 15:41:13'),
(611, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:43:13', '2024-01-04 15:43:13'),
(612, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:45:13', '2024-01-04 15:45:13'),
(613, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:46:13', '2024-01-04 15:46:13'),
(614, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:47:13', '2024-01-04 15:47:13'),
(615, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:48:13', '2024-01-04 15:48:13'),
(616, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:50:13', '2024-01-04 15:50:13'),
(617, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:52:13', '2024-01-04 15:52:13'),
(618, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:53:13', '2024-01-04 15:53:13'),
(619, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:55:13', '2024-01-04 15:55:13'),
(620, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:56:13', '2024-01-04 15:56:13'),
(621, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:58:13', '2024-01-04 15:58:13'),
(622, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 15:59:13', '2024-01-04 15:59:13'),
(623, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 16:01:13', '2024-01-04 16:01:13'),
(624, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-04 16:41:02', '2024-01-04 16:41:02'),
(625, 1, 1, NULL, 'http://127.0.0.1:8000', '127.0.0.1', '2024-01-06 05:52:32', '2024-01-06 05:52:32'),
(626, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-06 05:52:33', '2024-01-06 05:52:33'),
(627, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-06 05:52:37', '2024-01-06 05:52:37'),
(628, 1, 1, NULL, 'http://127.0.0.1:8000', '127.0.0.1', '2024-01-06 05:52:46', '2024-01-06 05:52:46'),
(629, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-06 05:52:47', '2024-01-06 05:52:47'),
(630, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-06 05:52:51', '2024-01-06 05:52:51'),
(631, 1, 1, NULL, 'http://127.0.0.1:8000/robots.txt', '127.0.0.1', '2024-01-06 05:52:52', '2024-01-06 05:52:52'),
(632, 1, 1, NULL, 'http://127.0.0.1:8000', '127.0.0.1', '2024-01-06 05:52:57', '2024-01-06 05:52:57'),
(633, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-06 05:52:58', '2024-01-06 05:52:58'),
(634, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 05:53:23', '2024-01-06 05:53:23'),
(635, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 05:53:48', '2024-01-06 05:53:48'),
(636, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 05:54:14', '2024-01-06 05:54:14'),
(637, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 05:54:39', '2024-01-06 05:54:39'),
(638, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 05:55:05', '2024-01-06 05:55:05'),
(639, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 05:55:30', '2024-01-06 05:55:30'),
(640, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 05:55:56', '2024-01-06 05:55:56'),
(641, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 05:56:32', '2024-01-06 05:56:32'),
(642, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 05:57:32', '2024-01-06 05:57:32'),
(643, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 05:58:32', '2024-01-06 05:58:32'),
(644, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 05:59:32', '2024-01-06 05:59:32'),
(645, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 06:00:32', '2024-01-06 06:00:32'),
(646, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 06:01:32', '2024-01-06 06:01:32'),
(647, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 06:02:03', '2024-01-06 06:02:03'),
(648, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 06:02:29', '2024-01-06 06:02:29'),
(649, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 06:02:54', '2024-01-06 06:02:54'),
(650, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 06:03:32', '2024-01-06 06:03:32'),
(651, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 06:04:32', '2024-01-06 06:04:32'),
(652, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-06 15:26:15', '2024-01-06 15:26:15'),
(653, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 15:26:16', '2024-01-06 15:26:16'),
(654, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-06 15:26:17', '2024-01-06 15:26:17'),
(655, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 15:26:18', '2024-01-06 15:26:18'),
(656, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 15:26:40', '2024-01-06 15:26:40'),
(657, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 15:27:41', '2024-01-06 15:27:41'),
(658, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 15:28:42', '2024-01-06 15:28:42'),
(659, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 15:29:43', '2024-01-06 15:29:43'),
(660, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 15:31:25', '2024-01-06 15:31:25'),
(661, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 15:32:25', '2024-01-06 15:32:25'),
(662, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 15:34:25', '2024-01-06 15:34:25'),
(663, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 15:35:25', '2024-01-06 15:35:25'),
(664, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 15:37:25', '2024-01-06 15:37:25'),
(665, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 15:39:25', '2024-01-06 15:39:25'),
(666, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 15:41:25', '2024-01-06 15:41:25'),
(667, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 15:43:25', '2024-01-06 15:43:25'),
(668, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 15:44:25', '2024-01-06 15:44:25'),
(669, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 15:45:25', '2024-01-06 15:45:25'),
(670, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 15:47:25', '2024-01-06 15:47:25'),
(671, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 15:48:25', '2024-01-06 15:48:25'),
(672, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 15:50:25', '2024-01-06 15:50:25'),
(673, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 15:52:25', '2024-01-06 15:52:25'),
(674, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 15:53:25', '2024-01-06 15:53:25'),
(675, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 15:54:25', '2024-01-06 15:54:25'),
(676, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 15:56:25', '2024-01-06 15:56:25'),
(677, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 15:57:25', '2024-01-06 15:57:25'),
(678, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 15:59:25', '2024-01-06 15:59:25'),
(679, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:01:25', '2024-01-06 16:01:25'),
(680, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:02:25', '2024-01-06 16:02:25'),
(681, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:03:25', '2024-01-06 16:03:25'),
(682, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:04:25', '2024-01-06 16:04:25'),
(683, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:06:25', '2024-01-06 16:06:25'),
(684, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:08:25', '2024-01-06 16:08:25'),
(685, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:10:25', '2024-01-06 16:10:25'),
(686, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:11:25', '2024-01-06 16:11:25'),
(687, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:13:25', '2024-01-06 16:13:25'),
(688, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:15:25', '2024-01-06 16:15:25'),
(689, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:16:25', '2024-01-06 16:16:25'),
(690, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:18:25', '2024-01-06 16:18:25'),
(691, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:20:25', '2024-01-06 16:20:25'),
(692, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:21:25', '2024-01-06 16:21:25'),
(693, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:23:25', '2024-01-06 16:23:25'),
(694, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:25:25', '2024-01-06 16:25:25'),
(695, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:27:25', '2024-01-06 16:27:25'),
(696, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:29:25', '2024-01-06 16:29:25'),
(697, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:31:25', '2024-01-06 16:31:25'),
(698, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:33:25', '2024-01-06 16:33:25'),
(699, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:34:25', '2024-01-06 16:34:25'),
(700, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:36:25', '2024-01-06 16:36:25'),
(701, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:37:25', '2024-01-06 16:37:25'),
(702, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:39:25', '2024-01-06 16:39:25'),
(703, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:41:25', '2024-01-06 16:41:25'),
(704, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:43:25', '2024-01-06 16:43:25'),
(705, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:44:25', '2024-01-06 16:44:25'),
(706, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:46:25', '2024-01-06 16:46:25'),
(707, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:48:25', '2024-01-06 16:48:25'),
(708, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:49:25', '2024-01-06 16:49:25'),
(709, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:51:25', '2024-01-06 16:51:25'),
(710, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:52:25', '2024-01-06 16:52:25'),
(711, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:54:25', '2024-01-06 16:54:25'),
(712, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:56:25', '2024-01-06 16:56:25'),
(713, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:57:25', '2024-01-06 16:57:25'),
(714, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 16:59:25', '2024-01-06 16:59:25'),
(715, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 17:00:25', '2024-01-06 17:00:25'),
(716, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 17:02:25', '2024-01-06 17:02:25'),
(717, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 17:03:25', '2024-01-06 17:03:25'),
(718, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 17:05:25', '2024-01-06 17:05:25'),
(719, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 17:06:25', '2024-01-06 17:06:25'),
(720, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 17:08:25', '2024-01-06 17:08:25'),
(721, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 17:09:25', '2024-01-06 17:09:25'),
(722, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 17:11:25', '2024-01-06 17:11:25'),
(723, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 17:12:25', '2024-01-06 17:12:25'),
(724, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 17:14:25', '2024-01-06 17:14:25'),
(725, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 17:15:25', '2024-01-06 17:15:25'),
(726, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-06 17:16:25', '2024-01-06 17:16:25'),
(727, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 01:28:37', '2024-01-07 01:28:37'),
(728, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 01:30:17', '2024-01-07 01:30:17'),
(729, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 01:32:17', '2024-01-07 01:32:17'),
(730, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 01:34:17', '2024-01-07 01:34:17'),
(731, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 01:36:17', '2024-01-07 01:36:17'),
(732, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 01:38:17', '2024-01-07 01:38:17'),
(733, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 01:40:17', '2024-01-07 01:40:17'),
(734, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 01:42:17', '2024-01-07 01:42:17'),
(735, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 01:43:17', '2024-01-07 01:43:17'),
(736, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 01:45:17', '2024-01-07 01:45:17'),
(737, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 01:47:17', '2024-01-07 01:47:17'),
(738, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 01:48:17', '2024-01-07 01:48:17'),
(739, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 01:50:17', '2024-01-07 01:50:17'),
(740, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 01:52:17', '2024-01-07 01:52:17'),
(741, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 01:53:17', '2024-01-07 01:53:17'),
(742, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 01:54:17', '2024-01-07 01:54:17'),
(743, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 01:56:17', '2024-01-07 01:56:17'),
(744, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 01:57:17', '2024-01-07 01:57:17'),
(745, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 01:59:17', '2024-01-07 01:59:17'),
(746, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:01:17', '2024-01-07 02:01:17'),
(747, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:03:17', '2024-01-07 02:03:17'),
(748, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:05:17', '2024-01-07 02:05:17'),
(749, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:07:17', '2024-01-07 02:07:17'),
(750, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:08:17', '2024-01-07 02:08:17'),
(751, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:10:17', '2024-01-07 02:10:17'),
(752, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:12:17', '2024-01-07 02:12:17'),
(753, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:13:17', '2024-01-07 02:13:17'),
(754, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:15:17', '2024-01-07 02:15:17'),
(755, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:16:17', '2024-01-07 02:16:17'),
(756, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:18:17', '2024-01-07 02:18:17'),
(757, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:19:17', '2024-01-07 02:19:17'),
(758, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:21:17', '2024-01-07 02:21:17'),
(759, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:23:17', '2024-01-07 02:23:17'),
(760, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:25:17', '2024-01-07 02:25:17'),
(761, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:27:17', '2024-01-07 02:27:17'),
(762, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:28:17', '2024-01-07 02:28:17'),
(763, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:30:17', '2024-01-07 02:30:17'),
(764, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:32:17', '2024-01-07 02:32:17'),
(765, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:33:18', '2024-01-07 02:33:18'),
(766, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:35:17', '2024-01-07 02:35:17'),
(767, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:36:17', '2024-01-07 02:36:17'),
(768, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:38:17', '2024-01-07 02:38:17'),
(769, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:45:17', '2024-01-07 02:45:17'),
(770, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:46:17', '2024-01-07 02:46:17'),
(771, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:53:17', '2024-01-07 02:53:17'),
(772, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:54:17', '2024-01-07 02:54:17'),
(773, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:56:17', '2024-01-07 02:56:17'),
(774, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:57:17', '2024-01-07 02:57:17'),
(775, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-07 02:59:17', '2024-01-07 02:59:17'),
(776, 1, 1, NULL, 'http://127.0.0.1:8001', '127.0.0.1', '2024-01-08 16:03:43', '2024-01-08 16:03:43'),
(777, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-08 16:03:50', '2024-01-08 16:03:50'),
(778, 1, 1, NULL, 'http://127.0.0.1:8001/admin', '127.0.0.1', '2024-01-08 16:03:50', '2024-01-08 16:03:50');
INSERT INTO `rate_limit_details` (`id`, `user_id`, `rate_limit_id`, `query`, `url`, `ip`, `created_at`, `updated_at`) VALUES
(779, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-08 16:04:09', '2024-01-08 16:04:09'),
(780, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories/create', '127.0.0.1', '2024-01-08 16:04:12', '2024-01-08 16:04:12'),
(781, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-08 16:04:28', '2024-01-08 16:04:28'),
(782, 1, 1, NULL, 'http://127.0.0.1:8001/admin/categories', '127.0.0.1', '2024-01-08 16:04:29', '2024-01-08 16:04:29'),
(783, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 16:05:41', '2024-01-08 16:05:41'),
(784, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-08 16:07:59', '2024-01-08 16:07:59'),
(785, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-08 16:08:07', '2024-01-08 16:08:07'),
(786, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors/create', '127.0.0.1', '2024-01-08 16:08:25', '2024-01-08 16:08:25'),
(787, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-08 16:08:46', '2024-01-08 16:08:46'),
(788, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-08 16:08:47', '2024-01-08 16:08:47'),
(789, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors/create', '127.0.0.1', '2024-01-08 16:09:00', '2024-01-08 16:09:00'),
(790, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-08 16:09:25', '2024-01-08 16:09:25'),
(791, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-08 16:09:25', '2024-01-08 16:09:25'),
(792, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors/create', '127.0.0.1', '2024-01-08 16:09:30', '2024-01-08 16:09:30'),
(793, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-08 16:10:00', '2024-01-08 16:10:00'),
(794, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-08 16:10:00', '2024-01-08 16:10:00'),
(795, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors/create', '127.0.0.1', '2024-01-08 16:10:05', '2024-01-08 16:10:05'),
(796, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-08 16:10:34', '2024-01-08 16:10:34'),
(797, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-08 16:10:35', '2024-01-08 16:10:35'),
(798, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors/create', '127.0.0.1', '2024-01-08 16:10:38', '2024-01-08 16:10:38'),
(799, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-08 16:10:52', '2024-01-08 16:10:52'),
(800, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-08 16:10:52', '2024-01-08 16:10:52'),
(801, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors/create', '127.0.0.1', '2024-01-08 16:10:57', '2024-01-08 16:10:57'),
(802, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-08 16:11:16', '2024-01-08 16:11:16'),
(803, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-08 16:11:17', '2024-01-08 16:11:17'),
(804, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors/create', '127.0.0.1', '2024-01-08 16:11:30', '2024-01-08 16:11:30'),
(805, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-08 16:13:31', '2024-01-08 16:13:31'),
(806, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-08 16:13:32', '2024-01-08 16:13:32'),
(807, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-08 17:43:06', '2024-01-08 17:43:06'),
(808, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 17:43:59', '2024-01-08 17:43:59'),
(809, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 17:43:59', '2024-01-08 17:43:59'),
(810, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-08 17:44:04', '2024-01-08 17:44:04'),
(811, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 17:46:09', '2024-01-08 17:46:09'),
(812, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 17:46:10', '2024-01-08 17:46:10'),
(813, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-08 17:46:43', '2024-01-08 17:46:43'),
(814, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 17:47:06', '2024-01-08 17:47:06'),
(815, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 17:47:07', '2024-01-08 17:47:07'),
(816, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-08 17:49:26', '2024-01-08 17:49:26'),
(817, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 17:50:29', '2024-01-08 17:50:29'),
(818, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 17:50:30', '2024-01-08 17:50:30'),
(819, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-08 18:18:31', '2024-01-08 18:18:31'),
(820, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 18:18:46', '2024-01-08 18:18:46'),
(821, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 18:18:47', '2024-01-08 18:18:47'),
(822, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-08 18:26:06', '2024-01-08 18:26:06'),
(823, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 18:30:04', '2024-01-08 18:30:04'),
(824, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-08 18:30:12', '2024-01-08 18:30:12'),
(825, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors/create', '127.0.0.1', '2024-01-08 18:30:34', '2024-01-08 18:30:34'),
(826, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-08 18:30:52', '2024-01-08 18:30:52'),
(827, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-08 18:30:52', '2024-01-08 18:30:52'),
(828, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-08 18:31:00', '2024-01-08 18:31:00'),
(829, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 18:31:31', '2024-01-08 18:31:31'),
(830, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 18:31:32', '2024-01-08 18:31:32'),
(831, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-08 18:31:54', '2024-01-08 18:31:54'),
(832, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 18:32:14', '2024-01-08 18:32:14'),
(833, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 18:32:15', '2024-01-08 18:32:15'),
(834, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-08 18:33:09', '2024-01-08 18:33:09'),
(835, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 18:33:28', '2024-01-08 18:33:28'),
(836, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 18:33:29', '2024-01-08 18:33:29'),
(837, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-08 18:33:46', '2024-01-08 18:33:46'),
(838, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors/create', '127.0.0.1', '2024-01-08 18:34:00', '2024-01-08 18:34:00'),
(839, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-08 18:34:26', '2024-01-08 18:34:26'),
(840, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-08 18:34:26', '2024-01-08 18:34:26'),
(841, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-08 18:34:32', '2024-01-08 18:34:32'),
(842, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 18:35:02', '2024-01-08 18:35:02'),
(843, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 18:35:03', '2024-01-08 18:35:03'),
(844, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-08 18:35:20', '2024-01-08 18:35:20'),
(845, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 18:35:42', '2024-01-08 18:35:42'),
(846, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 18:35:43', '2024-01-08 18:35:43'),
(847, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-08 18:35:57', '2024-01-08 18:35:57'),
(848, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 18:36:14', '2024-01-08 18:36:14'),
(849, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 18:36:14', '2024-01-08 18:36:14'),
(850, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors/create', '127.0.0.1', '2024-01-08 18:36:38', '2024-01-08 18:36:38'),
(851, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-08 18:36:51', '2024-01-08 18:36:51'),
(852, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-08 18:36:52', '2024-01-08 18:36:52'),
(853, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-08 18:36:56', '2024-01-08 18:36:56'),
(854, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-08 18:38:08', '2024-01-08 18:38:08'),
(855, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 18:38:38', '2024-01-08 18:38:38'),
(856, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 18:38:38', '2024-01-08 18:38:38'),
(857, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-08 18:38:47', '2024-01-08 18:38:47'),
(858, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 18:39:05', '2024-01-08 18:39:05'),
(859, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 18:39:06', '2024-01-08 18:39:06'),
(860, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-08 18:39:18', '2024-01-08 18:39:18'),
(861, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 18:39:36', '2024-01-08 18:39:36'),
(862, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 18:39:37', '2024-01-08 18:39:37'),
(863, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-08 18:39:52', '2024-01-08 18:39:52'),
(864, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 18:40:10', '2024-01-08 18:40:10'),
(865, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-08 18:40:10', '2024-01-08 18:40:10'),
(866, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-09 10:09:47', '2024-01-09 10:09:47'),
(867, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-09 10:09:52', '2024-01-09 10:09:52'),
(868, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-09 10:10:26', '2024-01-09 10:10:26'),
(869, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-09 10:10:27', '2024-01-09 10:10:27'),
(870, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-09 10:10:40', '2024-01-09 10:10:40'),
(871, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-09 10:10:40', '2024-01-09 10:10:40'),
(872, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-09 10:21:54', '2024-01-09 10:21:54'),
(873, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles?page=2', '127.0.0.1', '2024-01-09 10:21:59', '2024-01-09 10:21:59'),
(874, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-09 15:17:30', '2024-01-09 15:17:30'),
(875, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-09 15:17:54', '2024-01-09 15:17:54'),
(876, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors/%D8%A5%D8%B9%D9%84%D8%A7%D9%85-%D8%A7%D9%84%D9%85%D8%B1%D9%83%D8%B2-%D8%A7%D9%84%D9%85%D8%AF%D9%86%D9%8A/edit', '127.0.0.1', '2024-01-09 15:17:59', '2024-01-09 15:17:59'),
(877, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors/%D8%A5%D8%B9%D9%84%D8%A7%D9%85-%D8%A7%D9%84%D9%85%D8%B1%D9%83%D8%B2-%D8%A7%D9%84%D9%85%D8%AF%D9%86%D9%8A', '127.0.0.1', '2024-01-09 15:18:10', '2024-01-09 15:18:10'),
(878, 1, 1, NULL, 'http://127.0.0.1:8001/admin/editors', '127.0.0.1', '2024-01-09 15:18:11', '2024-01-09 15:18:11'),
(879, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-09 15:18:20', '2024-01-09 15:18:20'),
(880, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-09 15:18:23', '2024-01-09 15:18:23'),
(881, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-09 15:23:36', '2024-01-09 15:23:36'),
(882, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-09 15:23:40', '2024-01-09 15:23:40'),
(883, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', '2024-01-09 15:23:45', '2024-01-09 15:23:45'),
(884, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-09 15:25:44', '2024-01-09 15:25:44'),
(885, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-09 15:25:48', '2024-01-09 15:25:48'),
(886, 1, 1, NULL, 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', '2024-01-09 15:55:36', '2024-01-09 15:55:36'),
(887, 1, 1, NULL, 'http://127.0.0.1:8001/admin', '127.0.0.1', '2024-01-10 01:32:52', '2024-01-10 01:32:52'),
(888, 1, 1, NULL, 'http://127.0.0.1:8001', '127.0.0.1', '2024-01-10 01:32:57', '2024-01-10 01:32:57'),
(889, 1, 1, NULL, 'http://127.0.0.1:8001', '127.0.0.1', '2024-01-10 01:33:58', '2024-01-10 01:33:58'),
(890, 1, 1, NULL, 'http://127.0.0.1:8001', '127.0.0.1', '2024-01-10 01:34:39', '2024-01-10 01:34:39'),
(891, 1, 1, NULL, 'http://127.0.0.1:8001/admin/notifications/ajax', '127.0.0.1', '2024-01-10 01:35:06', '2024-01-10 01:35:06'),
(892, 1, 1, NULL, 'http://127.0.0.1:8000', '127.0.0.1', '2024-01-11 15:59:17', '2024-01-11 15:59:17'),
(893, 1, 1, NULL, 'http://127.0.0.1:8000', '127.0.0.1', '2024-01-11 15:59:18', '2024-01-11 15:59:18'),
(894, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 15:59:24', '2024-01-11 15:59:24'),
(895, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 15:59:25', '2024-01-11 15:59:25'),
(896, 1, 1, NULL, 'http://127.0.0.1:8000', '127.0.0.1', '2024-01-11 16:00:52', '2024-01-11 16:00:52'),
(897, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:00:55', '2024-01-11 16:00:55'),
(898, 1, 1, NULL, 'http://127.0.0.1:8000', '127.0.0.1', '2024-01-11 16:01:07', '2024-01-11 16:01:07'),
(899, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:01:08', '2024-01-11 16:01:08'),
(900, 1, 1, NULL, 'http://127.0.0.1:8000', '127.0.0.1', '2024-01-11 16:04:41', '2024-01-11 16:04:41'),
(901, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:04:43', '2024-01-11 16:04:43'),
(902, 1, 1, NULL, 'http://127.0.0.1:8000', '127.0.0.1', '2024-01-11 16:05:22', '2024-01-11 16:05:22'),
(903, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:05:25', '2024-01-11 16:05:25'),
(904, 1, 1, NULL, 'http://127.0.0.1:8000', '127.0.0.1', '2024-01-11 16:06:05', '2024-01-11 16:06:05'),
(905, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:06:07', '2024-01-11 16:06:07'),
(906, 1, 1, NULL, 'http://127.0.0.1:8000', '127.0.0.1', '2024-01-11 16:19:06', '2024-01-11 16:19:06'),
(907, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:19:07', '2024-01-11 16:19:07'),
(908, 1, 1, NULL, 'http://127.0.0.1:8000/admin', '127.0.0.1', '2024-01-11 16:19:10', '2024-01-11 16:19:10'),
(909, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-11 16:19:11', '2024-01-11 16:19:11'),
(910, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:19:13', '2024-01-11 16:19:13'),
(911, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-11 16:19:16', '2024-01-11 16:19:16'),
(912, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:19:17', '2024-01-11 16:19:17'),
(913, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/%D9%82%D8%B1%D9%8A%D8%A8%D8%A7-%D8%A7%D9%84%D8%B3%D9%8A%D8%A7%D8%B3%D8%A7%D8%AA/edit', '127.0.0.1', '2024-01-11 16:19:22', '2024-01-11 16:19:22'),
(914, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:19:24', '2024-01-11 16:19:24'),
(915, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/%D9%82%D8%B1%D9%8A%D8%A8%D8%A7-%D8%A7%D9%84%D8%B3%D9%8A%D8%A7%D8%B3%D8%A7%D8%AA', '127.0.0.1', '2024-01-11 16:20:22', '2024-01-11 16:20:22'),
(916, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-11 16:20:24', '2024-01-11 16:20:24'),
(917, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:20:25', '2024-01-11 16:20:25'),
(918, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-11 16:22:24', '2024-01-11 16:22:24'),
(919, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:22:26', '2024-01-11 16:22:26'),
(920, 1, 1, NULL, 'http://127.0.0.1:8000/admin/categories', '127.0.0.1', '2024-01-11 16:22:29', '2024-01-11 16:22:29'),
(921, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:22:30', '2024-01-11 16:22:30'),
(922, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-11 16:22:44', '2024-01-11 16:22:44'),
(923, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:22:45', '2024-01-11 16:22:45'),
(924, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles?page=2', '127.0.0.1', '2024-01-11 16:22:49', '2024-01-11 16:22:49'),
(925, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:22:51', '2024-01-11 16:22:51'),
(926, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/create', '127.0.0.1', '2024-01-11 16:22:55', '2024-01-11 16:22:55'),
(927, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:22:57', '2024-01-11 16:22:57'),
(928, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-11 16:23:26', '2024-01-11 16:23:26'),
(929, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/create', '127.0.0.1', '2024-01-11 16:23:27', '2024-01-11 16:23:27'),
(930, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:23:28', '2024-01-11 16:23:28'),
(931, 1, 1, NULL, 'http://127.0.0.1:8000/admin/categories', '127.0.0.1', '2024-01-11 16:24:33', '2024-01-11 16:24:33'),
(932, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:24:34', '2024-01-11 16:24:34'),
(933, 1, 1, NULL, 'http://127.0.0.1:8000/admin/categories', '127.0.0.1', '2024-01-11 16:24:40', '2024-01-11 16:24:40'),
(934, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:24:41', '2024-01-11 16:24:41'),
(935, 1, 1, NULL, 'http://127.0.0.1:8000/admin/categories', '127.0.0.1', '2024-01-11 16:25:18', '2024-01-11 16:25:18'),
(936, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:25:19', '2024-01-11 16:25:19'),
(937, 1, 1, NULL, 'http://127.0.0.1:8000/admin/categories', '127.0.0.1', '2024-01-11 16:30:06', '2024-01-11 16:30:06'),
(938, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:30:07', '2024-01-11 16:30:07'),
(939, 1, 1, NULL, 'http://127.0.0.1:8000/admin/categories/create', '127.0.0.1', '2024-01-11 16:30:16', '2024-01-11 16:30:16'),
(940, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:30:17', '2024-01-11 16:30:17'),
(941, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-11 16:30:23', '2024-01-11 16:30:23'),
(942, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:30:25', '2024-01-11 16:30:25'),
(943, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/create', '127.0.0.1', '2024-01-11 16:30:33', '2024-01-11 16:30:33'),
(944, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:30:35', '2024-01-11 16:30:35'),
(945, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-11 16:31:23', '2024-01-11 16:31:23'),
(946, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-11 16:31:25', '2024-01-11 16:31:25'),
(947, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:31:27', '2024-01-11 16:31:27'),
(948, 1, 1, NULL, 'http://127.0.0.1:8000/admin/categories', '127.0.0.1', '2024-01-11 16:32:30', '2024-01-11 16:32:30'),
(949, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:32:32', '2024-01-11 16:32:32'),
(950, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-11 16:32:36', '2024-01-11 16:32:36'),
(951, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:32:37', '2024-01-11 16:32:37'),
(952, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/create', '127.0.0.1', '2024-01-11 16:32:39', '2024-01-11 16:32:39'),
(953, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:32:40', '2024-01-11 16:32:40'),
(954, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-11 16:33:10', '2024-01-11 16:33:10'),
(955, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-11 16:33:12', '2024-01-11 16:33:12'),
(956, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:33:13', '2024-01-11 16:33:13'),
(957, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/create', '127.0.0.1', '2024-01-11 16:33:17', '2024-01-11 16:33:17'),
(958, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:33:19', '2024-01-11 16:33:19'),
(959, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-11 16:33:48', '2024-01-11 16:33:48'),
(960, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-11 16:33:51', '2024-01-11 16:33:51'),
(961, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:33:52', '2024-01-11 16:33:52'),
(962, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/%D9%82%D8%B1%D9%8A%D8%A8%D8%A7-%D9%88%D8%B1%D9%82%D8%A9-%D8%B9%D9%85%D9%84-2/edit', '127.0.0.1', '2024-01-11 16:33:57', '2024-01-11 16:33:57'),
(963, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:33:58', '2024-01-11 16:33:58'),
(964, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/%D9%82%D8%B1%D9%8A%D8%A8%D8%A7-%D9%88%D8%B1%D9%82%D8%A9-%D8%B9%D9%85%D9%84-2', '127.0.0.1', '2024-01-11 16:34:06', '2024-01-11 16:34:06'),
(965, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-11 16:34:07', '2024-01-11 16:34:07'),
(966, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-11 16:34:08', '2024-01-11 16:34:08'),
(967, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-12 04:45:44', '2024-01-12 04:45:44'),
(968, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-12 08:31:12', '2024-01-12 08:31:12'),
(969, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles?page=2', '127.0.0.1', '2024-01-12 08:41:34', '2024-01-12 08:41:34'),
(970, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-12 08:41:34', '2024-01-12 08:41:34'),
(971, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/%D8%B9%D9%84%D9%85-%D8%A7%D9%84%D8%A7%D8%AC%D8%AA%D9%85%D8%A7%D8%B9-%D8%A3%D9%87%D9%85%D9%8A%D8%AA%D9%87-%D9%88%D8%B6%D8%B1%D9%88%D8%B1%D8%AA%D9%87-%D9%84', '127.0.0.1', '2024-01-12 08:41:40', '2024-01-12 08:41:40'),
(972, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-12 08:41:41', '2024-01-12 08:41:41'),
(973, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/%D8%B9%D9%84%D9%85-%D8%A7%D9%84%D8%A7%D8%AC%D8%AA%D9%85%D8%A7%D8%B9-%D8%A3%D9%87%D9%85%D9%8A%D8%AA%D9%87-%D9%88%D8%B6%D8%B1%D9%88%D8%B1%D8%AA%D9%87-%D9%84', '127.0.0.1', '2024-01-12 08:41:45', '2024-01-12 08:41:45'),
(974, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-12 08:41:45', '2024-01-12 08:41:45'),
(975, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-12 08:41:46', '2024-01-12 08:41:46'),
(976, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles?page=2', '127.0.0.1', '2024-01-12 08:41:50', '2024-01-12 08:41:50'),
(977, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-12 08:41:51', '2024-01-12 08:41:51'),
(978, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/%D9%85%D8%B1%D8%A7%D8%AC%D8%B9%D8%A9-%D9%83%D8%AA%D8%A7%D8%A8-%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B4%D8%B1%D8%B9-%D9%88%D8%A7%D9%84%D8%B9%D9%84%D9%88', '127.0.0.1', '2024-01-12 08:41:55', '2024-01-12 08:41:55'),
(979, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-12 08:41:56', '2024-01-12 08:41:56'),
(980, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/%D9%85%D8%B1%D8%A7%D8%AC%D8%B9%D8%A9-%D9%83%D8%AA%D8%A7%D8%A8-%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B4%D8%B1%D8%B9-%D9%88%D8%A7%D9%84%D8%B9%D9%84%D9%88', '127.0.0.1', '2024-01-12 08:42:01', '2024-01-12 08:42:01'),
(981, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-12 08:42:02', '2024-01-12 08:42:02'),
(982, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-12 08:42:03', '2024-01-12 08:42:03'),
(983, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/%D8%AF%D9%88%D8%B1-%D9%85%D9%88%D8%A7%D9%82%D8%B9-%D8%A7%D9%84%D8%AA%D9%88%D8%A7%D8%B5%D9%84-%D8%A7%D9%84%D8%A7%D8%AC%D8%AA%D9%85%D8%A7%D8%B9%D9%8A-%D9%81', '127.0.0.1', '2024-01-12 08:42:14', '2024-01-12 08:42:14'),
(984, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-12 08:42:15', '2024-01-12 08:42:15'),
(985, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/%D8%AF%D9%88%D8%B1-%D9%85%D9%88%D8%A7%D9%82%D8%B9-%D8%A7%D9%84%D8%AA%D9%88%D8%A7%D8%B5%D9%84-%D8%A7%D9%84%D8%A7%D8%AC%D8%AA%D9%85%D8%A7%D8%B9%D9%8A-%D9%81', '127.0.0.1', '2024-01-12 08:42:21', '2024-01-12 08:42:21'),
(986, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-12 08:42:21', '2024-01-12 08:42:21'),
(987, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-12 08:42:22', '2024-01-12 08:42:22'),
(988, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles?page=2', '127.0.0.1', '2024-01-12 08:42:33', '2024-01-12 08:42:33'),
(989, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-12 08:42:34', '2024-01-12 08:42:34'),
(990, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/%D8%A3%D8%AB%D8%B1-%D8%A7%D9%84%D8%A3%D8%B2%D9%85%D8%A9-%D8%A7%D9%84%D9%8A%D9%85%D9%86%D9%8A%D8%A9-%D9%81%D9%8A-%D8%A7%D9%86%D8%AA%D8%B4%D8%A7%D8%B1-%D8%B', '127.0.0.1', '2024-01-12 08:42:49', '2024-01-12 08:42:49'),
(991, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-12 08:42:50', '2024-01-12 08:42:50'),
(992, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/%D8%A3%D8%AB%D8%B1-%D8%A7%D9%84%D8%A3%D8%B2%D9%85%D8%A9-%D8%A7%D9%84%D9%8A%D9%85%D9%86%D9%8A%D8%A9-%D9%81%D9%8A-%D8%A7%D9%86%D8%AA%D8%B4%D8%A7%D8%B1-%D8%B', '127.0.0.1', '2024-01-12 08:42:54', '2024-01-12 08:42:54'),
(993, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-12 08:42:54', '2024-01-12 08:42:54'),
(994, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-12 08:42:55', '2024-01-12 08:42:55'),
(995, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-12 08:53:41', '2024-01-12 08:53:41'),
(996, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles?page=2', '127.0.0.1', '2024-01-12 08:53:44', '2024-01-12 08:53:44'),
(997, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-12 08:53:45', '2024-01-12 08:53:45'),
(998, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/%D8%A3%D8%AB%D8%B1-%D8%A7%D9%84%D8%A3%D8%B2%D9%85%D8%A9-%D8%A7%D9%84%D9%8A%D9%85%D9%86%D9%8A%D8%A9-%D9%81%D9%8A-%D8%A7%D9%86%D8%AA%D8%B4%D8%A7%D8%B1-%D8%B', '127.0.0.1', '2024-01-12 08:54:02', '2024-01-12 08:54:02'),
(999, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-12 08:54:04', '2024-01-12 08:54:04'),
(1000, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/%D8%A3%D8%AB%D8%B1-%D8%A7%D9%84%D8%A3%D8%B2%D9%85%D8%A9-%D8%A7%D9%84%D9%8A%D9%85%D9%86%D9%8A%D8%A9-%D9%81%D9%8A-%D8%A7%D9%86%D8%AA%D8%B4%D8%A7%D8%B1-%D8%B', '127.0.0.1', '2024-01-12 08:54:13', '2024-01-12 08:54:13'),
(1001, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-12 08:54:13', '2024-01-12 08:54:13'),
(1002, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-12 08:54:14', '2024-01-12 08:54:14'),
(1003, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles?page=2', '127.0.0.1', '2024-01-12 08:54:23', '2024-01-12 08:54:23'),
(1004, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-12 08:54:24', '2024-01-12 08:54:24'),
(1005, 1, 1, NULL, 'http://127.0.0.1:8000', '127.0.0.1', '2024-01-13 03:49:23', '2024-01-13 03:49:23'),
(1006, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-13 03:49:24', '2024-01-13 03:49:24'),
(1007, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-13 03:49:35', '2024-01-13 03:49:35'),
(1008, 1, 1, NULL, 'http://127.0.0.1:8000', '127.0.0.1', '2024-01-13 03:49:37', '2024-01-13 03:49:37'),
(1009, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-13 03:49:38', '2024-01-13 03:49:38'),
(1010, 1, 1, NULL, 'http://127.0.0.1:8000/blog', '127.0.0.1', '2024-01-13 03:49:53', '2024-01-13 03:49:53'),
(1011, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-13 03:50:02', '2024-01-13 03:50:02'),
(1012, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 03:50:28', '2024-01-13 03:50:28'),
(1013, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 03:51:29', '2024-01-13 03:51:29'),
(1014, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 03:52:06', '2024-01-13 03:52:06'),
(1015, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 03:52:30', '2024-01-13 03:52:30'),
(1016, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 03:53:31', '2024-01-13 03:53:31'),
(1017, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 03:55:25', '2024-01-13 03:55:25'),
(1018, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 03:56:25', '2024-01-13 03:56:25'),
(1019, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 03:58:25', '2024-01-13 03:58:25'),
(1020, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 03:59:25', '2024-01-13 03:59:25'),
(1021, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 04:01:25', '2024-01-13 04:01:25'),
(1022, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 04:03:25', '2024-01-13 04:03:25'),
(1023, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 04:04:25', '2024-01-13 04:04:25'),
(1024, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 04:06:25', '2024-01-13 04:06:25'),
(1025, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 04:08:25', '2024-01-13 04:08:25'),
(1026, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 04:09:25', '2024-01-13 04:09:25'),
(1027, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 04:11:25', '2024-01-13 04:11:25'),
(1028, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 04:13:25', '2024-01-13 04:13:25'),
(1029, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 04:15:25', '2024-01-13 04:15:25'),
(1030, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 04:16:08', '2024-01-13 04:16:08'),
(1031, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 04:16:25', '2024-01-13 04:16:25'),
(1032, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 04:17:25', '2024-01-13 04:17:25'),
(1033, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 04:18:25', '2024-01-13 04:18:25'),
(1034, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 04:19:25', '2024-01-13 04:19:25'),
(1035, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 04:21:25', '2024-01-13 04:21:25'),
(1036, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 04:22:25', '2024-01-13 04:22:25'),
(1037, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 04:24:25', '2024-01-13 04:24:25'),
(1038, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 04:25:25', '2024-01-13 04:25:25'),
(1039, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 04:27:25', '2024-01-13 04:27:25'),
(1040, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 04:28:03', '2024-01-13 04:28:03'),
(1041, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 04:28:10', '2024-01-13 04:28:10'),
(1042, 1, 1, NULL, 'http://127.0.0.1:8000', '127.0.0.1', '2024-01-13 06:11:29', '2024-01-13 06:11:29'),
(1043, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-13 06:11:31', '2024-01-13 06:11:31'),
(1044, 1, 1, NULL, 'http://127.0.0.1:8000/admin', '127.0.0.1', '2024-01-13 06:11:34', '2024-01-13 06:11:34'),
(1045, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-13 06:11:35', '2024-01-13 06:11:35'),
(1046, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-13 06:11:37', '2024-01-13 06:11:37'),
(1047, 1, 1, NULL, 'http://127.0.0.1:8000/admin/tags', '127.0.0.1', '2024-01-13 06:11:41', '2024-01-13 06:11:41'),
(1048, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-13 06:11:42', '2024-01-13 06:11:42'),
(1049, 1, 1, NULL, 'http://127.0.0.1:8000/admin/tags/create', '127.0.0.1', '2024-01-13 06:11:44', '2024-01-13 06:11:44'),
(1050, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-13 06:11:46', '2024-01-13 06:11:46'),
(1051, 1, 1, NULL, 'http://127.0.0.1:8000/admin/tags', '127.0.0.1', '2024-01-13 06:12:50', '2024-01-13 06:12:50'),
(1052, 1, 1, NULL, 'http://127.0.0.1:8000/admin/tags/create', '127.0.0.1', '2024-01-13 06:12:50', '2024-01-13 06:12:50'),
(1053, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-13 06:12:51', '2024-01-13 06:12:51'),
(1054, 1, 1, NULL, 'http://127.0.0.1:8000/admin/tags/create', '127.0.0.1', '2024-01-13 06:13:59', '2024-01-13 06:13:59'),
(1055, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-13 06:14:00', '2024-01-13 06:14:00'),
(1056, 1, 1, NULL, 'http://127.0.0.1:8000/admin/tags/create', '127.0.0.1', '2024-01-13 06:14:47', '2024-01-13 06:14:47'),
(1057, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-13 06:14:49', '2024-01-13 06:14:49'),
(1058, 1, 1, NULL, 'http://127.0.0.1:8000/admin/tags', '127.0.0.1', '2024-01-13 06:14:57', '2024-01-13 06:14:57'),
(1059, 1, 1, NULL, 'http://127.0.0.1:8000/admin/tags', '127.0.0.1', '2024-01-13 06:14:58', '2024-01-13 06:14:58'),
(1060, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-13 06:14:59', '2024-01-13 06:14:59'),
(1061, 1, 1, NULL, 'http://127.0.0.1:8000/admin/tags/eng/edit', '127.0.0.1', '2024-01-13 06:15:12', '2024-01-13 06:15:12'),
(1062, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-13 06:15:13', '2024-01-13 06:15:13'),
(1063, 1, 1, NULL, 'http://127.0.0.1:8000/admin/tags/eng', '127.0.0.1', '2024-01-13 06:15:32', '2024-01-13 06:15:32'),
(1064, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-13 06:16:08', '2024-01-13 06:16:08'),
(1065, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-13 06:16:09', '2024-01-13 06:16:09'),
(1066, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-13 06:16:10', '2024-01-13 06:16:10'),
(1067, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/%D8%AE%D9%84%D8%A7%D9%8A%D8%A7-%D8%A7%D9%84%D8%AA%D9%81%D9%83%D9%8A%D8%B1-%D8%A7%D9%84%D8%A7%D8%AC%D8%AA%D9%85%D8%A7%D8%B9%D9%8A%D8%A9-%D8%A7%D9%84%D8%BA%', '127.0.0.1', '2024-01-13 06:16:16', '2024-01-13 06:16:16'),
(1068, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-13 06:16:18', '2024-01-13 06:16:18'),
(1069, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/%D8%AE%D9%84%D8%A7%D9%8A%D8%A7-%D8%A7%D9%84%D8%AA%D9%81%D9%83%D9%8A%D8%B1-%D8%A7%D9%84%D8%A7%D8%AC%D8%AA%D9%85%D8%A7%D8%B9%D9%8A%D8%A9-%D8%A7%D9%84%D8%BA%', '127.0.0.1', '2024-01-13 06:19:19', '2024-01-13 06:19:19'),
(1070, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-13 06:19:20', '2024-01-13 06:19:20'),
(1071, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/%D8%AE%D9%84%D8%A7%D9%8A%D8%A7-%D8%A7%D9%84%D8%AA%D9%81%D9%83%D9%8A%D8%B1-%D8%A7%D9%84%D8%A7%D8%AC%D8%AA%D9%85%D8%A7%D8%B9%D9%8A%D8%A9-%D8%A7%D9%84%D8%BA%', '127.0.0.1', '2024-01-13 06:19:42', '2024-01-13 06:19:42'),
(1072, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-13 06:19:43', '2024-01-13 06:19:43'),
(1073, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/%D8%AE%D9%84%D8%A7%D9%8A%D8%A7-%D8%A7%D9%84%D8%AA%D9%81%D9%83%D9%8A%D8%B1-%D8%A7%D9%84%D8%A7%D8%AC%D8%AA%D9%85%D8%A7%D8%B9%D9%8A%D8%A9-%D8%A7%D9%84%D8%BA%', '127.0.0.1', '2024-01-13 06:19:53', '2024-01-13 06:19:53'),
(1074, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-13 06:19:54', '2024-01-13 06:19:54'),
(1075, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-13 06:19:56', '2024-01-13 06:19:56'),
(1076, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/%D8%AE%D9%84%D8%A7%D9%8A%D8%A7-%D8%A7%D9%84%D8%AA%D9%81%D9%83%D9%8A%D8%B1-%D8%A7%D9%84%D8%A7%D8%AC%D8%AA%D9%85%D8%A7%D8%B9%D9%8A%D8%A9-%D8%A7%D9%84%D8%BA%', '127.0.0.1', '2024-01-13 06:27:05', '2024-01-13 06:27:05'),
(1077, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-13 06:27:07', '2024-01-13 06:27:07'),
(1078, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/%D8%AE%D9%84%D8%A7%D9%8A%D8%A7-%D8%A7%D9%84%D8%AA%D9%81%D9%83%D9%8A%D8%B1-%D8%A7%D9%84%D8%A7%D8%AC%D8%AA%D9%85%D8%A7%D8%B9%D9%8A%D8%A9-%D8%A7%D9%84%D8%BA%', '127.0.0.1', '2024-01-13 06:27:35', '2024-01-13 06:27:35'),
(1079, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-13 06:27:35', '2024-01-13 06:27:35'),
(1080, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-13 06:27:37', '2024-01-13 06:27:37'),
(1081, 1, 1, NULL, 'http://127.0.0.1:8000', '127.0.0.1', '2024-01-14 10:40:31', '2024-01-14 10:40:31'),
(1082, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 10:40:33', '2024-01-14 10:40:33'),
(1083, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-14 10:40:54', '2024-01-14 10:40:54'),
(1084, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-14 10:40:57', '2024-01-14 10:40:57'),
(1085, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-14 10:40:58', '2024-01-14 10:40:58'),
(1086, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 10:44:08', '2024-01-14 10:44:08'),
(1087, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/%D9%82%D8%B1%D9%8A%D8%A8%D8%A7-%D9%88%D8%B1%D9%82%D8%A9-%D8%B9%D9%85%D9%84-2/edit', '127.0.0.1', '2024-01-14 10:44:14', '2024-01-14 10:44:14'),
(1088, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 10:44:16', '2024-01-14 10:44:16'),
(1089, 1, 1, NULL, 'http://127.0.0.1:8000', '127.0.0.1', '2024-01-14 10:45:18', '2024-01-14 10:45:18'),
(1090, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 10:45:19', '2024-01-14 10:45:19'),
(1091, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-14 10:45:20', '2024-01-14 10:45:20'),
(1092, 1, 1, NULL, 'http://127.0.0.1:8000/admin/notifications/ajax', '127.0.0.1', '2024-01-14 10:45:23', '2024-01-14 10:45:23'),
(1093, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 15:10:47', '2024-01-14 15:10:47'),
(1094, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/%D9%82%D8%B1%D9%8A%D8%A8%D8%A7-%D9%88%D8%B1%D9%82%D8%A9-%D8%B9%D9%85%D9%84-2/edit', '127.0.0.1', '2024-01-14 15:10:49', '2024-01-14 15:10:49'),
(1095, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 15:10:51', '2024-01-14 15:10:51'),
(1096, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/%D9%82%D8%B1%D9%8A%D8%A8%D8%A7-%D9%88%D8%B1%D9%82%D8%A9-%D8%B9%D9%85%D9%84-2', '127.0.0.1', '2024-01-14 15:13:43', '2024-01-14 15:13:43'),
(1097, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-14 15:13:44', '2024-01-14 15:13:44'),
(1098, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 15:13:46', '2024-01-14 15:13:46'),
(1099, 1, 1, NULL, 'http://127.0.0.1:8000/admin/profile/edit', '127.0.0.1', '2024-01-14 15:13:54', '2024-01-14 15:13:54'),
(1100, 1, 1, NULL, 'http://127.0.0.1:8000/admin/profile/edit', '127.0.0.1', '2024-01-14 15:13:56', '2024-01-14 15:13:56'),
(1101, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 15:13:56', '2024-01-14 15:13:56'),
(1102, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 15:13:57', '2024-01-14 15:13:57'),
(1103, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-14 15:15:00', '2024-01-14 15:15:00'),
(1104, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 15:15:01', '2024-01-14 15:15:01'),
(1105, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-14 15:16:21', '2024-01-14 15:16:21'),
(1106, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 15:16:22', '2024-01-14 15:16:22'),
(1107, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-14 15:17:38', '2024-01-14 15:17:38'),
(1108, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 15:17:39', '2024-01-14 15:17:39'),
(1109, 1, 1, NULL, 'http://127.0.0.1:8000/admin/users', '127.0.0.1', '2024-01-14 15:18:31', '2024-01-14 15:18:31'),
(1110, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 15:18:32', '2024-01-14 15:18:32'),
(1111, 1, 1, NULL, 'http://127.0.0.1:8000/admin/roles', '127.0.0.1', '2024-01-14 15:18:35', '2024-01-14 15:18:35'),
(1112, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 15:18:36', '2024-01-14 15:18:36'),
(1113, 1, 1, NULL, 'http://127.0.0.1:8000/admin/roles/4', '127.0.0.1', '2024-01-14 15:18:44', '2024-01-14 15:18:44'),
(1114, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 15:18:45', '2024-01-14 15:18:45'),
(1115, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 15:18:52', '2024-01-14 15:18:52'),
(1116, 1, 1, NULL, 'http://127.0.0.1:8000/admin/roles/2/edit', '127.0.0.1', '2024-01-14 15:18:55', '2024-01-14 15:18:55'),
(1117, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 15:18:56', '2024-01-14 15:18:56'),
(1118, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-14 15:19:19', '2024-01-14 15:19:19'),
(1119, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 15:19:21', '2024-01-14 15:19:21'),
(1120, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles?page=2', '127.0.0.1', '2024-01-14 15:20:09', '2024-01-14 15:20:09'),
(1121, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 15:20:10', '2024-01-14 15:20:10'),
(1122, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/%D9%85%D8%B1%D8%A7%D8%AC%D8%B9%D8%A9-%D9%83%D8%AA%D8%A7%D8%A8-%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B4%D8%B1%D8%B9-%D9%88%D8%A7%D9%84%D8%B9%D9%84%D9%88', '127.0.0.1', '2024-01-14 15:20:16', '2024-01-14 15:20:16'),
(1123, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 15:20:18', '2024-01-14 15:20:18'),
(1124, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles/%D9%85%D8%B1%D8%A7%D8%AC%D8%B9%D8%A9-%D9%83%D8%AA%D8%A7%D8%A8-%D8%B9%D9%84%D9%88%D9%85-%D8%A7%D9%84%D8%B4%D8%B1%D8%B9-%D9%88%D8%A7%D9%84%D8%B9%D9%84%D9%88', '127.0.0.1', '2024-01-14 15:20:34', '2024-01-14 15:20:34'),
(1125, 1, 1, NULL, 'http://127.0.0.1:8000/admin/articles', '127.0.0.1', '2024-01-14 15:20:34', '2024-01-14 15:20:34'),
(1126, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 15:20:36', '2024-01-14 15:20:36'),
(1127, 1, 1, NULL, 'http://127.0.0.1:8000/admin/editors', '127.0.0.1', '2024-01-14 15:24:34', '2024-01-14 15:24:34'),
(1128, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 15:24:35', '2024-01-14 15:24:35'),
(1129, 1, 1, NULL, 'http://127.0.0.1:8000/admin/editors/%D8%AE%D9%84%D9%8A%D9%84-%D8%A7%D9%84%D8%B3%D9%84%D9%85%D9%8A/edit', '127.0.0.1', '2024-01-14 15:24:41', '2024-01-14 15:24:41'),
(1130, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 15:24:42', '2024-01-14 15:24:42'),
(1131, 1, 1, NULL, 'http://127.0.0.1:8000/admin/editors/%D8%AE%D9%84%D9%8A%D9%84-%D8%A7%D9%84%D8%B3%D9%84%D9%85%D9%8A', '127.0.0.1', '2024-01-14 15:24:58', '2024-01-14 15:24:58'),
(1132, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 15:30:09', '2024-01-14 15:30:09'),
(1133, 1, 1, NULL, 'http://127.0.0.1:8000/admin/editors/%D8%AE%D9%84%D9%8A%D9%84-%D8%A7%D9%84%D8%B3%D9%84%D9%85%D9%8A', '127.0.0.1', '2024-01-14 15:43:14', '2024-01-14 15:43:14'),
(1134, 1, 1, NULL, 'http://127.0.0.1:8000/admin/editors/%D8%AE%D9%84%D9%8A%D9%84-%D8%A7%D9%84%D8%B3%D9%84%D9%85%D9%8A', '127.0.0.1', '2024-01-14 15:51:12', '2024-01-14 15:51:12'),
(1135, 1, 1, NULL, 'http://127.0.0.1:8000/admin/editors/%D8%AE%D9%84%D9%8A%D9%84-%D8%A7%D9%84%D8%B3%D9%84%D9%85%D9%8A', '127.0.0.1', '2024-01-14 15:54:59', '2024-01-14 15:54:59'),
(1136, 1, 1, NULL, 'http://127.0.0.1:8000/admin/editors/%D8%AE%D9%84%D9%8A%D9%84-%D8%A7%D9%84%D8%B3%D9%84%D9%85%D9%8A', '127.0.0.1', '2024-01-14 16:00:50', '2024-01-14 16:00:50'),
(1137, 1, 1, NULL, 'http://127.0.0.1:8000/admin/editors/%D8%AE%D9%84%D9%8A%D9%84-%D8%A7%D9%84%D8%B3%D9%84%D9%85%D9%8A', '127.0.0.1', '2024-01-14 16:05:36', '2024-01-14 16:05:36'),
(1138, 1, 1, NULL, 'http://127.0.0.1:8000/admin/editors', '127.0.0.1', '2024-01-14 16:05:38', '2024-01-14 16:05:38'),
(1139, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 16:05:40', '2024-01-14 16:05:40'),
(1140, 1, 1, NULL, 'http://127.0.0.1:8000/admin/editors/%D8%AE%D9%84%D9%8A%D9%84-%D8%A7%D9%84%D8%B3%D9%84%D9%85%D9%8A/edit', '127.0.0.1', '2024-01-14 16:12:11', '2024-01-14 16:12:11'),
(1141, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 16:12:13', '2024-01-14 16:12:13'),
(1142, 1, 1, NULL, 'http://127.0.0.1:8000/admin/editors/%D8%AE%D9%84%D9%8A%D9%84-%D8%A7%D9%84%D8%B3%D9%84%D9%85%D9%8A', '127.0.0.1', '2024-01-14 16:12:18', '2024-01-14 16:12:18'),
(1143, 1, 1, NULL, 'http://127.0.0.1:8000/admin/editors', '127.0.0.1', '2024-01-14 16:12:19', '2024-01-14 16:12:19'),
(1144, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 16:12:20', '2024-01-14 16:12:20'),
(1145, 1, 1, NULL, 'http://127.0.0.1:8000/admin/editors/%D8%AD%D9%85%D9%8A%D8%B1-%D8%A7%D9%84%D8%AD%D9%88%D8%B1%D9%8A/edit', '127.0.0.1', '2024-01-14 16:18:16', '2024-01-14 16:18:16'),
(1146, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 16:18:18', '2024-01-14 16:18:18'),
(1147, 1, 1, NULL, 'http://127.0.0.1:8000/admin/editors/%D8%AD%D9%85%D9%8A%D8%B1-%D8%A7%D9%84%D8%AD%D9%88%D8%B1%D9%8A', '127.0.0.1', '2024-01-14 16:18:25', '2024-01-14 16:18:25'),
(1148, 1, 1, NULL, 'http://127.0.0.1:8000/admin/editors', '127.0.0.1', '2024-01-14 16:18:25', '2024-01-14 16:18:25'),
(1149, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 16:18:26', '2024-01-14 16:18:26'),
(1150, 1, 1, NULL, 'http://127.0.0.1:8000/admin/editors/%D8%AD%D9%85%D9%8A%D8%B1-%D8%A7%D9%84%D8%AD%D9%88%D8%B1%D9%8A/edit', '127.0.0.1', '2024-01-14 16:19:55', '2024-01-14 16:19:55'),
(1151, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 16:19:56', '2024-01-14 16:19:56'),
(1152, 1, 1, NULL, 'http://127.0.0.1:8000/admin/editors/%D8%AD%D9%85%D9%8A%D8%B1-%D8%A7%D9%84%D8%AD%D9%88%D8%B1%D9%8A', '127.0.0.1', '2024-01-14 16:20:05', '2024-01-14 16:20:05'),
(1153, 1, 1, NULL, 'http://127.0.0.1:8000/admin/editors', '127.0.0.1', '2024-01-14 16:20:07', '2024-01-14 16:20:07'),
(1154, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 16:20:08', '2024-01-14 16:20:08'),
(1155, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 16:28:18', '2024-01-14 16:28:18'),
(1156, 1, 1, NULL, 'http://127.0.0.1:8000/admin/editors', '127.0.0.1', '2024-01-14 16:28:18', '2024-01-14 16:28:18'),
(1157, 1, 1, NULL, 'http://127.0.0.1:8000/admin/pages', '127.0.0.1', '2024-01-14 16:45:24', '2024-01-14 16:45:24'),
(1158, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 16:45:25', '2024-01-14 16:45:25'),
(1159, 1, 1, NULL, 'http://127.0.0.1:8000/admin/pages/%D8%B9%D9%86-%D8%A7%D9%84%D9%85%D8%B1%D9%83%D8%B2/edit', '127.0.0.1', '2024-01-14 16:45:41', '2024-01-14 16:45:41'),
(1160, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 16:45:42', '2024-01-14 16:45:42'),
(1161, 1, 1, NULL, 'http://127.0.0.1:8000/admin/pages/%D8%B9%D9%86-%D8%A7%D9%84%D9%85%D8%B1%D9%83%D8%B2', '127.0.0.1', '2024-01-14 16:46:35', '2024-01-14 16:46:35'),
(1162, 1, 1, NULL, 'http://127.0.0.1:8000/admin/pages', '127.0.0.1', '2024-01-14 16:46:36', '2024-01-14 16:46:36');
INSERT INTO `rate_limit_details` (`id`, `user_id`, `rate_limit_id`, `query`, `url`, `ip`, `created_at`, `updated_at`) VALUES
(1163, NULL, 1, NULL, 'http://127.0.0.1:8000/manifest.json', '127.0.0.1', '2024-01-14 16:46:37', '2024-01-14 16:46:37');

-- --------------------------------------------------------

--
-- Table structure for table `redirections`
--

CREATE TABLE `redirections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report_errors`
--

CREATE TABLE `report_errors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `report_errors`
--

INSERT INTO `report_errors` (`id`, `user_id`, `title`, `code`, `url`, `ip`, `user_agent`, `request`, `description`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 'There is no permission named `editors-create` for guard `web`.', '500', 'http://127.0.0.1:8001/admin/roles', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\spatie\\laravel-permission\\src\\Exceptions\\PermissionDoesNotExist.php Line : 11{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 04:59:17', '2024-01-04 04:59:17'),
(2, 1, 'There is no permission named `editors-create` for guard `web`.', '500', 'http://127.0.0.1:8001/admin/roles', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\spatie\\laravel-permission\\src\\Exceptions\\PermissionDoesNotExist.php Line : 11{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 04:59:26', '2024-01-04 04:59:26'),
(3, 1, 'There is no permission named `editors-create` for guard `web`.', '500', 'http://127.0.0.1:8001/admin/roles', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\spatie\\laravel-permission\\src\\Exceptions\\PermissionDoesNotExist.php Line : 11{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 05:00:30', '2024-01-04 05:00:30'),
(4, 1, 'There is no permission named `editors-create` for guard `web`.', '500', 'http://127.0.0.1:8001/admin/roles', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\spatie\\laravel-permission\\src\\Exceptions\\PermissionDoesNotExist.php Line : 11{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 05:09:28', '2024-01-04 05:09:28'),
(5, 1, 'There is no permission named `editors-create` for guard `web`.', '500', 'http://127.0.0.1:8001/admin/roles', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\spatie\\laravel-permission\\src\\Exceptions\\PermissionDoesNotExist.php Line : 11{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 06:00:58', '2024-01-04 06:00:58'),
(6, 1, 'There is no permission named `editors-create` for guard `web`.', '500', 'http://127.0.0.1:8001/admin/roles', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\spatie\\laravel-permission\\src\\Exceptions\\PermissionDoesNotExist.php Line : 11{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 06:02:45', '2024-01-04 06:02:45'),
(7, 1, 'There is no permission named `editors-create` for guard `web`.', '500', 'http://127.0.0.1:8001/admin/roles', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\spatie\\laravel-permission\\src\\Exceptions\\PermissionDoesNotExist.php Line : 11{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 06:04:43', '2024-01-04 06:04:43'),
(8, 1, 'There is no permission named `editors-create` for guard `web`.', '500', 'http://127.0.0.1:8001/admin/roles', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\spatie\\laravel-permission\\src\\Exceptions\\PermissionDoesNotExist.php Line : 11{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 06:06:17', '2024-01-04 06:06:17'),
(9, 1, 'There is no permission named `editors-create` for guard `web`.', '500', 'http://127.0.0.1:8001/admin/roles', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\spatie\\laravel-permission\\src\\Exceptions\\PermissionDoesNotExist.php Line : 11{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 06:13:23', '2024-01-04 06:13:23'),
(10, 1, 'There is no permission named `editors-create` for guard `web`.', '500', 'http://127.0.0.1:8001/admin/roles', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\spatie\\laravel-permission\\src\\Exceptions\\PermissionDoesNotExist.php Line : 11{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 06:13:53', '2024-01-04 06:13:53'),
(11, 1, 'Route [admin.editors.index] not defined.', '500', 'http://127.0.0.1:8001/admin/roles/1/edit', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\UrlGenerator.php Line : 479{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 06:31:19', '2024-01-04 06:31:19'),
(12, 1, 'Route [admin.editors.index] not defined.', '500', 'http://127.0.0.1:8001/admin/roles/1/edit', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\UrlGenerator.php Line : 479{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 06:34:05', '2024-01-04 06:34:05'),
(13, 1, 'SQLSTATE[42S22]: Column not found: 1054 Unknown column \'article_categories.editor_id\' in \'where clause\' (Connection: mysql, SQL: select `editors`.*, (select count(*) from `articles` inner join `article_categories` on `articles`.`id` = `article_categories`.`article_id` where `editors`.`id` = `article_categories`.`editor_id`) as `articles_count` from `editors` order by `id` desc limit 15 offset 0)', '500', 'http://127.0.0.1:8001/admin/editors/create', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php Line : 801{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 06:44:25', '2024-01-04 06:44:25'),
(14, 1, 'SQLSTATE[42S22]: Column not found: 1054 Unknown column \'article_categories.editor_id\' in \'where clause\' (Connection: mysql, SQL: select `editors`.*, (select count(*) from `articles` inner join `article_categories` on `articles`.`id` = `article_categories`.`article_id` where `editors`.`id` = `article_categories`.`editor_id`) as `articles_count` from `editors` order by `id` desc limit 15 offset 0)', '500', 'http://127.0.0.1:8001/admin/editors/create', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php Line : 801{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 06:48:21', '2024-01-04 06:48:21'),
(15, 1, 'SQLSTATE[42S02]: Base table or view not found: 1146 Table \'updated_civil_center.article_editors\' doesn\'t exist (Connection: mysql, SQL: select `editors`.*, (select count(*) from `articles` inner join `article_editors` on `articles`.`id` = `article_editors`.`article_id` where `editors`.`id` = `article_editors`.`editor_id`) as `articles_count` from `editors` order by `id` desc limit 15 offset 0)', '500', 'http://127.0.0.1:8001/admin/editors/create', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php Line : 801{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 06:48:55', '2024-01-04 06:48:55'),
(16, 1, 'SQLSTATE[42S22]: Column not found: 1054 Unknown column \'articles.editor_id\' in \'where clause\' (Connection: mysql, SQL: select `editors`.*, (select count(*) from `articles` where `editors`.`id` = `articles`.`editor_id`) as `articles_count` from `editors` order by `id` desc limit 15 offset 0)', '500', 'http://127.0.0.1:8001/admin/editors/create', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php Line : 801{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 06:50:57', '2024-01-04 06:50:57'),
(17, 1, 'Undefined property: Illuminate\\Pagination\\LengthAwarePaginator::$id', '500', 'http://127.0.0.1:8001/admin/editors/create', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\resources\\views\\admin\\editors\\index.blade.php Line : 49{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 07:02:24', '2024-01-04 07:02:24'),
(18, 1, 'Call to undefined method App\\Models\\Editor::avatar()', '500', 'http://127.0.0.1:8001/admin/editors/create', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ForwardsCalls.php Line : 67{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 07:03:07', '2024-01-04 07:03:07'),
(19, 1, 'Undefined variable $editors', '500', 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\resources\\views\\admin\\articles\\create.blade.php Line : 22{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 07:33:50', '2024-01-04 07:33:50'),
(20, 1, 'SQLSTATE[23000]: Integrity constraint violation: 1452 Cannot add or update a child row: a foreign key constraint fails (`updated_civil_center`.`articles`, CONSTRAINT `articles_editor_id_foreign` FOREIGN KEY (`editor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE) (Connection: mysql, SQL: insert into `articles` (`user_id`, `editor_id`, `slug`, `is_featured`, `title`, `description`, `meta_description`, `updated_at`, `created_at`) values (1, 10, قراءة-في-كتاب-تقارب-العلوم-الشرعية-والاجتماعية, 0, قراءة في كتاب تقارب العلوم الشرعية والاجتماعية, <p>قراءة في كتاب تقارب العلوم الشرعية والاجتماعية</p>, ?, 2024-01-04 10:37:44, 2024-01-04 10:37:44))', '500', 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '{\"_token\":\"rj3eKcL2rvvGPoRQ4UQFJG455BdTRNRqZGvt1yNb\",\"temp_file_selector\":\"65968a6e2e87b\",\"editor_id\":\"10\",\"category_id\":\"4\",\"title\":\"\\u0642\\u0631\\u0627\\u0621\\u0629 \\u0641\\u064a \\u0643\\u062a\\u0627\\u0628 \\u062a\\u0642\\u0627\\u0631\\u0628 \\u0627\\u0644\\u0639\\u0644\\u0648\\u0645 \\u0627\\u0644\\u0634\\u0631\\u0639\\u064a\\u0629 \\u0648\\u0627\\u0644\\u0627\\u062c\\u062a\\u0645\\u0627\\u0639\\u064a\\u0629\",\"slug\":\"\\u0642\\u0631\\u0627\\u0621\\u0629-\\u0641\\u064a-\\u0643\\u062a\\u0627\\u0628-\\u062a\\u0642\\u0627\\u0631\\u0628-\\u0627\\u0644\\u0639\\u0644\\u0648\\u0645-\\u0627\\u0644\\u0634\\u0631\\u0639\\u064a\\u0629-\\u0648\\u0627\\u0644\\u0627\\u062c\\u062a\\u0645\\u0627\\u0639\\u064a\\u0629\",\"description\":\"<p>\\u0642\\u0631\\u0627\\u0621\\u0629 \\u0641\\u064a \\u0643\\u062a\\u0627\\u0628 \\u062a\\u0642\\u0627\\u0631\\u0628 \\u0627\\u0644\\u0639\\u0644\\u0648\\u0645 \\u0627\\u0644\\u0634\\u0631\\u0639\\u064a\\u0629 \\u0648\\u0627\\u0644\\u0627\\u062c\\u062a\\u0645\\u0627\\u0639\\u064a\\u0629<\\/p>\",\"meta_description\":null,\"tag_id\":[\"1\"],\"is_featured\":\"0\"}', 'Error : D:\\new-civil-center\\dashboard\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php Line : 801{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 07:37:44', '2024-01-04 07:37:44'),
(21, 1, 'SQLSTATE[23000]: Integrity constraint violation: 1452 Cannot add or update a child row: a foreign key constraint fails (`updated_civil_center`.`articles`, CONSTRAINT `articles_editor_id_foreign` FOREIGN KEY (`editor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE) (Connection: mysql, SQL: insert into `articles` (`user_id`, `editor_id`, `slug`, `is_featured`, `title`, `description`, `meta_description`, `updated_at`, `created_at`) values (1, 10, قراءة-في-كتاب-تقارب-العلوم-الشرعية-والاجتماعية, 0, قراءة في كتاب تقارب العلوم الشرعية والاجتماعية, <p>قراءة في كتاب تقارب العلوم الشرعية والاجتماعية</p>, ?, 2024-01-04 10:45:10, 2024-01-04 10:45:10))', '500', 'http://127.0.0.1:8001/admin/articles/create', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '{\"_token\":\"rj3eKcL2rvvGPoRQ4UQFJG455BdTRNRqZGvt1yNb\",\"temp_file_selector\":\"65968a6e2e87b\",\"editor_id\":\"10\",\"category_id\":\"4\",\"title\":\"\\u0642\\u0631\\u0627\\u0621\\u0629 \\u0641\\u064a \\u0643\\u062a\\u0627\\u0628 \\u062a\\u0642\\u0627\\u0631\\u0628 \\u0627\\u0644\\u0639\\u0644\\u0648\\u0645 \\u0627\\u0644\\u0634\\u0631\\u0639\\u064a\\u0629 \\u0648\\u0627\\u0644\\u0627\\u062c\\u062a\\u0645\\u0627\\u0639\\u064a\\u0629\",\"slug\":\"\\u0642\\u0631\\u0627\\u0621\\u0629-\\u0641\\u064a-\\u0643\\u062a\\u0627\\u0628-\\u062a\\u0642\\u0627\\u0631\\u0628-\\u0627\\u0644\\u0639\\u0644\\u0648\\u0645-\\u0627\\u0644\\u0634\\u0631\\u0639\\u064a\\u0629-\\u0648\\u0627\\u0644\\u0627\\u062c\\u062a\\u0645\\u0627\\u0639\\u064a\\u0629\",\"description\":\"<p>\\u0642\\u0631\\u0627\\u0621\\u0629 \\u0641\\u064a \\u0643\\u062a\\u0627\\u0628 \\u062a\\u0642\\u0627\\u0631\\u0628 \\u0627\\u0644\\u0639\\u0644\\u0648\\u0645 \\u0627\\u0644\\u0634\\u0631\\u0639\\u064a\\u0629 \\u0648\\u0627\\u0644\\u0627\\u062c\\u062a\\u0645\\u0627\\u0639\\u064a\\u0629<\\/p>\",\"meta_description\":null,\"tag_id\":[\"1\"],\"is_featured\":\"0\"}', 'Error : D:\\new-civil-center\\dashboard\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php Line : 801{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 07:45:10', '2024-01-04 07:45:10'),
(22, 1, 'SQLSTATE[42S22]: Column not found: 1054 Unknown column \'name\' in \'order clause\' (Connection: mysql, SQL: select * from `categories` order by `name` desc)', '500', 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php Line : 801{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 08:09:10', '2024-01-04 08:09:10'),
(23, 1, 'Attempt to read property \"name\" on null', '500', 'http://127.0.0.1:8001/admin/article-comments', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\resources\\views\\admin\\articles\\index.blade.php Line : 57{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 08:14:31', '2024-01-04 08:14:31'),
(24, 1, 'Attempt to read property \"name\" on null', '500', 'http://127.0.0.1:8001/admin/article-comments', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\resources\\views\\admin\\articles\\index.blade.php Line : 58{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 08:21:29', '2024-01-04 08:21:29'),
(25, 1, 'Attempt to read property \"title\" on null', '500', 'http://127.0.0.1:8001/admin/article-comments', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\resources\\views\\admin\\articles\\index.blade.php Line : 58{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 08:21:40', '2024-01-04 08:21:40'),
(26, 1, 'Call to undefined relationship [categories] on model [App\\Models\\Article].', '500', 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\RelationNotFoundException.php Line : 35{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 08:24:05', '2024-01-04 08:24:05'),
(27, 1, 'Call to a member function pluck() on null', '500', 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\resources\\views\\admin\\articles\\edit.blade.php Line : 24{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 08:24:06', '2024-01-04 08:24:06'),
(28, 1, 'Call to a member function pluck() on null', '500', 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\resources\\views\\admin\\articles\\edit.blade.php Line : 24{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 08:24:09', '2024-01-04 08:24:09'),
(29, 1, 'Call to undefined relationship [categories] on model [App\\Models\\Article].', '500', 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\RelationNotFoundException.php Line : 35{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 08:31:07', '2024-01-04 08:31:07'),
(30, 1, 'foreach() argument must be of type array|object, null given', '500', 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\resources\\views\\front\\pages\\article.blade.php Line : 60{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 08:32:58', '2024-01-04 08:32:58'),
(31, 1, 'Call to undefined relationship [categories] on model [App\\Models\\Article].', '500', 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\RelationNotFoundException.php Line : 35{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 08:34:49', '2024-01-04 08:34:49'),
(32, 1, 'Attempt to read property \"title\" on null', '500', 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\resources\\views\\front\\pages\\article.blade.php Line : 188{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 08:35:56', '2024-01-04 08:35:56'),
(33, 1, 'Missing required parameter for [Route: category.show] [URI: category/{category}] [Missing parameter: category].', '500', 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Exceptions\\UrlGenerationException.php Line : 35{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 08:36:56', '2024-01-04 08:36:56'),
(34, 1, 'Missing required parameter for [Route: category.show] [URI: category/{category}] [Missing parameter: category].', '500', 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Exceptions\\UrlGenerationException.php Line : 35{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 08:37:01', '2024-01-04 08:37:01'),
(35, 1, 'Missing required parameter for [Route: category.show] [URI: category/{category}] [Missing parameter: category].', '500', 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Exceptions\\UrlGenerationException.php Line : 35{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 08:38:48', '2024-01-04 08:38:48'),
(36, 1, 'Missing required parameter for [Route: category.show] [URI: category/{category}] [Missing parameter: category].', '500', 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Exceptions\\UrlGenerationException.php Line : 35{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 08:40:11', '2024-01-04 08:40:11'),
(37, 1, 'Attempt to read property \"title\" on null', '500', 'http://127.0.0.1:8001/admin/articles', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\resources\\views\\front\\pages\\article.blade.php Line : 188{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-04 08:40:23', '2024-01-04 08:40:23'),
(38, 1, 'View [index] not found.', '500', 'http://127.0.0.1:8001/admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\laravel\\framework\\src\\Illuminate\\View\\FileViewFinder.php Line : 137{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-10 01:32:57', '2024-01-10 01:32:57'),
(39, 1, 'View [index] not found.', '500', 'http://127.0.0.1:8001', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\laravel\\framework\\src\\Illuminate\\View\\FileViewFinder.php Line : 137{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-10 01:33:58', '2024-01-10 01:33:58'),
(40, 1, 'Call to undefined relationship [categories] on model [App\\Models\\Article].', '500', 'http://127.0.0.1:8000/', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '[]', 'Error : D:\\new-civil-center\\dashboard\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\RelationNotFoundException.php Line : 35{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-13 03:49:53', '2024-01-13 03:49:53'),
(41, 1, 'Class \"App\\Http\\Requests\\UpdateTagRequest\" does not exist', '500', 'http://127.0.0.1:8000/admin/tags/eng/edit', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '{\"_token\":\"cnb6iLEndqD3AH2LD1yn1gY3o8d0EONd54VDIJAH\",\"_method\":\"PUT\",\"tag_name\":\"\\u0645\\u062c\\u062a\\u0645\\u0639\",\"slug\":\"\\u0645\\u062c\\u062a\\u0645\\u0639\"}', 'Error : D:\\new-civil-center\\dashboard\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ResolvesRouteDependencies.php Line : 81{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-13 06:15:32', '2024-01-13 06:15:32'),
(42, 1, 'App\\Models\\Editor::addMedia(): Argument #1 ($file) must be of type Symfony\\Component\\HttpFoundation\\File\\UploadedFile|string, null given, called in D:\\new-civil-center\\dashboard\\app\\Http\\Controllers\\Backend\\BackendEditorController.php on line 126', '500', 'http://127.0.0.1:8000/admin/editors/%D8%AE%D9%84%D9%8A%D9%84-%D8%A7%D9%84%D8%B3%D9%84%D9%85%D9%8A/edit', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '{\"_token\":\"GtCuwHyuaDEjx4fGl1bD09CySNpncCKDm4oGwGza\",\"_method\":\"PUT\",\"temp_file_selector\":\"65a426e982d33\",\"name\":\"\\u062e\\u0644\\u064a\\u0644 \\u0627\\u0644\\u0633\\u0644\\u0645\\u064a\",\"slug\":\"\\u062e\\u0644\\u064a\\u0644-\\u0627\\u0644\\u0633\\u0644\\u0645\\u064a\",\"description\":null,\"meta_description\":null,\"avatar\":{}}', 'Error : D:\\new-civil-center\\dashboard\\vendor\\spatie\\laravel-medialibrary\\src\\InteractsWithMedia.php Line : 69{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-14 15:24:58', '2024-01-14 15:24:58'),
(43, 1, 'App\\Models\\Editor::addMedia(): Argument #1 ($file) must be of type Symfony\\Component\\HttpFoundation\\File\\UploadedFile|string, null given, called in D:\\new-civil-center\\dashboard\\app\\Http\\Controllers\\Backend\\BackendEditorController.php on line 126', '500', 'http://127.0.0.1:8000/admin/editors/%D8%AE%D9%84%D9%8A%D9%84-%D8%A7%D9%84%D8%B3%D9%84%D9%85%D9%8A/edit', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '{\"_token\":\"GtCuwHyuaDEjx4fGl1bD09CySNpncCKDm4oGwGza\",\"_method\":\"PUT\",\"temp_file_selector\":\"65a426e982d33\",\"name\":\"\\u062e\\u0644\\u064a\\u0644 \\u0627\\u0644\\u0633\\u0644\\u0645\\u064a\",\"slug\":\"\\u062e\\u0644\\u064a\\u0644-\\u0627\\u0644\\u0633\\u0644\\u0645\\u064a\",\"description\":null,\"meta_description\":null,\"avatar\":{}}', 'Error : D:\\new-civil-center\\dashboard\\vendor\\spatie\\laravel-medialibrary\\src\\InteractsWithMedia.php Line : 69{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-14 15:43:14', '2024-01-14 15:43:14'),
(44, 1, 'App\\Models\\Editor::addMedia(): Argument #1 ($file) must be of type Symfony\\Component\\HttpFoundation\\File\\UploadedFile|string, null given, called in D:\\new-civil-center\\dashboard\\app\\Http\\Controllers\\Backend\\BackendEditorController.php on line 126', '500', 'http://127.0.0.1:8000/admin/editors/%D8%AE%D9%84%D9%8A%D9%84-%D8%A7%D9%84%D8%B3%D9%84%D9%85%D9%8A/edit', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '{\"_token\":\"GtCuwHyuaDEjx4fGl1bD09CySNpncCKDm4oGwGza\",\"_method\":\"PUT\",\"temp_file_selector\":\"65a426e982d33\",\"name\":\"\\u062e\\u0644\\u064a\\u0644 \\u0627\\u0644\\u0633\\u0644\\u0645\\u064a\",\"slug\":\"\\u062e\\u0644\\u064a\\u0644-\\u0627\\u0644\\u0633\\u0644\\u0645\\u064a\",\"description\":null,\"meta_description\":null,\"avatar\":{}}', 'Error : D:\\new-civil-center\\dashboard\\vendor\\spatie\\laravel-medialibrary\\src\\InteractsWithMedia.php Line : 69{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-14 15:51:12', '2024-01-14 15:51:12'),
(45, 1, 'App\\Models\\Editor::addMedia(): Argument #1 ($file) must be of type Symfony\\Component\\HttpFoundation\\File\\UploadedFile|string, null given, called in D:\\new-civil-center\\dashboard\\app\\Http\\Controllers\\Backend\\BackendEditorController.php on line 126', '500', 'http://127.0.0.1:8000/admin/editors/%D8%AE%D9%84%D9%8A%D9%84-%D8%A7%D9%84%D8%B3%D9%84%D9%85%D9%8A/edit', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '{\"_token\":\"GtCuwHyuaDEjx4fGl1bD09CySNpncCKDm4oGwGza\",\"_method\":\"PUT\",\"temp_file_selector\":\"65a426e982d33\",\"name\":\"\\u062e\\u0644\\u064a\\u0644 \\u0627\\u0644\\u0633\\u0644\\u0645\\u064a\",\"slug\":\"\\u062e\\u0644\\u064a\\u0644-\\u0627\\u0644\\u0633\\u0644\\u0645\\u064a\",\"description\":null,\"meta_description\":null,\"avatar\":{}}', 'Error : D:\\new-civil-center\\dashboard\\vendor\\spatie\\laravel-medialibrary\\src\\InteractsWithMedia.php Line : 69{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-14 15:54:59', '2024-01-14 15:54:59'),
(46, 1, 'App\\Models\\Editor::addMedia(): Argument #1 ($file) must be of type Symfony\\Component\\HttpFoundation\\File\\UploadedFile|string, null given, called in D:\\new-civil-center\\dashboard\\app\\Http\\Controllers\\Backend\\BackendEditorController.php on line 126', '500', 'http://127.0.0.1:8000/admin/editors/%D8%AE%D9%84%D9%8A%D9%84-%D8%A7%D9%84%D8%B3%D9%84%D9%85%D9%8A/edit', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '{\"_token\":\"GtCuwHyuaDEjx4fGl1bD09CySNpncCKDm4oGwGza\",\"_method\":\"PUT\",\"temp_file_selector\":\"65a426e982d33\",\"name\":\"\\u062e\\u0644\\u064a\\u0644 \\u0627\\u0644\\u0633\\u0644\\u0645\\u064a\",\"slug\":\"\\u062e\\u0644\\u064a\\u0644-\\u0627\\u0644\\u0633\\u0644\\u0645\\u064a\",\"description\":null,\"meta_description\":null,\"avatar\":{}}', 'Error : D:\\new-civil-center\\dashboard\\vendor\\spatie\\laravel-medialibrary\\src\\InteractsWithMedia.php Line : 69{\"attributes\":{},\"request\":{},\"query\":{},\"server\":{},\"files\":{},\"cookies\":{},\"headers\":{}}', NULL, '2024-01-14 16:00:50', '2024-01-14 16:00:50');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', 'superadmin', NULL, '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(2, 'admin', 'web', 'admin', NULL, '2023-12-22 03:50:54', '2023-12-22 03:50:54'),
(3, 'customer_support', 'web', 'customer_support', NULL, '2023-12-22 03:50:55', '2023-12-22 03:50:55'),
(4, 'editor', 'web', 'editor', NULL, '2023-12-22 03:50:55', '2023-12-22 03:50:55'),
(5, 'user', 'web', 'user', NULL, '2023-12-22 03:50:55', '2023-12-22 03:50:55');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(17, 2),
(18, 1),
(19, 1),
(20, 1),
(20, 2),
(20, 4),
(21, 1),
(21, 2),
(21, 4),
(22, 1),
(22, 2),
(22, 4),
(23, 1),
(23, 2),
(23, 4),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(29, 3),
(29, 4),
(29, 5),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(36, 4),
(37, 1),
(37, 2),
(37, 3),
(37, 4),
(37, 5),
(38, 1),
(38, 2),
(38, 4),
(39, 1),
(39, 2),
(39, 4),
(40, 1),
(40, 2),
(40, 4),
(41, 1),
(41, 2),
(41, 4),
(42, 1),
(42, 2),
(42, 4),
(43, 1),
(43, 2),
(43, 4),
(44, 1),
(44, 2),
(44, 3),
(44, 4),
(44, 5),
(45, 1),
(45, 2),
(45, 3),
(46, 1),
(46, 2),
(46, 3),
(47, 1),
(47, 2),
(47, 3),
(48, 1),
(48, 4),
(49, 1),
(49, 3),
(49, 4),
(49, 5),
(50, 1),
(50, 4),
(51, 1),
(51, 4),
(52, 1),
(52, 2),
(52, 4),
(53, 1),
(53, 2),
(53, 4),
(54, 1),
(54, 2),
(54, 4),
(55, 1),
(55, 2),
(55, 4),
(56, 1),
(56, 2),
(56, 4),
(57, 1),
(57, 2),
(57, 4),
(58, 1),
(58, 2),
(58, 4),
(59, 1),
(59, 2),
(59, 4),
(60, 1),
(60, 2),
(60, 4),
(61, 1),
(61, 2),
(61, 4),
(62, 1),
(62, 2),
(62, 4),
(63, 1),
(63, 2),
(63, 4),
(64, 1),
(64, 4),
(65, 1),
(65, 4),
(66, 1),
(66, 4),
(67, 1),
(67, 4),
(68, 1),
(68, 2),
(69, 1),
(69, 2),
(70, 1),
(70, 2),
(71, 1),
(71, 2),
(72, 1),
(73, 1),
(73, 2),
(74, 1),
(74, 2),
(75, 1),
(75, 2),
(76, 1),
(76, 2),
(77, 1),
(77, 2),
(77, 3),
(77, 4),
(77, 5),
(78, 1),
(78, 2),
(78, 3),
(78, 4),
(78, 5),
(79, 1),
(79, 2),
(80, 1),
(80, 2),
(81, 1),
(81, 2),
(82, 1),
(82, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2ip7w9t01Y4xRwV7UntpoP6ViCo0DAPJ5CbxKa2o', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibVhpYnlYS08yRmpJZEU4eDNZQ0xVem5KOE93NUNUalRmdWVrY05hMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705256332),
('3UzfNVaF0lP59OP3rclvCqB8PypzYsplcbsUNhxC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ24zZjVJVGpCeDVYNkhiaEJTSnc4NTVKYVZJUnFmTW5SQXpmWEFTbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705259533),
('4SmFXYeggxRFpJpcLVCcO7Y4Tz8tuIijCkHtPg9x', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiRnNhZVZCVjNCVVFwRklKamdmQUNPWDhPRkhoZTJTUHZwZE5yMThRVCI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE4OiJzZWVuX25vdGlmaWNhdGlvbnMiO2k6MDtzOjE4OiJmbGFzaGVyOjplbnZlbG9wZXMiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM1OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vZWRpdG9ycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1705259539),
('5nyYSD3JU1UJBjOqJmkHYO1dYhL6YslZjFEWRfF5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSlJ1WHJVSzFVSXpNaWMwMXliazZPcjI5TXU1RnFnOXg4eFMwMElVbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705261542),
('996hgSAfJtErPrssLxu98aR4lfcoIPaOHpA7ssvP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYld3Z0xPb25KTHpCTTZPdjJDQzh3ajBkaHNGcnNiOWhLNmd6bzlYTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705256036),
('Bk5hV2AXZ06POKHDV60G6DdZ0hWeRRzy4amYN8nv', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN1ViVzNEMnJDTWFzSHYwVHBIVVk2eUhxWkpPYzhPRG5UbUt1VWQ5eSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705257009),
('bRBfCAv54AOqPDtNPvQ3vQ16SsvYODDWayZxLrZk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSktQeHBCakM0UW8zcVlVQUxReDZxRkFQcWJhdHZ1TzY1czFjaWthUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705239633),
('CRyJQwZfnT1zDLBmEDGwwew5ycSiqzA8gmpigqpx', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiVGR4dm4zTFpRcWdjbzZPRHFiOGIxUFdCR1hqNTlWNHJ5WUJTblVsdyI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE4OiJzZWVuX25vdGlmaWNhdGlvbnMiO2k6MDtzOjE4OiJmbGFzaGVyOjplbnZlbG9wZXMiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vcGFnZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1705261596),
('DtbGIpXEqlEvcyaswl0doyX746xwM6jkjrZgabLB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaWZTSFlSRVpjQnJQSDJ6VzJqYVBsNGloa1RlN2NweGp5eDh5alI5RyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705256259),
('DTSELJKgltDvI8xPV5CscOG1WhpY2Zl8BBzjkPh5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZVF2bGlIM1dkMUtlWTJsbVJuTHdCMVNRSTYxUDBzaTZhNGhYRFY1NCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705255851),
('eo7hq4SCg9bBRxxne68nt12TS5m2bzy0uFLsxhoD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieFc0bzZBSDRmR1MzMUJaRUZzWXhUcU9pMFhNbUVsa0h4aTkyQmhRUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705260008),
('FRnRc1QRm4UkWf5lWo82Xxx6HG9fOmXFzlIU5KIe', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZklPbG5PaUhZTEo5cDdXeW1LNjQyZWxBTWpYcEFaclIydDdUNnZ0RyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705239848),
('gbV3PFoChGQGCu89A7RqeNWCuaaAdGpD9onzJGmG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWEFjclZ2ZWtLQ0JzTmxWRkR4U1RUU3JUVGQ1TkVVekRUNlUwTk5YZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705256361),
('Hi90GIzCyrlz6cN1DE9sxR7DFS3FNwsfWX1C8FMF', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiR3RDdXdIeXVhREVqeDRmR2wxYkQwOUN5U05wbmNDS0RtNG9Hd0d6YSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE4OiJzZWVuX25vdGlmaWNhdGlvbnMiO2k6MDtzOjE4OiJmbGFzaGVyOjplbnZlbG9wZXMiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM1OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vZWRpdG9ycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1705259138),
('htxCzduyUShhENHkbKcucUhqxIZqMPQJ7AeMvg6t', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic0wzSjNmYjBlVmsxaDN3NDN1dU5TOGlWdU9BdlpVS29kNUNRNHZlbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705256037),
('iaIvFFurQLzOi7A0mZXRq6oeSj9TYbEDFCqVagg5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZHNVcVg2UFR2MExUaVlLQ1h3ODl1ZG1YdUJwam9sZ3JtekxCYllnaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705256316),
('IfqIIO4guDKjcJzJed6dcBAxgVuadXiMyEwIszM2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVjFPZEREVHVoV1pMSWxkTE45WmZ3Z2NZWHVlMkZNNXBKRVZ2NVFpQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705256682),
('iOw8umO36HWbeYCwuZ4JPGLaVM1lbFTa8RTOofHf', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMFlSUWowNk5XQm5CNjZGbWtVSTRUc3EyMWc1WVREVHk4aEQ1c0hJciI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE4OiJzZWVuX25vdGlmaWNhdGlvbnMiO2k6MDtzOjE4OiJmbGFzaGVyOjplbnZlbG9wZXMiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1705239658),
('kWY8USXcAc0BmwUlJCztVWl1hSCRdM82yqM72foo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidmlZZGtuYVJ1OXE0UUFuTUlseVA4MldpaXVsejN0VHhYOG1HbXJ1ZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705256675),
('LkJfXwyQFt8frYEdL6aIkpaZHuFtOqrrJAzhwqGD', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiYXZMcW1RUDAyeWk2VWh1V2hnNXVaempLcGlIa0ZZN3V6dXhFSnJSMyI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE4OiJzZWVuX25vdGlmaWNhdGlvbnMiO2k6MDtzOjE4OiJmbGFzaGVyOjplbnZlbG9wZXMiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM1OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vZWRpdG9ycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1705260007),
('LmLHt4tvB7C3Bqhb2lIiEvhrsF4tmwoAYewkNaAE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMldyd3ZEdFJtVVpLZHRiTDNUSG8wU3hUbE52d1lLRzNtNXlpZDBIeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705260498),
('MNbCC5a8Va7ayfR8HDqnv7V3OcC9m6bcHtdhrZ4M', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZUNuWnVDUkNIbVV2VlBQcmVSQU5SWnBuVUxVdUtHeE5XZ2s0NkxhQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705256101),
('O8iz9NgFhqLUNuWOa0FHEfWA70gF95YhLLUEnbG9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibExrQXFMbmFRaUpEWnVxZlNUM2pwbEVvMmhLVFF1dXpseUJ4QmVzNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705256410),
('oMpUnP7yc5uwa9ZWVhGwCBI8WC6I2lOgyo0vhSW4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieEZadHp3QjVkOExZaDh4a0p1VjVnWm9McDc3cVJ5UzdRbnh1eHlzZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705256325),
('p0kWLjxR3hjgfulnklwmXwQxE8Nqnmo44nxbkZGZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVnlRMVN2QnFaME5DMHRjWGp2V254dU9KVmxqN1dGNlhzU2FublZIRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705261597),
('pg2Uh3p4HGt5ZI3rxbsbOBhinfMCV2hL6CJqd5BI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUjY1SFN0R3JRVkRjVHl3UUFKWXpPZkF6dkhjS2NiWHY0TmJQdW1aYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705239856),
('PHIFWoMad5CpD5Thv6YAFU0zqva03P2vYkRlet0c', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic3FTNllxVmdMaldNbTlMQjhBV2tzT2NKZkhVaWxGTVI2bmpBUEh1YyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705259906),
('PHzRZ5BMjdmxJELu18jTzFy7hHe3MDiN1u06gbY9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYVBJZmJ0U0xCYXloUEZTN1lBVW1QNFlVelBiTWp0RFg1OFVaS3o0TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705256026),
('pX6WG4P2lCLlNtlZh5IfjIbnj4F4qMr2OUlNiTkC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaGxuMWo1M0FseHZNaUdYcWUzZVVuU2lHZ0lobEtBOFZOOHBQa09veCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705259898),
('Q4GFkqyJTjxo8adfTlSpPsX5xy5DO6HaESPd8gcD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQW5Oa1ozcU9EY0p5bW9CYW9Kb3VlZExaWmVBMHNLNmxOTUJOV1NYbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705259996),
('QwOlSvPw5zlj2NP8qcemyXjwTAaKR8m0WpW6JxlO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOWxCd2lGZ3ZsSUgyeXVnMHZoQTlpM2RYeDZCR25scFN0UHo4Z1NGVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705259540),
('qzQo1YKWNv7XvcSEwKdUltIw4QTD6NmTW4uk8Y5d', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicUVscDFjdmxUQjg1Q3BuSnhOd2E4c0RlSkJjOUNRWnROOUticExTZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705256182),
('R99c9DB3J6t423kIX1nyq48akhjYlKFIxGP34wuT', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZWY4ZXVzb082eDlGZmtuRTBzSkpXZ0REdHpiVGtXdTMydWs2cFhxYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705256312),
('SLOHycpDwcMq6HVk4H7RCI9xmtaWbLTGJwyKO6ww', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMnJ6UmJsY3VxYUdRS2hsMGpnc1YwaXBSVXVjWmpLekhqT2tkWGdDYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705256336),
('sWWnl93eaKC8N9GAsarf0NqcwUaPtYRPHJJTogIj', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieFRkeVQ3M2J3TUgxcTJkWXlyOUV2MlRMaVIyRTR2TVU5RFlTVk1rNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705255847),
('teBLEITU1n8LSrXOw4RQrg02HS84ksrctriBRgCG', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoidVFsbzRJTE9hUkN5WThWU3BvYmZJTnQ5V0l6eWVGSkxqaFR2amRObiI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE4OiJzZWVuX25vdGlmaWNhdGlvbnMiO2k6MDtzOjE4OiJmbGFzaGVyOjplbnZlbG9wZXMiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM1OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vZWRpdG9ycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1705259905),
('tOolvtrBYQ4ahth6FyBtVs9Dx39iC8mkzd3Y33AM', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiME9kY3dvR0pJRFdPSWgwdDk2VGJaRjRVVVdsWDR1dXNqTko1cjZzNCI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE4OiJzZWVuX25vdGlmaWNhdGlvbnMiO2k6MDtzOjE4OiJmbGFzaGVyOjplbnZlbG9wZXMiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM1OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vZWRpdG9ycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1705260498),
('v92lZAn5XgbzTnDclDQ3kqGI0sOjA0FAT41gDgm9', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiU1dCNHNqbTFqSUlrczNwZ1ZRUktYQkp5Y1RyTk5taE5EQkRlbzVONSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE4OiJzZWVuX25vdGlmaWNhdGlvbnMiO2k6MDtzOjE4OiJmbGFzaGVyOjplbnZlbG9wZXMiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1705239923),
('wgNtEd9Akgv6bGFcOQhaaa3VKHjPTPC4PlfqC73T', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRmIzajIzekRES1dVaW5IOGx4V1R3YlIzZXBIalhmTXc4WnhiTDdFRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705256436),
('WjH9tuMxt3oChAlBaLKD9unTO1s9zvk5BfCi8QsK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid1Z5anJSc3lLTjFPRm5NTFV5M1plSk9KVGl5eTlKeU5nZUk3Nk9FRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705261525),
('wvQFhXHfpYuRsFC7N94LbxxCtklu4WesRBvFPFpy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTmdyeG5BMzdzblNvaHhEOE1zMmF5aGxhN3NxVHBBaHdmTUNhVjhrbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705256418),
('wXrSFdg4BuBXMnI4XESUtMHIng2UHAwijIwur8vE', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoia3JaZUQ1eTZtVDF1cnRpY1hpZ1JXbmVLcjFCaU5Mc1EzSlZSNWhaTCI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE4OiJzZWVuX25vdGlmaWNhdGlvbnMiO2k6MDtzOjE4OiJmbGFzaGVyOjplbnZlbG9wZXMiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vYXJ0aWNsZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1705256435),
('x00lpQPZqcM1rmmplm1wyfZQNMKq0DM7KPN96qRI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTVE5czNBa2ltSFZDeUxjazdiaVNsQmFjZWgwR1BoUVdQSnFZOHNWVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705239919),
('Zwya6hsPffsuXLg2Y9HogeWU70cHKxzTe7RVuiQo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ040V3U5QzZaVm5xbDVLMTJ2UmRIdFE4T1cySXl1SEM1d3ZIU25lQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1705259140);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'OTHER',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `order`, `category`, `created_at`, `updated_at`) VALUES
(1, 'website_name', 'اسم الموقع هنا', 0, 'OTHER', '2023-12-22 03:50:52', '2023-12-22 03:50:52'),
(2, 'website_bio', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق', 0, 'OTHER', '2023-12-22 03:50:52', '2023-12-22 03:50:52'),
(3, 'website_logo', '', 0, 'OTHER', '2023-12-22 03:50:52', '2023-12-22 03:50:52'),
(4, 'website_wide_logo', '', 0, 'OTHER', '2023-12-22 03:50:52', '2023-12-22 03:50:52'),
(5, 'website_icon', '', 0, 'OTHER', '2023-12-22 03:50:52', '2023-12-22 03:50:52'),
(6, 'website_icon_base64', '', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(7, 'website_cover', '', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(8, 'address', '', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(9, 'main_color', '#0194fe', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(10, 'hover_color', '#2196f3', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(11, 'dashboard_dark_mode', '0', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(12, 'contact_email', '', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(13, 'phone', '', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(14, 'phone2', '', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(15, 'whatsapp_phone', '', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(16, 'facebook_link', '', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(17, 'telegram_link', '', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(18, 'whatsapp_link', '', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(19, 'twitter_link', '', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(20, 'instagram_link', '', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(21, 'youtube_link', '', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(22, 'tiktok_link', '', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(23, 'upwork_link', '', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(24, 'nafezly_link', '', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(25, 'linkedin_link', '', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(26, 'github_link', '', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(27, 'another_link1', '', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(28, 'another_link2', '', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(29, 'another_link3', '', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(30, 'contact_page', '', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(31, 'header_code', '', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(32, 'footer_code', '', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53'),
(33, 'robots_txt', 'User-agent: *\nSitemap: http://127.0.0.1:8000/sitemap.xml\nAllow: /', 0, 'OTHER', '2023-12-22 03:50:53', '2023-12-22 03:50:53');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arabic_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `english_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag_name`, `arabic_name`, `english_name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'مجتمع', 'مجتمعي', 'eng', 'eng', '2024-01-04 04:21:26', '2024-01-04 04:21:26'),
(2, 'البحث الاجتماعي', NULL, NULL, 'البحث-الاجتماعي', '2024-01-13 06:14:57', '2024-01-13 06:14:57');

-- --------------------------------------------------------

--
-- Table structure for table `temp_files`
--

CREATE TABLE `temp_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `under_attacks`
--

CREATE TABLE `under_attacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'UNDER_ATTACK',
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `release_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blocked` int(11) NOT NULL DEFAULT 0,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `last_activity` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `phone`, `bio`, `blocked`, `email`, `email_verified_at`, `last_activity`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'مسؤول', NULL, NULL, NULL, 0, 'admin@admin.com', '2023-12-22 03:50:52', '2024-01-14 16:46:36', '$2y$10$L2MWqtTTlBZRezOH0nieGO7Jb6gL/ThkuwYMcwZL5WoY56rQnmEk6', 'x9KD9DGsQKE3VIAZKEOQ0aZLBBp5vw6Ow6fg5pWg7dC9riCWW0iT4UU6hSK4', '2023-12-22 03:50:52', '2024-01-14 16:46:36'),
(2, 'خليل السلمي', NULL, NULL, NULL, 0, 'khaleel@admin.com', NULL, NULL, '$2y$10$HpcBe8Pq05M/rsZHC2DBSuvi47GQU9BS98/kVaO4HHinly46QO4c2', NULL, '2024-01-04 15:15:18', '2024-01-04 15:15:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcements_user_id_foreign` (`user_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_slug_unique` (`slug`),
  ADD KEY `articles_user_id_foreign` (`user_id`),
  ADD KEY `articles_editor_id_foreign` (`editor_id`),
  ADD KEY `articles_category_id_foreign` (`category_id`);

--
-- Indexes for table `article_comments`
--
ALTER TABLE `article_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_comments_user_id_foreign` (`user_id`),
  ADD KEY `article_comments_comment_id_foreign` (`comment_id`),
  ADD KEY `article_comments_article_id_foreign` (`article_id`);

--
-- Indexes for table `article_tags`
--
ALTER TABLE `article_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_tags_tag_id_foreign` (`tag_id`),
  ADD KEY `article_tags_article_id_foreign` (`article_id`);

--
-- Indexes for table `block_ips`
--
ALTER TABLE `block_ips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `block_ips_user_id_foreign` (`user_id`),
  ADD KEY `block_ips_ip_index` (`ip`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_user_id_foreign` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_user_id_foreign` (`user_id`);

--
-- Indexes for table `contact_replies`
--
ALTER TABLE `contact_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_replies_user_id_foreign` (`user_id`),
  ADD KEY `contact_replies_contact_id_foreign` (`contact_id`);

--
-- Indexes for table `editors`
--
ALTER TABLE `editors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `editors_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faqs_user_id_foreign` (`user_id`);

--
-- Indexes for table `hub_files`
--
ALTER TABLE `hub_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hub_files_user_id_foreign` (`user_id`),
  ADD KEY `hub_files_name_index` (`name`);

--
-- Indexes for table `item_seens`
--
ALTER TABLE `item_seens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_seens_user_id_index` (`user_id`),
  ADD KEY `item_seens_ip_index` (`ip`),
  ADD KEY `item_seens_type_index` (`type`),
  ADD KEY `item_seens_type_id_index` (`type_id`),
  ADD KEY `item_seens_traffic_landing_index` (`traffic_landing`),
  ADD KEY `item_seens_domain_index` (`domain`),
  ADD KEY `item_seens_prev_link_index` (`prev_link`),
  ADD KEY `item_seens_agent_name_index` (`agent_name`),
  ADD KEY `item_seens_browser_index` (`browser`),
  ADD KEY `item_seens_device_index` (`device`),
  ADD KEY `item_seens_operating_system_index` (`operating_system`),
  ADD KEY `item_seens_code_index` (`code`),
  ADD KEY `item_seens_country_code_index` (`country_code`),
  ADD KEY `item_seens_country_name_index` (`country_name`),
  ADD KEY `item_seens_created_at_index` (`created_at`),
  ADD KEY `item_seens_updated_at_index` (`updated_at`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_location_unique` (`location`);

--
-- Indexes for table `menu_links`
--
ALTER TABLE `menu_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_links_menu_id_foreign` (`menu_id`),
  ADD KEY `menu_links_menu_link_id_foreign` (`menu_link_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`),
  ADD KEY `pages_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rate_limits`
--
ALTER TABLE `rate_limits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rate_limits_user_id_foreign` (`user_id`),
  ADD KEY `rate_limits_traffic_landing_index` (`traffic_landing`),
  ADD KEY `rate_limits_domain_index` (`domain`),
  ADD KEY `rate_limits_prev_link_index` (`prev_link`),
  ADD KEY `rate_limits_ip_index` (`ip`),
  ADD KEY `rate_limits_agent_name_index` (`agent_name`),
  ADD KEY `rate_limits_browser_index` (`browser`),
  ADD KEY `rate_limits_device_index` (`device`),
  ADD KEY `rate_limits_operating_system_index` (`operating_system`),
  ADD KEY `rate_limits_code_index` (`code`),
  ADD KEY `rate_limits_country_code_index` (`country_code`),
  ADD KEY `rate_limits_country_name_index` (`country_name`),
  ADD KEY `rate_limits_created_at_index` (`created_at`);

--
-- Indexes for table `rate_limit_details`
--
ALTER TABLE `rate_limit_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rate_limit_details_user_id_foreign` (`user_id`),
  ADD KEY `rate_limit_details_rate_limit_id_foreign` (`rate_limit_id`),
  ADD KEY `rate_limit_details_url_index` (`url`),
  ADD KEY `rate_limit_details_ip_index` (`ip`);

--
-- Indexes for table `redirections`
--
ALTER TABLE `redirections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `redirections_user_id_foreign` (`user_id`);

--
-- Indexes for table `report_errors`
--
ALTER TABLE `report_errors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `report_errors_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_tag_name_unique` (`tag_name`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Indexes for table `temp_files`
--
ALTER TABLE `temp_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `temp_files_user_id_foreign` (`user_id`),
  ADD KEY `temp_files_name_index` (`name`);

--
-- Indexes for table `under_attacks`
--
ALTER TABLE `under_attacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_last_activity_index` (`last_activity`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `article_comments`
--
ALTER TABLE `article_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `article_tags`
--
ALTER TABLE `article_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `block_ips`
--
ALTER TABLE `block_ips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_replies`
--
ALTER TABLE `contact_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `editors`
--
ALTER TABLE `editors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hub_files`
--
ALTER TABLE `hub_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_seens`
--
ALTER TABLE `item_seens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu_links`
--
ALTER TABLE `menu_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rate_limits`
--
ALTER TABLE `rate_limits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rate_limit_details`
--
ALTER TABLE `rate_limit_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1164;

--
-- AUTO_INCREMENT for table `redirections`
--
ALTER TABLE `redirections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_errors`
--
ALTER TABLE `report_errors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `temp_files`
--
ALTER TABLE `temp_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `under_attacks`
--
ALTER TABLE `under_attacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `articles_editor_id_foreign` FOREIGN KEY (`editor_id`) REFERENCES `editors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `article_comments`
--
ALTER TABLE `article_comments`
  ADD CONSTRAINT `article_comments_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `article_comments_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `article_comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `article_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `article_tags`
--
ALTER TABLE `article_tags`
  ADD CONSTRAINT `article_tags_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `article_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `block_ips`
--
ALTER TABLE `block_ips`
  ADD CONSTRAINT `block_ips_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact_replies`
--
ALTER TABLE `contact_replies`
  ADD CONSTRAINT `contact_replies_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contact_replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hub_files`
--
ALTER TABLE `hub_files`
  ADD CONSTRAINT `hub_files_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item_seens`
--
ALTER TABLE `item_seens`
  ADD CONSTRAINT `item_seens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_links`
--
ALTER TABLE `menu_links`
  ADD CONSTRAINT `menu_links_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_links_menu_link_id_foreign` FOREIGN KEY (`menu_link_id`) REFERENCES `menu_links` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rate_limits`
--
ALTER TABLE `rate_limits`
  ADD CONSTRAINT `rate_limits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rate_limit_details`
--
ALTER TABLE `rate_limit_details`
  ADD CONSTRAINT `rate_limit_details_rate_limit_id_foreign` FOREIGN KEY (`rate_limit_id`) REFERENCES `rate_limits` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rate_limit_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redirections`
--
ALTER TABLE `redirections`
  ADD CONSTRAINT `redirections_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `report_errors`
--
ALTER TABLE `report_errors`
  ADD CONSTRAINT `report_errors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `temp_files`
--
ALTER TABLE `temp_files`
  ADD CONSTRAINT `temp_files_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
