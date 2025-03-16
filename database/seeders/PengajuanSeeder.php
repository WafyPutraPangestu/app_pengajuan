<?php
namespace Database\Seeders;

use App\Models\Item;
use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Database\Seeder;

class PengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengambil pengguna pertama yang ada (yang sudah dibuat sebelumnya)
        $user = User::first();

        // Membuat beberapa item
        $items = Item::factory(4)->create();

        // Membuat beberapa pengajuan dan menghubungkannya dengan satu item dan satu user
        Pengajuan::factory(10)->create()->each(function ($pengajuan) use ($items, $user) {
            // Hubungkan satu item dengan pengajuan secara langsung
            $pengajuan->item()->associate($items->random());
            // Hubungkan user dengan pengajuan
            $pengajuan->user()->associate($user);
            $pengajuan->save();
        });
    }
}
