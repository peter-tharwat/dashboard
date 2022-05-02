<?php

namespace App\Observers;

use App\Models\Contact;

class ContactObserver
{
    /**
     * Handle the Contact "created" event.
     *
     * @param  \App\Models\Contact  $contact
     * @return void
     */
    public function created(Contact $contact)
    {
        /*\App\Models\User::where('email',env("ADMIN_MAIL"))->first()->notify(
            new \App\Notifications\GeneralNotification(
                'لديك طلب اتصال جديد على فكرة تشارت',
                'مرحباً !',
                ['لديك طلب اتصال جديد من '.$contact->name],
                'عرض طلب التصال',
                route('contacts.show',$contact),
                ['database']
            )
        );*/
    }

    /**
     * Handle the Contact "updated" event.
     *
     * @param  \App\Models\Contact  $contact
     * @return void
     */
    public function updated(Contact $contact)
    {
        //
    }

    /**
     * Handle the Contact "deleted" event.
     *
     * @param  \App\Models\Contact  $contact
     * @return void
     */
    public function deleted(Contact $contact)
    {
        //
    }

    /**
     * Handle the Contact "restored" event.
     *
     * @param  \App\Models\Contact  $contact
     * @return void
     */
    public function restored(Contact $contact)
    {
        //
    }

    /**
     * Handle the Contact "force deleted" event.
     *
     * @param  \App\Models\Contact  $contact
     * @return void
     */
    public function forceDeleted(Contact $contact)
    {
        //
    }
}
