<?php

namespace Modules\Crm\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class CustomerCompany extends BaseModel
{

    protected $fillable = ['customer_id', 'company_id'];
    public $migrationDependancy = [];
    protected $table = "crm_customer_company";

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->bigIncrements('id');
        $table->bigInteger('customer_id')->nullable()->index('customer_id');
        $table->bigInteger('company_id')->nullable()->index('company_id');
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
