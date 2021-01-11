<?php

namespace Tanthammar\TallForms\Resources\Fields;

use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Tanthammar\TallForms\Input;
use Tanthammar\TallFormsSponsors\DatePicker;

class Date extends BaseField
{
    protected $tallFormClass = DatePicker::class;
    protected $tableClass = DateColumn::class;
}
