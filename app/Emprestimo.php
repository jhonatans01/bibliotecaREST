<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    protected $dateFormat = ['dataEmprestimo', 'dataDevolucao', 'prazo'];
}
