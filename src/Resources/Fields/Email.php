<?php

namespace Tanthammar\TallForms\Resources\Fields;

use Mediconesystems\LivewireDatatables\Column;
use Tanthammar\TallForms\Input;

class Email extends BaseField
{
    protected $tallFormClass = Input::class;
    protected $tableClass = Column::class;
}
