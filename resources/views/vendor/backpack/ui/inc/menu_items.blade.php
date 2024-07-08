{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="me-1 la la-igloo nav-icon"></i> إحصائيات</a></li>

<x-backpack::menu-dropdown title="الرئيسية" icon="la la-home">
    <x-backpack::menu-dropdown-header title="إعدادات الرئيسية" class="text-muted" />
    <x-backpack::menu-dropdown-item title="خصائص الرئيسية" :link="backpack_url('home-page')" />
    <x-backpack::menu-dropdown-item title="إعلانات الرئيسية" :link="backpack_url('home-ad')" />
    <x-backpack::menu-dropdown-item title="الإحصائيات" :link="backpack_url('home-statistic')" />
</x-backpack::menu-dropdown>
<x-backpack::menu-dropdown title="عن الجمعية" icon="la la-address-card">
    <x-backpack::menu-dropdown-header title="إعدادات صفحة عن الجمعية" class="text-muted" />
    <x-backpack::menu-dropdown-item title="خصائص عن الجمعية" :link="backpack_url('about-us-settings')" />
    <x-backpack::menu-dropdown-item title="القيم" :link="backpack_url('value')" />
    <x-backpack::menu-dropdown-item title="المجالات" :link="backpack_url('field')" />
    <x-backpack::menu-dropdown-header title="صفحات الأعضاء" class="text-muted" />
    <x-backpack::menu-dropdown-item title="المناصب" :link="backpack_url('position')" />
    <x-backpack::menu-dropdown-item title="مجلس الإدارة" :link="backpack_url('board-member')" />
    <x-backpack::menu-dropdown-item title="الجمعية العمومية" :link="backpack_url('general-assembly-member')" />
    <x-backpack::menu-dropdown-item title="فريق الجمعية" :link="backpack_url('charity-team-member')" />
    <x-backpack::menu-dropdown-header title="الهيكل التنظيمي" class="text-muted" />
    <x-backpack::menu-dropdown-item title="خصائص الهيكل التنظيمي" :link="backpack_url('organizational-structure-settings')" />
</x-backpack::menu-dropdown>

<x-backpack::menu-dropdown title="الإعلام" icon="la la-photo-video">
    <x-backpack::menu-dropdown-header title="إعدادات المركز الإعلامي" class="text-muted" />
    <x-backpack::menu-dropdown-item title="الإخبار" :link="backpack_url('news')" />
    <x-backpack::menu-dropdown-item title="الغعاليات" :link="backpack_url('event')" />
    <x-backpack::menu-dropdown-item title="الصور" :link="backpack_url('picture')" />
</x-backpack::menu-dropdown>

<x-backpack::menu-dropdown title="الصفحات" icon="la la-file-alt">
    <x-backpack::menu-dropdown-header title="صفحات الموقع" class="text-muted" />
    <x-backpack::menu-dropdown-item title="الشركاء" :link="backpack_url('partner')" />
    <x-backpack::menu-dropdown-item title="خدماتنا" :link="backpack_url('service')" />
    <x-backpack::menu-dropdown-item title="مبادراتنا" :link="backpack_url('initiative')" />
    <x-backpack::menu-dropdown-item title="أبرز مشاريعنا" :link="backpack_url('projects')" />
    <x-backpack::menu-dropdown-item title="الحسابات البنكية" :link="backpack_url('banks')" />
    <x-backpack::menu-dropdown-item title="المسجلين في المبادرات" :link="backpack_url('initiative-registration')" />
    <x-backpack::menu-dropdown-header title="الحوكمة" class="text-muted" />
    <x-backpack::menu-dropdown-item title="اللوائح والسياسات" :link="backpack_url('regulation')" />
    <x-backpack::menu-dropdown-item title="الخطط التشغيلية" :link="backpack_url('operational-plan')" />
    <x-backpack::menu-dropdown-item title="تقارير الأنشطة" :link="backpack_url('activity-report')" />
    <x-backpack::menu-dropdown-item title="التقارير المالية" :link="backpack_url('financial-report')" />
    <x-backpack::menu-dropdown-item title="المحاضر العمومية" :link="backpack_url('public-record')" />
    <x-backpack::menu-dropdown-item title="الإفصاح والشفافية" :link="backpack_url('transparency')" />
    <x-backpack::menu-dropdown-item title="أخرى" :link="backpack_url('other-governance')" />
</x-backpack::menu-dropdown>

<x-backpack::menu-dropdown title="انضم معنا" icon="la la-sign-in-alt">
    <x-backpack::menu-dropdown-header title="إعدادات الصفحات" class="text-muted" />
    <x-backpack::menu-dropdown-item title="التوظيف" :link="backpack_url('employment-page')" />
    <x-backpack::menu-dropdown-item title="العضوية" :link="backpack_url('membership-page')" />
    <x-backpack::menu-dropdown-item title="التطوع" :link="backpack_url('volunteering-page')" />
    <x-backpack::menu-dropdown-header title="إدراج الفرص" class="text-muted" />
    <x-backpack::menu-dropdown-item title="فرص التوظيف" :link="backpack_url('employment-opportunity')" />
    <x-backpack::menu-dropdown-item title="فرص العضوية" :link="backpack_url('membership-opportunity')" />
    <x-backpack::menu-dropdown-item title="فرص التطوع" :link="backpack_url('volunteer-opportunity')" />
    <x-backpack::menu-dropdown-header title="الطلبات" class="text-muted" />
    <x-backpack::menu-dropdown-item title="طلبات التوظيف" :link="backpack_url('employment-request')" />
    <x-backpack::menu-dropdown-item title="طلبات العضويات" :link="backpack_url('membership-request')" />
    <x-backpack::menu-dropdown-item title="طلبات التطوع" :link="backpack_url('volunteering-request')" />
</x-backpack::menu-dropdown>

<x-backpack::menu-dropdown title="تواصل معنا" icon="la la-sign-in-alt">
    <x-backpack::menu-dropdown-header title="إعدادات تواصل معنا" class="text-muted" />
    <x-backpack::menu-dropdown-item title="خصائص تواصل معنا" :link="backpack_url('contact-us-settings')" />
    <x-backpack::menu-dropdown-item title="رسائل التواصل" :link="backpack_url('contact-message')" />
</x-backpack::menu-dropdown>


<x-backpack::menu-dropdown title="النظام" icon="la la-puzzle-piece">
    <x-backpack::menu-dropdown-header title="إعدادات الموقع" class="text-muted" />
    <x-backpack::menu-dropdown-item title="الإعدادات العامة" :link="backpack_url('general-settings')" />
    <x-backpack::menu-dropdown-item title="المشتركين في النشرة البريدية" :link="backpack_url('mailing-list-subscriber')" />
    <x-backpack::menu-dropdown-header title="الإعدادات الخاصة" class="text-muted" />
    <x-backpack::menu-dropdown-item title="المستخدمين" icon="la la-user" :link="backpack_url('user')" />
    <x-backpack::menu-dropdown-item title="الوظائف" icon="la la-group" :link="backpack_url('role')" />
</x-backpack::menu-dropdown>

<x-backpack::menu-item title="الإستبيانات" icon="la la-question" :link="backpack_url('questionnaires')" />

<x-backpack::menu-item title="الصفحات" icon="la la-question" :link="backpack_url('page')" />

<x-backpack::menu-item title="المؤهلات" icon="la la-question" :link="backpack_url('qualification')" />
<x-backpack::menu-item title="الخبرات" icon="la la-question" :link="backpack_url('experiance')" />
<x-backpack::menu-item title="Faqs" icon="la la-question" :link="backpack_url('faq')" />