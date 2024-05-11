<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('income_id');             // ID поступления
            $table->string('number');                            // Номер поступления
            $table->date('date');                                // Дата поступления
            $table->date('last_change_date');                    // Дата последнего изменения
            $table->string('supplier_article');                  // Артикул поставщика
            $table->string('tech_size');                         // Размер
            $table->string('barcode');                           // Штрихкод
            $table->integer('quantity');                         // Количество
            $table->decimal('total_price', 10, 2);   // Общая стоимость
            $table->date('date_close');                          // Дата закрытия поступления
            $table->string('warehouse_name');                    // Название склада
            $table->unsignedBigInteger('nm_id');                 // ID товара
            $table->string('status');                            // Статус поступления
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
        Schema::dropIfExists('incomes');
    }
}
