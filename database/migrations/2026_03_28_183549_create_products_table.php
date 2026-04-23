<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->json('key_features')->nullable();
            $table->string('short_description');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->decimal('price', 10, 2);
            $table->decimal('old_price', 10, 2)->nullable()->default(0);
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->decimal('cost_price', 10, 2)->nullable();
            $table->integer('stock_quantity');
            $table->string('sku')->nullable();
            $table->string('main_image');
            $table->json('gallery_images')->nullable();
            $table->boolean('has_variants')->default(false);
            $table->string('variant_type')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->integer('warenty')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_trending')->default(false);
            $table->boolean('is_hot')->default(false);
            $table->boolean('is_new')->default(false);
            $table->String('average_rating')->default(0);
            $table->integer('total_reviews')->default(0);
            $table->timestamps();
        });
    }

//  🧾 Typical Intermediate Product Table Columns
// 🔹 1. Basic Product Info
// id (Primary Key)
// name (Product name)
// slug (SEO-friendly URL, e.g. "nike-air-shoes")
// description (Full details)
// short_description
// brand_id (Foreign key)
// category_id (Foreign key)
// 🔹 2. Pricing & Stock
// price (Base price)
// discount_price (Offer price)
// cost_price (Optional, internal use)
// stock_quantity
// sku (Stock Keeping Unit - unique code)
// 🔹 3. Product Media
// main_image
// gallery_images (JSON ya separate table me bhi ho sakta hai)
// 🔹 4. Product Variants (agar applicable ho)
// has_variants (boolean)
// variant_type (size, color, etc.)

// 👉 Advanced systems me variants alag table me hote hain:

// product_variants table (size, color, price, stock)
// 🔹 5. Status & Visibility
// status (active / inactive)
// is_featured
// is_trending
// visibility (public / private / hidden)
// 🔹 6. SEO Fields
// meta_title
// meta_description
// meta_keywords
// 🔹 7. Ratings & Reviews
// average_rating
// total_reviews
// 🔹 8. Shipping Info
// weight
// dimensions (length, width, height)
// shipping_class
// 🔹 9. Timestamps
// created_at
// updated_at
// deleted_at (soft delete ke liye)
// 🔥 Bonus (Intermediate+ Features)
// tax_class
// barcode
// supplier_id
// returnable (yes/no)
// warranty_period
// 🧠 Pro Tip

// Real-world systems (like Amazon ya Flipkart) me product data normalize hota hai, matlab:

// Images → separate table
// Variants → separate table
// Reviews → separate table 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proucts');
    }
};
