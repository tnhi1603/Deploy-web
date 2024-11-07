<?php

namespace App\Imports;

use App\Models\Watch;
use Faker\Core\File;
use Faker\Provider\File as ProviderFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Validators\Failure;

class WatchImport implements  WithHeadingRow, SkipsOnFailure, ToArray, WithChunkReading
{
    /**
    * @param Collection $collection
    */
    protected $name = [];
    protected $discount = [];
    protected $description = [];
    protected $storage = [];
    protected $slug = [];
    protected $gender = [];
    protected $img1 = [];
    protected $img2 = [];
    protected $img3 = [];
    protected $brand_id = [];
    protected $category_id = [];
    protected $price = [];

    public function __construct() 
    {

    }

    public static function import($filePath) 
    {
        $json = Storage::json('/watches.json');
        foreach ($json as $keys => $values) {
            self::createWatch($values);
        }
        // return $json;
    }

    public function onFailure(Failure ...$failures)
    {

    }

    public function array(array $array)
    {
        echo $array;
        foreach ($array as $value) {
            $this->createWatch($value);
        }
        
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public static function createWatch(array $item)
    {
        $watch = Watch::create([
            'name' => $item['name'],
            'price' => $item['price'],
            'storage' => $item['storage'],
            'discount' => $item['discount'],
            'category_id' => $item['category_id'],
            'brand_id' => $item['brand_id'],
            'description' => array_key_exists('description',$item) ? $item['description'] : '',
            'gender' => $item['gender'],
            'slug' => $item['slug'],
            'img1' => $item['img1'],
            'img2' => array_key_exists('img2',$item) ? $item['img2'] : null,
            'img3' => array_key_exists('img3',$item) ? $item['img3'] : null,
        ]);
    }
}
