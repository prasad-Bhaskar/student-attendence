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
        Schema::create('branch', function (Blueprint $table)  {
            $table->uuid('id')->primary();
            $table->string('title', length:30);
            $table->string('short_key', length:30)->comment("this is for dynamic data fetch");
            $table->string('branch_code', length:30);
            $table->string('branch_label', length:30);
            $table->string('shorrt_key', length:30);
            $table->timestamps();
            $table->softDeletes('deleted_at', precision: 0);
            $table->boolean('active')->default(true);
            $table->charset('utf8mb4');
            $table->collation('utf8mb4_general_ci');
            $table->engine = 'InnoDB';
        });

        Schema::create('semester', function(Blueprint $table){
            $table->uuid('id')->primary();
            $table->string('title', length:30);
            $table->string('short_key', length:30)->comment("this is for dynamic data fetch");
            $table->timestamps();
            $table->softDeletes('deleted_at', precision: 0);
            $table->boolean('active')->default(true);
            $table->charset('utf8mb4');
            $table->collation('utf8mb4_general_ci');
            $table->engine = 'InnoDB';
        });

        Schema::create('user_type', function (Blueprint $table)  {
            $table->uuid('id')->primary();
            $table->string('title', length:30);
            $table->string('short_key', length:30)->comment("this is for dynamic data fetch");
            $table->timestamps();
            $table->softDeletes('deleted_at', precision: 0);
            $table->boolean('active')->default(true);
            $table->charset('utf8mb4');
            $table->collation('utf8mb4_general_ci');
            $table->engine = 'InnoDB';
        });

        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('username', length:30);
            $table->string('first_name', length:50);
            $table->string('last_name', length:50)->nullable();
            $table->string('email', length:50);
            $table->string('mobile', length:15);
            $table->string('roll_no', length:25)->nullable();
            $table->text('password');
            $table->text('profile_photo')->nullable();
            $table->year('year_of_registration');
            $table->uuid('branch_id');
            $table->string('academic_year', length:10);
            $table->uuid('currenct_semester');
            $table->uuid('user_type');
            $table->enum('gender', ['male', 'female', 'other']); //male female, other
            $table->timestamps();
            $table->uuid('created_by');
            $table->uuid('updated_by');
            $table->boolean('active')->default(true);
            $table->softDeletes('deleted_at', precision: 0);
            $table->charset('utf8mb4');
            $table->collation('utf8mb4_general_ci');
            $table->foreign('currenct_semester')->references('id')->on('semester');
            $table->foreign('branch_id')->references('id')->on('branch');
            $table->foreign('user_type')->references('id')->on('user_type');
            $table->engine = 'InnoDB';
        });

        Schema::create('user_personal_details', function(Blueprint $table){
            $table->uuid('id')->primary();
            $table->string('father_name', length:50);
            $table->string('father_mobile', length:15);
            $table->string('father_occupation', length:50);
            $table->double('father_annual_income');
            $table->string('mother_name', length:50);
            $table->string('mother_mobile', length:15);
            $table->string('mother_occupation', length:50);
            $table->double('mother_annual_income');
            $table->date('dob');
            $table->string('religion', length:20);
            $table->string('aadhar_no', length:20);
            $table->enum('caste', ['ST', 'SC', 'OBC', 'UR', 'GEN'])->comment("the caste of the user (student)");
            $table->uuid('user');
            $table->boolean('disabled')->default(false);
            $table->timestamps();
            $table->uuid('created_by');
            $table->uuid('updated_by');
            $table->softDeletes('deleted_at', precision: 0);
            $table->boolean('active')->default(true);
            $table->charset('utf8mb4');
            $table->collation('utf8mb4_general_ci');
            $table->foreign('user')->references('id')->on('users');
            $table->engine = 'InnoDB';
        });

        Schema::create('user_acedamic_details', function(Blueprint $table){
            $table->uuid('id')->primary();
            $table->string('enrollment_no', length:10);
            $table->date('enrollment_date')->nullable();
            $table->date('addmission_date')->nullable();
            $table->enum('mode_of_study',['private', 'regular'])->nullable()->comment("private/regular comes here");
            $table->string('addmission_type', length:30)->comment("where from he/she comes");
            $table->uuid('user');
            $table->timestamps();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->softDeletes('deleted_at', precision: 0);
            $table->boolean('active')->default(true);
            $table->charset('utf8mb4');
            $table->collation('utf8mb4_general_ci');
            $table->foreign('user')->references('id')->on('users');
            $table->engine = 'InnoDB';
        });
        Schema::create('user_bank_details', function(Blueprint $table){
            $table->uuid('id')->primary();
            $table->string('bank_name', length:60);
            $table->string('branch', length:60)->nullable();
            $table->string('ifsc_code', length:20);
            $table->string('account_number', length:20);
            $table->string('account_holder_name', length:20);
            $table->uuid('user');
            $table->timestamps();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->softDeletes('deleted_at', precision: 0);
            $table->boolean('active')->default(true);
            $table->charset('utf8mb4');
            $table->collation('utf8mb4_general_ci');
            $table->foreign('user')->references('id')->on('users');
            $table->engine = 'InnoDB';
        });

        Schema::create('user_addresses', function(Blueprint $table){
            $table->uuid('id')->primary();
            $table->string('city', length:50)->nullable();
            $table->string('post', length:50)->nullable();
            $table->string('district', length:50)->nullable();
            $table->string('address_line_1', length:200)->nullable();
            $table->string('address_line_2', length:200)->nullable();
            $table->string('landmark', length:50)->nullable();
            $table->string('pin_code', length:8)->nullable();
            $table->uuid('user');
            $table->boolean('is_primary')->default(true);
            $table->timestamps();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->softDeletes('deleted_at', precision: 0);
            $table->boolean('active')->default(true);
            $table->charset('utf8mb4');
            $table->collation('utf8mb4_general_ci');
            $table->foreign('user')->references('id')->on('users');
            $table->engine = 'InnoDB';
        });


        Schema::create('subject', function(Blueprint $table){
            $table->uuid('id')->primary();
            $table->string('titile', length:50);
            $table->string('subject_code', length:15);
            $table->uuid('semester');
            $table->uuid('user');
            $table->uuid('branch');            
            $table->enum('scheme', ['old', 'new']);            
            $table->string('short_key', length:30)->comment("this is for dynamic data fetch");
            $table->boolean('is_primary')->default(true);
            $table->timestamps();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->softDeletes('deleted_at', precision: 0);
            $table->boolean('active')->default(true);
            $table->charset('utf8mb4');
            $table->collation('utf8mb4_general_ci');
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('branch')->references('id')->on('branch');
            $table->engine = 'InnoDB';
        });

        Schema::create('teacher_student_attendence',function(Blueprint $table){
            $table->uuid('id')->primary();            
            $table->integer('period')->nullable();
            $table->integer('no_of_present');
            $table->integer('no_of_absent');
            $table->uuid('subject');
            $table->uuid('branch');
            $table->timestamps();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->softDeletes('deleted_at', precision: 0);
            $table->boolean('active')->default(true);
            $table->charset('utf8mb4');
            $table->collation('utf8mb4_general_ci');
            $table->foreign('subject')->references('id')->on('subject');
            $table->foreign('branch')->references('id')->on('branch');
            $table->engine = 'InnoDB';
        });
        
        Schema::create('student_daily_attendance',function(Blueprint $table){
            $table->uuid('id')->primary();            
            $table->uuid('attendance');
            $table->uuid('user');
            $table->boolean('is_present')->default(false);
            $table->timestamps();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->boolean('active')->default(true);
            $table->softDeletes('deleted_at', precision: 0);
            $table->charset('utf8mb4');
            $table->collation('utf8mb4_general_ci');
            $table->foreign('attendance')->references('id')->on('teacher_student_attendence');
            $table->foreign('user')->references('id')->on('users');
            
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('student_daily_attendance');
        Schema::dropIfExists('teacher_student_attendence');
        Schema::dropIfExists('subject');
        Schema::dropIfExists('user_addresses');
        Schema::dropIfExists('user_bank_details');
        Schema::dropIfExists('user_addresses');
        Schema::dropIfExists('user_personal_details');
        Schema::dropIfExists('user_acedamic_details');
        Schema::dropIfExists('user_bank_details');
        Schema::dropIfExists('users');
        Schema::dropIfExists('user_type');
        Schema::dropIfExists('semester');
        Schema::dropIfExists('branch');
    }
};
