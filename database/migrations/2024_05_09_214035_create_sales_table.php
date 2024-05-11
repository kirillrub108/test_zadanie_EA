<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('g_number');                                // Идентификатор заказа
            $table->date('date');                                      // Дата заказа
            $table->date('last_change_date');                          // Дата последнего изменения
            $table->string('supplier_article');                        // Артикул поставщика
            $table->string('tech_size');                               // Размер
            $table->string('barcode');                                 // Штрихкод
            $table->decimal('total_price', 10, 2);         // Общая стоимость
            $table->integer('discount_percent');                       // Процент скидки
            $table->boolean('is_supply');                              // Флаг поставки (0 - нет, 1 - да)
            $table->boolean('is_realization');                         // Флаг реализации (0 - нет, 1 - да)
            $table->string('promo_code_discount')->nullable();         // Скидка по промокоду (может быть null)
            $table->string('warehouse_name');                          // Название склада
            $table->string('country_name');                            // Название страны
            $table->string('oblast_okrug_name');                       // Название области/округа
            $table->string('region_name');                             // Название региона
            $table->unsignedBigInteger('income_id');                   // ID поступления
            $table->string('sale_id');                                 // ID продажи
            $table->unsignedBigInteger('odid')->nullable();            // ID заказа (может быть null)
            $table->integer('spp');                                    // spp
            $table->decimal('for_pay', 10, 2);             // Сумма к оплате
            $table->decimal('finished_price', 10, 2);      // Финальная цена
            $table->decimal('price_with_disc', 10, 2);     // Цена с учетом скидки
            $table->unsignedBigInteger('nm_id');                       // ID товара
            $table->string('subject');                                 // Предмет
            $table->string('category');                                // Категория
            $table->string('brand');                                   // Бренд
            $table->boolean('is_storno')->nullable();                  // Флаг сторно (может быть null)
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
        Schema::dropIfExists('sales');
    }
}
