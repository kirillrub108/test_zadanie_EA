<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('g_number');                          // Идентификатор продажи
            $table->dateTime('date');                            // Дата и время продажи
            $table->dateTime('last_change_date');                // Дата и время последнего изменения
            $table->string('supplier_article');                  // Артикул поставщика
            $table->string('tech_size');                         // Размер
            $table->string('barcode');                           // Штрихкод
            $table->decimal('total_price', 10, 2);   // Общая стоимость
            $table->integer('discount_percent');                 // Процент скидки
            $table->string('warehouse_name');                    // Название склада
            $table->string('oblast');                            // Область
            $table->unsignedBigInteger('income_id');             // ID поступления
            $table->unsignedBigInteger('odid')->nullable();      // ID заказа (может быть null)
            $table->unsignedBigInteger('nm_id');                 // ID товара
            $table->string('subject');                           // Предмет
            $table->string('category');                          // Категория
            $table->string('brand');                             // Бренд
            $table->boolean('is_cancel');                        // Флаг отмены (0 или 1)
            $table->dateTime('cancel_dt')->nullable();           // Дата и время отмены (может быть null)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
