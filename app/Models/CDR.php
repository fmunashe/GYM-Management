<?php

namespace App\Models;

use App\Http\Traits\UUIDs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CDR extends Model
{
    use UUIDs;
    protected $fillable = [
        "datetime",
        "clid",
        "src",
        "dst",
        "dcontext",
        "srctrunk",
        "dstrunk",
        "lastapp",
        "lastdata",
        "duration",
        "billable",
        "disposition",
        "amaflags",
        "calltype",
        "accountcode",
        "uniqueid",
        "recordfile",
        "recordpath",
        "monitorfile",
        "monitorpath",
        "dstmonitorfile",
        "dstmonitorpath",
        "extfield1",
        "extfield2",
        "extfield3",
        "extfield4",
        "extfield5",
        "payaccount",
        "usercost",
        "didnumber",
        "transbilling",
        "payexten",
        "srcchanurl",
        "dstchanurl",
        "companycontact",
        "personalcontact",
        "contactnumber",
        "personalcontacttf",
    ];
}
