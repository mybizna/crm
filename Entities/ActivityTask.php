<?php

namespace Modules\Crm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class ActivityTask extends BaseModel
{

    protected $fillable = ['activity_id', 'partner_id'];
    public $migrationDependancy = [];
    protected $table = "crm_activity_task";

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->integer('activity_id')->nullable()->index('activity_id');
        $table->integer('partner_id')->nullable()->index('partner_id');
    }


    /**
     * Define rights for this model.
     *
     * @return array
     */
    public function rights(): array
    {

    }
}
