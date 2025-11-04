<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pengguna extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Nama tabel di database
     */
    protected $table = 'pengguna';

    /**
     * Primary key - SESUAIKAN dengan database Anda
     * Dari screenshot: user_id
     */
    protected $primaryKey = 'user_id';

    /**
     * Auto increment
     */
    public $incrementing = true;

    /**
     * Tipe primary key
     */
    protected $keyType = 'int';

    /**
     * Timestamps
     */
    public $timestamps = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * Kolom yang boleh diisi mass assignment
     * SESUAIKAN dengan struktur tabel dari screenshot
     */
    protected $fillable = [
        'nama_lengkap',
        'username_email',  // Ini nama kolom yang benar dari database
        'password',
        'role',
        'bidang_id',
        'status',
    ];

    /**
     * Kolom yang disembunyikan saat serialisasi
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting tipe data
     */
    protected $casts = [
        'password' => 'hashed',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * PENTING: Method ini memberitahu Laravel kolom mana yang digunakan untuk username saat login
     * Karena Laravel default mencari 'email', kita override ke 'username_email'
     */
    public function getAuthIdentifierName()
    {
        return 'user_id';
    }

    /**
     * Method untuk mendapatkan username (untuk keperluan display, bukan auth)
     */
    public function getUsernameAttribute()
    {
        return $this->username_email;
    }

    /**
     * Relasi ke tabel bidang (jika ada)
     */
    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }

    /**
     * Relasi ke log aktivitas
     */
    public function logAktivitas()
    {
        return $this->hasMany(LogAktivitas::class, 'user_id', 'user_id');
    }

    /**
     * Scope untuk filter berdasarkan role
     */
    public function scopeRole($query, $role)
    {
        return $query->where('role', $role);
    }

    /**
     * Scope untuk filter status aktif
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Check apakah user adalah superadmin
     */
    public function isSuperadmin()
    {
        return $this->role === 'superadmin';
    }

    /**
     * Check apakah user adalah admin bidang
     */
    public function isAdminBidang()
    {
        return $this->role === 'adminbidang';
    }

    /**
     * Check apakah user adalah pimpinan
     */
    public function isPimpinan()
    {
        return $this->role === 'pimpinan';
    }
}