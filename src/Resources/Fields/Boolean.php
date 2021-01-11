<?php

namespace Tanthammar\TallForms\Resources\Fields;

use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Tanthammar\TallForms\Checkbox;

class Boolean extends BaseField
{
    protected $tallFormClass = Checkbox::class;
    protected $tableClass = BooleanColumn::class;
}
