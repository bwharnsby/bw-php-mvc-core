<?php


namespace bwharnsby\phpmvc;


use bwharnsby\phpmvc\database\DatabaseModel;

abstract class UserModel extends DatabaseModel
{
    abstract public function getDisplayName(): string;

    public static function tableName(): string
    {
        // TODO: Implement tableName() method.
    }

    public function attributes(): array
    {
        // TODO: Implement attributes() method.
    }

    public static function primaryKey(): string
    {
        // TODO: Implement primaryKey() method.
    }
}