database/migrations/xxxx_create_products_table.php
Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->string('name')->unique();
    $table->decimal('price', 10, 2);
    $table->integer('stock');
    $table->text('description')->nullable();
    $table->timestamps();
});
