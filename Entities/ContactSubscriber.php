<?php

namespace Modules\Crm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class ContactSubscriber extends BaseModel
{

    protected $fillable = ['user_id', 'group_id', 'status', 'subscribe_at', 'unsubscribe_at', 'hash'];
    public $migrationDependancy = [];
    protected $table = "crm_contact_subscriber";

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->integer('user_id')->nullable();
        $table->integer('group_id')->nullable();
        $table->string('status', 25)->nullable()->index('status');
        $table->dateTime('subscribe_at')->nullable();
        $table->dateTime('unsubscribe_at')->nullable();
        $table->string('hash', 40)->nullable()->index('hash');

        $table->unique(['user_id', 'group_id'], 'user_group');
    }
}
