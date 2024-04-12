<?php

namespace Modules\Crm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class CustomerActivity extends BaseModel
{

    protected $fillable = [
        'partner_id', 'type', 'message', 'email_subject', 'log_type',
        'start_date', 'end_date', 'extra', 'sent_notification', 'done_at'
    ];
    public $migrationDependancy = [];
    protected $table = "crm_customer_activity";

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->integer('partner_id')->nullable()->index('partner_id');
        $table->string('type')->nullable()->index('type');
        $table->longText('message')->nullable();
        $table->text('email_subject')->nullable();
        $table->string('log_type')->nullable()->index('log_type');
        $table->dateTime('start_date')->nullable();
        $table->dateTime('end_date')->nullable();
        $table->longText('extra')->nullable();
        $table->boolean('sent_notification')->default(0);
        $table->dateTime('done_at')->nullable();
    }


    /**
     * Define rights for this model.
     *
     * @return array
     */
    public function rights(): array
    {
        $rights = parent::rights();

        $rights['staff'] = ['view' => true];
        $rights['registered'] = ['view' => true];
        $rights['guest'] = [];

        return $rights;
    }
}
