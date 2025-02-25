<?php

namespace Database\Seeders;

use App\Models\AttributeGroup;
use App\Models\AttributeProduct;
use App\Models\AttributeValue;
use App\Models\Product;
use Illuminate\Database\Seeder;

class AttributesSeeder extends Seeder
{
    public function run(): void
    {
        $groups = ["Mechanism", "Glass", "Strap", "Case", "Indication"];

        foreach ($groups as $group) {
            AttributeGroup::create([
                'title' => $group
            ]);
        }

        $dbGroups = AttributeGroup::all();

        $values = [
            ["Automatic", "Quartz", "Mechanical", "Solar", "Kinetic"],
            ["Sapphire", "Mineral", "Acrylic", "Hardened Mineral", "Anti-reflective"],
            ["Leather", "Metal", "Rubber", "Nylon", "Silicone"],
            ["Stainless Steel", "Titanium", "Ceramic", "Plastic", "Carbon Fiber"],
            ["Analog", "Digital", "Hybrid", "Luminous", "Chronograph"]
        ];

        foreach ($dbGroups as $key => $group) {
            foreach ($values[$key] as $value) {
                AttributeValue::create([
                    'value' => $value,
                    'attribute_group_id' => $group->id
                ]);
            }
        }

        $dbValues = AttributeValue::all()->groupBy('attribute_group_id');

        $products = Product::all();
        
        foreach ($products as $product) {
            foreach($dbValues as $key => $values) {
                AttributeProduct::create([
                    'product_id'   => $product->id,
                    'attribute_value_id' => $values->random()->id,
                ]);
            }
        }
    }
}