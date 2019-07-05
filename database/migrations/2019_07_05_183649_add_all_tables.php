<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('academicyear', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->string('name', 11);
		    $table->integer('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('address', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->string('name', 255);
		    $table->integer('parentId');
		    $table->integer('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('board', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->string('name', 30);
		    $table->integer('academicYearId');
		    $table->date('openingDate');
		    $table->date('closingDate');
		    $table->integer('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('contactnumber', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->string('contactNumber', 255);
		    $table->integer('contactTypeId');
		    $table->integer('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('contacttype', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->string('name', 11);
		    $table->integer('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('currency', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->string('name', 255);
		    $table->integer('conversionValue');
		    $table->boolean('isDeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('datatypes', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->string('name', 30);
		    $table->boolean('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('datepurchase', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->date('dateTime');
		    $table->integer('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('department', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->string('name', 255);
		    $table->text('jobDescribtion');
		    $table->integer('boardId');
		    $table->integer('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('departmentform', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->integer('departmentId');
		    $table->integer('registrationFormId');
		    $table->boolean('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('event', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->string('name', 255);
		    $table->date('date');
		    $table->time('eventStart');
		    $table->time('eventEnd');
		    $table->text('description');
		    $table->integer('addressId');
		    $table->integer('academicYearId');
		    $table->integer('boardId');
		    $table->boolean('isRegisterationOpened')->default('1');
		    $table->integer('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('eventform', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->integer('eventId');
		    $table->integer('registerationFormId');
		    $table->boolean('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('interests', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->string('name', 255);
		    $table->integer('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('links', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->string('physicalName', 255);
		    $table->string('friendlyName', 255);
		    $table->string('htmlCode', 255);
		    $table->integer('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('manufacture', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->string('name', 50);
		    $table->integer('addressId');
		    $table->boolean('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('manufacturecontactinfo', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->integer('manufactureId');
		    $table->integer('contactNumberId');
		    $table->integer('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('messages', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->string('name', 30);
		    $table->text('messageTemplate');
		    $table->integer('messageTypeId');
		    $table->boolean('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('messagetype', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->string('name', 50);
		    $table->boolean('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('messageuser', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->integer('messageId');
		    $table->integer('userId');
		    $table->boolean('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('notification', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->string('favorite', 255);
		    $table->boolean('isReaded')->default('0');
		    $table->integer('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('options', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->string('name', 255);
		    $table->integer('dataTypeId');
		    $table->boolean('isDeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('password', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->integer('userId');
		    $table->string('password', 255);
		    $table->boolean('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('paymentmethod', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->string('name', 255);
		    $table->integer('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('paymentmethodoptions', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->integer('paymentMethodId');
		    $table->integer('paymentOptionId');
		    $table->integer('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('paymentmethodoptionvalue', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->integer('paymentMethodOptionId');
		    $table->integer('purchaseId');
		    $table->text('value');
		    $table->integer('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('product', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->string('name', 255);
		    $table->integer('price');
		    $table->integer('quantity');
		    $table->integer('currencyId')->default('1');
		    $table->integer('productTypeId')->default('0');
		    $table->boolean('isDeleted');

		    $table->timestamps();

		});

		Schema::create('productoptionsvalue', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->string('value', 255);
		    $table->integer('productSelectedOptionsId');
		    $table->integer('purchaseId');
		    $table->boolean('isDeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('productselectedoptions', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->integer('productId');
		    $table->integer('optionsId');
		    $table->boolean('isDeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('producttype', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->string('name', 255);
		    $table->integer('parentId');
		    $table->boolean('isDeleted');

		    $table->timestamps();

		});

		Schema::create('purchase', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->integer('userId');
		    $table->integer('datePurchaseId');
		    $table->integer('manufactureId');
		    $table->integer('deliveryPersonId');
		    $table->integer('PaymentMethodId');
		    $table->integer('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('purchasedetails', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->integer('purchaseId');
		    $table->integer('productId');
		    $table->integer('statusId');
		    $table->integer('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('registeration', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->integer('userId');
		    $table->integer('academicYearId');
		    $table->integer('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('registerationdetails', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->integer('registerationId');
		    $table->integer('boardId');
		    $table->integer('statusId');
		    $table->integer('registrationFormId');
		    $table->integer('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('registerationform', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->string('name', 50);
		    $table->integer('registrationFormTypeId');
		    $table->integer('registerAs');
		    $table->boolean('isRegistrationClosed')->default('0');
		    $table->boolean('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('registrationformoptions', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('rid');
		    $table->integer('registrationFormId');
		    $table->integer('optionId');
		    $table->integer('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('registrationformoptionsvalue', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->integer('registrationFormOptionsId');
		    $table->string('value', 255);
		    $table->integer('registrationDetailsId');
		    $table->integer('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('registrationformtype', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->string('name', 50);
		    $table->boolean('isForEvent')->default('0');
		    $table->boolean('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('status', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->string('name', 30);
		    $table->integer('isdeleted')->default('0');

		    $table->timestamps();

		});



		Schema::create('usercontactinfo', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->integer('userId');
		    $table->integer('contactNumberId');
		    $table->integer('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('userinterests', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->integer('userId');
		    $table->integer('interestsId');
		    $table->integer('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('usersnotifications', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->integer('userId');
		    $table->integer('notificationId');
		    $table->boolean('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('usertype', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->string('name', 50);
		    $table->integer('parentId');
		    $table->integer('isdeleted')->default('0');

		    $table->timestamps();

		});

		Schema::create('usertypelinks', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->integer('id');
		    $table->integer('userTypeId');
		    $table->integer('linkId');
		    $table->integer('isdeleted')->default('0');

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
		Schema::dropIfExists('usertypelinks');
		Schema::dropIfExists('usertype');
		Schema::dropIfExists('usersnotifications');
		Schema::dropIfExists('userinterests');
		Schema::dropIfExists('usercontactinfo');
		Schema::dropIfExists('status');
		Schema::dropIfExists('registrationformtype');
		Schema::dropIfExists('registrationformoptionsvalue');
		Schema::dropIfExists('registrationformoptions');
		Schema::dropIfExists('registerationform');
		Schema::dropIfExists('registerationdetails');
		Schema::dropIfExists('registeration');
		Schema::dropIfExists('purchasedetails');
		Schema::dropIfExists('purchase');
		Schema::dropIfExists('producttype');
		Schema::dropIfExists('productselectedoptions');
		Schema::dropIfExists('productoptionsvalue');
		Schema::dropIfExists('product');
		Schema::dropIfExists('paymentmethodoptionvalue');
		Schema::dropIfExists('paymentmethodoptions');
		Schema::dropIfExists('paymentmethod');
		Schema::dropIfExists('password');
		Schema::dropIfExists('options');
		Schema::dropIfExists('notification');
		Schema::dropIfExists('messageuser');
		Schema::dropIfExists('messagetype');
		Schema::dropIfExists('messages');
		Schema::dropIfExists('manufacturecontactinfo');
		Schema::dropIfExists('manufacture');
		Schema::dropIfExists('links');
		Schema::dropIfExists('interests');
		Schema::dropIfExists('eventform');
		Schema::dropIfExists('event');
		Schema::dropIfExists('departmentform');
		Schema::dropIfExists('department');
		Schema::dropIfExists('datepurchase');
		Schema::dropIfExists('datatypes');
		Schema::dropIfExists('currency');
		Schema::dropIfExists('contacttype');
		Schema::dropIfExists('contactnumber');
		Schema::dropIfExists('board');
		Schema::dropIfExists('address');
		Schema::dropIfExists('academicyear');

    }
}



