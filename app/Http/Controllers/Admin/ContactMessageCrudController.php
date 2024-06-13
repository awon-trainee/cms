<?php

namespace App\Http\Controllers\Admin;

use App\Enums\status\ContactMessageStatus;
use App\Enums\type\ContactMessageType;
use App\Exports\ContactMessagesExport;
use App\Models\ContactMessage;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class ContactMessageCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ContactMessageCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\ContactMessage::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/contact-message');
        CRUD::setEntityNameStrings('الرسالة', 'رسائل تواصل معنا');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        CRUD::filter('status')
            ->type('select2')
            ->label('الحالة')
            ->options(ContactMessageStatus::toArray());


        CRUD::filter('type')
            ->type('select2')
            ->label('النوع')
            ->options(ContactMessageType::toArray());

        CRUD::addFilter([
            'name' => 'created_at',
            'type' => 'date_range',
            'label'=> 'تاريخ الإنشاء'
        ],
            false,
            function ($value) {
                $dates = json_decode($value);
                CRUD::addClause('whereDate', 'created_at', '>=', $dates->from);
                CRUD::addClause('whereDate', 'created_at', '<=', $dates->to);
            });

        $this->prepareColumns();

        if (ContactMessage::unread()->exists()) {
            CRUD::addButtonFromView('top', 'markAllAsRead', 'mark-all-as-read', 'beginning');
        }

        CRUD::addButtonFromView('top', 'export', 'export', 'end');
    }

    /**
     * Define what happens when the Show operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-show
     * @return void
     */
    protected function setupShowOperation()
    {
        $this->autoSetupShowOperation();

        $this->prepareColumns();
    }

    public function markAsRead($id)
    {
        $contactMessage = ContactMessage::find($id);
        $contactMessage->status = ContactMessageStatus::READ;
        $contactMessage->save();

        \Alert::add('success','تم تحديد الرسالة كمقروءة بنجاح')->flash();
        return redirect()->back();
    }

    public function markAsUnread($id)
    {
        $contactMessage = ContactMessage::find($id);
        $contactMessage->status = ContactMessageStatus::UNREAD;
        $contactMessage->save();

        \Alert::add('success','تم تحديد الرسالة كغير مقروءة بنجاح')->flash();
        return redirect()->back();
    }

    public function markAllAsRead()
    {
        ContactMessage::unread()->update(['status' => ContactMessageStatus::READ]);

        \Alert::add('success','تم تحديد جميع الرسائل كمقروءة بنجاح')->flash();
        return redirect()->back();
    }

    /**
     * Export contact messages to excel
     *
     * @return BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new ContactMessagesExport, 'Contact-us-messages.xlsx');
    }

    private function prepareColumns()
    {
        CRUD::removeColumn('status');

        CRUD::addColumn([
            'name' => 'status',
            'label' => 'الحالة',
            'type' => 'enum',
            'enum_class' => ContactMessageStatus::class,
            'enum_function' => 'nameAr',
            'searchLogic' => false,
        ]);

        CRUD::removeColumn('type');

        CRUD::addColumn([
            'name' => 'type',
            'label' => 'النوع',
            'type' => 'enum',
            'enum_class' => ContactMessageType::class,
            'enum_function' => 'nameAr',
            'searchLogic' => false,
        ]);

        CRUD::addColumn([
            'name' => 'created_at',
            'type' => 'datetime',
            'label' => 'تاريخ الإنشاء',
            'format' => 'D MMM YYYY, HH:mm',
        ]);

        CRUD::addButtonFromModelFunction('line', 'markAsReadOrUnread', 'markAsReadOrUnreadButton', 'beginning');

        CRUD::setColumnDetails('name', [
            'label' => 'الاسم',
        ]);
        CRUD::setColumnDetails('email', [
            'label' => 'البريد الإلكتروني',
        ]);
        CRUD::setColumnDetails('phone', [
            'label' => 'رقم الجوال',
        ]);
        CRUD::setColumnDetails('message', [
            'label' => 'الرسالة',
        ]);
        CRUD::setColumnDetails('created_at', [
            'label' => 'تاريخ الإنشاء',
        ]);
        CRUD::setColumnDetails('updated_at', [
            'label' => 'تاريخ التعديل',
        ]);
    }
}
