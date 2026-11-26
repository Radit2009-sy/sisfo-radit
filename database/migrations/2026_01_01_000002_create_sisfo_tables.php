<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('guru', function (Blueprint $t) {
            $t->id(); $t->string('nip')->unique(); $t->string('nama');
            $t->enum('gender', ['L', 'P']); $t->string('email')->nullable(); $t->string('no_hp')->nullable();
            $t->timestamps();
        });
        Schema::create('kelas', function (Blueprint $t) {
            $t->id(); $t->string('nama_kelas')->unique();
            $t->foreignId('wali_kelas_id')->nullable()->constrained('guru')->nullOnDelete();
            $t->timestamps();
        });
        Schema::create('siswa', function (Blueprint $t) {
            $t->id(); $t->string('nis')->unique(); $t->string('nama');
            $t->enum('jenis_kelamin', ['L', 'P']);
            $t->foreignId('kelas_id')->constrained('kelas')->cascadeOnDelete();
            $t->string('no_hp')->nullable(); $t->timestamps();
        });
        Schema::create('mapel', function (Blueprint $t) {
            $t->id(); $t->string('kode')->unique(); $t->string('nama');
            $t->unsignedTinyInteger('kkm')->default(75); $t->timestamps();
        });
        Schema::create('nilai', function (Blueprint $t) {
            $t->id();
            $t->foreignId('siswa_id')->constrained('siswa')->cascadeOnDelete();
            $t->foreignId('mapel_id')->constrained('mapel')->cascadeOnDelete();
            $t->decimal('nilai_tugas', 5, 2); $t->decimal('nilai_uts', 5, 2); $t->decimal('nilai_uas', 5, 2);
            $t->decimal('nilai_akhir', 5, 2); $t->timestamps();
            $t->unique(['siswa_id', 'mapel_id']);
        });
    }
    public function down(): void { foreach (['nilai','mapel','siswa','kelas','guru'] as $x) Schema::dropIfExists($x); }
};
