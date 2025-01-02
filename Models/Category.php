<?php


class Category
{
    public $Id;
    public $NameCategory;

    public function RetrieveRequestParam()
    {
        $this->NameCategory = filter_input(INPUT_POST, 'name_category');

        $id = filter_input(INPUT_POST, 'id');
        if ($id != null) $this->Id = $id;
    }
}