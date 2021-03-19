<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'category_id' => $row[0],
            'product_name' => $row[1],
            'description' => $row[2],
            'price' => $row[3],
            'stock' => $row[4],
            'link' => $row[5]
        ]);
    }
}
