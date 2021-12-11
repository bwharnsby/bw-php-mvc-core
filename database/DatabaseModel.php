<?php


namespace app\core\database;


use app\core\App;
use app\core\Model;

abstract class DatabaseModel extends Model
{
    abstract public static function tableName(): string;
    abstract public function attributes(): array;
    abstract public static function primaryKey(): string;

    public function save()
    {
        $table_name = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $statement = self::prepare("INSERT INTO $table_name (".implode(',', $attributes).")
                VALUES(".implode(',', $params).")");

        foreach($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();
        return true;
    }

    public static function prepare($sql)
    {
        return App::$app->database->pdo->prepare($sql);
    }

    public static function findOne($where)
    {
        $table_name = static::tableName();
        $attributes = array_keys($where);
        $sql = implode("AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT * FROM $table_name WHERE $sql");
        foreach($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();
        return $statement->fetchObject(static::class);
    }

    public function rules(): array
    {
        // TODO: Implement rules() method.
    }
}