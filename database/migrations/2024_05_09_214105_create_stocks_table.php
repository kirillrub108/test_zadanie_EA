<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->date('date');                              // Дата записи
            $table->dateTime('last_change_date');              // Дата и время последнего изменения
            $table->string('supplier_article');                // Артикул поставщика
            $table->string('tech_size');                       // Размер
            $table->string('barcode');                         // Штрихкод
            $table->integer('quantity');                       // Количество на складе
            $table->boolean('is_supply');                      // Флаг поставки (1 - поставка, 0 - нет)
            $table->boolean('is_realization');                 // Флаг реализации (1 - реализация, 0 - нет)
            $table->integer('quantity_full');                  // Общее количество (включая товары в пути)
            $table->string('warehouse_name');                  // Название склада
            $table->boolean('in_way_to_client');               // Флаг товара в пути к клиенту (1 - да, 0 - нет)
            $table->boolean('in_way_from_client');             // Флаг товара в пути от клиента (1 - да, 0 - нет)
            $table->unsignedBigInteger('nm_id');               // ID товара
            $table->string('subject');                         // Предмет
            $table->string('category');                        // Категория
            $table->string('brand');                           // Бренд
            $table->string('sc_code');                         // Код склада (SC код)
            $table->decimal('price', 10, 2);       // Цена
            $table->integer('discount');                       // Скидка
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
        Schema::dropIfExists('stocks');
    }
}
