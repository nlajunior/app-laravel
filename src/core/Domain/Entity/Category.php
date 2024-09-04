<?php

namespace core\Domain\Entity;

use core\Domain\Entity\Traits\MethodsMagicsTrait;
use core\Domain\Exception\EntityValidateException;

class Category
{
    use MethodsMagicsTrait;
    
    public function __construct(
        protected string $id = '',
        protected string $name = '',
        protected string $description = '',
        protected bool $isActive = true,

    ) {
        $this->validate();
    }

    public function disable():void
    {
        $this->isActive=false;
    }

    public function enable():void
    {
        $this->isActive = true;
    }

    public function update(string $name, string $description = '')
    {
        $this->name = $name;
        // $this->description = $description??$this->description;
        $this->description = $description;

        $this->validate();
    }

     public function validate()
    {
        if (empty($this->name))
        {
            throw new EntityValidateException("field name invalid.");
        }

        if ( strlen($this->name)>255 || strlen($this->name <=2) )
        {
           
            throw new EntityValidateException("Campo name");
        }

        if (($this->description!='') && ( strlen($this->description)>255 || strlen($this->description<3) ))
        {
            throw new EntityValidateException("Campo description");
        }
        
    }
}
