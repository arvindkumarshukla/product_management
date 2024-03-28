<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Theme;
use App\Models\Brand;
use App\Models\Seller;
use App\Models\CrossSelling;

class JsonImportController extends Controller
{
    public function import(Request $request)
    {
        
        $data = $request->all();

        $product = Product::create([
            'name' => $data['name'],
            'added_by' => $data['added_by'],
            'thumbnail_image' => $data['thumbnail_image'],
            'currency_symbol' => $data['currency_symbol'],
            'mrp' => $data['mrp'],
            'is_wholesale' => $data['is_wholesale'],
            'rating' => $data['rating'],
            'rating_count' => $data['rating_count'],
            'description' => $data['description'],
            'video_link' => $data['video_link'],
            'awafx_choice' => $data['awafx_choice'],
            'best_selling' => $data['best_selling'],
            'est_shipping_time' => $data['est_shipping_time'],
            'is_refurbished' => $data['is_refurbished'],
            'is_in_cart' => $data['is_in_cart'],
            'is_in_wishlist' => $data['is_in_wishlist'],
            'meta_title' => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_img' => $data['meta_img'],
        ]);

        foreach ($data['attributes'] as $attributeData) {

            foreach ($attributeData['attribute_value'] as $value) {
                $attributeValue = AttributeValue::create([
                    'value' => $value['value'],
                ]);
                $attribute->values()->save($attributeValue);
            }

            $attribute = Attribute::create([
                'value_id' => $attributeData['value_id'],
                'attribute_name' => $attributeData['attribute_name'],
                'color_code' => $attributeData['color_code'],
            ]);

            foreach ($attributeData['attribute_value'] as $value) {
                $attributeValue = AttributeValue::create([
                    'value' => $value['value'],
                ]);
                $attribute->values()->save($attributeValue);
            }

            $product->attributes()->save($attribute);
        }

        foreach ($data['theme'] as $themeData) {
            $theme = Theme::create([
                'name' => $themeData['name'],
                'color' => $themeData['color'],
            ]);
            $product->themes()->attach($themeData['id'], ['id' => $themeData['pivot']['id']]);

            
        }

        $brandData = $data['brand'];
        $brand = Brand::create([
            'name' => $brandData['name'],
            'logo' => $brandData['logo'],
        ]);
        $product->brand()->associate($brand);

        foreach ($data['seller'] as $sellerData) {
            $seller = Seller::create([
                'seller_id' => $sellerData['seller_id'],
                'seller_name' => $sellerData['seller_name'],
                'seller_stock' => $sellerData['seller_stock'],
                'est_shipping_days' => $sellerData['est_shipping_days'],
                'selling_price' => $sellerData['selling_price'],
            ]);
            $product->sellers()->attach($seller);
        }

        foreach ($data['cross_selling'] as $crossSellingData) {
            $crossSelling = CrossSelling::create([
                'name' => $crossSellingData['name'],
                'thumbnail_image' => $crossSellingData['thumbnail_image'],
                'mrp' => $crossSellingData['mrp'],
                'rating' => $crossSellingData['rating'],
                'sales' => $crossSellingData['sales'],
                'is_wholesale' => $crossSellingData['is_wholesale'],
                'awafx_choice' => $crossSellingData['awafx_choice'],
                'best_selling' => $crossSellingData['best_selling'],
                'carbon_footprint' => $crossSellingData['carbon_footprint'],
            ]);

            $brand = Brand::find($crossSellingData['brand']['id']);
            $crossSelling->brand()->associate($brand);

            $crossSelling->save();

            $product->crossSelling()->attach($crossSelling);
        }

        
    }
}
